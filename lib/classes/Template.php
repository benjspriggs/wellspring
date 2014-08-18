<?php
class Template {
    private $name,
            $css = array(),
            $js = array(),
            $content,
            $desc;
    
    ##Title is the name of the web page, name is name of the file
    public function __construct($name, $css, $content = '', $desc = 'A page in Wellspring, a sheet music sharing website', $js = array()){
        $this->name = $name . " | Wellspring";
        $this->css = $css;
        $this->js = $js;
        $this->desc = $desc;
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
    
    public function getDesc(){
        return $this->desc;
    }
}

?>