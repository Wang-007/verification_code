<?php

	session_start();

	$table = array(
		'pic0' => '路飞',
		'pic1' => '小狗',
		'pic2' => '刺猬',
		'pic3' => '小猫',
	);

	$index = rand( 0, 3 );

	$value = $table['pic'.$index];
	$_SESSION['authcode'] = $value;

	$filename = dirname(__FILE__).'\\pic'.$index.'.jpg';
	$contents = file_get_contents($filename);

	header('content-type:image/jpg');
	echo $contents;
?>