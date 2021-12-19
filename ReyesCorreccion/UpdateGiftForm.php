<?php

if(isset($_POST['modificar'])) {

  echo "<h1> Modificar regalo </h1>";
    
$form = "<form method='POST' action=''>" .
        "Nombre: <input type='text' name='nameUpdate'> </br> " . 
        "Precio: <input type='text' name='priceUpdate'> </br>" .
        "<input type='submit' value='REGISTER'>" .
        "<input type='hidden' name='idUpdate' value='" . $_POST['modificar'] . "'>  </br> " .
        "</form>";

echo $form;

}

if(isset($_POST['idUpdate']) && isset($_POST['nameUpdate']) && isset($_POST['priceUpdate'])) {
   
    $gift = new Gift($_POST['nameUpdate'], $_POST['priceUpdate']);
    UseCaseHandlerGift::update($_POST['idUpdate'], $gift);
}