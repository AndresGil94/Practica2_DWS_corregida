<?php

echo "<h1>Anadir nino</h1>";

$form = "<form method='POST' action=''> Nombre: <input type='text' name='name'> </br> " . 
        "Apellidos: <input type='text' name='surname'> </br>" .
        "Fecha de nacimiento: <input type='text' name='date'> </br>" .
        "<select name='isGood'> <option value='0' >Malo</option> <option value='1'>Bueno</option></select> </br>" .
        "<input type='submit' value='REGISTER'>" .
        "</form>";

echo $form;

if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['date']) && isset($_POST['isGood'])) {
   
    $child = new Child($_POST['name'], $_POST['surname'], $_POST['date'], $_POST['isGood']);
    UseCaseHandlerChild::create($child);
    header("Refresh:0");
}