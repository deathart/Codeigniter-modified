<?php

class AjaxRequest {
    
    public function __construct() {
        
        
    }
    
    public function UpdateSecuritykey($securitykey) {
        
        $template_path 	= '../template/config.php';
	$output_path 	= '../../application/config/config.php';
        
        $config_file = file_get_contents($template_path);
        
        $new  = str_replace("%SECURITYKEY%",$securitykey,$config_file);
        
        $handle = fopen($output_path,'w+');
        
        @chmod($output_path,0777);

        // Verify file permissions
        if(is_writable($output_path)) {

            // Write the file
            if(fwrite($handle,$new)) {
                return 1;
            } else {
                return 0;
            }

        } else {
            return 0;
        }
        
    }
    
}

$AjaxRequest = new AjaxRequest();

if(!empty($_POST['securitykey'])) {
    echo $AjaxRequest->UpdateSecuritykey($_POST['securitykey']);
}