<?php
$name = $_POST['name'];
$email = $_POST['sender'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$intestazioni  = "From: noreply <noreply@esoesonlus.org>\r\n";
$intestazioni .= "Reply-To: " . $name . "<" .$email.">\r\n";

$body = "Messaggio da " . $name . " - " . $phone . "\n" . $message;

if (mail("simon.dottor@gmail.com", "Messaggio dal sito", $body,$intestazioni)){
	echo "<h1>Messaggio inviato correttamente</h1>";
    }else{
	echo "<h1>Errore durante l'invio del messaggio</h1>";
   	}
?>
<meta http-equiv="refresh" content="2;URL=http://www.progettotesinadottodalma.altervista.org">