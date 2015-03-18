<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2013, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

defined('BASEPATH') OR exit('No direct script access allowed');

//Condition d'utilisation :
//Aficher une variable "{lavariable}
//Afficher une langue "{lang:laphrase}"
//Afficher une condition :
//"{if test == ""}
//condition oui
//{else}
//condition non
//{endif}
//Fonction base_url()
//{function:base_url}
//La suite : http://ellislab.com/codeigniter%20/user-guide/libraries/parser.html

class MY_Parser extends CI_Parser {

    public $l_delim = '{';
    public $l_delimIF = '{';
    
    private $ci;
    
    const LANG_REPLACE_REGEXP = '!\{lang:\s*(?<key>[^\}]+)\}!';
    
    public function __construct() {
        
        parent::__construct();
        $this->ci = &get_instance();
        
    }

    public function parse($template, $data, $return = FALSE) {
        
        $template = $this->ci->load->view($template, $data, TRUE);
        $template = $this->replace_lang_keys($template);
        $template = $this->parse_function($template);
        $template = $this->parse_session($template);

        return $this->_parse($template, $data, $return);
        
    }

    protected function replace_lang_keys($template) {
        
        return preg_replace_callback(self::LANG_REPLACE_REGEXP, array($this, 'replace_lang_key'), $template);
        
    }

    protected function replace_lang_key($key) {
        
        return $this->ci->lang->line($key[1]);
        
    }
    
    protected function parse_function($template) {
        
        $template = str_replace('{function:base_url}', $this->ci->config->item('base_url_perso') . "/", $template);
        $template = str_replace('{function:controller}', $this->ci->uri->segment(2).'/', $template);
        $template = str_replace('{function:title_for_layout}', $this->ci->title_for_layout, $template);
        $template = str_replace('{function:assets_images}', $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . "/assets/images/", $template);
        
        return $template;
        
    }
    
    protected function parse_session($template) {
        
        $template = str_replace('{session:login_in}', $this->ci->session->userdata('logged_in'), $template);
        $template = str_replace('{session:id}', $this->ci->session->userdata('account_id'), $template);
        $template = str_replace('{session:pseudo}', $this->ci->session->userdata('account_name'), $template);
        
        return $template;
        
    }
    
}