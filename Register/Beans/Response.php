<?php



class Response{
    private bool $success; //boolean value [true, false]
    private string | array $response; //string of value or array of errors

    /**
     * Response constructor.
     * @param bool $success boolean
     * @param string | array $response
     * @author Ahmed Mera
     */
    public function __construct(bool $success, string | array $response){
        $this->success = $success;
        $this->response = $response;
    }


    /**
     * @return bool value
     * @author Ahmed Mera
     */
    public function getSuccess(): bool{
        return $this->success;
    }

    /**
     * @param bool $success
     * @author Ahmed Mera
     */
    public function setSuccess(bool $success): void {
        $this->success = $success;
    }

    /**
     * @return string | array
     * @author Ahmed Mera
     */
    public function getResponse(): string | array{
        return $this->response;
    }

    /**
     * @param string | array $response
     * @author Ahmed Mera
     */
    public function setResponse(string | array $response): void {
        $this->response = $response;
    }


}