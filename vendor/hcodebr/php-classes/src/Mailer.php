<?php

namespace Hcode;

use Rain\Tpl;

class Mailer {

    const USERNAME = "alexsandro@cgdw.com.br";
    const PASSWORD = "1@alexsandro.";
    const NAME_FROM = "HCode Store";

    private $mail;

    public function __construct($toAddress, $toName, $subject, $tplName, $data = array())
    {

        $config = array(
            "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/email/",
            "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
            "debug"         => false
        );
    
        Tpl::configure( $config );

        $tpl = new Tpl;

        foreach ($data as $key => $value) {
            $tpl->assign($key,$value);
        }

        $html = $tpl->draw($tplName, true);

        $this->mail = new \PHPMailer;
        $this->mail->isSMTP();
        $this->mail->SMTPDebug = 0;
        $this->mail->Host = 'ssl://smtp.gmail.com';
        $this->mail->Port = 465;
        $this->mail->SMTPSecure = 'tls';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = Mailer::USERNAME;
        $this->mail->Password = Mailer::PASSWORD;
        $this->mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);
        $this->mail->addAddress($toAddress, $toName);
        $this->mail->Subject = $subject;
        $this->mail->msgHTML($html);
        $this->mail->AltBody = 'This is a plain-text message body';
    }
    public function send()
    {
        return $this->mail->send();
    }    

}

?>