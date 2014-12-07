<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once '../../ebas.class.php';
require_once '../../session.php';

//check Role
if($ebas->user->role >= 1){
  header('Location: ' .$loginUrl);
}

if(isset($_POST) && !empty($_POST)){
  //Ändern Kurs
  if($_POST['sub']=="Speichern"){
    $ebas->kurse->updateKurs($_POST,$_GET["kurs"]);
    header('Location: '."kurse-bearbeiten-liste.php");
  //Kurs löschen
  }elseif($_POST['sub']=="Löschen"){
	if($_POST["datum"] > date("yyyy.mm.dd")){ //Event ist noch nicht vorbei. Alle Kunden zu den Intresenten
		$kurse2 = $ebas->anmeldungen->getAnmeldungen($_GET["kurs"]);

		foreach ($kurse2 as $kurs2){


		$ebas->kurse->KurstoInteressent($kurs2['name'],$kurs2['vorname'],$kurs2['adresse'],$kurs2['plz'],$kurs2['ort'],$kurs2['email'],$_POST["kursort"],$kurs2['sprache'],$kurs2['anmeldung_id']);
		}
		echo $_GET["kurs"];
		$ebas->kurse->deleteKurs($_GET["kurs"]);
	}
	else{//event ist vorbei. Alle Kunden löschen
		$ebas->anmeldungen->deleteAnmeldungWithKurs($_GET["kurs"]);//Löscht alle dazugehörigen User auch mit.
		$ebas->kurse->deleteKurs($_GET["kurs"]);
	}

    header('Location: '."kurse-bearbeiten-liste.php");


  }
}
require_once '../../header.php';
?>
<div class="page-header">
  <h2>Kurs bearbeiten</h2>
</div>
<div class="row">
    <div class="kurs col-md-12">
    <?php
      if(!is_numeric($_GET["kurs"])){
      die();
     }
      if (isset($_GET["kurs"])){
		      $kurse = $ebas->kurse->getKurs($_GET["kurs"]);
      }
      ?>

      <form method="POST" action="#">
      <table class="max-width-table table table-striped">
      <tbody>

       <?php

	   foreach($kurse as $kurs){ ?>

        <tr>
          <th>Kurs Bezeichnung DE </th>
        </tr>
          <tr>
			<td><input type="text" name="bezeichnung_de" value='<?=  $kurs["bezeichnung_de"] ?>' ></td>
          </tr>
        <tr>
          <th>Kurs Bezeichnung FR</th>
        </tr>
          <tr>
            <td><input type="text" name="bezeichnung_fr" value='<?= $kurs["bezeichnung_fr"] ?>' ></td>
          </tr>
        <tr>
          <th>Kurs Bezeichnung IT</th>
        </tr>
          <tr>
            <td><input type="text" name="bezeichnung_it" value='<?= $kurs["bezeichnung_it"] ?>' ></td>
          </tr>
        <tr>
          <th>Kurs Bezeichnung ENG</th>
        </tr>
        <tr>
			<td><input type="text" name="bezeichnung_en" value='<?= $kurs["bezeichnung_en"] ?>'	 ></td>
        </tr>
        <tr>
          <th>Sortierung</th>
        </tr>
        <tr>
			<td><input type="text" name="sortierung" value=<?= $kurs["sortierung"] ?> ></td>
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
          <th>max. Teilnehmer</th>
        </tr>
          <tr>
            <td><input type="text" name="max_teilnehmer" value=<?= $kurs["max_teilnehmer"] ?> ></td>
          </tr>
        <tr>
          <th>max. Teilnehmer PF</th>
        </tr>
          <tr>
            <td><input type="text" name="max_teilnehmer_PF" value=<?= $kurs["max_teilnehmer_PF"] ?> ></td>
          </tr>
        <tr>
          <th>Kursort</th>
        </tr>
          <tr>
            <td><input type="text" name="kursort" value=<?= $kurs["kursort"] ?> ></td>
          </tr>
          <tr>
            <th>Datum</th>
          </tr>
            <tr>
              <td>

        <!-- Kalenderfunktion -->
				<link href="css/ui-lightness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
				<script>
				Modernizr.load({
					test: Modernizr.inputtypes.date,
					nope: "<?php echo $jsUrl;?>jquery-ui.custom.js",
					callback: function() {
					  $("input[type=date]").datepicker();
					}
				  });
				</script>
				<input type="date" name="datum"  style="width: 260px"  ng-model="value" placeholder="dd-MM-yyyy" min="2013-01-01" value=<?= $kurs["datum"] ?> >
			  </td>
            </tr>
        <tr>
          <th>Kurs Details</th>
        </tr>
          <tr>
            <td>
                <textarea name="details" cols="40" rows="10" value=<?= $kurs["details"] ?>><?= $kurs["details"] ?></textarea>
            </td>
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

require_once '../../footer.php';

?>
