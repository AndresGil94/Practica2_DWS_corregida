<?php
include ('UseCaseHandlerChild.php');
include ('child.php');

include("CreateChildForm.php");
include("UpdateChildForm.php");

if(isset($_POST['borrar'])) {
    UseCaseHandlerChild::delete($_POST['borrar']);
}

$table = "<h1>LISTADO DE NINOS</h1>
           <table>
            <tr>
                <td>Nombre</td>
                <td>Apellidos</td>
                <td>Fecha de nacimiento</td>
                <td>Ha sido bueno</td>
            </tr>";

foreach (UseCaseHandlerChild::readAll() as $value) {
    $table .= "<tr>";
    $table .= "<td>" . $value->getName() . "</td>";
    $table .= "<td>" . $value->getSurname() . "</td>";
    $table .= "<td>" . $value->getDate() . "</td>";
    
    if($value->getIsGood() == 1) {
        $table .= "<td>" . "Si" . "</td>";
    } else {
        $table .= "<td>" . "No" . "</td>";
    }
  
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


