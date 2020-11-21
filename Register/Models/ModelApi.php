<?php


class ModelApi implements GenericModel {

    private PDO $connection;

    /**
     * ModelApi constructor.
     * @param ConfigurationDB $connections
     * @throws PDOException if the attempt to connect to the requested database fails.
     * @author Ahmed Mera
     */
    public function __construct(ConfigurationDB $connections) {
        $this->connection = $connections->connect();
    }


    /**
     * helper function to insert into db
     * @param array[] ...$data
     * @return int
     * @author Alessandro Grassi
     */
    public function insert(...$data): int{

        $statement = $this->connection->prepare("INSERT INTO client_users (fname, lname, email, password, date) VALUES(?, ?, ?, ?, now())");

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
     * @param String $email
     * @return int
     * @author Alessandro Grassi
     */
    public function isExistsUser(string $email): int{
        $statement = $this->connection->prepare("SELECT email FROM client_users WHERE email = ?");
        $statement->execute(array($email));
        return $statement->rowCount();
    }
}