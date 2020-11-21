<?php


interface GenericModel{

    /**
     * @param string $email
     * @return int
     * @author Ahmed Mera
     */
    public function isExistsUser(string $email): int;

    /**
     * @param array[] ...$data
     * @return int
     * @author Ahmed Mera
     */
    public function insert(...$data): int;

}