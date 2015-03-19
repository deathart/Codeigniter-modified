<?php

class AjaxRequest {
    
    public function __construct() {
        
        
    }
    
    public function UpdateSecuritykey($securitykey) {
        
        $template_path 	= '../template/config.php';
	$output_path 	= '../../application/config/config.php';
        
        $file = file_get_contents($template_path);
        
        $new = str_replace("%SECURITYKEY%",$securitykey,$file);
        
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
    
    public function UpdateDatabase ($host, $username = "", $password = "", $database = "") {
        
        $template_path 	= '../template/database.php';
        $output_path 	= '../../application/config/database.php';
        
        $file = file_get_contents($template_path);
        
        $new = str_replace("%HOSTNAME%",$host,$file);
        $new = str_replace("%USERNAME%",$username,$new);
        $new = str_replace("%PASSWORD%",$password,$new);
        $new = str_replace("%DATABASE%",$database,$new);
        
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

if(!empty($_POST['Host'])) {
    echo $AjaxRequest->UpdateDatabase($_POST['Host'], $_POST['username'], $_POST['password'], $_POST['database']);
}