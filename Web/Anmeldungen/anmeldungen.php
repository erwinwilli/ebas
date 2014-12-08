<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once '../../ebas.class.php';
require_once '../../session.php';

//check Role
if($ebas->user->role > 0){
  header('Location: '.$loginUrl);
}

if(isset($_POST) && !empty($_POST)){
  //Ändern Anmeldung
  if($_POST['sub']=="Speichern"){
    $ebas->anmeldungen->updateAnmeldungen($_POST,$_GET["anmeldung"]);
    header('Location: '.$webKurseUrl."kurse.php?kurs=".$_POST["kurs"]);
  //Anmeldung zu Interessent verschieben
  }elseif($_POST['sub']=="zu Interessent verschieben"){
    $ebas->anmeldungen->toInteressent($_POST,$_GET["anmeldung"]);
    header('Location: '.$webInteressentenUrl."interessenten-liste.php");
  //Anmeldung löschen
  }elseif($_POST['sub']=="Löschen"){
      $ebas->anmeldungen->deleteAnmeldung($_GET["anmeldung"]);
      header('Location: '."anmeldungen-liste.php");
  }
}
require_once '../../header.php';
?>
<div class="page-header">
  <h2>Anmeldungen bearbeiten</h2>
</div>
<div class="row">
    <div class="anmeldung col-md-12">
    <?php


      if(!is_numeric($_GET["anmeldung"])){
        die();
      }

      if (isset($_GET["anmeldung"])){
      $kurse = $ebas->anmeldungen->getUser($_GET["anmeldung"]);
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
          <td><select name="kurs">
              <?php
              $kurseX = $ebas->kurse->getAlleKurse();
              foreach($kurseX as $kursX){
                if($kurs["kurs"] == $kursX["kurs_id"]){
                  $selected = "selected";
                  $kursort = $kursX["kursort"];
                }else{
                  $selected = "";
                }
                echo '<option value="'.$kursX["kurs_id"].'" '.$selected.'>'.$kursX["bezeichnung_de"].'</option>';
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <th>Name</th>
        </tr>
          <tr>
            <td><input type="text" name="name" value=<?= $kurs["name"] ?> ></td>
          </tr>
        <tr>
          <th>Vorname</th>
        </tr>
          <tr>
            <td><input type="text" name="vorname" value=<?= $kurs["vorname"] ?> ></td>
          </tr>
        <tr>
          <th>Adresse</th>
        </tr>
          <tr>
            <td><input type="text" name="adresse" value=<?= $kurs["adresse"] ?> ></td>
          </tr>
        <tr>
          <th>PLZ</th>
        </tr>
          <tr>
            <td><input type="text" name="plz" value=<?= $kurs["plz"] ?> ></td>
          </tr>
        <tr>
          <th>Ort</th>
        </tr>
          <tr>
            <td><input type="text" name="ort" value=<?= $kurs["ort"] ?> ></td>
          </tr>
        <tr>
          <th>E-Mail</th>
        </tr>
          <tr>
            <td><input type="text" name="email" value=<?= $kurs["email"] ?> ></td>
          </tr>
        <tr>
          <th>Sprache</th>
        </tr>
          <tr>
            <td>

              <select name="sprache" style="width: 100px" >
                <option value="de" <?php if( $kurs['sprache']=="de")echo ' selected="selected"'; ?>  >de</option>
                <option value="fr" <?php if( $kurs['sprache']=="fr")echo " selected='selected'"; ?> >fr</option>
                <option value="it" <?php if( $kurs['sprache']=="it")echo ' selected="selected"'; ?> >it</option>
                <option value="en" <?php if( $kurs['sprache']=="en")echo ' selected="selected"'; ?> >en</option>
                </select>
            </td>
          </tr>
          <tr>
            <th>Kursort</th>
          </tr>
            <tr>
              <td><input type="text" name="kursort" value=<?= $kursort ?> ></td>
            </tr>
        <tr>
          <th>Gutschein</th>
        </tr>
          <tr>
            <td><input type="text" name="gutschein" value=<?= $kurs["gutschein"] ?> ></td>
          </tr>
        <?php } ?>

      </tbody>
    </table>
    <input class="btn btn-primary" type="submit" name="sub" value="Speichern">
    <input class="btn btn-success" type="submit" name="sub" value="zu Interessent verschieben">
    <input class="btn btn-danger" type="submit" name="sub" value="Löschen">
  </form>
     </div>
</div>
<?php

require_once '../../footer.php';

?>
