<?php

class ebas{

  public $session;
  public $user;
  public $kurse;
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
    $this->interessenten = new interessenten($this);
    $this->db = new mysqli(self::SERVER, self::USER, self::PASSWORD, self::DATABASE);
    $this->db->set_charset("utf8");
    if ($this->db->connect_errno) {
      echo "Failed to connect to MySQL: (" . $this->db->connect_errno . ") " . $this->db->connect_error;
    }
    echo $this->db->host_info . "\n";
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
    $SQL = "SELECT * FROM `tbl_kurse_2014_2` ORDER BY 'bezeichnung_it' ASC";
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
    $SQL = "SELECT * FROM `tbl_kurse_2014_2` ORDER BY 'bezeichnung_it' ASC";
    if ($stmt = $this->ebas->db->prepare($SQL)) {

      /* bind parameters for markers */
      $stmt->bind_param("s", $cit, $stringy);

      /* execute query */
      $stmt->execute();

      // Daten zuweisen
      $kurse = $res->fetch_all();

      // Schliessen
      $stmt->close();

      return $kurse;

    }

  }

  public function updateKurs($id){

  }

  public function getAnmeldungen($id){

  }

  public function updateAnmeldungen($id){

  }

}

class interessenten {

  public $ebas;

  public function __construct($ebas){
    $this->ebas = $ebas;
  }

  public function getAlleInteressenten(){

  }

  public function getInteressent($id){

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
