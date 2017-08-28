<?php
session_start();
header('Content-Type:text/html;charset=gb2312');
include_once("conn/conn.php");
if (!empty($_GET['name']) && !is_null($_GET['name'])){				
	$num=$conne->getRowsNum("select * from reg_users where name='".$_GET['name']."' and password = '".$_GET['pwd']."'");
	if ($num>0){
		$upnum=$conne->uidRst("update reg_users set active = 1 where name='".$_GET['name']."' and password = '".$_GET['pwd']."'");
		if($upnum > 0){
			$_SESSION['name'] = $_GET['name'];
			echo "<script>alert('User has been activated!');window.location.href='main.php';</script>";
		}else{
			echo "<script>alert('You have been activated!');window.location.href='main.php';</script>";
		}
		
	}else{
		echo "<script>alert('Failed to activate!');window.location.href='register.php';</script>";
	}
}
?>