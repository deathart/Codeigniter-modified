<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['debugbar_enabled']   = TRUE;

$config['debugbar_sections'] = array(
	
	//comment out these if you prefer to use the global CI profiler config file
	'benchmarks'      => TRUE, 
	'config'          => TRUE,
	'get'             => TRUE,
	'controller_info' => TRUE,
	'http_headers'    => TRUE,
	'memory_usage'    => TRUE,
	'post'            => TRUE,
	'queries'         => TRUE,
	'uri_string'      => TRUE,
	
	
	//custom sections added by debugbar
	'files'           => TRUE,
	'console'         => TRUE,
	'userdata'        => TRUE
);

