<?php

$dbaccess = NULL;

function getDBAccess() {
  global $dbaccess;
  if ($dbaccess == NULL) {
    $dbaccess = file_get_contents(dirname(__FILE__)."/../dbaccess.txt");
    $dbaccess = trim($dbaccess);
  }
  return $dbaccess;
}

class DBQuery {
  public $stmt;
  private $conn;

  public function __construct($db_pwd, $query_str, $dbname = "haka_wohnen") {
    $servername = "localhost";
    $username = "webserver";

    // Create connection
    $conn = new mysqli($servername, $username, $db_pwd, $dbname);
    if ($conn->connect_error) {
      throw new Exception('Failed to connect to DB: '+$conn->connect_error);
    }
    mysqli_set_charset($conn,"utf8");

    // init and prepare
    $stmt = $conn->stmt_init();
    $stmt->prepare($query_str);

    $this->stmt = $stmt;
    $this->conn = $conn;
  }

  public function close() {
    $this->stmt->close();
    $this->conn->close();
  }
}

class Angebot {
  private $data_names = array("Name","Fläche","Zimmer","Etage",
                              "Zustand","Frei ab","Fussboden","Heizungsart",
                              "Energieeffizienz","Fenster","Bad","Parken",
                              "Sonstiges","Lagebeschreibung","Miete","Nebenkosten"
                            );
  private $data_units = array("","m²","","","","","","","","","","","","","","€","€");
  private $data;

  public function __construct($db_table_row) {
    $this->data = array();
    foreach ($db_table_row as $value) {
      array_push($this->data, $value);
    }
  }

  public function getName() {
    return htmlentities($this->data[0]);
  }

  public function detailsToHtml() {
    $result = "";
    for ($i = 1; ($i < count($this->data_names))
                  && ($i < count($this->data)) && ($i < count($this->data_units)); $i++) {
      $value = "";
      if (is_numeric($this->data[$i])) {
        $value = round($this->data[$i],2);
      } else {
        $value = htmlentities($this->data[$i]);
        if ($this->data_names[$i] == "Etage") {
          $pdf = "";
          if (strpos($value,'EG') !== false) {
            $pdf = "data/Erdgeschoss.pdf";
          } else if (strpos($value,'OG') !== false) {
            $pdf = "data/1.Obergeschoss.pdf";
          } else if (strpos($value,'DG') !== false) {
            $pdf = "data/2.Obergeschoss.pdf";
          }
          $value .= " (<a href=\"$pdf\" target=\"_blank\">Grundriss als PDF)</a>";
        }
      }
      $result .= "<tr><th>".$this->data_names[$i].":</th><td>".$value." ".$this->data_units[$i]."</td></tr>".PHP_EOL;
    }
    return $result;
  }
}

function queryAngebote() {
  $query = null;
  try {
    $query = new DBQuery(getDBAccess(),
      // using * includes the ids, so we go for this ugly long query...
      "SELECT name,flaeche,zimmer,etage,zustand,frei_ab,fussboden,heizungsart,energieeffizienz,fenster,bad,parken,sonstiges,Lagen.beschreibung,kaltmiete,nebenkosten"
      ." FROM Angebote INNER JOIN Lagen ON Angebote.lage=Lagen._id",
      "haka_wohnen"
    );
  } catch (Exception $e) {
    // do NOT show the error to the web!
    return False;
  }
  //$query->stmt->bind_param("i", $id); prepared statememt example
  $query->stmt->execute();
  $result = $query->stmt->get_result();

  $angebote = array();
  while ($row = $result->fetch_assoc()) {
    array_push($angebote, new Angebot($row));
  }

  $query->close();
  return $angebote;
}

function angeboteToHtml() {
  $angebote = queryAngebote();
  
  $html = "";
  foreach ($angebote as $angebot) {
	  $html .= "<div class=\"angebot\">".PHP_EOL;
    $html .= "<h1>".$angebot->getName()."</h1>".PHP_EOL;
    $html .= "<table>".PHP_EOL.$angebot->detailsToHtml()."</table>".PHP_EOL;
    $html .= "</div>".PHP_EOL.PHP_EOL;
  }

  return $html;
}

echo angeboteToHtml();
?>
