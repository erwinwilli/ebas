<?php
error_reporting( E_ALL );
ini_set('display_errors', 'On');
$GLOBALS['strGlobAlleAnmel'] = "*";
$GLOBALS['strGlobAlleintre'] = "*";

//Hauptklasse Ebas; Zugriff auf DB
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

// Session Handling
class session{

  public $ebas;

  public function __construct($ebas){
    $this->ebas = $ebas;
  }

  //Session authentification
  public function set($username,$password){
    $password = hash('sha256', $password);
    $SQL = "SELECT username_id, role FROM tbl_login_2014_2 WHERE username = ? AND password = ?";
    if ($stmt = $this->ebas->db->prepare($SQL)) {

      /* bind parameters for markers */
      $stmt->bind_param("ss", $username, $password);

      /* execute query */
      $stmt->execute();

      $stmt->store_result();

      if($stmt->num_rows){
        /* bind result */
        $stmt->bind_result($id, $role);

        // Daten zuweisen
        while ($stmt->fetch()) {
          $userRole = $role;
          $userID = $id;
        }

        $this->ebas->user->name = $username;
        $this->ebas->user->role = $userRole;
        $this->ebas->user->id = $userID;

        //Token erstellen für Session
        $session = $this->rand_char(255);
        setcookie("session",$session,time()+(90*24*60*60));
        setcookie("user",$userID,time()+(90*24*60*60));
        $SQL = "INSERT INTO tbl_session_2014_2 (session_value,session_active,session_expire,session_user)
        VALUES('$session',1,NOW() + INTERVAL 90 DAY,$userID)";
        $this->ebas->db->query($SQL);
        return TRUE;
      }

    /* Select queries return a resultset */
    /*if ($result = $this->ebas->db->query($SQL)) {
      if($result->num_rows){
        while($row = $result->fetch_assoc()){
            $role = $row["role"];
            $userID = $row["username_id"];
        }
        /* free result set
        $result->close();

        $this->ebas->user->name = $username;
        $this->ebas->user->role = $role;
        $this->ebas->user->id = $userID;

        //Token erstellen für Session
        $session = $this->rand_char(255);
        setcookie("session",$session,time()+(90*24*60*60));
        setcookie("user",$userID,time()+(90*24*60*60));
        $SQL = "INSERT INTO tbl_session_2014_2 (session_value,session_active,session_expire,session_user)
        VALUES('$session',1,NOW() + INTERVAL 90 DAY,$userID)";
        $this->ebas->db->query($SQL);
        return TRUE;*
      }*/
    }else{
      echo "TEST";
      echo $stmt->error;
      return FALSE;
    }

  }
  //session Eintrag DB löschen
  public function delete($hash){
    setcookie("session","_",time()-1);
    setcookie("user","_",time()-1);
    $SQL = "UPDATE tbl_session_2014_2
            SET session_active=0
            WHERE session_value='$hash'";
    $this->ebas->db->query($SQL);
  }

  //Session überprüfen
  public function validate($hash,$id){
    $SQL = "SELECT * FROM tbl_session_2014_2 WHERE '$hash' = session_value AND '$id' = session_user";

    /* Select queries return a resultset */
    if ($result = $this->ebas->db->query($SQL)) {
        while($row = $result->fetch_assoc()){
            $id = $row["session_id"];
            $value = $row["session_value"];
            $active = $row["session_active"];
            $expire = $row["session_expire"];
            $user = $row["session_user"];
        }
        /* free result set */
        $result->close();

        //löschen expired Cookies
        if($active == 1){
          $datetime1 = date_create(date('Y-m-d'));
          $datetime2 = date_create($expire);
          $interval = date_diff($datetime1, $datetime2);
          if($interval->format("%R%a") <= 0){
            setcookie("session","_",time()-1);
            setcookie("user","_",time()-1);
            $SQL = "UPDATE tbl_session_2014_2
                    SET session_active=0
                    WHERE session_id='$id'";
            $this->ebas->db->query($SQL);
            return FALSE;
          }
        }else{
          return FALSE;
        }


        $SQL = "SELECT * FROM tbl_login_2014_2 WHERE '$user' = username_id";

        /* Select queries return a resultset */
        if ($result = $this->ebas->db->query($SQL)) {
            while($row = $result->fetch_assoc()){
                $role = $row["role"];
                $username = $row["username"];
            }
        }
        $this->ebas->user->name = $username;
        $this->ebas->user->role = $role;
        $this->ebas->user->id = $id;
        return TRUE;
    }else{
      return FALSE;
    }
  }

