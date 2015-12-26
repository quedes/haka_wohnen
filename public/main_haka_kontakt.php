<?php
header("Content-Security-Policy: default-src 'none'; "
        ."script-src 'self' http://www.google-analytics.com/analytics.js; "
        ."style-src 'self'; "
        ."form-action 'self'; "
        ."img-src 'self' http://www.google-analytics.com/collect;"
      );
?>

<?php
$isValid_betreff = true;
$isValid_from = true;
$isValid_text = true;
$isMsgSent = false;
$sent_betreff = "";
$sent_from = "";
$sent_text = "";

if (isset($_POST['betreff'])) {
  $sent_betreff = htmlentities( $_POST['betreff'] );
} else {
  $isValid_betreff = false; 
}
if (isset($_POST['email'])) {
  $sent_from = htmlentities( $_POST['email'] );
  $isValid_from = (filter_var($sent_from, FILTER_VALIDATE_EMAIL) !== false);
} else {
  $isValid_from = false; 
}
if (isset($_POST['nachricht'])) {
  $sent_text = htmlentities( $_POST['nachricht'] );
  $isValid_text = ($sent_text !== "");
} else {
  $isValid_text = false; 
}

if ($isValid_betreff && $isValid_from && $isValid_text) {
  $empfaenger = "hakawohnen@gmail.com";
  mail($empfaenger, $sent_betreff, $sent_text, $sent_from);
  $isMsgSent = true;
}
?>

<!DOCTYPE html>
<html>
</head>
  <title>Willkommen</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link href ="main_haka_layout.css" rel="stylesheet"/>
  <script type="text/javascript" src="form_validation.js" async></script>
  <script type="text/javascript" src="analytics.js" async></script>
</head>
<body>

<div class="site">

<?php require("aside.php"); ?>

<article>
  <div id="picture">
    <img class="pic" src="img/gotha_zwei_klein.jpg"></img>
    <img class="pic" src="img/gotha_eins_klein.jpg"></img>
    <img class="pic" src="img/gotha_drei_klein.jpg"></img>
  </div>
  <div id="zwischenbalken">
</div>


<div id="seite">
  <div id="error_msgs">
    <p class="success_msg <?php echo (($isMsgSent) ? "show" : "hide"); ?>" id="success_msg">
      Ihre Nachricht wurde erfolgreich gesendet.
    </p>
    <p class="error_msg <?php echo (($isValid_from) ? "hide" : "show"); ?>" id="email_error_msg">
      Die von Ihnen angegebene Email-Adresse ist fehlerhaft.
    </p>
    <p class="error_msg <?php echo (($isValid_betreff) ? "hide" : "show"); ?>" id="subject_error_msg">
      Bitte geben Sie einen Betreff an.
    </p>
    <p class="error_msg <?php echo (($isValid_text) ? "hide" : "show"); ?>" id="msg_error_msg">
      Ihre Nachricht ist leer.
    </p>
  </div>

<h2>Kontakt</h2>
<p>Gerne können Sie Anfragen an uns richten.</p>
	
<form id="kontakt_form" method="post" action="main_haka_kontakt.php" >
  <table id="msg_header">
    <tr>
      <td><span>Ihre Email-Adresse: </span></td>
      <td><input id="emailInput" name="email"
          <?php echo (($isMsgSent) ? "" : "value=\"$sent_from\""); ?>
          /></td>
    </tr>

    <tr>
      <td><span>Betreff: </span></td>
      <td><input id="subjectInput" type="text" name="betreff"
          <?php echo (($isMsgSent) ? "" : "value=\"$sent_betreff\""); ?>
          /></td>
    </tr>
  </table><!-- msg_header -->

  <div>
    <textarea id="kontakt_msg" rows="15" cols="59" id="nachricht" name="nachricht" placeholder="Ihre Nachricht..."><?php echo (($isMsgSent) ? "" : $sent_text); ?></textarea>
  </div>

  <div id="button_div"><input type='submit' value='Absenden'/></div>
</form>
</div> <!-- seite -->

</article>

</div>


</body>
</html>
