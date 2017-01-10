<?php
/**
 * Created by PhpStorm.
 * User: ran
 * Date: 4/10/2016
 * Time: 12:22 PM
 */

namespace Project\FAQ\FAQAdmin\libs;


class Email
{
    private $email;
    public function __construct()
    {
        date_default_timezone_set('Etc/UTC');
        $this->email = new \PHPMailer();
        //Tell PHPMailer to use SMTP
        $this->email->isSMTP();
        $this->email->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $this->email->Debugoutput = 'html';

        //Set the hostname of the mail server
        $this->email->Host = 'smtp.gmail.com';

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $this->email->Port = 587;

        //Set the encryption system to use - ssl (deprecated) or tls
        $this->email->SMTPSecure = 'tls';

        //Whether to use SMTP authentication
        $this->email->SMTPAuth = true;

        //Username to use for SMTP authentication - use full email address for gmail
        $this->email->Username = "wangran326990@gmail.com";

        //Password to use for SMTP authentication
        $this->email->Password = "Wr326990";

        //Set who the message is to be sent from
        $this->email->setFrom('wangran326990@gmail.com', 'Cinema Manager');

        //Set an alternative reply-to address
        $this->email->addReplyTo('wangran326990@gmail.com', 'Cinema Manager');
    }

    public function sendEmail($emailSend,$title, $message){
       // var_dump($emailSend);
       // var_dump($title);
       // var_dump($message);
       // var_dump($message);
        $this->email->addAddress($emailSend);
        $this->email->Subject = $title;
        $this->email->msgHTML($message);
        //Replace the plain text body with one created manually
        //$this->email->AltBody = $message;
        $this->email->send();
    }


}