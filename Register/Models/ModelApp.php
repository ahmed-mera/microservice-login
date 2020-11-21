<?php


class ModelApp implements GenericModel {

    private string $token;
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
     * @return int Value
     * @author Ahmed Mera
     */
    public function insert(...$data): int{

        $this->setToken(Utils::createToken($data['email'])); // save the token

        $statement = $this->connection->prepare("INSERT INTO clients (token, fname, lname, email, password, date, active) VALUES(?, ?, ?, ?, ?, now(), false)");

        $statement->execute(array(
            $this->getToken(), $data['fname'],
            $data['lname'], $data['email'],
            Utils::createToken($data['password'])
        ));

        return $statement->rowCount();
    }


    /**
     * helper function to get user if exists
     * @param $email String
     * @return int value
     * @author Ahmed Mera
     */
    public function isExistsUser(string $email): int{
        $statement = $this->connection->prepare("SELECT email FROM clients WHERE email = ?");
        $statement->execute(array($email));

        return $statement->rowCount();
    }


    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }
}