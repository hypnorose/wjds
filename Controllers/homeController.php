<?php
class homeController extends Controller{
	private $model;
	//START OF ACTIONS
	
	public function showAction(){
		View::render("homeView.php");
	}
	public function addAction(){
		
		if(!isset($_POST['link'])){
			Controller::redirect("https://www.facebook.com/");
		}	
		$link=$_POST['link'];
		if($link==""||strlen($link)>200){
			Controller::redirect("/");
		}
		$data=[];
		$data['hash']="http://wjds.pl/".$this->model->insertLink($link);
		

		View::render("homeView.php",$data);
	}
	public function forwardAction(){
		
		extract($this->route_params,EXTR_SKIP);
		
		if($forward=$this->model->getLink($link)){
			Controller::redirect($forward);
		}
			else {
			Controller::redirect("/");
		}
	}
 	//END OF ACTIONS
 	public function before(){
 	
 		require "Models/homeModel.php";
		$this->model=new homeModel();
 	}
}