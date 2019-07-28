<?php
class Dispatcher{

	private $request;
	private $router;
	public function __construct(Router $router){
		$this->router=$router;
	}
	public function dispatch(){
		$this->request=new Request;
		if($this->router->match($this->request->get)){
			$controller = $this->router->params['controller'] . "Controller";
			include_once dirname(__dir__) . "Controllers/".$controller.".php";
			if(class_exists($controller)){
				if(DEV)print_r($this->router->params);
				$controller_obj = new $controller($this->router->params);
				$action = $this->router->params['action'];
				
				// nie boimy się że metody nie ma - od tego jest __call w Controllerze
				$controller_obj->$action();
				
			}
			else throw new \Exception("controller doesnt exist");
			

		}
		else throw new \Exception("nothing matched");


		//$controller=$this->loadController();
	//$controller = call_user_func_array(function, param_arr)
		if(DEV){
		var_dump($this->request); //debug
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
		var_dump($this->router->params); //debug
	}
	}
	public function loadController(){
		$name = $this->request->controller."Controller";
		$file = ROOT . 'Controllers/' . $name . ".php";
		require $file;

	}
}