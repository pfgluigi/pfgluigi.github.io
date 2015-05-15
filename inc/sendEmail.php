<?php

// Replace this with your own email address
$siteOwnersEmail = 'pablofornes@gmail.com';


if($_POST) {
   $disp=0;
   $name = trim(stripslashes($_POST['contactName']));
   $email = trim(stripslashes($_POST['contactEmail']));
   $subject = trim(stripslashes($_POST['contactSubject']));
   $contact_message = trim(stripslashes($_POST['contactMessage']));

   // Check Name
	if (strlen($name) < 2) {
		$disp=1;
		$errorname = "Pon tu nombre.";
	}
	// Check Email
	if (!preg_match('/^[a-z0-9&\'\.\-_\+]+@[a-z0-9\-]+\.([a-z0-9\-]+\.)*+[a-z]{2}/is', $email)) {
		$disp=1;
		$erroremail = "Pon un email valido.";
	}
	// Check Message
	if (strlen($contact_message) < 15) {
		$disp=1;
		$errormsg = "Pon un mensaje mas largo, anda.";
	}
   // Subject
	if ($subject == '') { $subject = "Formulario de contacto."; }
/*

   // Set Message
   $message .= "Email de: " . $name . "<br />";
	$message .= "el email: " . $email . "<br />";
   $message .= "Mensaje: <br />";
   $message .= $contact_message;
   $message .= "<br /> ----- <br /> Este email ha sido enviado de tu correo electronico <br />";

   // Set From: header
   $from =  $name . " <" . $email . ">";

   // Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


   if (!$error) {

      ini_set("sendmail_from", $siteOwnersEmail); // for windows server
      $mail = mail($siteOwnersEmail, $subject, $message, $headers);

		if ($mail) { echo "OK"; }
      else { echo "Something went wrong. Please try again."; }
		
	} # end if - no validation error

	else {

		$response = (isset($error['name'])) ? $error['name'] . "<br /> \n" : null;
		$response .= (isset($error['email'])) ? $error['email'] . "<br /> \n" : null;
		$response .= (isset($error['message'])) ? $error['message'] . "<br />" : null;
		
		echo $response;

	} # end if - there was a validation error
	*/
#prueba
include("mailer/class.phpmailer.php");
include("mailer/class.smtp.php") ;
$mail = new PHPMailer;
 
$mail->IsSMTP(); // telling the class to use SMTP

                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "tsl";                 // sets the prefix to the servier
$mail->Host       = "tls://smtp.gmail.com:587";      // sets GMAIL as the SMTP server
$mail->Port       = 587;                   // set the SMTP port for the GMAIL server
$mail->Username   = "pablofornes@gmail.com";  // GMAIL username
$mail->Password   = "Luig!n13";            // GMAIL password

$mail->SetFrom($email, $name);

$mail->AddReplyTo("pablofornes@gmail.com","Pablo Fornes");

$mail->Subject    = $subject;

 

$mail->MsgHTML("Email enviado por: ".$email."<br/>".$contact_message."<br/><br/>Mensaje enviado desde mi CV digital");

$address = "pablofornes@gmail.com";
$mail->AddAddress($address, "Pablo Fornes");
if($disp==0){
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Mensaje enviado correctamente. Gracias!";
}#fin prueba
}
else{
if($errorname!=NULL || $errorname!=""){echo $errorname."<br/>";}
if($erroremail!=NULL || $erroremail!=""){echo $erroremail."<br/>";}
if($errormsg!=NULL || $errormsg!=""){echo $errormsg;}
}
}


?>