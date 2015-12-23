<?php
header("Content-Security-Policy: default-src 'none'; script-src 'self'; style-src 'self'; form-data 'self'; img-src 'self';");
?>

<!DOCTYPE html<
<html>
	
	</head>
			<title>Willkommen</title>
			<meta charset="utf-8">
			<link href ="main_haka_layout.css" rel="stylesheet"/>
	    <script type="text/javascript" src="form_validation.js"></script>
	</head>
	
<body>

<div class="site">

<?php require("aside.php"); ?>

<article>

	<div id="picture">
		<img class="pic" src="/img/gotha_zwei_klein.jpg"></img>
		<img class="pic" src="/img/gotha_eins_klein.jpg"></img>
		<img class="pic" src="/img/gotha_drei_klein.jpg"></img>
	</div>
	
	<div id="zwischenbalken">
	</div>
	
	
	<div id="seite">
  <div id="error_msgs">
    <p class="error_msg" id="email_error_msg">
      Die von Ihnen angegebene Email-Adresse ist fehlerhaft.
    </p>
    <p class="error_msg" id="subject_error_msg">
      Bitte geben Sie einen Betreff an.
    </p>
    <p class="error_msg" id="msg_error_msg">
      Ihre Nachricht ist leer.
    </p>
  </div>
	<h2>Kontakt</h2>
	<p>Gerne können Sie Anfragen an uns richten.</p>
	
	<form method="post" action="senden_haka_php.php" onsubmit='return checkForm()'>
    <table id="msg_header">
    <tr>
  	  <td><span>Ihre Email-Adresse: </span></td>
	    <td><input id="emailInput" name="email"/></td>
    </tr>

	  <tr>
		  <td><span>Betreff: </span></td>
		  <td><input id="subjectInput" type="text" name="name"/></td>
	  </tr>
	  </table><!-- msg_header -->
	
	  <div>
			<textarea id="kontakt_msg" rows="15" cols="59" id="nachricht" name="nachricht" placeholder="Ihre Nachricht..."></textarea>
    </div>

    <div id="button_div"><input type='submit' value='Absenden'/></div>
  </form>
	</div>

</article>

</div>


</body>
</html>
