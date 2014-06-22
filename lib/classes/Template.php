<?php
class Template {
    private $name,
            $css = array(),
            $js = array(),
            $content;
    
    ##Title is the name of the web page, name is name of the file
    public function __construct($name, $css, $content = '', $js = array()){
        $this->name = $name . " | DiGITIZE";
        $this->css = $css;
        $this->js = $js;
        $this->content = $content;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function getCss(){
        return $this->css;
    }
    
    public function getContent(){
        return $this->content;
    }
    
    public function getJs(){
        return $this->js;
    }
}

?>