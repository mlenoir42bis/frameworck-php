<?php

class fpdfch extends FPDF
{

    protected $outlines = array();
    protected $outlineRoot;

    function Bookmark($txt, $isUTF8=false, $level=0, $y=0)
    {
        if(!$isUTF8)
            $txt = utf8_encode($txt);
        if($y==-1)
            $y = $this->GetY();
        $this->outlines[] = array('t'=>$txt, 'l'=>$level, 'y'=>($this->h-$y)*$this->k, 'p'=>$this->PageNo());
    }

    function _putbookmarks()
    {
        $nb = count($this->outlines);
        if($nb==0)
            return;
        $lru = array();
        $level = 0;
        foreach($this->outlines as $i=>$o)
        {
            if($o['l']>0)
            {
                $parent = $lru[$o['l']-1];
                // Set parent and last pointers
                $this->outlines[$i]['parent'] = $parent;
                $this->outlines[$parent]['last'] = $i;
                if($o['l']>$level)
                {
                    // Level increasing: set first pointer
                    $this->outlines[$parent]['first'] = $i;
                }
            }
            else
                $this->outlines[$i]['parent'] = $nb;
            if($o['l']<=$level && $i>0)
            {
                // Set prev and next pointers
                $prev = $lru[$o['l']];
                $this->outlines[$prev]['next'] = $i;
                $this->outlines[$i]['prev'] = $prev;
            }
            $lru[$o['l']] = $i;
            $level = $o['l'];
        }
        // Outline items
        $n = $this->n+1;
        foreach($this->outlines as $i=>$o)
        {
            $this->_newobj();
            $this->_put('<</Title '.$this->_textstring($o['t']));
            $this->_put('/Parent '.($n+$o['parent']).' 0 R');
            if(isset($o['prev']))
                $this->_put('/Prev '.($n+$o['prev']).' 0 R');
            if(isset($o['next']))
                $this->_put('/Next '.($n+$o['next']).' 0 R');
            if(isset($o['first']))
                $this->_put('/First '.($n+$o['first']).' 0 R');
            if(isset($o['last']))
                $this->_put('/Last '.($n+$o['last']).' 0 R');
            $this->_put(sprintf('/Dest [%d 0 R /XYZ 0 %.2F null]',$this->PageInfo[$o['p']]['n'],$o['y']));
            $this->_put('/Count 0>>');
            $this->_put('endobj');
        }
        // Outline root
        $this->_newobj();
        $this->outlineRoot = $this->n;
        $this->_put('<</Type /Outlines /First '.$n.' 0 R');
        $this->_put('/Last '.($n+$lru[0]).' 0 R>>');
        $this->_put('endobj');
        }

        function _putresources()
        {
            parent::_putresources();
            $this->_putbookmarks();
        }

        function _putcatalog()
        {
            parent::_putcatalog();
            if(count($this->outlines)>0)
            {
                $this->_put('/Outlines '.$this->outlineRoot.' 0 R');
                $this->_put('/PageMode /UseOutlines');
            }
        }

        function CreateIndex(){
            //Index title
            $this->SetFontSize(20);
            $this->Cell(0,5,'Index',0,1,'C');
            $this->SetFontSize(15);
            $this->Ln(10);
        
            $size=sizeof($this->outlines);
            $PageCellSize=$this->GetStringWidth('p. '.$this->outlines[$size-1]['p'])+2;
            for ($i=0;$i<$size;$i++){
                //Offset
                $level=$this->outlines[$i]['l'];
                if($level>0)
                    $this->Cell($level*8);
        
                //Caption
                $str=utf8_decode($this->outlines[$i]['t']);
                $strsize=$this->GetStringWidth($str);
                $avail_size=$this->w-$this->lMargin-$this->rMargin-$PageCellSize-($level*8)-4;
                while ($strsize>=$avail_size){
                    $str=substr($str,0,-1);
                    $strsize=$this->GetStringWidth($str);
                }
                $this->Cell($strsize+2,$this->FontSize+2,$str);
        
                //Filling dots
                $w=$this->w-$this->lMargin-$this->rMargin-$PageCellSize-($level*8)-($strsize+2);
                $nb=$w/$this->GetStringWidth('.');
                $dots=str_repeat('.',$nb);
                $this->Cell($w,$this->FontSize+2,$dots,0,0,'R');
        
                //Page number
                $this->Cell($PageCellSize,$this->FontSize+2,'p. '.$this->outlines[$i]['p'],0,1,'R');
            }
        }

        function SetPage($num) {
            $this->page = $num;
        }

        function FirstPage()
        {
            $this->SetFont('Arial','B',15);
            $this->Cell(70);
            $this->Cell(60,200,'Cahier des charges',0,0,'C');
            $this->Ln(40);
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
            $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
        }
        function Content($txt)
        {
            $this->SetFont('Arial','',12);
            $this->MultiCell(0,5,$txt);
        }
        function AddChapter($num, $libelle, $txt)
        {
            $this->AddPage();
            $this->Title1($num,$libelle);
            $this->Content($txt);
        }
    
}

?>