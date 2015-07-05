<?php

class core {
    
    protected $fp;
    
    protected $retour;
    
    protected $progressbarpourcent;
    
    protected $progressbarcolor;
    
    protected $pages;
    
    protected $lang;


    public function __construct() {
        
        global $lang;
        
        $this->lang = $lang;
        
    }
    
    public function breadcrumbs ($page) {
        
        $this->retour = ('<ol class="breadcrumb"><li><a href="Home">'.$this->lang['home'].'</a></li>');
        
        if ($page === "Require") {
            $this->progressbarcolor = "danger";
            $this->progressbarpourcent = 10;
            $this->pages = $this->lang['require'];
        }
        if ($page === "File") {
            $this->progressbarcolor = "warning";
            $this->progressbarpourcent = 20;
            $this->retour .= ('<li><a href="Require">'.$this->lang['require'].'</a></li>');
            $this->pages = $this->lang['file'];
        }
        if ($page === "Configuration") {
            $this->progressbarcolor = "warning";
            $this->progressbarpourcent = 40;
            $this->retour .= ('<li><a href="Require">'.$this->lang['require'].'</a></li>');
            $this->retour .= ('<li><a href="File">'.$this->lang['file'].'</a></li>');
            $this->pages = $this->lang['config'];
        }
        if ($page === "Database") {
            $this->progressbarcolor = "warning";
            $this->progressbarpourcent = 70;
            $this->retour .= ('<li><a href="Require">'.$this->lang['require'].'</a></li>');
            $this->retour .= ('<li><a href="File">'.$this->lang['file'].'</a></li>');
            $this->retour .= ('<li><a href="Configuration">'.$this->lang['config'].'</a></li>');
            $this->pages = $this->lang['database'];
        }
        if ($page === "Module") {
            $this->progressbarcolor = "warning";
            $this->progressbarpourcent = 70;
            $this->retour .= ('<li><a href="Require">'.$this->lang['require'].'</a></li>');
            $this->retour .= ('<li><a href="File">'.$this->lang['file'].'</a></li>');
            $this->retour .= ('<li><a href="Configuration">'.$this->lang['config'].'</a></li>');
            $this->retour .= ('<li><a href="Database">'.$this->lang['database'].'</a></li>');
            $this->pages = $this->lang['module'];
        }
        if ($page === "Finish") {
            $this->progressbarcolor = "success";
            $this->progressbarpourcent = 100;
            $this->retour .= ('<li><a href="Require">'.$this->lang['require'].'</a></li>');
            $this->retour .= ('<li><a href="File">'.$this->lang['file'].'</a></li>');
            $this->retour .= ('<li><a href="Configuration">'.$this->lang['config'].'</a></li>');
            $this->retour .= ('<li><a href="Database">'.$this->lang['database'].'</a></li>');
            $this->retour .= ('<li><a href="Module">'.$this->lang['module'].'</a></li>');
            $this->pages = $this->lang['finish'];
        }
        
        
        $this->retour .= ('<li class="active">'.$this->pages.'</li>');
        $this->retour .= ('</ol>');
        
        $this->retour .= ('<div class="progress"><div class="progress-bar progress-bar-'.$this->progressbarcolor.' progress-bar-striped" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: '.$this->progressbarpourcent.'%;">'.$this->progressbarpourcent.'%</div></div>');
        
        return $this->retour;
        
    }
    
    public function finich () {
        
        $this->fp = fopen("../install.lock","w+");
        
    }
    
}

$core = new core();