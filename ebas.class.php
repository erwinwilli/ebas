<?php

class ebas{

  public $session;
  public $user;
  public $kurse;
  public $anmeldungen;
  public $interessenten;
  public $db;

  const SERVER = "localhost";
  const USER = "edit";
  const PASSWORD = "ed1t";
  const DATABASE = "ebas";

  public function __construct(){
    $this->session = new session($this);
    $this->user = new user($this);
    $this->kurse = new kurse($this);
    $this->anmeldungen = new anmeldungen($this);
    $this->interessenten = new interessenten($this);
    $this->db = new mysqli(self::SERVER, self::USER, self::PASSWORD, self::DATABASE);
    $this->db->set_charset("utf8");
    if ($this->db->connect_errno) {
      echo "Failed to connect to MySQL: (" . $this->db->connect_errno . ") " . $this->db->connect_error;
      echo $this->db->host_info . "\n";
    }
  }

}

class session{

  public $ebas;

  public function __construct($ebas){
    $this->ebas = $ebas;
  }

  function check(){
    session_start();
    if (!$_SESSION["user"]){
      // User not logged in, redirect to login page
      Header("Location: login.php");
    }
  }

}

class kurse {

  public $ebas;

  public function __construct($ebas){
    $this->ebas = $ebas;
  }

  public function getAlleKurse(){
    $SQL = "SELECT * FROM `tbl_kurse_2014_2` ORDER BY 'bezeichnung_de' ASC";
    /* Select queries return a resultset */
    if ($result = $this->ebas->db->query($SQL)) {
        printf("Select returned %d rows.\n", $result->num_rows);
        while($row = $result->fetch_assoc()){
            $kurse[] = $row;
        }
        /* free result set */
        $result->close();
    }

    return $kurse;

  }

  public function getKurs($id){
    $SQL = "SELECT kurs_id, bezeichnung_de, bezeichnung_fr, bezeichnung_it, bezeichnung_en, sortierung, sprache, max_teilnehmer, max_teilnehmer_PF, kursort, datum FROM `tbl_kurse_2014_2` WHERE kurs_id = ? ORDER BY bezeichnung_de ASC";
    if ($stmt = $this->ebas->db->prepare($SQL)) {

      /* bind parameters for markers */
      $stmt->bind_param("i", $id);

      /* execute query */
      $stmt->execute();

      /* bind result */
      $stmt->bind_result($id, $bezeichnung_de, $bezeichnung_fr, $bezeichnung_it, $bezeichnung_en, $sortierung, $sprache, $max_teilnehmer, $max_teilnehmer_PF, $kursort, $datum);

      // Daten zuweisen
      while ($stmt->fetch()) {
        $kurse[] = array(
          'kurs_id' => $id,
          'bezeichnung_de' => $bezeichnung_de,
          'sprache' => $sprache,
          'kursort' => $kursort,
          'max_teilnehmer' => $max_teilnehmer,
          'max_teilnehmer_PF' => $max_teilnehmer_PF,
          'datum' => $datum
        );
      }

      // Schliessen
      $stmt->close();
      return $kurse;
    }

  }

  public function searchKurse($k){

  $k = preg_replace("/[^a-zA-Z0-9-öäüÖÄÜéàèÉÀÈÂâ]+/", "", $k);
  $SQL = "SELECT kurs_id, bezeichnung_de, sortierung, sprache, max_teilnehmer, max_teilnehmer_PF, kursort, datum
   FROM `tbl_anmeldungen_2014_2`
   WHERE bezeichnung_de LIKE '%$k%' OR sprache LIKE '%$k%' OR kursort LIKE '%$k%' OR datum LIKE '%$k%' ORDER BY ort ASC";
  /* Select queries return a resultset */
  if ($result = $this->ebas->db->query($SQL)) {
    $kurse = array();
      while($row = $result->fetch_assoc()){
          $kurse[] = $row;
      }
      /* free result set */
      $result->close();
  }else {
    $kurse = array();
  }
  return $kurse;
}

  public function updateKurs($id){

  }

}

class anmeldungen {

  public $ebas;

  public function __construct($ebas){
    $this->ebas = $ebas;
  }

