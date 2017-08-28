<?php 
	$msg = $_GET['msg'];

	switch($msg) {
		case 'hello':
			// 读取json文件
			$jsonStr = file_get_contents('json/chatBot.json');
			// 把json转化成php数组
			$chatArr = json_decode($jsonStr);
			// 用array_rand(数组,获取数量)从数组中随机获取一个index值
			$randIndex = array_rand($chatArr, 1);
			// 返回值
			echo $chatArr[$randIndex];
			break;
		default:

			echo 'I am Robot.';
			break;

	}

	// echo 'hello, '.$msg;
 ?>