<?php 
	$nameArr = array('joker','batman','spiderman','antman');

	if (in_array($_GET['name'], $nameArr)) {
		echo '该用户名已被占用';
	}
	else {
		echo '该用户名可以使用';
	}
	

 ?>