<!DOCTYPE html>
<html>
	
	</head>
			<title>Willkommen</title>
			<meta charset="utf-8">
			<link href ="main_haka_layout.css" rel="stylesheet"/>
			
	</head>
	
	
		
	<script type="text/javascript">

function checkForm() {

  var strFehler='';

  if (document.forms[0].name.value=="")

    strFehler += "Feld Name ist leer\n";


  if (!validEmail(document.forms[0].email.value)) {

    strFehler += "Email-Adresse nicht korrekt\n";

  }

 

  if (strFehler.length>0) {

    alert("Fehler: \n\n"+strFehler);

    return(false);

  }

}

function validEmail(email) {

  var strReg = "^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$";

  var regex = new RegExp(strReg);

  return(regex.test(email));

}

</script>	
		
		
		
		
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
	<h2>Kontakt</h2>
	<p>Gerne können Sie Anfragen an uns richten.</p>
	
	<form method="post" action="senden_haka_php.php" onsubmit='return checkForm()'>

	<p>Ihre Email-Adresse: </p>
	<input name="email"/>

	<div style="margin-bottom:1em">
		<p>Betreff: </p>
		<input type="text" name="name"/>
	</div>
	
	<div id="">
			<textarea rows="15" cols="59" id="nachricht" name="nachricht"></textarea>
	</div>



<p><input type='submit' value='Absenden'/></p>

</form>
	</div>

</article>

</div>


</body>



	
		
</html>
