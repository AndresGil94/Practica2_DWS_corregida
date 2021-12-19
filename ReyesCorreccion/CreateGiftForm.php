<?php

echo "<h1> Anadir regalo </h1>";

$form = "<form method='POST' action=''></br>" . 
        "Nombre: <input type='text' name='name'> </br> " . 
        "Precio: <input type='text' name='price'> </br>" .
        "<input type='submit' value='REGISTER'>" .
        "</form>";

echo $form;

if(isset($_POST['name']) && isset($_POST['price'])) {
    
    $gift = new Gift($_POST['name'], $_POST['price']);
    UseCaseHandlerGift::create($gift);
    header("Refresh:0");
}