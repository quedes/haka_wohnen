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
		<h3>Impressum</h3>
		<h4>Anschrift</h4>
		
		<h4>Linksetzung</h4>
		Links auf unsere Internetpräsenzen sind stets so zu setzen, dass die jeweilige Startseite aufgerufen wird. Die Einbindung in Frames anderer Präsenzen ist nicht gestattet.
		<h4>Haftungshinweis</h4>
		Aufgrund gängiger Rechtssprechung weisen wir ausdrücklich darauf hin, dass wir für die Inhalte von Seiten, auf die von hier verwiesen wird (weiterführende Links) und die nicht zu unserem Angebot gehören, keinerlei Haftung übernehmen. Für den Inhalt der verlinkten Seiten sind ausschließlich deren Betreiber verantwortlich. Vorsorglich distanzieren wir uns von deren Inhalten.
		<h4>Copyright</h4>
		Inhalte unserer Internetpräsenzen unterliegen dem Urheberrecht, sind entweder selbst erstellt oder mit den entsprechenden Quellenangaben versehen. Weder Text, Grafiken, Fotos noch sonstige Inhalte dürfen ohne Quellenangaben anderweitig verwendet werden. Die Rechte aller erwähnten Marken oder Warenzeichen gehören den jeweiligen Eigentümern. 
	</div>

</article>

</div>


</body>



	
		
</html>
