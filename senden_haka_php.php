<?php

if(isset($_POST['mail']) and isset($_POST['betreff']) and isset($_POST['nachricht'])) 
{
header("Location: http://stream-vorschlag.de/main_haka_kontakt.html");

$empfaenger = "knecht1989@aol.com";

$betreff = $_POST['betreff'];
$betreff = htmlentities($betreff);

$from = $_POST['mail'];
$from = htmlentities($from);


$text = $_POST['nachricht'];	
$text = htmlentities($text);

/*Prüft DNS Einträge auf Übereinstimmung mit IP-Adresse*/
 if(checkdnsrr($from,’MX’))
 {
	mail($empfaenger, $betreff, $text, $from);
 }
 
 
}


?>
