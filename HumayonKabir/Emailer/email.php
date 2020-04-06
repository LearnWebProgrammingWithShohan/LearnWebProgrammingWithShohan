<?php

class EmailSubmit {
	public $sendTo;//Who the email will be sent to.
	public $from;//Who the email is from
	public $name;//The name of the sender
	public $subject;//The subject of the email
	public $message;//The messge of the email

	public function sendMail()//Mail Sending Function.
	{

		//setting Email headers
		$headers = "From:" . $this->from;

		//PHP Mail method to send email
		mail( $this->sendTo, $this->subject, $this->message, $headers );

		//Return true if the mail was sent successfully.
		return true;
	}

	public function redirect( $path )//Redirect class for after the mail is sent.
	{
		//Telling the browser where to go.
		header( "Location: $path" );
	}
}

?>