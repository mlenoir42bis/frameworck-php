<pre>
<?php
    $i = 0;
    if (is_array($data['getById'][0]['filesProject']) && $i < count($data['getById'][0]['filesProject'])) {
        while ($i < count($this->data['getById'][0]['filesProject'])) {
            if ($data['getById'][0]['filesProject'][$i]['tag'] == "pdf") {
                $file = $data['getById'][0]['filesProject'][$i]['name'];
            }
            $i++;
        }
    }
    $rootfile = '../../../../webroot/pdf/' . $file;
?>
</pre>
<hr></br><hr>
<pre>
<?php
    var_dump($data['getById']);
?>
</pre>

<object data="<?php  echo $rootfile;  ?>" type="application/pdf" width="600" height="800">
    <a href="<?php  echo $rootfile;  ?>"><?php  echo $file;  ?></a>
</object>
