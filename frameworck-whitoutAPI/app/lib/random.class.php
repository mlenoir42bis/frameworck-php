<?php

class Random {

  function Numeric($length)
        {
            $chars = "1234567890";
            $clen   = strlen( $chars )-1;
            $id  = '';

            for ($i = 0; $i < $length; $i++) {
                    $id .= $chars[mt_rand(0,$clen)];
            }
            return ($id);
        }

    function Alphabets($length)
        {
            $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
            $clen   = strlen( $chars )-1;
            $id  = '';

            for ($i = 0; $i < $length; $i++) {
                    $id .= $chars[mt_rand(0,$clen)];
            }
            return ($id);
        }

    function AlphaNumeric($length)
        {
            $chars = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
            $clen   = strlen( $chars )-1;
            $id  = '';

            for ($i = 0; $i < $length; $i++) {
                    $id .= $chars[mt_rand(0,$clen)];
            }
            return ($id);
        }

}
