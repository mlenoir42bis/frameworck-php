<?php

function setBearer() {

	$data = array(
		'client_id' => 'Mk8znT1xbFTWghTx82vc2g==',
		'client_secret' => 'NTjH6WtvYaVmBCpx9+9VGj7hGoDFCpIIBehPBg7K604YQFzIPoxr+TbST+R2qI/GAgVzayfYoytNbv6EO61sfQ==',
		'grant_type' => 'client_credentials'
	);
  
	$postdata = http_build_query($data); 
	$ch = curl_init( 'https://devslot.assurbox.net/oauth/token' );
	curl_setopt( $ch, CURLOPT_POST, 1);
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $postdata);
	curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 0);
	curl_setopt( $ch, CURLOPT_HEADER, 0);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec( $ch );
	//print_r($response);

	$jsontoken=json_decode($response);
	if (isset($jsontoken->access_token)) {
		$bearertoken = $jsontoken->access_token;
		$_SESSION['ASSURBOX_BEARERTOKEN'] = $bearertoken;
	}
	else {
		$_SESSION['ASSURBOX_BEARERTOKEN'] = 'error';
	}
	curl_close($ch);
}

session_start();
setBearer();
echo $_SESSION['ASSURBOX_BEARERTOKEN'];

header("Location: /");
exit();