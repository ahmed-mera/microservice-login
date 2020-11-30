<?php

class Utils {
    // pattern to check data that we receive
    public static string $pattern = '/[$\/&-)\\=%!+*(|(\[\])]/';

    /**
     * helper function to check if is a valid email
     * @param string $email
     * @return mixed the filtered data, or <b>FALSE</b> if the filter fails.
     * @author Ahmed Mera
     */
    public static function isValidEmail(string $email){
        return filter_var(htmlspecialchars(trim(strtolower(filter_var($email , FILTER_SANITIZE_EMAIL)))), FILTER_VALIDATE_EMAIL);
    }


    /**
     * helper function to compare passwords
     * @param string $password
     * @param string $confirmPassword
     * @return Boolean value
     * @author Ahmed Mera
     */
    public static function comparePasswords(string $password, string $confirmPassword): bool{
        return $password === $confirmPassword;
    }


    /**
     * helper function to check if is a valid password
     * @param String $password
     * @return boolean Value
     * @author Ahmed Mera
     */
    public static function isValidPassword(string $password): bool{
        $uppercase   = preg_match('@[A-Z]@', $password);
        $lowercase   = preg_match('@[a-z]@', $password);
        $number      = preg_match('@[0-9]@', $password);
        $specialChar = preg_match('@[\W]@', $password);

        return ($uppercase && $lowercase && $number && $specialChar && strlen($password) >= 8);
    }


    /**
     * helper function to generate the token
     * @param $key mixed can be number or string
     * @return string | null
     * @author Ahmed Mera
     */
    public static function createToken($key){
        return password_hash($key, PASSWORD_ARGON2ID);
    }


    /**
     * function to check if data is valid or not
     * @param string $data
     * @return int | false <b>preg_match</b> returns 1 if the <i>pattern</i>
     * matches given <i>subject</i>, 0 if it does not, or <b>FALSE</b>
     * if an error occurred.
     * @author Ahmed Mera
     */
    public function isValidData(string $data){
        return preg_match(Utils::$pattern, $data);
    }

    /**
     * helper function to redirect any where
     * @param string $msg
     * @param int $time
     * @param string $where
     * @author Ahmed Mera
     */
    public function redirect($msg = '', $time = 0, $where = 'index.php?action=login'): void {
        echo $msg;
        header('refresh:'.$time.';url='.$where);
    }



}
