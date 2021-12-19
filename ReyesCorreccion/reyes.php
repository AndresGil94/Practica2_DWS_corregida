<?php
include_once ("UseCaseHandlerChild.php");
include_once ("UseCaseHandlerGift.php");
include_once ("UseCaseHandlerKing.php");
include_once ("child.php");
include_once ("gift.php");
include_once ("king.php");

$array = UseCaseHandlerKing::getGiftDeliveryInfo();
$total = 0.00;


$table = "<table>";

echo "</br>";

foreach ($array as $key => $value) {
    $table .= "<tr><td>" . $key . "</td></tr>";
    foreach ($value as $sub_key => $sub_val) {
        foreach ($sub_val as $sub_key2 => $sub_val2) {
            $table .= "<tr>";
            foreach ($sub_val2 as $sub_key3 => $sub_val3) {
                if (is_array($sub_val3)) {
                    foreach ($sub_val3 as $sub_key4 => $sub_val4) {
                        if($sub_key4 == "precio") {
                            $total += doubleval(str_replace(",", ".", $sub_val4));
                        }
                        $table .= "<td>" . $sub_val4 . "</td>";
                    }
                } else {
                    $table .= "<td>" . $sub_val3 . "</td>";
                }
            }
            $table .= "</tr>";
        }
    }
    $table .= "<tfooter><tr><td> TOTAL: " . $total . "</tfooter></tr></td>";
    $total = 0.00;
}

echo $table;




