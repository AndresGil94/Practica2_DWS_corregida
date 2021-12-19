<?php

include_once("UseCaseHandlerChild.php");
include_once("UseCaseHandlerGift.php");
include_once("UseCaseHandlerKing.php");
include_once("child.php");
include_once("gift.php");
include_once("king.php");

if(isset($_POST['gift']) && isset($_POST['child'])) {
    
    UseCaseHandlerChild::addGiftToChild($_POST['gift'], $_POST['child']);
    
}

if(!isset($_POST['child'])) {

$form = "<form method='POST' action=''> " .
        "<select name='child'> ";
    foreach(UseCaseHandlerChild::readAll() as $value) {
        $form .= "<option value='" . $value->getId() . "'>".  $value->getName() . " " . $value->getSurname() . "</option>";
    }
    
$form .= "</select> " .
         "<input type='submit' value='SELECCIONAR'>" . 
          "</form>";
    
echo $form;

} else {
    
    
    echo UseCaseHandlerChild::readBy($_POST['child'])->getName();
    $table = "<table>";
    foreach(UseCaseHandlerGift::getGiftsByChildId($_POST['child']) as $value) {
        $table .= "<tr><td>".  $value->getName() . " | " . $value->getPrice() . " EUR." . "</td></tr>";
    }
    $table .= "</table>";
  
    echo $table;
    
    
    $form = "<form method='POST' action=''> " .
        "<select name='gift'> ";
    foreach(UseCaseHandlerGift::readAll() as $value) {
        $form .= "<option value='" . $value->getId() . "'>" .  $value->getName() . " " . $value->getPrice() . "</option>";
    }
    
    
    $childPost = $_POST['child'];
    
    $form .= "</select> </br> " .
             "<input type='hidden' value='$childPost' name='child'>" .
             "<input type='submit' value='ANADIR'>" .
             "</form>";
    
    echo $form;
    
   
    

}

