<?php
header("Content-Security-Policy: default-src 'none'; script-src 'self'; style-src 'self'; form-data 'self'; img-src 'self';");
?>
	
<html>
	<head>
			<title>Willkommen</title>
			<link href ="main_haka_layout.css" rel="stylesheet"/>
			<meta charset="utf-8">
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
	
	<?php require("main_haka_angebote_php.php"); ?>
	
	</div>

</article>

</div>


</body>



	
		
</html>
