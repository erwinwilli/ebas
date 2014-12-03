<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once 'ebas.class.php';
require_once 'session.php';
if(isset($_POST) && !empty($_POST)){
  //Ändern Kurs
  if($_POST['sub']=="Speichern"){
    $ebas->kurse->updateKurs($_POST,$_GET["kurs_id"]);
    header('Location: '."kurse-bearbeiten.php?kurs=".$_POST["kurs"]);
  //Kurs löschen
  }elseif($_POST['sub']=="Löschen"){
      $ebas->kurse->deleteKurs($_GET["kurs_id"]);
      header('Location: '."kurse-bearbeiten-liste.php");
  }
}
//check Role
if($ebas->user->role > 1){
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
require_once 'header.php';
?>
<div class="page-header">
  <h2>Kurs bearbeiten</h2>
</div>
<div class="row">
    <div class="kurs col-md-12">
    <?php


      //if(!is_numeric($_GET["kurs_id"])){
      //  die();
     // }
		 
		
      if (isset($_GET["kurs"])){
		; 
		$kurse = $ebas->kurse->getKurs($_GET["kurs"]);
		
      }
      ?>
      <form method="POST" action="#">
      <table class="max-width-table table table-striped">
      <thead>
        <tr>
        <tr>
          <th>Kurs</th>
        </tr>
      </thead>
      <tbody>

       <?php
	   
	   foreach($kurse as $kurs){ ?>
		
        <tr>
          <th>Kurs Bezeichnung DE </th>
        </tr>
          <tr>
			<td><input type="text" name="name" value='<?=  $kurs["bezeichnung_de"] ?>' ></td>
          </tr>
        <tr>
          <th>Kurs Bezeichnung FR</th>
        </tr>
          <tr>
            <td><input type="text" name="name" value='<?= $kurs["bezeichnung_fr"] ?>' ></td>
          </tr>
        <tr>
          <th>Kurs Bezeichnung IT</th>
        </tr>
          <tr>
            <td><input type="text" name="vorname" value='<?= $kurs["bezeichnung_it"] ?>' ></td>
          </tr>
        <tr>
          <th>Kurs Bezeichnung ENG</th>
        </tr>
        <tr>
			<td><input type="text" name="adresse" value='<?= $kurs["bezeichnung_en"] ?>'	 ></td>
        </tr>
        <tr>
          <th>Sortierung</th>
        </tr>
        <tr>
			<td><input type="text" name="plz" value=<?= $kurs["sortierung"] ?> ></td>
		</tr>
		<tr>
			<th>Sprache</th>
        </tr>
            <tr>
              <td><input type="text" name="kursort" value=<?= $kurs["sprache"] ?> ></td>
            </tr>
        <tr>
          <th>max. Teilnehmer</th>
        </tr>
          <tr>
            <td><input type="text" name="ort" value=<?= $kurs["max_teilnehmer"] ?> ></td>
          </tr>
        <tr>
          <th>max. Teilnehmer PF</th>
        </tr>
          <tr>
            <td><input type="text" name="email" value=<?= $kurs["max_teilnehmer_PF"] ?> ></td>
          </tr>
        <tr>
          <th>Kursort</th>
        </tr>
          <tr>
            <td><input type="text" name="sprache" value=<?= $kurs["kursort"] ?> ></td>
          </tr>
          <tr>
            <th>Datum</th>
          </tr>
            <tr>
              <td><input type="text" name="kursort" value=<?= $kurs["datum"] ?> ></td>
            </tr>
        
        <?php } ?>

      </tbody>
    </table>
    <input class="btn btn-primary" type="submit" name="sub" value="Speichern">
    <input class="btn btn-danger" type="submit" name="sub" value="Löschen">
  </form>
     </div>
</div>
<?php

require_once 'footer.php';

?>
