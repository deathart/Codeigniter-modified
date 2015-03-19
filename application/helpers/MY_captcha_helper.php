<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function create_captcha($n) {
    
    $ci =& get_instance();
    
    $lettres = array_merge(range('A','Z'),range('0','9'));

    $nl = count($lettres)-1;

    $mot = '';

    for($i = 0; $i < $n; ++$i) {

        $mot .= $lettres[mt_rand(0,$nl)];
        
    }
    $ci->session->set_userdata(array('captcha_code'  => $mot));
    
    return '<span style="background:white; padding:2px;border: 1px solid black"><strong>'.$ci->session->userdata('captcha_code').'</strong></span>';
    
}