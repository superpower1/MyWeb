<?php
	include_once 'conn/conn.php';
	$reback = '0';
	$sql = "insert into reg_users(name,password,question,answer,email,realname,birthday,telephone,active) values('".trim($_GET['name'])."','".md5(trim($_GET['pwd']))."','".$_GET['question']."','".$_GET['answer']."','".$_GET['email']."','".$_GET['realname']."','".$_GET['birthday']."','".$_GET['telephone']."','1')";
		$num = $conne->uidRst($sql);
		if($num == 1){
			$reback = '1';
		}
	echo $reback;
?>