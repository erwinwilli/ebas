<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once '../../ebas.class.php';
require_once '../../session.php';

if(isset($_POST) && !empty($_POST)){
Header('Location: '."../Kurse/kurse.php?kurs=".$_POST["kurs"]);
}
require_once '../../header.php';
?>

<div class="page-header">
  <h2>Neue Anmeldung</h2>
</div>

<div class="row">
    <div class="anmeldung col-md-12">
      <?php
      $anmeldung = $ebas->anmeldungen->neueAnmeldung($_POST);
      ?>
      <form onSubmit="return formTestAnmeldung()" method="POST" action="#" >


      <table class="max-width-table table table-striped">
      <thead>
        <tr>
        <tr>
          <th>Kurs</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td><select name="kurs">
              <?php
              $kurse = $ebas->kurse->getAlleKurse();
              foreach($kurse as $kurs){
				if($_GET["kurs"] == $kurs["kurs_id"]){
					echo '<option value="'.$kurs["kurs_id"].'" selected="selected">'.$kurs["bezeichnung_de"].'</option>';
				}else{
					echo '<option value="'.$kurs["kurs_id"].'">'.$kurs["bezeichnung_de"].'</option>';
				}
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <th>Name</th>
        </tr>
          <tr>
            <td><input type="text" name="name" id="name"><font id="txtErrorName" value="" color="#FF0000"></font> </td>
        </tr>
      <tr>
        <th>Vorname</th>
      </tr>
        <tr>
          <td><input type="text" name="vorname" id="vorname" ><font id="txtErrorVorname" value="" color="#FF0000"></font> </td>
        </tr>
      <tr>
        <th>Adresse</th>
      </tr>
        <tr>
          <td><input type="text" name="adresse" id="adresse" ><font id="txtErrorAdresse" value="" color="#FF0000"></font> </td>
        </tr>
      <tr>
        <th>PLZ</th>
      </tr>
        <tr>
          <td><input type="text" name="plz" id="plz"><font id="txtErrorPlz" value="" color="#FF0000"></font> </td>
        </tr>
      <tr>
        <th>Ort</th>
      </tr>
        <tr>
          <td><input type="text" name="ort" id="ort" ><font id="txtErrorOrt" value="" color="#FF0000"></font> </td>
        </tr>
      <tr>
        <th>E-Mail</th>
      </tr>
        <tr>
          <td><input type="text" name="email" id="email"><font id="txtErrorEmail" value="" color="#FF0000"></font> </td>
        </tr>
      <tr>
        <th>Sprache</th>
      </tr>
        <tr>
          <td>
			<select name="sprache" id="sprache" style="width: 100px">
				<option value="de">de</option>
				<option value="fr">it</option>
				<option value="it">fr</option>
				<option value="en">en</option>
			</select>

		  </td>
        </tr>
      <tr>
        <th>Gutschein</th>
      </tr>
        <tr>
          <td><input type="text" name="gutschein" ></td>
        </tr>

      </tbody>
    </table>
    <input class="btn btn-primary" type="submit" onSubmit="formTestAnmeldung()" id="sendButton" value="Speichern" >
  </form>
     </div>
</div>
<?php

require_once '../../footer.php';

?>
