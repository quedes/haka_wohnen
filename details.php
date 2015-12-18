<?php

if (isset($_GET["pam"]))
{
	$pam = mysql_real_escape_string($_GET["pam"]);
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
	/*mysql_select_db("web275_db1");*/
	mysql_select_db("web275_db1");
	
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
	
	$picone = "img/" . $pic . ".jpg";
	
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
		if($austattung_kueche !='')
		{
		echo "<tr>";
			echo "<th>Küche</th>";
			echo "<td>$austattung_kueche</td>";
		echo "</tr>";
		}
		
		if($austattung_bad !='')
		{
		echo "<tr>";
			echo "<th>Bad</th>";
			echo "<td>$austattung_bad</td>";
		echo "</tr>";
		}
		
		if($austattung_boden !='')
		{
		echo "<tr>";
			echo "<th>Boden</th>";
			echo "<td>$austattung_boden</td>";
		echo "</tr>";
		}
	echo "</table>";
	
	/*Energieausweis,Heizungsart,Restaurierung,*/
	$energie = $list[0] ["energieausweis"];
	$heizung = $list[0] ["heizung"];
	$restaurierung = $list[0] ["restaurierung"];
	
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
	$warm = $list[0] ["warm"];
	$kaution = $list[0] ["kaution"];
	
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
	$garage = $list[0] ["garage"];
	$sonstiges = $list[0] ["sonstiges"];
	
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
		
		}










else 
{
	echo "Fehler, keine Datenverbindung!";
}

?>
