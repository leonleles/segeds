<?php

class Core{

	public function run(){

		$url = '/';
		if(isset($_GET['url'])){
			$url .= $_GET['url'];
		}

		$url = $this->checkRoutes($url);

		$params = array();

		if(!empty($url) && $url != '/'){
			$url = explode('/', $url);
			array_shift($url);
			
			$currentController = $url[0].'Controller';
			array_shift($url);

			if(isset($url[0]) && !empty($url[0])){
				$currentAction = $url[0];
				array_shift($url);
			}else{
				$currentAction = 'index';
			}

			if($url > 0){
				$params = $url;
			}
		}else{
			$currentController = 'solicitacoesController';
			$currentAction = 'index';
		}

		if(!file_exists('controllers/'.$currentController.'.class.php') 
			|| !method_exists($currentController, $currentAction)){
			$currentController = 'notfoundController'; 
			$currentAction = 'index';
		}

		$c = new $currentController();

		call_user_func_array(array($c,$currentAction), $params);

	}

	public function checkRoutes($url){
		global $routes;

		foreach ($routes as $pt => $newurl) {
			
			// Indentifica os argumentos e substitui por regex(expressões regulares)
			$pattern = preg_replace('(\{[a-z0-9]{1,}\})', '([a-z0-9-]{1,})', $pt);
			
			// Faz o match da url
			if(preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1){
				array_shift($matches);
				array_shift($matches);

				// Pega todos os argumentos para associar
				$itens = array();
				if(preg_match_all('(\{[a-z0-9]{1,}\})', $pt, $m)){
					$itens = preg_replace('(\{|\})', '', $m[0]);
				}

				// Faz a associação
				$arg = array();
				foreach($matches as $key => $match){
					$arg[$itens[$key]] = $match;
				}
				
				// monta a nova url
				foreach ($arg as $key => $value) {
					$newurl = str_replace(':'.$key, $value, $newurl);
				}

				$url = $newurl;

				break;
			}
		}

		return $url;

	}

}