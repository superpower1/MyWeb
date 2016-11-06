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
		$this->conn=@mysqli_connect($this->host,$this->name,$this->pwd);
		@mysqli_select_db($this->dBase,$this->conn);
		mysqli_query("set names gb2312");
	}
	//��ѯ���
	function mysqli_query_rst($sql){
		if($this->conn == ''){
			$this->init_conn();
		}
		$this->result = @mysqli_query($sql,$this->conn);
	}
	//ȡ���ֶ��� 
	function getFieldsNum($sql){
		$this->mysqli_query_rst($sql);
		$this->fieldsNum = @mysqli_num_fields($this->result);
	}
	//ȡ�ò�ѯ�����
	function getRowsNum($sql){
		$this->mysqli_query_rst($sql);
		if(mysqli_connect_errno() == 0){
			return @mysqli_num_rows($this->result);
		}else{
			return '';
		}	
	}
	//ȡ�ü�¼���飨������¼��
	function getRowsRst($sql){
		$this->mysqli_query_rst($sql);
		if(mysqli_connect_errno() == 0){
			$this->rowsRst = mysqli_fetch_array($this->result,MYSQL_ASSOC);
			return $this->rowsRst;
		}else{
			return '';
		}
	}
	//ȡ�ü�¼���飨������¼��
	function getRowsArray($sql){
		$this->mysqli_query_rst($sql);
		if(mysqli_connect_errno() == 0){
			while($row = mysqli_fetch_array($this->result,MYSQL_ASSOC)) {
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
		@mysqli_query($sql);
		$this->rowsNum = @mysqli_affected_rows();
		if(mysqli_connect_errno() == 0){
			return $this->rowsNum;
		}else{
			return '';
		}
	}
	//��ȡ��Ӧ���ֶ�ֵ
	function getFields($sql,$fields){
		$this->mysqli_query_rst($sql);
		if(mysqli_connect_errno() == 0){
			if(mysqli_num_rows($this->result) > 0){
				$tmpfld = @mysqli_fetch_row($this->result);
				$this->fields = $tmpfld[$fields];
				
			}
			return $this->fields;
		}else{
			return '';
		}
	}
	
	//������Ϣ
	function msg_error(){
		if(mysqli_connect_errno() != 0) {
			$this->msg = mysqli_connect_error();
		}
		return $this->msg;
	}
	//�ͷŽ����
	function close_rst(){
		mysqli_free_result($this->result);
		$this->msg = '';
		$this->fieldsNum = 0;
		$this->rowsNum = 0;
		$this->filesArray = '';
		$this->rowsArray = '';
	}
	//�ر����ݿ�
	function close_conn(){
		$this->close_rst();
		mysqli_close($this->conn);
		$this->conn = '';
	}
}
$conne = new opmysql();
?>