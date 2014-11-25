<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once 'ebas.class.php';
require_once 'session.php';
require_once 'header.php';

?>
<div class="row">
  <div class="col-md-3">
      <input type="text" class="search form-control" size="12" placeholder="Search">
      </p>
    </div>
</div>

<div class="row">
    <div class="anmeldung col-md-12">
    <?php
	
      if (isset($_GET["anmeldung"])){
      $kurse = $ebas->anmeldungen->getUser($_GET["anmeldung"]);	  
      }	  
      ?>
      <table class="table table-striped">
      <thead>
	  
        <tr>
          <th>Name</th>
          <th>Vorname</th>
          <th>Adresse</th>
          <th>PLZ</th>
          <th>Ort</th>
          <th>E-Mail</th>
          <th>Sprache</th>
        </tr>
      </thead>
      <tbody>

       <?php
	   foreach($kurse as $kurs){ ?>
        <tr >
          <td><input type="text" name="name" value=<?= $kurs["name"] ?> size="18" ></td>
          <td><input type="text" name="name" value=<?= $kurs["vorname"] ?> size="18"></td>
          <td><input type="text" name="name" value=<?= $kurs["adresse"] ?> size="18"></td>
          <td><input type="text" name="name" value=<?= $kurs["plz"] ?> size="4"></td>
          <td><input type="text" name="name" value=<?= $kurs["ort"] ?> size="6"></td>
          <td><input type="text" name="name" value=<?= $kurs["email"] ?> size="25"></td>
          <td><input type="text" name="name" value=<?= $kurs["sprache"] ?> size="4"></td>
        </tr>
		
        <?php } ?>
	   
      </tbody>
    </table>
	
	<button onclick="saveDialog()">Speichern</button>
	<p id="demo"></p>
	
	<script>
function saveDialog() {
    var x;
    if (confirm("Wollen sie die Teilnehmer Daten Updaten?") == true) {
        x = "Code Blabla für Updaten";
    } else {
        x = "auf die Vorletzte seite zurück navigieren. / Muss noch imblementiert werden";
    }
    document.getElementById("demo").innerHTML = x;
}
</script>
     </div>
</div>
<?php

require_once 'footer.php';	

?>
