<?php
class opmysql{
	private $host = 'localhost';			//服务器地址
	private $name = 'sp1';					//登录账号
	private $pwd = 'superpower1';					//登录密码
	private $dBase = 'users';			//数据库名称
	private $conn = '';						//数据库链接资源
	private $result = '';					//结果集
	private $msg = '';						//返回结果
	private $fields;						//返回字段
	private $fieldsNum = 0;					//返回字段数
	private $rowsNum = 0;					//返回结果数
	private $rowsRst = '';					//返回单条记录的字段数组
	private $filesArray = array();			//返回字段数组
	private $rowsArray = array();			//返回结果数组
	//初始化类
	function __construct($host='',$name='',$pwd='',$dBase=''){
		if($host != '')
			$this->host = $host;
		if($name != '')
			$this->name = $name;
		if($pwd != '')
			$this->pwd = $pwd;
		if($dBase != '')
			$this->dBase = $dBase;
		$this->init_conn();
	}
	//链接数据库
	function init_conn(){
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dBase", "$this->name", "$this->pwd");
        }catch(PDOException $exception){
        echo "Connection error message: ".$exception->getMessage();
        }
	//	$this->conn=@mysqli_connect($this->host,$this->name,$this->pwd);
	//	@mysqli_select_db($this->dBase,$this->conn);
	//	mysqli_query("set names gb2312");
	}
	//查询结果
	function mysqli_query_rst($sql){
		if($this->conn == ''){
			$this->init_conn();
		}
        $this->result = $this->conn->query($sql);
		//$this->result = @mysqli_query($sql,$this->conn);
	}
	//取得字段数 
	function getFieldsNum($sql){
		$this->mysqli_query_rst($sql);
		$this->fieldsNum = @$this->result->columnCount();
	}
	//取得查询结果数
	function getRowsNum($sql){
		$this->mysqli_query_rst($sql);
		if($this->result->errorCode() === 00000){
            return $this->result->rowCount();
			//return @mysqli_num_rows($this->result);
		}else{
			return '';
		}	
	}
	//取得记录数组（单条记录）
	function getRowsRst($sql){
		$this->mysqli_query_rst($sql);
		if($this->result->errorCode() === 00000){
			$this->rowsRst = $this->result->fetch(PDO::FETCH_ASSOC);
			return $this->rowsRst;
		}else{
			return '';
		}
	}
	//取得记录数组（多条记录）
	function getRowsArray($sql){
		$this->mysqli_query_rst($sql);
		if($this->result->errorCode() === 00000){
			while($row = $this->result->fetch(PDO::FETCH_ASSOC)) {
				$this->rowsArray[] = $row;
			}
			return $this->rowsArray;
		}else{
			return '';
		}
	}
	//更新、删除、添加记录数
	function uidRst($sql){
		if($this->conn == ''){
			$this->init_conn();
		}
        $result = $this->conn->prepare($sql);
        $result->execute();    
		//@mysqli_query($sql);
		//$this->rowsNum = $this->conn->query($sql)->rowCount();
		if($result->execute() == TRUE){
			return $this->rowsNum = $result->rowCount();
		}else{
			return '';
		}
	}
	//获取对应的字段值
	function getFields($sql,$fields){
		$this->mysqli_query_rst($sql);
		if($this->result->errorCode() === 00000){
			if($this->result->rowCount() > 0){
				$tmpfld = $this->result->fetch(PDO::FETCH_NUM);
				$this->fields = $tmpfld[$fields];
				
			}
			return $this->fields;
		}else{
			return '';
		}
	}
	
	//错误信息
	function msg_error(){
		if($this->result->errorCode() != 0) {
			$this->msg = $this->result->errorInfo();
		}
		return $this->msg;
	}
	//释放结果集
	function close_rst(){
		//mysqli_free_result($this->result);
		$this->msg = '';
		$this->fieldsNum = 0;
		$this->rowsNum = 0;
		$this->filesArray = '';
		$this->rowsArray = '';
	}
	//关闭数据库
	function close_conn(){
		$this->close_rst();
		//mysqli_close($this->conn);
		$this->conn = '';
	}
}
$conne = new opmysql();
?>