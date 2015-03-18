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

class Layout {
        
        private $ci;
        
        // holds the css and js files
        private $includes;
        
        public function __construct() {
                
                $this->ci = &get_instance();
                
                $this->includes = array();
                
        }
        
        public function add_includes($type, $file, $options = NULL, $prepend_base_url = TRUE) {
                
                if($prepend_base_url) {
                        
                        $this->ci->load->helper('url');
                        $file = base_url() . $file;
                        
                }
                
                $this->includes[$type][] = array(
                        
                        'file' => $file,
                        'options' => $options
                        
                        
                );
                
                // allows chaining
                return $this;
                
        }
        
        public function view($name, $data = array(), $layout = 'default') {
                
                // get the contents of the view and store it
                $obj =& get_instance();
                //$obj->cache->save('data', $data, 3600);
                $view = $obj->parser->parse($name, $data, TRUE);
                
                // set the title
                $title = '';
                
                $obj->parser->parse('layouts/' . $layout, array(
                        
                        'includes_for_layout' => $this->includes,
                        'content_for_layout' => $view
                        
                ));
                
        }
        
}

/* End of file layout.php */
/* Location: ./application/libraries/layout.php */