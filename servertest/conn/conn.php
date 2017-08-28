<?php
class opmysql{
	private $host = 'localhost';			//��������ַ
	private $name = 'sp1';					//��¼�˺�
	private $pwd = 'superpower1';					//��¼����
	private $dBase = 'users';			//���ݿ�����
	private $conn = '';						//���ݿ�������Դ
	private $result = '';					//�����
	private $msg = '';						//���ؽ��
	private $fields;						//�����ֶ�
	private $fieldsNum = 0;					//�����ֶ���
	private $rowsNum = 0;					//���ؽ����
	private $rowsRst = '';					//���ص�����¼���ֶ�����
	private $filesArray = array();			//�����ֶ�����
	private $rowsArray = array();			//���ؽ������
	//��ʼ����
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
	//�������ݿ�
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
	//��ѯ���
	function mysqli_query_rst($sql){
		if($this->conn == ''){
			$this->init_conn();
		}
        $this->result = $this->conn->query($sql);
		//$this->result = @mysqli_query($sql,$this->conn);
	}
	//ȡ���ֶ��� 
	function getFieldsNum($sql){
		$this->mysqli_query_rst($sql);
		$this->fieldsNum = @$this->result->columnCount();
	}
	//ȡ�ò�ѯ�����
	function getRowsNum($sql){
		$this->mysqli_query_rst($sql);
		if($this->result->errorCode() === 00000){
            return $this->result->rowCount();
			//return @mysqli_num_rows($this->result);
		}else{
			return '';
		}	
	}
	//ȡ�ü�¼���飨������¼��
	function getRowsRst($sql){
		$this->mysqli_query_rst($sql);
		if($this->result->errorCode() === 00000){
			$this->rowsRst = $this->result->fetch(PDO::FETCH_ASSOC);
			return $this->rowsRst;
		}else{
			return '';
		}
	}
	//ȡ�ü�¼���飨������¼��
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
	//���¡�ɾ������Ӽ�¼��
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
	//��ȡ��Ӧ���ֶ�ֵ
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
	
	//������Ϣ
	function msg_error(){
		if($this->result->errorCode() != 0) {
			$this->msg = $this->result->errorInfo();
		}
		return $this->msg;
	}
	//�ͷŽ����
	function close_rst(){
		//mysqli_free_result($this->result);
		$this->msg = '';
		$this->fieldsNum = 0;
		$this->rowsNum = 0;
		$this->filesArray = '';
		$this->rowsArray = '';
	}
	//�ر����ݿ�
	function close_conn(){
		$this->close_rst();
		//mysqli_close($this->conn);
		$this->conn = '';
	}
}
$conne = new opmysql();
?>