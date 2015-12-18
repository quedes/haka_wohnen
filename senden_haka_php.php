<?php
header("Location: http://stream-vorschlag.de/main_haka_kontakt.php");

/*Funktion prüft Korrekte Struktur der email-adresse*/
function check_email($email) {
  
  $nonascii      = "\x80-\xff"; # Non-ASCII-Chars are not allowed

  $nqtext        = "[^\\\\$nonascii\015\012\"]";
  $qchar         = "\\\\[^$nonascii]";

  $protocol      = '(?:mailto:)';

  $normuser      = '[a-zA-Z0-9][a-zA-Z0-9_.-]*';
  $quotedstring  = "\"(?:$nqtext|$qchar)+\"";
  $user_part     = "(?:$normuser|$quotedstring)";

  $dom_mainpart  = '[a-zA-Z0-9][a-zA-Z0-9._-]*\\.';
  $dom_subpart   = '(?:[a-zA-Z0-9][a-zA-Z0-9._-]*\\.)*';
  $dom_tldpart   = '[a-zA-Z]{2,5}';
  $domain_part   = "$dom_subpart$dom_mainpart$dom_tldpart";

  $regex         = "$protocol?$user_part\@$domain_part";
 

  return preg_match("/^$regex$/",$email);
}




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
 if(checkdnsrr($from,'MX') && check_email($from))
 {
	mail($empfaenger, $betreff, $text, $from);
 }

 
 
}


?>
