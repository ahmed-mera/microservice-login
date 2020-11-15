<?php

use Cassandra\Date;

require_once "../../DBMSR/Connection.php";

class ModelApp {

    /**
     * helper function to insert into db
     * @param array ...$data
     * @return int
     */
    public function insert(...$data){
        global $con;
        $statement = $con->prepare("INSERT INTO clients (token, fname, lname, email, password, date, active) VALUES(?, ?, ?, ?, ?, now(), false)");
        $statement->execute(array(
            Utils::createToken($data['email']),
            $data['fname'],
            $data['lname'],
            $data['email'],
            Utils::createToken($data['password'])
        ));

        return $statement->rowCount();
    }


    /**
     * helper function to get user if exists
     * @param $email String
     * @return bool value
     */
    public function isExistsUser(string $email){
        global $con;
        $statement = $con->prepare("SELECT email FROM clients WHERE email = ?");
        $statement->execute(array($email));

        return $statement->rowCount();
    }
}