  private function rand_char($length) {
    $random = '';
    for ($i = 0; $i < $length; $i++) {
      $random .= chr(mt_rand(64, 95));
    }
    return $random;
  }

}

//user für Login Details
class user {

  public $ebas;
  public $name;
  public $role;
  public $id;

  public function __construct($ebas){
    $this->ebas = $ebas;
  }

}

//Details für Zugriffe auf Tabelle tbl_kurse_2014_2
class kurse {

  public $ebas;

  public function __construct($ebas){
    $this->ebas = $ebas;
  }

  public function getAlleKurse(){
    $SQL = "SELECT * FROM `tbl_kurse_2014_2` ORDER BY `tbl_kurse_2014_2`.`datum` ASC";
    /* Select queries return a resultset */
    if ($result = $this->ebas->db->query($SQL)) {
        while($row = $result->fetch_assoc()){
            $kurse[] = $row;
        }
        /* free result set */
        $result->close();
    }
    //Anzahl User für Kurs
    foreach($kurse as &$kurs){
      $SQL = "SELECT count(*) AS count FROM `tbl_anmeldungen_2014_2` WHERE
      ".$kurs['kurs_id']." = kurs";
       if ($result = $this->ebas->db->query($SQL)) {
           while($row = $result->fetch_assoc()){
               $kurs['count'] = $row['count'];
           }
           /* free result set */
           $result->close();
       }
    }

    return $kurse;

  }

