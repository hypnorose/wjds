<?php
class View{
	public static function render($view,$args=[]){
		extract($args,EXTR_SKIP);
		$file=dirname(__dir__) . "/Views/$view";
		include $file;
	}
}