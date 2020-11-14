<?php



class Response{
    private bool $success; //boolean value [true, false]
    private $response; //string of value or array of errors

    /**
     * Response constructor.
     * @param bool $success boolean
     * @param $response string | array
     */
    public function __construct(bool $success, $response){
        $this->success = $success;
        $this->response = $response;
    }


    /**
     * @return bool value
     */
    public function getSuccess(){
        return $this->success;
    }

    /**
     * @param bool $success
     */
    public function setSuccess(bool $success): void {
        $this->success = $success;
    }

    /**
     * @return mixed
     */
    public function getResponse(){
        return $this->response;
    }

    /**
     * @param mixed $response
     */
    public function setResponse($response): void {
        $this->response = $response;
    }


}