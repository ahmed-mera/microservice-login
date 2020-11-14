<?php

class Utils {

    /**
     * helper function to check if is a valid email
     * @param $email string
     * @return mixed
     */
    public static function isValidEmail(string $email){
        return filter_var(trim(strtolower(filter_var ($email , FILTER_SANITIZE_EMAIL))), FILTER_VALIDATE_EMAIL);
    }


    /**
     * helper function to compare passwords
     * @param $password string
     * @param $confirmPassword string
     * @return Boolean value
     */
    public static function comparePasswords(string $password, string $confirmPassword){
        return $password === $confirmPassword;
    }


    /**
     * helper function to check if is a valid password
     * @param $password String
     * @return boolean Value
     */
    public static function isValidPassword(string $password){
        $uppercase   = preg_match('@[A-Z]@', $password);
        $lowercase   = preg_match('@[a-z]@', $password);
        $number      = preg_match('@[0-9]@', $password);
        $specialChar = preg_match('@[\W]@', $password);

        return ($uppercase && $lowercase && $number && $specialChar && strlen($password) >= 8);
    }


    /**
     * helper function to generate the token
     * @param $key mixed
     * @return string | null
     */
    public static function createToken($key){
        return password_hash($key, PASSWORD_ARGON2ID);
    }




}
