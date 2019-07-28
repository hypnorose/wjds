<?php
class Request{
	public $get,$controller,$action,$params;
	public function __construct(){
		$this->get = $_GET['url'];
	}

}