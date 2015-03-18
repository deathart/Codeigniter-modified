<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    
    private $data;
    
    public function __construct() {
        
        parent::__construct();
        
        $this->output->enable_profiler(true);
        
        $this->title_for_layout = ('Welcome to CodeIgniter');
        
        $this->layout->add_includes('css', 'assets/css/style.css');
        $this->layout->add_includes('css', 'assets/css/debugbar.css');
        
        $this->layout->add_includes('js', 'assets/js/jquery.js');
        $this->layout->add_includes('js', 'assets/js/debugbar.js');
        
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->data['ci_version'] = 'CodeIgniter Version <strong>' . CI_VERSION . '</strong>';;
        $this->layout->view('pages/welcome_message', $this->data);
    }
}