  public function getAlleAnmeldungen(){
    $SQL = "SELECT * FROM 'tbl_anmeldungen_2014_2' ORDER BY name ASC";
    /* Select queries return a resultset */
    if ($result = $this->ebas->db->query($SQL)) {
        printf("Select returned %d rows.\n", $result->num_rows);
        while($row = $result->fetch_assoc()){
            $anmeldungen [] = $row;
        }
        /* free result set */
        $result->close();
    }
  }
  //Start MVG 25.11.14
  public function getUser($id){
      $SQL = "SELECT anmeldung_id, kurs, gutschein, name, vorname, adresse, plz, ort, email, sprache, zeit
      FROM `tbl_anmeldungen_2014_2`
      WHERE anmeldung_id = ? ";
      if ($stmt = $this->ebas->db->prepare($SQL)) {

        /* bind parameters for markers */
        $stmt->bind_param("i", $id);

        /* execute query */
        $stmt->execute();

        /* bind result */
        $stmt->bind_result($id, $kurs, $gutschein, $name, $vorname, $adresse, $plz, $ort, $email, $sprache, $zeit);

        // Daten zuweisen
        while ($stmt->fetch()) {
          $anmeldungen[] = array(
            'anmeldung_id' => $id,
            'kurs' => $kurs,
            'gutschein' => $gutschein,
            'name' => $name,
            'vorname' => $vorname,
            'adresse' => $adresse,
            'plz' => $plz,
            'ort' => $ort,
            'email' => $email,
            'sprache' => $sprache,
            'zeit' => $zeit
          );
        }

        // Schliessen
        $stmt->close();
        return $anmeldungen;
      }
  }
  //Ende MvG
  public function getAnmeldungen($id){
      $SQL = "SELECT anmeldung_id, kurs, gutschein, name, vorname, adresse, plz, ort, email, sprache, zeit
      FROM `tbl_anmeldungen_2014_2`
      WHERE kurs = ? ORDER BY name ASC";
      if ($stmt = $this->ebas->db->prepare($SQL)) {

        /* bind parameters for markers */
        $stmt->bind_param("i", $id);

        /* execute query */
        $stmt->execute();

        /* bind result */
        $stmt->bind_result($id, $kurs, $gutschein, $name, $vorname, $adresse, $plz, $ort, $email, $sprache, $zeit);

        // Daten zuweisen
        while ($stmt->fetch()) {
          $anmeldungen[] = array(
            'anmeldung_id' => $id,
            'kurs' => $kurs,
            'gutschein' => $gutschein,
            'name' => $name,
            'vorname' => $vorname,
            'adresse' => $adresse,
            'plz' => $plz,
            'ort' => $ort,
            'email' => $email,
            'sprache' => $sprache,
            'zeit' => $zeit
          );
        }

        // Schliessen
        $stmt->close();
        return $anmeldungen;
      }
  }

  public function searchAnmeldungen($q){
    if(filter_var($q, FILTER_VALIDATE_EMAIL)){
      $email = $q;
    }else{
      $email = 'FALSE';
    }
    $q = preg_replace("/[^a-zA-Z0-9-öäüÖÄÜéàèÉÀÈÂâ]+/", "", $q);
    $SQL = "SELECT anmeldung_id, kurs, gutschein, name, vorname, adresse, plz, ort, email, zeit
     FROM `tbl_anmeldungen_2014_2`
     WHERE name LIKE '%$q%' OR vorname LIKE '%$q%' OR adresse LIKE '%$q%' OR plz LIKE '%$q%' OR ort LIKE '%$q%' OR email LIKE '%$email%'
     UNION
     SELECT interessent_id, name, vorname, adresse, plz, ort, email, kursort, sprache, zeit
     FROM `tbl_interessenten_2014_2`
     WHERE name LIKE '%$q%' OR vorname LIKE '%$q%' OR adresse LIKE '%$q%' OR plz LIKE '%$q%' OR ort LIKE '%$q%' OR email LIKE '%$email%' OR kursort LIKE '%$q%'
     ORDER BY name ASC";
    /* Select queries return a resultset */
    if ($result = $this->ebas->db->query($SQL)) {
      $anmeldungen = array();
        while($row = $result->fetch_assoc()){
            $anmeldungen[] = $row;
        }
        /* free result set */
        $result->close();
    }else {
      $anmeldungen = array();
    }
    return $anmeldungen;
  }

  public function updateAnmeldungen($data,$id){
    $SQL = "UPDATE ebas.tbl_anmeldungen_2014_2 SET kurs ='".$data['kurs']."',name ='".$data['name']."',vorname ='".$data['vorname'].
    "',adresse ='".$data['adresse']."',plz ='".$data['plz']."',ort='".$data['ort']."',email='".$data['email'].
    "',sprache='".$data['sprache']."',gutschein='".$data['gutschein'].
    "' WHERE tbl_anmeldungen_2014_2.anmeldung_id =".$id;
    $this->ebas->db->query($SQL);
  }

