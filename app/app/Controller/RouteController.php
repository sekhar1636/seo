<?php namespace App\Controller;
	
class RouteController extends BaseController {

	function getCurrentUrl($strip = true, $endpoint = false) {
	    
	    /*Initialize*/
	    static $filter;
	    
	    /*Filter & Create the URL*/
	    if ($filter == null){
	        $filter = function($input) use($strip){
	            $input = str_ireplace(array(
	                "\0", '%00', "\x0a", '%0a', "\x1a", '%1a'), '', urldecode($input));
	            if ($strip){
	                $input = strip_tags($input);
	            }
	            $input = htmlspecialchars($input, ENT_QUOTES, 'utf-8'); 
	
	            return trim($input);
	        };
	    }
	    
	    /*Output the URL*/
	    if ($endpoint == null){
		    return 'http'. (($_SERVER['SERVER_PORT'] == '443') ? 's' : '')
		        .'://'. $_SERVER['SERVER_NAME'] . $filter($_SERVER['REQUEST_URI']);   
	    }else{
		    return $filter($_SERVER['REQUEST_URI']);    
	    }
	}

	function defineRoute($baseURL, $currentURL){
		
		/*Define the Endpoint*/
		$urlEndpoint = str_replace($baseURL,'',$currentURL);
		
		/*Grab whats BEFORE and AFTER the / */
		if(strpos($urlEndpoint, '/') !== false) { 
			$routeNamed = strstr($urlEndpoint, '/', true); 
			$params = $this->getStringAfter($urlEndpoint,'/');
		}elseif(strpos($urlEndpoint, '?') !== false) { 
			$routeNamed = strstr($urlEndpoint, '?', true); 
			$params = $this->getStringAfter($urlEndpoint,'?'); 	
		}else{
			$routeNamed = $urlEndpoint; 
			$params = ''; 
		}
		
		/*Build Parameter*/
		$routeParam = explode('/', $params);

		/*Define the Route + Params*/
		$route = [
			'full'  => $urlEndpoint,
			'name'  => $routeNamed,
			'param' => $routeParam
		];
		
		return $route;
	}
	
	function getStringAfter($string, $delimiter) {
		$pos = strpos($string, $delimiter);
		if ($pos === false){
			return $string;
		}else{
			return(substr($string, $pos+strlen($delimiter)));
		}
	}
}