  public function getAlleAktuellenKurse(){
    $SQL = "SELECT * FROM `tbl_kurse_2014_2` WHERE `datum`>= Curdate() ORDER BY `tbl_kurse_2014_2`.`datum` ASC";
    /* Select queries return a resultset */
  if ($result = $this->ebas->db->query($SQL)) {
      while($row = $result->fetch_assoc()){
          $kurse[] = $row;
      }
      /* free result set */
      $result->close();
  }
  //Anzahl User für Kurs
  foreach($kurse as &$kurs){
    $SQL = "SELECT count(*) AS count FROM `tbl_anmeldungen_2014_2` WHERE
    ".$kurs['kurs_id']." = kurs";
     if ($result = $this->ebas->db->query($SQL)) {
         while($row = $result->fetch_assoc()){
             $kurs['count'] = $row['count'];
         }
         /* free result set */
         $result->close();
     }
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
//Details für Zugriffe auf Tabelle tbl_anmeldungen_2014_2
class anmeldungen {

  public $ebas;

  public function __construct($ebas){
    $this->ebas = $ebas;
  }

  public function getAlleAnmeldungen(){
    $SQL = "SELECT * FROM  `tbl_anmeldungen_2014_2` ORDER BY name ASC";
    /* Select queries return a resultset */
    if ($result = $this->ebas->db->query($SQL)) {
        while($row = $result->fetch_assoc()){
            $anmeldungen [] = $row;
        }
        /* free result set */
        $result->close();
    }
    return $anmeldungen;
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
          return @$anmeldungen;
        }
  }

  public function searchAnmeldungen($q){
    //Eingabe Filtern
    if(filter_var($q, FILTER_VALIDATE_EMAIL)){
      $email = $q;
    }else{
      $email = 'FALSE';
    }
    $q = preg_replace("/[^a-zA-Z0-9-öäüÖÄÜéàèÉÀÈÂâ]+/", "", $q);
    //SQL Statement
    $SQL = "SELECT anmeldung_id, kurs, gutschein, name, vorname, adresse, plz, ort, email, zeit
     FROM `tbl_anmeldungen_2014_2`
     WHERE name LIKE '%$q%' OR vorname LIKE '%$q%' OR adresse LIKE '%$q%' OR plz LIKE '%$q%' OR ort LIKE '%$q%' OR email LIKE '%$email%'  OR kurs LIKE '%$q%'
     ORDER BY name ASC";

    /* Select queries return a resultset */
    if($result = $this->ebas->db->query($SQL)){
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
    ("."'".$data['kurs']."'".", "."'".$data['gutschein']."'".", "."'".$data['name']."'".", "."'".$data['vorname']."'".", "."'".$data['plz']."'"
    .", "."'".$data['adresse']."'".", "."'".$data['ort']."'".", "."'".$data['email']."'".", "."'".$data['sprache']."'".")";
    $this->ebas->db->query($SQL);
    }
  }

  public function toInteressent($data, $id){
    if (!empty($data)){
    $SQL = "INSERT INTO ebas.tbl_interessenten_2014_2 (name, vorname, adresse, plz, ort, email, kursort, sprache)
    VALUES
    ("."'".$data['name']."'".", "."'".$data['vorname']."'".", "."'".$data['adresse']."'".", "."'".$data['plz']."'".", "."'".$data['ort']."'"
    .", "."'".$data['email']."'".", "."'".$data['kursort']."'".", "."'".$data['sprache']."'".")";
    $this->ebas->db->query($SQL);

    $SQL2 = "DELETE FROM `ebas`.`tbl_anmeldungen_2014_2` WHERE `tbl_anmeldungen_2014_2`.`anmeldung_id` =".$id;
    $this->ebas->db->query($SQL2);
    }
  }

  public function deleteAnmeldung($id){
    $SQL = "DELETE FROM `ebas`.`tbl_anmeldungen_2014_2` WHERE `tbl_anmeldungen_2014_2`.`anmeldung_id` =".$id;
    $this->ebas->db->query($SQL);
  }
}

class interessenten {

  public $ebas;

  public function __construct($ebas){
    $this->ebas = $ebas;
  }

  public function getAlleInteressenten(){
    $SQL = "SELECT * FROM `tbl_interessenten_2014_2` ORDER BY 'name' ASC";
    /* Select queries return a resultset */
    if ($result = $this->ebas->db->query($SQL)) {
        while($row = $result->fetch_assoc()){
            $interessenten[] = $row;
        }
        /* free result set */
        $result->close();
    }
    return $interessenten;
  }

  public function getInteressenten($id){
    $SQL = "SELECT interessent_id, kurs, name, vorname, adresse, plz, ort, email, kursort, sprache, zeit
    FROM `tbl_interessenten_2014_2`
    WHERE interessent_id = ? ORDER BY name ASC";
    if ($stmt = $this->ebas->db->prepare($SQL)) {

      /* bind parameters for markers */
      $stmt->bind_param("i", $id);

      /* execute query */
      $stmt->execute();

      /* bind result */
      $stmt->bind_result($id, $kurs, $name, $vorname, $adresse, $plz, $ort, $email, $kursort, $sprache, $zeit);

      // Daten zuweisen
      while ($stmt->fetch()) {
        $interessenten[] = array(
          'interessent_id' => $id,
          'kurs' => $kurs,
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
        return $interessenten;
      }
    }
  }
  public function searchInteressenten($q){
    //Eingabe Filtern
    if(filter_var($q, FILTER_VALIDATE_EMAIL)){
      $email = $q;
    }else{
      $email = 'FALSE';
    }
    $q = preg_replace("/[^a-zA-Z0-9-öäüÖÄÜéàèÉÀÈÂâ]+/", "", $q);
    //SQL Statement
    $SQL = "SELECT interessent_id, name, vorname, adresse, plz, ort, email, kursort, sprache, zeit
    FROM `tbl_interessenten_2014_2`
    WHERE name LIKE '%$q%' OR vorname LIKE '%$q%' OR adresse LIKE '%$q%' OR plz LIKE '%$q%' OR ort LIKE '%$q%' OR email LIKE '%$email%' OR kursort LIKE '%$q%'
    ORDER BY name ASC";
   /* Select queries return a resultset */
   if($result = $this->ebas->db->query($SQL)) {
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

  public function updateInteressent($data, $id){
    $SQL = "UPDATE ebas.tbl_interessenten_2014_2 SET name ='".$data['name']."',vorname ='".$data['vorname'].
    "',adresse ='".$data['adresse']."',plz ='".$data['plz']."',ort='".$data['ort']."',email='".$data['email'].
    "',kursort='".$data['kursort']."',sprache='".$data['sprache'].
    "' WHERE tbl_interessenten_2014_2.interessent_id =".$id;
    $this->ebas->db->query($SQL);
  }

  public function deleteInteressent($id){
    $SQL = "DELETE FROM `ebas`.`tbl_interessenten_2014_2` WHERE `tbl_interessenten_2014_2`.`interessent_id` =".$id;
    $this->ebas->db->query($SQL);
  }

  //Bereinigungslauf
  public function bereinigungInteressentenView(){
    $SQL = "SELECT * FROM `tbl_interessenten_2014_2` WHERE email IN (SELECT email FROM `tbl_anmeldungen_2014_2`)";
    /* Select queries return a resultset */
    $interessenten="";
    if ($result = $this->ebas->db->query($SQL)) {
        while($row = $result->fetch_assoc()){
            $interessenten[] = $row;
        }
        /* free result set */
        $result->close();
    }
    return $interessenten;
  }

  public function bereinigungInteressenten(){
    $SQL2 = "DELETE FROM `tbl_interessenten_2014_2` WHERE email IN (SELECT email FROM `tbl_anmeldungen_2014_2`)";
    $this->ebas->db->query($SQL2);
  }
}


?>
