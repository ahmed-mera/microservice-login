<?php
    $dns  = 'mysql:host=localhost;dbname=mysql';
    $user = 'root';
    $pass = '';
//    $con = null;

    try {
        $con = new PDO($dns , $user, $pass);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e;
    }