  public function neueAnmeldung($data){
    if (!empty($data)){
    $SQL = "INSERT INTO ebas.tbl_anmeldungen_2014_2 (kurs, gutschein, name, vorname, adresse, plz, ort, email, sprache)
    VALUES
    ("."'".$data['kurs']."'".", "."'".$data['gutschein']."'".", "."'".$data['name']."'".", "."'".$data['vorname']."'".", "."'".$data['adresse']."'"
    .", "."'".$data['plz']."'".", "."'".$data['ort']."'".", "."'".$data['email']."'".", "."'".$data['sprache']."'".")";
    $this->ebas->db->query($SQL);
    }
  }
}

class interessenten {

  public $ebas;

  public function __construct($ebas){
    $this->ebas = $ebas;
  }

  public function getAlleInteressenten(){
    $SQL = "SELECT * FROM 'tbl_interessenten_2014_2' ORDER BY 'name' ASC";
    /* Select queries return a resultset */
    if ($result = $this->ebas->db->query($SQL)) {
        printf("Select returned %d rows.\n", $result->num_rows);
        while($row = $result->fetch_assoc()){
            $interessenten[] = $row;
        }
        /* free result set */
        $result->close();
    }

    return $interessenten;
  }

  public function getInteressent($id){
    $SQL = "SELECT interessent_id, name, vorname, adresse, plz, ort, email, kursort, sprache, zeit FROM `tbl_interessenten_2014_2` WHERE interessent = ? ORDER BY name ASC";
    if ($stmt = $this->ebas->db->prepare($SQL)) {

      /* bind parameters for markers */
      $stmt->bind_param("i", $id);

      /* execute query */
      $stmt->execute();

      /* bind result */
      $stmt->bind_result($id, $name, $vorname, $adresse, $plz, $ort, $email, $kursort, $sprache, $zeit);

      // Daten zuweisen
      while ($stmt->fetch()) {
        $interessenten[] = array(
          'interessent_id' => $id,
          'name' => $name,
          'vorname' => $vorname,
          'adresse' => $adresse,
          'plz' => $plz,
          'ort' => $ort,
          'email' => $email,
          'kursort' => $kursort,
          'sprache' => $sprache,
          'zeit' => $zeit
        );

        // Schliessen
        $stmt->close();
        return $interessent;
      }
    }
  }

  public function updateInteressent($id){

  }

  public function interessentToAnmeldung($id){

  }

}

class user {

  public $ebas;

  public function __construct($ebas){
    $this->ebas = $ebas;
  }

  public $name;
  public $role;

  public function getUser($id){

  }

}

/*

// every php is only accessable with a valid session

// returns array with json data
function getConfig(){
  $JsonData = file_get_contents("config.json");
  $Config = json_decode($JsonData,true);
  return $Config;
}
// returns db connect object
?>




<?php
// returns html table
function getTable($view){
  $conn = DBConnect();
  $Config = getConfig();
  $sql = "";
  $tables = $Config["tables"];
  foreach ($tables as $table) {
    // create sql query for selected table
    if($table["name"] == $view){
      if(array_key_exists('options', $table)){
        $options=$table["options"];
      }else{
        $options="";
      }
      if(!(substr_count($options, 'hide') > 0)){
      if(!(substr_count($options, 'adminonly') > 0) || ($_SESSION["isadmin"]==1)){
        // sql query start
        $sql = $table["sqlstart"];
        $fields = $table["fields"];
        // cycle through fields of the table
        foreach ($fields as $field){
          // check if the field contains a dropdown, execute the statement and save the result for the datatable
          // change the header of the field
          $sql = $sql.$field["sqlname"]." AS '".$field["name"]."'";
          // seperate the definitons with commas
          if($fields[count($fields) - 1]["name"] != $field["name"]){
            $sql = $sql.", ";
          }
        };
        // finish the sql statement
        $sql = $sql.$table["sqlend"];
      }}
    }
  }
  $result = mysqli_query($conn, $sql);
  if(! $result ){
    die('Could not get data: ' . mysql_error());
  }
  $i = 0;
  $i2 = 0;
  // set headers for datatable
  foreach ($fields as $field){
    $data[$i][$i2] = utf8_encode($field["name"]);
    ++$i2;
  }
  ++$i;
  // set content for datatable
  while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
    $i3 = 0;
    // get the mysql data foreach row and header
    foreach ($fields as $field){
      $fieldname = $field["sqlname"];
      // if the field is part of the dropdown query output the content as <select><option>
      $data[$i][$i3] = utf8_encode($row[$field["name"]]);
      ++$i3;
    }
    ++$i;
  }
  return $data;
  mysqli_close($conn);
}*/
?>
