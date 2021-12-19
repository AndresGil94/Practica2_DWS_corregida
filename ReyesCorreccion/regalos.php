<?php
include ('UseCaseHandlerGift.php');
include ('Gift.php');

include("CreateGiftForm.php");
include("UpdateGiftForm.php");

if(isset($_POST['borrar'])) {
    UseCaseHandlerGift::delete($_POST['borrar']);
}

$table = "<h1>LISTADO DE REGALOS</h1>
           <table>
            <tr>
                <td>Nombre</td>
                <td>Precio</td>
            </tr>";

foreach (UseCaseHandlerGift::readAll() as $value) {
    $table .= "<tr>";
    $table .= "<td>" . $value->getName() . "</td>";
    $table .= "<td>" . $value->getPrice() . "</td>";
    $table .= "<td>
                    <form action='' method='POST'>
                        <input type='hidden' name='borrar' value='" . $value->getId() . "' />
                        <input type='submit' value='BORRAR' />
                    </form>
               </td>";
    $table .= "<td>
                    <form action='' method='POST'>
                        <input type='hidden' name='modificar' value='" . $value->getId() . "' />
                        <input type='submit' value='MODIFICAR' />
                    </form>
               </td>";
    $table .= "</tr>";
}

$table .= "</table>";


echo $table;
