<?php
    $localhost = 'localhost';
    $databaseName = 'wd18401_quanlyoto';
    $username = 'root';
    $password = '';

    $connect = new PDO("mysql:host=$localhost;dbname=$databaseName", $username, $password);

    if($connect) {
        // echo "Kết nối thành công";
    }else {
        echo "Error";
    }

?>