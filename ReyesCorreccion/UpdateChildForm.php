<?php


if(isset($_POST['modificar'])) {

    echo "<h1>Modificar nino</h1>";
    
$form = "<form method='POST' action=''>  " .
        "Nombre: <input type='text' name='nameUpdate'> </br> " . 
        "Apellidos: <input type='text' name='surnameUpdate'> </br>" .
        "Fecha de nacimiento: <input type='text' name='dateUpdate'> </br>" .
        "<select name='isGoodUpdate'> <option value='0' >Malo</option> <option value='1'>Bueno</option></select> </br>" .
        "<input type='hidden'name='idUpdate' value='" . $_POST['modificar'] . "'>  </br>" .
        "<input type='submit' value='REGISTER'>" .
        "</form>";

echo $form;

}


if(isset($_POST['idUpdate']) && isset($_POST['nameUpdate']) && isset($_POST['surnameUpdate']) && isset($_POST['dateUpdate']) && isset($_POST['isGoodUpdate'])) {
   
    $child = new Child($_POST['nameUpdate'], $_POST['surnameUpdate'], $_POST['dateUpdate'], $_POST['isGoodUpdate']);
    UseCaseHandlerChild::update($_POST['idUpdate'], $child);
    header("Refresh:0");
}