<?php
header("Content-Security-Policy: default-src 'none'; "
        ."script-src 'self' http://www.google-analytics.com/analytics.js; "
        ."style-src 'self'; "
        ."img-src 'self' http://www.google-analytics.com/collect;"
      );
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Willkommen</title>
	<link href ="main_haka_layout.css" rel="stylesheet"/>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
	<div id="zwischenbalken"></div>
	
	<div id="seite">
	
<h1>Komfortabel wohnen</h1>
Wohnungen bauen, in denen wir am liebsten selber wohnen würden so könnte man unsere Intention kurz beschreiben.
Damit meinen wir Wohnungen, die praktisch, schön und komfortabel zugleich sind, Wohnungen zum Wohlfühlen eben. Der Standort unserer Wohnungen ist dafür ideal.
</br>
Warum tun wir das? Weil in dem uns anvertrauten Erbe im Herzen von Gotha wieder Leben einkehren soll. Carl Wagner, der Eigentümer der einstigen Firma „Gothaer Transport Kontor“ und unser Großvater war, hätte es sich gewünscht, dass die Flächen inmitten der Stadt wieder erblühen. So entstand nach und nach unsere Idee zum „Wohnpark Große Fahnen Straße“, einem ruhigen Wohngebiet in der Nähe vom Stadtbad, dem Kaufland und dem Arnoldi-Gymnasium.

</br></br> Karin Hausknecht

	</div>

</article>

</div>
</body>
</html>

