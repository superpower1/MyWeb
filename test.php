<?php

	// header
	$num = 1;
	echo "Hello, this is a snippet.$num";
	echo "<br>";
	echo "Hello, this is a snippet.".$num;
	echo "<br>";
	echo 'Hello, this is a snippet.$num';

	// 普通数组
	$array1 = array('1','2','3');
	echo $array1[2];
	//关系型数组
	$array2 = array('name' => 'sp1', 'pwd' => '密码');
	echo $array2['pwd'];

	
?>