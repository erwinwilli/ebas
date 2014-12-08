<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once '../../ebas.class.php';
require_once '../../session.php';

//check Role
if($ebas->user->role > 0){
  header('Location: ' .$loginUrl);
}

if(isset($_POST) && !empty($_POST)){
Header('Location: '.$webInteressentenUrl."interessenten-liste.php");
}
require_once '../../header.php';
?>

<div class="page-header">
  <h2>Neuer Interessent</h2>
</div>

<div class="row">
    <div class="anmeldung col-md-12">
      <?php
      $interessent = $ebas->interessenten->neuerInteressent($_POST);
      ?>
      <form onSubmit="return formTestInteressent()" method="POST" action="#" >


      <table class="max-width-table table table-striped">
      <thead>
        <tr>
        <tr>
          <th>Interessent</th>
        </tr>
      </thead>
      <tbody>
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
        <th>Kursort</th>
      </tr>
        <tr>
          <td><input type="text" name="kursort" id="kursort" ><font id="txtErrorKursort" value="" color="#FF0000"></font> </td>
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
      </tbody>
    </table>
    <input class="btn btn-primary" type="submit" onSubmit="formTestInteressent()" id="sendButton" value="Speichern" >
  </form>
     </div>
</div>
<?php

require_once '../../footer.php';

?>
