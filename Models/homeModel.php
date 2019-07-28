<?php 
class homeModel extends Model{
	
	public function __construct(){

	}
	public function insertLink($link){
		$n=30;
		while($n--){
			$hash=$this->hashLink();
			if(!$this->hashExists($hash)){
				$data=[];
				$data['original']=$link;
				$data['replaced']=$hash;
				$this->insertSingleData($data,"links");
				return $data['replaced'];
			}
		}
	}
	public function getLink($hash){
		if($row=$this->getSingleData("replaced = '$hash'","links")){
			if(DEV)echo $row['original'];
			return $row['original'];

		}
		else return 0;
	}
	public function hashLink(){
		$len=7;
		$word=range('a','z');
		shuffle($word);
		if(DEV){echo substr(implode($word),0,$len);
		if(DEV)echo "<br/>";}
		return substr(implode($word),0,$len);
	}
	public function hashExists($word){

		return $this->entryExists("replaced = '$word'","links");
	}

}
