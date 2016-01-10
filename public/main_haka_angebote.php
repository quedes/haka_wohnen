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
	
	<div id="zwischenbalken">
	</div>

	
	<div id="seite">

  <h2>Angebote</h2>

  <p>Zur Zeit können wir folgende Wohnungen anbieten</p>

  <div id="angebote">
	  <?php require("angebote.php"); ?>
  </div>
	
	</div>

</article>

</div>


</body>



	
		
</html>
