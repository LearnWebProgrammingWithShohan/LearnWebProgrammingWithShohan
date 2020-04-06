<?php

class emailer
{


    public function __construct($sender)
    {
        $sender = "myemail@mail.com";
        $this->sender = $sender;
        $this->recipients = array();
    }

    public function addRecipient($recipient)
    {
        array_push($this->recipients, $recipient);
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function sendEmail()
    {
        foreach ($this->recipients as $recipient) {
            $email = mail(
                $recipient,
                $this->subject,
                $this->body,
                "From {$this->sender}\r\n"
            );
            if ($email) {
                echo "Mail successfully sent.<br/>";
            } else {
                echo "Sorry! Sending failed. <br/>";
            }
        }
    }
}
