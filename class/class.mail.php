<?php
/**
 * This example shows settings to use when sending via Google's Gmail servers.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../lib/PHPMailerAutoload.php';

class Mailer{

	public $email;

	public function __construct() {

		//Create a new PHPMailer instance
		$this->email = new PHPMailer();

		//Tell PHPMailer to use SMTP
		$this->email->isSMTP();

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$this->email->SMTPDebug = 2;

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
		$this->email->Username = "nilobon.na@gmail.com";

		//Password to use for SMTP authentication
		$this->email->Password = "nilobon123";

		//Set who the message is to be sent from
		$this->email->setFrom('nilobon.na@gmail.com', 'Nilobon Nanglae');

		//Set an alternative reply-to address
		$this->email->addReplyTo('nilobon.na@gmail.com', 'Nilobon Nanglae');

		$this->email->IsHTML(true);
	}

	function send($to, $toName, $subject, $body){
		$status = false;

		//Set who the message is to be sent to
		$this->email->addAddress($to, $toName);

		//Set the subject line
		$this->email->Subject = $subject;

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		//$this->email->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

		//Replace the plain text body with one created manually
		$this->email->Body = $body;

		//Attach an image file
		//$this->email->addAttachment('images/phpmailer_mini.png');

		//send the message, check for errors
		if ($this->email->send()) {
			$status = true;
		}
		
		return $status;
	}
	
}
?>