<?php

class Security {
		function bdd($string)
		{

			$con=mysqli_connect("db702248208.db.1and1.com","dbo702248208","Puv78pl18*","db702248208");
			if(ctype_digit($string)) {
				$string = intval($string);
			}
			else {
				$string = mysqli_real_escape_string($con, $string);
				$string = addcslashes($string, '%_');
			}
      		mysqli_close($con);
			return $string;
		}
		function html($string)
		{
			return html_entity_decode(stripslashes($string));
		}
		public function postMaxSize()
		{
		  if (isset($_SERVER['CONTENT_LENGTH']) && $_SERVER['CONTENT_LENGTH'] > ((int) ini_get('post_max_size') * 1024 * 1024)) {
			return true;
		  }
		  return false;
		}
}
