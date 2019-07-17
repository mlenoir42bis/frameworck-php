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

		function api($url, $request, $apiKey, $secretKey)
		{
			$sign = base64_encode(hash_hmac('sha256', $request, $apiKey . $secretKey , true));
			
			$ch = curl_init();
			$sign = curl_escape($ch, $sign);
			curl_setopt($ch, CURLOPT_URL, $url . $request . "?apiKey=" . $apiKey . "keys=" . $sign);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,"");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$json = curl_exec($ch);
			curl_close ($ch);
			
			$obj = json_decode($json);
			return $obj;
		}
}
