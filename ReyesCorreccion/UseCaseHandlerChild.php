<?php
include_once "iUseCaseHandler.php";
include_once "databaseConnection.php";
include_once "UseCaseHandlerGift.php";

class UseCaseHandlerChild implements iUseCaseHandler
{

    public static function create($value)
    {
        $connect = DatabaseConnnection::connect();
        $query = "INSERT INTO ninos (nombre, apellidos, fechaDeNacimiento, bueno) VALUES ('" . $value->getName() . "', '" . $value->getSurname() . "', '" . $value->getDate() . "', '" . $value->getIsGood() . "')";
        mysqli_query($connect, $query);
    }

    public static function readBy($value)
    {
        $connect = DatabaseConnnection::connect();
        $query = "SELECT * FROM ninos WHERE id = $value";
        $result = mysqli_query($connect, $query);
        $child = null;

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $child = new Child($row['nombre'], $row['apellidos'], $row['fechaDeNacimiento'], $row['bueno']);
            $child->setId($value);
        }

        return $child;
    }

    public static function update($int, $value)
    {
        if (self::readBy($int) != null) {
            $connect = DatabaseConnnection::connect();
            $query = "UPDATE ninos SET nombre = '" . $value->getName() . "', apellidos = '" . $value->getSurname() . "', fechaDeNacimiento = '" . $value->getDate() . "', bueno = '" . $value->getIsGood() . "' WHERE id = '$int'";
            mysqli_query($connect, $query);
        }
    }

    public static function delete($int)
    {
        if (self::readBy($int) != null) {
            $connect = DatabaseConnnection::connect();
            $query = "DELETE FROM ninos WHERE id = '$int'";
            mysqli_query($connect, $query);
        }
    }

    public static function readAll()
    {
        $array = array();

        $connect = DatabaseConnnection::connect();
        $query = "SELECT * FROM ninos ORDER BY nombre ASC";
        $result = mysqli_query($connect, $query);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $child = new Child($row['nombre'], $row['apellidos'], $row['fechaDeNacimiento'], $row['bueno']);
            $child->setId($row['id']);
            $array[] = $child;
        }

        return $array;
    }

    public static function addGiftToChild($giftId, $childId)
    {
        $isFound = false;

        foreach (UseCaseHandlerGift::getGiftsByChildId($childId) as $value) {
            if ($value->getId() == $giftId) {
                $isFound = true;
            }
        }

        if (! $isFound) {
            $gift = UseCaseHandlerGift::readBy($giftId);
            $connect = DatabaseConnnection::connect();
            $query = "INSERT INTO ninos_regalos (ninos_id, regalos_id) VALUES ($childId,'" . $gift->getId() . "')";
            mysqli_query($connect, $query);
        }
    }
}