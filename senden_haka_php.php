<?php
header(Location: "main_haka_kontakt.php");




if(isset($_POST['mail']) and isset($_POST['betreff']) and isset($_POST['nachricht'])) 
{

$empfaenger = "knecht1989@aol.com";

$betreff = $_POST['betreff'];
$betreff = htmlentities($betreff);

$from = $_POST['mail'];
$from = htmlentities($from);


$text = $_POST['nachricht'];	
$text = htmlentities($text);

/*Prüft DNS Einträge auf Übereinstimmung mit IP-Adresse*/
 if(checkdnsrr($from,'MX') && filter_var($from, FILTER_VALIDATE_EMAIL))
 {
	mail($empfaenger, $betreff, $text, $from);
 }

 
 
}


?>
