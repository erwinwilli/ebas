<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once 'ebas.class.php';
require_once 'session.php';
if(isset($_POST) && !empty($_POST)){
Header('Location: '."kurse.php?kurs=".$_POST["kurs"]);
}
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
      $anmeldung = $ebas->anmeldungen->neueAnmeldung($_POST);
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

        <tr>
          <td><select name="kurs">
              <?php
              $kurse = $ebas->kurse->getAlleKurse();
              foreach($kurse as $kurs){
                echo '<option value="'.$kurs["kurs_id"].'">'.$kurs["bezeichnung_de"].'</option>';
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <th>Name</th>
        </tr>
          <tr>
            <td><input type="text" name="name" ></td>
        </tr>
      <tr>
        <th>Vorname</th>
      </tr>
        <tr>
          <td><input type="text" name="vorname" ></td>
        </tr>
      <tr>
        <th>Adresse</th>
      </tr>
        <tr>
          <td><input type="text" name="adresse" ></td>
        </tr>
      <tr>
        <th>PLZ</th>
      </tr>
        <tr>
          <td><input type="text" name="plz" ></td>
        </tr>
      <tr>
        <th>Ort</th>
      </tr>
        <tr>
          <td><input type="text" name="ort" ></td>
        </tr>
      <tr>
        <th>E-Mail</th>
      </tr>
        <tr>
          <td><input type="text" name="email" ></td>
        </tr>
      <tr>
        <th>Sprache</th>
      </tr>
        <tr>
          <td><input type="text" name="sprache" ></td>
        </tr>
      <tr>
        <th>Gutschein</th>
      </tr>
        <tr>
          <td><input type="text" name="gutschein" ></td>
        </tr>

      </tbody>
    </table>
    <input type="submit" value="Speichern">
  </form>
     </div>
</div>
<?php

require_once 'footer.php';

?>
