<?php 
	// php中预定义了$_GET，是一个关系型数组，用来获取表单提交的数据，取得的值是表单标签中name的值
	// $_GET是通过url提交数据，所以数据都是公开的
	// echo $_GET['username'];
	// $_POST提交的数据不显示在url比$_GET安全
	// echo $_POST['username'];
	// echo ', welcome!<br>';
	
	// 模拟用户数据
	$personArr = array(
			'json' => array('id' => '1', 'gender' => 'male'),
			'rose' => array('id' => '2', 'gender' => 'female'),
			'ben' => array('id' => '3', 'gender' => 'male')
		);


	$name = $_POST['username'];
	echo $name.', welcome!<br>';
	echo 'Id: '.$personArr[$name]['id'].'<br>';
	echo 'Gender: '.$personArr[$name]['gender'].'<br>';
	// print_r($personArr);

	// 让php代码延迟执行，单位是秒
	// sleep(1);

	// 上传的文件时关系型数组
	$fileArr = $_FILES['photo'];
	// 上传文件原本的名字
	$fileName = $fileArr['name'];
	// 获取服务器保存路径
	$filePath = $fileArr['tmp_name'];
	// 如果不移动上传的文件则文件会立刻被删除
	// 通过move_uploaded_file(要转移的文件,服务器的相对路径)转移要保存的文件
	move_uploaded_file($filePath, 'img/'.$fileName);
 ?>