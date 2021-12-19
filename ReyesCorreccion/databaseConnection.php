<?php

class DatabaseConnnection {
    
    const host = "localhost";
    const user = "root";
    const password = "";
    const databaseName = "reyes2";
    
    static function connect() {
        return mysqli_connect(DatabaseConnnection::host, DatabaseConnnection::user, DatabaseConnnection::password, DatabaseConnnection::databaseName);
    }
    
}