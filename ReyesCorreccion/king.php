<?php


class King {
    
    private $id;
    private $name;
    
    function __construct($name) {
        $this->setName($name);   
    }
    
    function getId() {
        
        return $this->id;
    }
    
    
    function setId($id) {
        
        $this->id = $id;
    }
    
    function getName() {
        
        return $this->name;
    }
    
    function setName($name) {
        $this->name = $name;
    }
  
    
}
