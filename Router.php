<?php
class Router{
	public $routes;
	public $params;
	public $wiek;
	public function __construct(){
		$this->routes=[];
	}
	// sprawdza czy $url matchuje sie z ktoryms z routów, jeśli tak, do Router.params wrzucane jest info na temat celu
	public function match($url){
		if(DEV)print_r($this->routes);
		foreach($this->routes as $route => $params){
			if(preg_match($route,$url,$matches)){
				// bierzemy grupy w <>
				foreach($matches as $key => $match){
					if(is_string($key)){
						$params[$key]=$match;
					}
				}

				$this->params=$params;
				return true;
			}

		}
		return false;
	}
	public function add($route,$params=[]){
		$route = preg_replace('/\//', '\\/', $route);

		// jeśli nie ma dwukropka w wyrażeniu, to zamieniamy{numer} na (?P<numer>[a-z-]+)
		// co pozwala nam na późniejsze przypisanie do indeksu ['numer'] rzeczy pod [a-z-]+
		// pozdrawiam
		$route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

		// zamieniamy {numer:\d+} na (?p<id>\d+)
		// żeby potem ładnie to matchwować i do $matches zgrywac
		// pozdro
		 $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
		 $route = '/^' . $route . '$/i';
		 $this->routes[$route]=$params;

	}
	
	public function getRoutes(){
		return $this->routes;
	}
	public function getParams(){
		return $this->params;
	}
}