<?php

	session_start();


	$image = imagecreatetruecolor( 100, 30 );
	$white = imagecolorallocate( $image, 255, 255, 255);
	imagefill( $image, 0, 0, $white );//填充底色

	/*
	for( $i = 0; $i < 4; $i++ ){
		$fontsize    = 6;
		$fontcolor   = imagecolorallocate( $image, mt_rand( 0,120 ), mt_rand( 0,120 ), mt_rand( 0,120 ) );
		$fontcontent = mt_rand( 0,9 );
		$x = mt_rand( 5, 10 )+$i * 100 / 4;
		$y = mt_rand( 5, 10 );
		imagestring( $image, $fontsize, $x, $y, $fontcontent, $fontcolor );
	}
	*/

	$captcha_code = '';
	for( $i = 0; $i < 4; $i++){
		$fontsize = 6;
		$fontcolor   = imagecolorallocate( $image, mt_rand( 0,120 ), mt_rand( 0, 120 ), mt_rand( 0, 120 ) );
		$date = 'abcdefghijklmnopqrstuvwxyz0123456789';
		$fontcontent = substr( $date, mt_rand( 0, strlen($date) - 1 ), 1 );
		$captcha_code .= $fontcontent;

		$x = mt_rand( 5, 10 ) + $i * 100 / 4;
		$y = mt_rand( 5, 10 );

		imagestring( $image, $fontsize, $x, $y, $fontcontent, $fontcolor );
	}
	$_SESSION['authcode'] = $captcha_code;


	for( $i = 0; $i < 200; $i++ ){
		$x = mt_rand( 1, 99 );
		$y = mt_rand( 1, 29 );
		$pointcolor = imagecolorallocate( $image, mt_rand(50, 200 ), mt_rand( 50, 200 ), mt_rand( 50, 200 ));
		imagesetpixel( $image, $x, $y, $pointcolor );
	}

	for( $i = 0; $i < 3; $i++ ){
		$x1 = mt_rand( 1, 99 );
		$y1 = mt_rand( 1, 29 );
		$x2 = mt_rand( 1, 99 );
		$y2 = mt_rand( 1, 29 );
		$linecolor = imagecolorallocate( $image, mt_rand( 80 ,220 ), mt_rand( 80, 220 ), mt_rand( 80, 220 ));
		imageline( $image, $x1, $y1, $x2, $y2, $linecolor );
	}
	
	header( "content-type: image/png" );
	imagepng( $image );

	imagedestroy( $image );

?>