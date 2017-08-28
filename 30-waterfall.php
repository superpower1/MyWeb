<?php 
	$jsonStr = file_get_contents('json/30-waterfall.json');
	$phpArr = json_decode($jsonStr);

	$newArr = array();

	// 生成10个随机index的数组
	$randKeyArr = array_rand($phpArr, 10);
	//count($randKeyArr)返回数组长度
	for ($i=0; $i < count($randKeyArr); $i++) { 
		$key = $randKeyArr[$i];

		$obj = $phpArr[$key];
		array_push($newArr,$obj);
	}

	echo json_encode($newArr);


	// print_r($randKeys);
 ?>