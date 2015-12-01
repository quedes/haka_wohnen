<?php


if($_POST['mail']!="" and $_POST['betreff']!="" and $_POST['nachricht']!="") 
{
header("Location: http://stream-vorschlag.de/main_haka_kontakt.html");

$empfaenger = "HaKa-Wohnen@t-online.de";
$betreff = $_POST['betreff'];
$from .= $_POST['mail'];
$text = $_POST['nachricht'];	
$from = $from;

mail($empfaenger, $betreff, $text, $from);

}


?>
