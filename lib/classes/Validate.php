<?php
class Validate {
    protected $STH;
    private $_passed = false,
            $_errors = array();
            
    public function __construct(StatementHandler $STH){
        $this->STH = $STH;
    }
    
    public function getHandler(){
        return $this->STH;
    }
    
    public function check($source, $items = array()){
        $STH = $this->getHandler();
        foreach($items as $item => $rules){
            foreach($rules as $rule => $rule_value){
                $value = trim($source[$item]);
                $item = escape($item);
                if($rule === 'required' && empty($value)){
                    $this->addError("{$item} is required");
                } elseif(!empty($value)){
                    switch($rule){
                        case 'min':
                            if(strlen($value) < $rule_value){
                                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                            }
                            break;
                        case 'max':
                            if(strlen($value) > $rule_value){
                                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
                            }
                            break;
                        case 'matches':
                            if($value != $source[$rule_value]){
                                $this->addError("{$rule_value} must match {$item}.");
                            }
                            break;
                        case 'unique':
                            $check = $this->STH->get($rule_value, '*', array($item => $value), array($item, "=", ":$item"));
                            if($check->lastCount() > 0){
                                $this->addError("{$item} already exists.");
                            }
                            break;
                        case 'exists':
                            $check = $this->STH->get($rule_value, '*', array($item => $value), array($item, "=", ":$item"));
                            if($check->lastCount() == 0){
                                $this->addError("{$item} does not exist.");
                            }
                            break;
                        case 'is_email':
                            if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                                $this->addError("The e-mail provided was not vaild.");
                            }
                            break;
                    }
                }
            }
        }
        
        if(empty($this->_errors)){
            $this->_passed = TRUE;
        }
        
        return $this;
    }
    
    private function addError($error){
        $this->_errors[] = $error;
    }
    
    public function errors(){
        foreach($this->_errors as $error){
            echo ucfirst($error) ."<br>";
        }
    }
    
    public function passed(){
        return $this->_passed;
    }
}
?>