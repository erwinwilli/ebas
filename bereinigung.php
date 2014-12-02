<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once 'ebas.class.php';
require_once 'session.php';
require_once 'header.php';

?>
<div class="page-header">
  <h2>Bereinigungslauf</h2>
  <h3>Folgende Interessenten sind schon angemolden: </h3>
</div>
<div class="row">
    <div class="kurs col-md-12">
    <?php
      $kurse = $ebas->interessenten->bereinigungInteressentenView();
    ?>
      <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Vorname</th>
          <th>Adresse</th>
          <th>PLZ</th>
          <th>Ort</th>
          <th>EMail</th>
          <th>kursort</th>
          <th>sprache</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach($kurse as $kurs){ ?>
        <tr>
          <td><?= $kurs["name"] ?></td>
          <td><?= $kurs["vorname"] ?></td>
          <td><?= $kurs["adresse"] ?></td>
          <td><?= $kurs["plz"] ?></td>
          <td><?= $kurs["ort"] ?></td>
          <td><?= $kurs["email"] ?></td>
          <td><?= $kurs["kursort"] ?></td>
          <td><?= $kurs["sprache"] ?></td>
        </tr>

        <?php } ?>

      </tbody>
    </table>
    
        </div>
</div>

<?php

require_once 'footer.php';

?>
