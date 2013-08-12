<?php

class Router {

	public $page;
	public $query_string;
	public $routine;

	function parseRoute() {
		//set default page to home
		$this->page = 'home';

		$uri = $_SERVER['REQUEST_URI'];
		if(strpos($uri, $_SERVER['SCRIPT_NAME']) === 0) {
			$uri = substr($uri, strlen($_SERVER['SCRIPT_NAME']));
		}elseif(strpos($uri, dirname($_SERVER['SCRIPT_NAME'])) === 0) {
			$uri = substr($uri, strlen(dirname($_SERVER['SCRIPT_NAME'])));
		}

		// fix for xnix machines
		if(strncmp($uri, '?/', 2) === 0) {
			$uri = substr($uri, 2);
		}

		$segments = preg_split('#\?#i', $uri, 2);
		$rte = $segments[0];
		if(isset($segments[1])) {
			parse_str($_SERVER['QUERY_STRING'], $this->query_string);
		}
		$_SERVER['QUERY_STRING'] = '';
		$_GET = array();

		if($rte == '/' || empty($rte)) {
			$this->page = 'home';
			return;
		}

		$path = parse_url($rte, PHP_URL_PATH);

		$path = str_replace(array('//', '../'), '/', trim($path, '/'));
		$rte_segments = explode('/', $path);
		if(count($rte_segments != 1) && $rte_segments[0] == 'data') {
			$this->page = 'data';
			$routine = $rte_segments[1];
			if(!file_exists(ROOTDIR . 'models/' . $routine . '.php')) {
				$this->page = 'home';
			}else {
				$this->routine = $routine;
			}
			return;
		}else {
			$page = $rte_segments[0];
		}

		if(!file_exists(ROOTDIR . 'views/' . $page . '.php')) {
			$this->page = 'home';
		}else {
			$this->page = $page;
		}
	}

}
// End of class Router
/* End of file router.php */