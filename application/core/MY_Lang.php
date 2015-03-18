<?php 
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Open Software License version 3.0
 *
 * This source file is subject to the Open Software License (OSL 3.0) that is
 * bundled with this package in the files license.txt / license.rst.  It is
 * also available through the world wide web at this URL:
 * http://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2013, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');
 
class MY_Lang extends CI_Lang {


    /**************************************************
     configuration
    ***************************************************/
 
    // languages
    private $languages = array(
        'fr' => 'french',
        'en' => 'english'
    );
 
    // special URIs (not localized)
    private $special = array ('');
  
    // where to redirect if no language in URI
    private $uri;
    private $default_uri;
    private $lang_code;

    /**************************************************/


    public function MY_Lang()
    {
        parent::__construct();

        global $CFG;
        global $URI;
        global $RTR;

        $this->uri = $URI->uri_string();
        $this->default_uri = $RTR->default_controller;

        $uri_segment = $this->get_uri_lang($this->uri);
        $this->lang_code = $uri_segment['lang'] ;

        $url_ok = false;
        if ((!empty($this->lang_code)) && (array_key_exists($this->lang_code, $this->languages)))
        {
            $language = $this->languages[$this->lang_code];
            $CFG->set_item('language', $language);
            $url_ok = true;
        }

        if ((!$url_ok) && (!$this->is_special($uri_segment['parts'][0]))) // special URI -> no redirect
        { 
            // set default language
            $CFG->set_item('language', $this->languages[$this->default_lang()]);

            $uri = (!empty($this->uri)) ? $this->uri: $this->default_uri;
            //OPB - modification to use i18n also without changing the .htaccess (without pretty url) 
            $index_url = empty($CFG->config['index_page']) ? '' : $CFG->config['index_page']."/";
            $new_url = $CFG->config['base_url'].$index_url.$this->default_lang().'/'.$uri;

            header("Location: " . $new_url, TRUE, 302);
            exit;
        }
    }
    
    // get current language
    // ex: return 'en' if language in CI config is 'english' 
    public function lang()
    {
        global $CFG;        
        $language = $CFG->item('language');

        $lang = array_search($language, $this->languages);
        if ($lang)
        {
            return $lang;
        }

        return NULL;    // this should not happen
    }
    
    public function is_special($lang_code)
    {
        if ((!empty($lang_code)) && (in_array($lang_code, $this->special)))
          return TRUE;
        else
          return FALSE;
    }
 
   
    public function switch_uri($lang)
    {
        if ((!empty($this->uri)) && (array_key_exists($lang, $this->languages)))
        {
            if ($uri_segment = $this->get_uri_lang($this->uri))
            {
                $uri_segment['parts'][0] = $lang;
                $uri = implode('/',$uri_segment['parts']);
            }
            else
            {
                $uri = $lang.'/'.$this->uri;
            }
        }

        return $uri;
    }
    
    //check if the language exists
    //when true returns an array with lang abbreviation + rest
    public function get_uri_lang($uri = '')
    {
        if (!empty($uri))
        {
            $uri = ($uri[0] == '/') ? substr($uri, 1): $uri;

            $uri_expl = explode('/', $uri, 2);
            $uri_segment['lang'] = NULL;
            $uri_segment['parts'] = $uri_expl;  

            if (array_key_exists($uri_expl[0], $this->languages))
            {
                $uri_segment['lang'] = $uri_expl[0];
            }
            return $uri_segment;
        }
        else {
            return FALSE;
        }
    }

    
    // default language: first element of $this->languages
    public function default_lang()
    {
        $browser_lang = !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',') : '';
        $browser_lang = substr($browser_lang, 0, 2);
        if(array_key_exists($browser_lang, $this->languages)){
            return $browser_lang;
        }
        else{
            reset($this->languages);
            return key($this->languages);
        }
    }
    
    
    // add language segment to $uri (if appropriate)
    public function localized($uri)
    {
        if (!empty($uri))
        {
          $uri_segment = $this->get_uri_lang($uri);
          if (!$uri_segment['lang'])
          {

            if ((!$this->is_special($uri_segment['parts'][0])) && (!preg_match('/(.+)\.[a-zA-Z0-9]{2,4}$/', $uri)))
            {
              $uri = $this->lang() . '/' . $uri;
            }
          }
        }
        return $uri;
    }


    /**
     * Same behavior as the parent method, but it can load the first defined 
     * lang configuration to fill other languages gaps. This is very useful
     * because you don't have to update all your lang files during development
     * each time you update a text. If a constant is missing it will load
     * it in the first language configured in the array $languages. (OPB)
     * 
     * 
     * @param boolean $load_first_lang false to keep the old behavior. Please
     * modify the default value to true to use this feature without having to 
     * modify your code 
     */
    public function load($langfile = '', $idiom = '', $return = FALSE, $add_suffix = FALSE, $alt_path = '', $load_first_lang = false) {
        if ($load_first_lang) {
            reset($this->languages);
            $firstKey = key($this->languages);
            $firstValue = $this->languages[$firstKey];

            if ($this->lang_code != $firstKey) {
                $addedLang = parent::load($langfile, $firstValue, $return, $add_suffix, $alt_path);
                if ($addedLang === TRUE) {
                    if ($add_suffix === TRUE) {
                        $langfileToRemove = str_replace('.lang', '', $langfile);
                        $langfileToRemove = str_replace('_lang.', '', $langfileToRemove) . '_lang';
                        $langfileToRemove .= '.lang';
                    }
                    $this->is_loaded = array_diff($this->is_loaded, array($langfileToRemove));
                }
            }
        }
        return parent::load($langfile, $idiom, $return, $add_suffix, $alt_path);
    }

} 
