<?php

class Child {
    
    private $id;
    private $name;
    private $surname;
    private $date;
    private $isGood;
    
    function __construct($name, $surname, $date, $isGood) {
        $this->setName($name);
        $this->setSurname($surname);
        $this->setDate($date);
        $this->setIsGood($isGood);
        
    }
    
    static function constructId($id) {
        $instantiate = new self();
        $instantiate->setId($id);
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
    
    function getSurname() {
        
        return $this->surname;
    }
    
    function setSurname($surname) {
        $this->surname = $surname;
    }
    
    function getDate() {
        
        return $this->date;
    }
    
    function setDate($date) {
        $this->date = $date;
    }
    
    function getIsGood() {
        
        return $this->isGood;
    }
    
    function setIsGood($isGood) {
        $this->isGood = $isGood;
    }
    
}
