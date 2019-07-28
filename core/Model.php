<?php
/*
CONFIGURATION

define("HOST","localhost");
define("USER","root");
define("PASSWORD","");
define("DATABASE","wjds");
*/

define("HOST","localhost");
define("USER","30272166_db");
define("PASSWORD","paprotki6969");
define("DATABASE","30272166_db");
class Model{
	public function __construct(){

	}
	public function getDb(){
		 $db=new mysqli(HOST,USER,PASSWORD,DATABASE);
		 if($db->connect_errno)return false;
		 else return $db;
	}
	public function insertSingleData($data,$table){
		extract($data,EXTR_SKIP);
		if($db=$this->getDb()){
			$query="INSERT INTO $table (";
			$query2=" VALUES (";
			$key_array=array_keys($data);
			foreach($data as $k => $v){
				$data[$k]=$this->sanitizeData($db,$data[$k]);
				$data[$k]='"'.$data[$k].'"';
			}
			$query.=implode(", ",$key_array);
			$query2.=implode(", ",$data);
			$query.=") ";
			$query2.=");";
			$final_query=$query.$query2;
			if(DEV)echo $final_query;

			//$final_query=$this->sanitizeData($db,$final_query);
			
			if($res=$db->query("$final_query"))return 1;
			else {
				echo $db->connect_errno;
			};
		}
	}
	public function getSingleData($where,$table){
		
		if($db=$this->getDb()){
			if(DEV)echo $where;
			$query="SELECT * WHERE $where";
			if(DEV)echo $query;
			if($result=$db->query("SELECT * FROM $table WHERE $where")){
				if(DEV)echo "TEST";
				$row=$result->fetch_assoc();
				if($result->num_rows)
				return $row;
				else return 0;
			}
			else{
				if(DEV)echo "NO HALO";
					if(DEV)echo $db->connect_errno;
					return 0;
			}
		
		
		}
	}
	public function entryExists($where,$table){
	
		if($db=$this->getDb()){
				$where=$this->sanitizeData($db,$where);
			if($result=$db->query("SELECT * FROM $table WHERE $where"))
			return $result->num_rows;
			else return 0;
		}
	}
	public function sanitizeData($db,$data=[]){
		$data=mysqli_real_escape_string($db,$data);
		$data=htmlspecialchars($data);
		return $data;
	}
	
}
