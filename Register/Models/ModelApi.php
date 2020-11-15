<?php


require_once "../../DBMSR/Connection.php";

class ModelApi {

    /**
     * helper function to insert into db
     * @param array ...$data
     * @return int
     */
    public function insert(...$data){
        global $con;
        $statement = $con->prepare("INSERT INTO client_users (fname, lname, email, password,date) VALUES(?, ?, ?, ?,now())");
        $statement->execute(array(
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
        $statement = $con->prepare("SELECT email FROM client_users WHERE email = ?");
        $statement->execute(array($email));

        return $statement->rowCount();
    }
}