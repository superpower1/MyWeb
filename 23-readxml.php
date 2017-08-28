<?php 
	// 需要修改header告诉浏览器返回的是xml文件
	header('content-type:text/xml; charset=utf-8');

	echo file_get_contents('xml/myXml.xml');
 ?>