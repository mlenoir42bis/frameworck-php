<?php

class Security {
		function bdd($string)
		{
      $con=mysql_connect("localhost","root","root4","bdd_e");
			if(ctype_digit($string)) {
				$string = intval($string);
			}
			else {
				$string = mysql_real_escape_string($string);
				$string = addcslashes($string, '%_');
			}
      mysql_close($con);
			return $string;
		}
		function html($string)
		{
			return html_entity_decode(stripslashes($string));
		}
}
