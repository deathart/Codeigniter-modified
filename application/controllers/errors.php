<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

    public function __construct() {
        
        parent::__construct();
        
        $this->output->enable_profiler(true);
        
        $this->lang->load('errors');
        
        $this->layout->add_includes('css', 'assets/css/style.css');
        $this->layout->add_includes('css', 'assets/css/debugbar.css');
        
        $this->layout->add_includes('js', 'assets/js/jquery.js');
        $this->layout->add_includes('js', 'assets/js/debugbar.js');
        
        return TRUE;
        
    }
    
    public function index() {
        
        return redirect('Errors/error_404');
        
    }
	
    public function error_404() {
        
        $this->title_for_layout = lang('Title_Page_Error_404');
        
        return $this->layout->view('errors/html/error_404');
        
    }
    
    public function Code ($id) {
        
        return redirect('Errors/404');
               
    }
}