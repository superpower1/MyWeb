<?php 
	$name = $_POST['name'];

	$nameArr = array(
		'flower' => array('pic' => 'img/logo_1.jpg', 'info' => 'flower'),
		'cat' => array('pic' => 'img/logo_2.jpg', 'info' => 'cat'),
		'sleep' => array('pic' => 'img/logo_3.jpg', 'info' => 'sleep')

		);

	$path = $nameArr[$name]['pic'];
	$info = $nameArr[$name]['info'];

	echo $path.'|'.$info;

 ?>