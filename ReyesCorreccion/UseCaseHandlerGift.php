<?php
include_once "iUseCaseHandler.php";
include_once "databaseConnection.php";

class UseCaseHandlerGift implements iUseCaseHandler
{

    public static function create($value) {
        
        $connect = DatabaseConnnection::connect();
        $query = "INSERT INTO regalos (nombre, precio) VALUES ('" . $value->getName() . "', '" .  $value->getPrice() . "')";
       
        mysqli_query($connect, $query);

    }

    public static function readBy($value){
       
        $connect = DatabaseConnnection::connect();
        $query = "SELECT * FROM regalos WHERE id = '" . $value . "'";
        $result = mysqli_query($connect, $query);
        $gift = null;
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $gift = new Gift($row['nombre'], $row['precio']);
            $gift->setId($value);
            $gift->setKingId($row['rey_id']);
        }
        
        return $gift;
        
    }

    public static function update($int, $value) {
        
        if(self::readBy($int) != null) {
            $connect = DatabaseConnnection::connect();
            $query = "UPDATE regalos SET nombre = '" . $value->getName() . "', precio = '" . $value->getPrice() . "' WHERE id='$int'";
            mysqli_query($connect, $query);
        }
        
    }

    public static function delete($int) {
        
        if(self::readBy($int) != null) {
            $connect = DatabaseConnnection::connect();
            $query = "DELETE FROM regalos WHERE id = '$int'";
            mysqli_query($connect, $query);
        }
    }
    
    public static function readAll() {
        
        $array = array();
        
        $connect = DatabaseConnnection::connect();
        $query = "SELECT * FROM regalos ORDER BY nombre ASC";
        $result = mysqli_query($connect, $query);
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $gift = new Gift($row['nombre'], $row['precio']);
            $gift->setId($row['id']);
            $gift->setKingId($row['rey_id']);
            $array[] = $gift;
        }
        
        return $array;
        
        
    }
    
    public static function getGiftsByChildId($int) {
 
        
        $array = array();
        $connect = DatabaseConnnection::connect();
        
        $query = "SELECT * FROM ninos_regalos WHERE ninos_id ='". $int . "'";
       
        $result = mysqli_query($connect, $query);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
             $query2 = "SELECT * FROM regalos WHERE id ='". $row['regalos_id'] . "'";
             $result2 = mysqli_query($connect, $query2);
             
             while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
                $gift = new Gift($row['nombre'], $row['precio']);
                $gift->setId($row['id']);
                $array[] = $gift;
             }
        }
        
        return $array;
    }
}