<?php
class myemail {
    function emailSimpl($subject, $content, $from, $to, $Cc = NULL, $Bcc = NULL){
      
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $from)){
            $line = "\r\n";
        }
        else{
            $line = "\n";
        }

        $msg_html = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>" . $subject . "</title></head><body>" . $content . "</body></html>";

        $boundary = "-----=".md5(rand());

        $header = "From: \"WeaponsB\"<" . $from . ">" . $line;
        $header .= "To: \"WeaponsB\"<" . $to . ">" . $line;
        $header .= "Cc: \"WeaponsB\"<" . $Cc . ">" . $line;
        $header .= "Bcc: \"WeaponsB\"<" . $Bcc . ">" . $line;

        $header .= "MIME-Version: 1.0" . $line;
        $header .= "Content-Type: multipart/alternative;" . $line . " boundary=\"$boundary\"" . $line;

        $msg = $line."--".$boundary.$line;

        $msg .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $line;
        $msg .= "Content-Transfer-Encoding: 8bit" . $line;
        $msg .= $line . $msg_html . $line;

        $msg .= $line . "--".$boundary."--" . $line;
        $msg .= $line . "--".$boundary."--" . $line;

        return mail($from,$subject,$msg,$header);

    }
    function emailAttachment($subject, $content, $from, $to, $files = array (), $Cc = NULL, $Bcc = NULL){
      
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $from)){
            $line = "\r\n";
        }
        else{
            $line = "\n";
        }

        $msg_html = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /><title>" . $subject . "</title></head><body>" . $content . "</body></html>";

        $boundary = "-----=".md5(rand());

        $header = "From: <" . $from . ">" . $line;
        $header .= "To: <" . $to . ">" . $line;
        $header .= "Cc: <" . $Cc . ">" . $line;
        $header .= "Bcc: <" . $Bcc . ">" . $line;

        $header .= "MIME-Version: 1.0" . $line;
        $header .= "Content-Type: multipart/alternative;" . $line . " boundary=\"$boundary\"" . $line;

        $msg = $line."--".$boundary.$line;

        $msg .= "Content-Type: text/html; charset=\"ISO-8859-1\"" . $line;
        $msg .= "Content-Transfer-Encoding: 8bit" . $line;
        $msg .= $line . $msg_html . $line;


        $i = 0;
        while ($i < count($files)) {
            $file_name = $files[$i]['name'];
            $file_root = $files[$i]['root'] . $file_name;
            if (file_exists($file_root))
            {
                $msg .= $line . $i . " if : " . $file_name . $line;

                $file_type = filetype($file_root);
                $file_size = filesize($file_root);
             
                $handle = fopen($file_root, 'r') or die('File '.$file_root.'can t be open');
                $content = fread($handle, $file_size);
                $content = chunk_split(base64_encode($content));
                $f = fclose($handle);
             
                $msg .= '--'.$boundary.$line;
                $msg .= 'Content-type:'.$file_type.';name=www.frameworck.me/webroot/pdf/'.$file_name.$line;
                $msg .= 'Content-transfer-encoding:base64'.$line.$line;
                $msg .= $content.$line;

            }
            else {
                $msg .= $line . $i . " else : " . $file_name . $line;
            }
            $i++;
        }

        $msg .= $line . "--".$boundary."--" . $line;
        $msg .= $line . "--".$boundary."--" . $line;
        
        return mail($to,$subject,$msg,$header);

    }
}
?>
