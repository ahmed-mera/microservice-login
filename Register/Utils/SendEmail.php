<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

class SendEmail{

private PHPMailer $mail;
private string $token;
private string $email;

    /**
     * SendEmail constructor.
     * @param string $token
     * @param string $email
     * @throws Exception
     * @author Ahmed Mera
     */
    public function __construct(string $token, string $email){
        $this->token = $token;
        $this->email = $email;
        $this->mail = new PHPMailer(true); // Instantiation and passing `true` enables exceptions
        $this->init(); // call function init to init some parameters
    }


    /**
     * helper function to init vars
     * @throws Exception
     * @author Ahmed Mera
     */
    private function init(): void {
        //Server settings
        $this->mail->isSMTP();  // Set mailer to use SMTP
        $this->mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $this->mail->SMTPAuth = true; // Enable SMTP authentication
        $this->mail->Username = 'servizi.pipistrelli@gmail.com';  // SMTP username
        $this->mail->Password = 'Microservizi';   // SMTP password
        $this->mail->SMTPSecure = 'ssl';  // Enable TLS encryption, `ssl` also accepted
        $this->mail->Port = 465;  // TCP port to connect to
        $this->mail->addAddress($this->email); //set email of user
        $this->mail->isHTML(true); // Set email format to HTML
        $this->mail->Subject = "Confirma account";
        $this->mail->Body = $this->createMsg(); //set msg of email
    }


    /**
     * helper function to create the body of MSG
     * @return string
     * @author Ahmed Mera
     */
    private function createMsg(): string {
        return '<html lang="it">
                    <head>  
                        <style>
                            .container{
                                margin: 10px auto !important;
                                padding: 5px;
                                text-align: center;
                            }
                            .container > p.msg {
                                text-align: center;
                                margin-bottom: 5px;
                            }
                            
                             .container > p.link {
                                text-align: center;
                                margin-top: 5px;
                            }
                        </style>
                        <title>confirma account</title> 
                    </head>
                    <body>
                        <div class = "container">
                            <p class="msg">
                                per confirmare il tuo account clicca <a href="'. $this->createLink() .'"> qui </a>. 
                            </p>
                            <p class="link"> 
                                <a href="'. $this->createLink() .'">'.  $this->createLink() .'</a> 
                            </p>
                        </div> 
                   </body>
                </html>';
    }


    /**
     * helper function to create link to verify account
     * @return string
     * @author Ahmed Mera
     */
    private function createLink(): string {
        return "https://mera.ddns.net/microservizi/register/index.php?action=verify&&token=". $this->token;
    }


    /**
     * function to send email
     * @return bool|string
     * @author Ahmed Mera
     */
    public function sendEmail(): bool | string {
        try {
            return $this->mail->send();
        } catch (Exception $e) {
            return $e->errorMessage();
        }
    }




}