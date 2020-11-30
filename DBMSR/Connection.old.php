<?php
    $dns  = 'mysql:host=MySQL;dbname=microservizi';
    $user = 'admin';
    $pass = '1998';
    
    // Ahmed Mera

    try {
        $con = new PDO($dns , $user, $pass);
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
       $file = __DIR__.'/error.json';
       if(! file_exists($file)) {
           touch($file); // create file
           chmod($file, 0766); // change permission all for owner, read and write for other
       }

       $ERROR = (array)json_decode(file_get_contents($file)); //get content from file

       $ERROR[uniqid()] =  array(
           'error_msg'  => $e->getMessage(),
            'error_file' => $e->getFile(),
            'error_line' => $e->getLine(),
            'error_code' => $e->getCode(),
            'date'       => date("d-m-Y H:i:s")
       );

       file_put_contents($file, json_encode($ERROR),  LOCK_EX); // save on file
    }





