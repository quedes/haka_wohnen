<?php

if (isset($_GET["pam"]))
{
	$pam = $_GET["pam"];
}

else
{
	$pam = "1";
}

/* Verbindung zum Server*/
		
$db = mysql_connect("","","");
mysql_set_charset("utf8", $db);
if($db)
{
	
	mysql_select_db("");
	
	$abfrage = "SELECT * FROM haka_wohnen WHERE ind = '$pam'";
	$ergebnis = mysql_query($abfrage);
	
	/* Ablegen in ein Array*/
	$list = array();
	
	while($row = mysql_fetch_array($ergebnis))
	{
	/* Ablegen in Array*/
		$list[] = $row;
	}
	
	/*Bilder für Slideshow*/
	$pic = $list[0] ["wohnung"];
	
	$picone = "pic/" . $pic . "_one" . ".png";
	
	echo "<div>";
		if (file_exists($picone))
			{	
			echo "<img src=\"$picone\" style=\"width:100%; height:100%;\">";
			}
			
			else
			{
				echo $picone;
			}
			
	echo "</div>";
	/*Preis,Zimmer, Fläche*/
	$preis = $list[0] ["preis"];
	$zimmer = $list[0] ["zimmer"];
	$flaeche = $list[0] ["flaeche"];
	
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
	
	echo "<div class=\"beschr\">";
		echo $beschreibung;
	echo "</div>";
	
	/*Ausstattung Küche,Bad,Boden*/
	$austattung_kueche = $list[0] ["kueche"];
	$austattung_bad = $list[0] ["bad"];
	$austattung_boden = $list[0] ["boden"];
	
	echo "<table class=\"table_unten\">";
		echo "<tr>";
			echo "<th class=\"th_unten\">Küche</th>";
			echo "<td>$austattung_kueche</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<th class=\"th_unten\">Bad</th>";
			echo "<td>$austattung_bad</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<th class=\"th_unten\">Boden</th>";
			echo "<td>$austattung_boden</td>";
		echo "</tr>";
	echo "</table>";
	
	/*Energieausweis,Heizungsart,Restaurierung,*/
	$energie = $list[0] ["energieausweis"];
	$heizung = $list[0] ["heizung"];
	$restaurierung = $list[0] ["restaurierung"];
	
	echo "<table class=\"table_unten\">";
	/*echo "<caption>Zustand</caption>";*/
		echo "<tr>";
			echo "<th class=\"th_unten\">Energieausweis</th>";
			echo "<td>$energie</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<th class=\"th_unten\">Heizung</th>";
			echo "<td>$heizung</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<th class=\"th_unten\">Restaurierung</th>";
			echo "<td>$restaurierung</td>";
		echo "</tr>";
	echo "</table>";
	
	
	/*Kalt,Warm,Kaution*/
	$kalte = $list[0] ["kalt"];
	$warm = $list[0] ["warm"];
	$kaution = $list[0] ["kaution"];
	
	echo "<table class=\"table_unten\">";
		echo "<tr>";
			echo "<th class=\"th_unten\">Kaltmiete</th>";
			echo "<td>$kalte</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<th class=\"th_unten\">Nebenkosten</th>";
			echo "<td>$warm</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<th class=\"th_unten\">Kaution</th>";
			echo "<td>$kaution</td>";
		echo "</tr>";
	echo "</table>";
	/*etage, garage*/
	
	$etage = $list[0] ["etage"];
	$garage = $list[0] ["garage"];
	
	echo "<table class=\"table_unten\">";
		echo "<tr>";
			echo "<th class=\"th_unten\">Etage</th>";
			echo "<td>$etage</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<th class=\"th_unten\">Garage/Stellplatz</th>";
			echo "<td>$garage</td>";
		echo "</tr>";
		
		echo "<tr>";
			echo "<th class=\"th_unten\">Sonstiges</th>";
			echo "<td></td>";
		echo "</tr>";
	echo "</table>";

	echo "<form action=\"main_haka_kontakt.html\" method=\"POST\">";
		echo "<input style=\"background-color:orange\" type=\"submit\" value=\" &#9993 Nachricht senden\" />";
	echo "</form>";
		
		}










else 
{
	echo "Fehler, keine Datenverbindung!";
}

?>
