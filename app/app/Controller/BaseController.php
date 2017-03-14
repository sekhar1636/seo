<?php namespace App\Controller;

class BaseController {
	
	public function __construct(){

	}
	
	function addScheme($url, $scheme = 'http://'){
	  return parse_url($url, PHP_URL_SCHEME) === null ?
	    $scheme . $url : $url;
	}	
}