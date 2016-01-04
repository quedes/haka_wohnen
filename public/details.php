<?php

if (isset($_GET["pam"])) {
	$pam = mysql_real_escape_string($_GET["pam"]);
	$pam = htmlentities($pam);
} else {
	$pam = "1";
}

/* Verbindung zum Server*/
		
$db = mysql_connect("","","");
mysql_set_charset("utf8", $db);
if($db)
{
	/*mysql_select_db("web275_db1");*/
	mysql_select_db("web275_db1");
	
  // TODO SQL injection might still be possible
	$abfrage = "SELECT * FROM haka_wohnen WHERE ind = '$pam'";
	$ergebnis = mysql_query($abfrage);
	
	/* Ablegen in ein Array*/
	$list = array();
	
	while($row = mysql_fetch_array($ergebnis))
	{
	/* Ablegen in Array*/
		$list[] = $row;
	}
	
	/*Bilder für Slideshow - in Planung*/
	$pic = htmlentities( $list[0] ["wohnung"] );
	
	$picone = "img/" . $pic . ".jpg";
	
	echo "<div>";
		if (file_exists($picone))
			{	
			echo "<img src=\"$picone\" style=\"width:100%; height:100%;\">";
			}
			
			else
			{
				echo "";
			}
			
	echo "</div>";
	/*Preis,Zimmer, Fläche*/
	$preis = $list[0] ["preis"];
	$preis = htmlentities($preis);
	$zimmer = $list[0] ["zimmer"];
	$zimmer= htmlentities($zimmer);
	$flaeche = $list[0] ["flaeche"];
	$flache = htmlentities($flaeche);
	
	echo "<table class=\"table_oben\">";
		echo "<tr>";
			echo "<th class=\"th_oben\">Preis</th>";
			echo "<th class=\"th_oben\">Zimmer</th>";
			echo "<th class=\"th_oben\">Fläche</th>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<td>$preis €</td>";
			echo "<td>$zimmer</td>";
			echo "<td>$flaeche qm</td>";
		echo "</tr>";
	echo "</table>";
	
	/*Kurzbeschreibung*/
	$beschreibung = $list[0] ["beschreibung"];
	$beschreibung = htmlentities($beschreibung);
	
	echo "<div class=\"beschr\">";
		echo $beschreibung;
	echo "</div>";
	
	/*Ausstattung Küche,Bad,Boden*/
	$ausstattung_kueche = $list[0] ["kueche"];
	$ausstattung_kueche = htmlentities($ausstattung_kueche);
	$ausstattung_bad = $list[0] ["bad"];
	$ausstattung_bad = htmlentities($ausstattung_bad);
	$austattung_boden = $list[0] ["boden"];
	$ausstattung_boden = htmlentities($ausstattung_boden);
	
	echo "<table class=\"table_unten\">";
		if($ausstattung_kueche !='')
		{
		echo "<tr>";
			echo "<th>Küche</th>";
			echo "<td>$ausstattung_kueche</td>";
		echo "</tr>";
		}
		
		if($ausstattung_bad !='')
		{
		echo "<tr>";
			echo "<th>Bad</th>";
			echo "<td>$ausstattung_bad</td>";
		echo "</tr>";
		}
		
		if($ausstattung_boden !='')
		{
		echo "<tr>";
			echo "<th>Boden</th>";
			echo "<td>$ausstattung_boden</td>";
		echo "</tr>";
		}
	echo "</table>";
	
	/*Energieausweis,Heizungsart,Restaurierung,*/
	$energie = $list[0] ["energieausweis"];
	$energie = htmlentities($energie);
	$heizung = $list[0] ["heizung"];
	$heizung = htmlentities($heizung);
	$restaurierung = $list[0] ["restaurierung"];
	$restaurierung = htmlentities($restaurierung);
	
	echo "<table class=\"table_unten\">";
		if($energie !='')
		{
		echo "<tr>";
			echo "<th>Energieausweis</th>";
			echo "<td>$energie</td>";
		echo "</tr>";
		}
		
		if($heizung !='')
		{
		echo "<tr>";
			echo "<th>Heizung</th>";
			echo "<td>$heizung</td>";
		echo "</tr>";
		}
		
		if($restaurierung !='')
		{
		echo "<tr>";
			echo "<th>Restaurierung</th>";
			echo "<td>$restaurierung</td>";
		echo "</tr>";
		}
	echo "</table>";
	
	
	/*Kalt,Warm,Kaution*/
	$kalt = $list[0] ["kalt"];
	$kalt = htmlentities($kalt);
	$warm = $list[0] ["warm"];
	$warm = htmlentities($warm);
	$kaution = $list[0] ["kaution"];
	$kaution = htmlentities($kaution);
	
	echo "<table class=\"table_unten\">";
		if($kalt !='')
		{
		echo "<tr>";
			echo "<th>Kaltmiete</th>";
			echo "<td>$kalt</td>";
		echo "</tr>";
		}
		
		if($warm !='')
		{
		echo "<tr>";
			echo "<th>Warmmiete</th>";
			echo "<td>$warm</td>";
		echo "</tr>";
		}
		
		if($kaution !='')
		{
		echo "<tr>";
			echo "<th>Kaution</th>";
			echo "<td>$kaution</td>";
		echo "</tr>";
		}
	echo "</table>";
	/*etage, garage*/
	
	$etage = $list[0] ["etage"];
	$etage = htmlentities($etage);
	$garage = $list[0] ["garage"];
	$garage = htmlentities($garage);
	$sonstiges = $list[0] ["sonstiges"];
	$sonstiges = htmlentities($sonstiges);
	echo "<table class=\"table_unten\">";
		if($etage !='')
		{
		echo "<tr>";
			echo "<th>Etage</th>";
			echo "<td>$etage</td>";
		echo "</tr>";
		}
		
		if($garage !='')
		{
		echo "<tr>";
			echo "<th>Garage</th>";
			echo "<td>$garage</td>";
		echo "</tr>";
		}
		
		if($sonstiges !='')
		{
		echo "<tr>";
			echo "<th>Sonstiges</th>";
			echo "<td>$sonstiges</td>";
		echo "</tr>";
		}
	echo "</table>";

	echo "<form action=\"main_haka_kontakt.html\" method=\"POST\">";
		echo "<input style=\"background-color:orange\" type=\"submit\" value=\" &#9993 Nachricht senden\" />";
	echo "</form>";
		
		mysql_close();
		}










else 
{
	echo "Fehler, keine Datenverbindung!";
}



?>
