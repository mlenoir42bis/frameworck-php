<?php

/**
 * Description of FormVerif
 *
 * @author marceau
 */
class Verificator {
    function checkString($tab){
        $string = false;
        foreach ($tab as $k => $v){
            if (is_string($v)){
                continue;
            }
            else{
                $string = true;
            }
        }
    return $string;
    }
    function checkNumeric($tab){
        $numeric = false;
        foreach ($tab as $k => $v){
            if (is_numeric($v)){
                continue;
            }
            else{
                $numeric = true;
            }
        }
    return $numeric;
    }
    function checkEmail($email) {
        $is_valid = false;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $is_valid = true;
        }
    return $is_valid;
    }
    function checkPost($post){
        $is_valid = false;
        foreach ($post as $k => $v) {
            if($v == null) {
                $is_valid = true;
            }
        }
    return $is_valid;
    }
    function checkElemArray($seekVal,$val){
        $found = false;
            if(preg_match('/'.$seekVal.'/', $val)) {
                $found = true;
            }
    return $found;
    }
}
