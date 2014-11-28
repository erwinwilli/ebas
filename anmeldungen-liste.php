<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once 'ebas.class.php';
require_once 'session.php';
require_once 'header.php';

?>
<div class="row">
        <div class="col-md-3">
          <form action="<?php $_PHP_SELF ?>" method="POST">
          <input type="text" class="search form-control" size="12" placeholder="Search">
          <input type="submit" value="Suchen">
        </form>
      </p>
    </div>
</div>
<div class="row">
    <div class="kurs col-md-12">
    <?php
      $kurse = $ebas->anmeldungen->getAlleAnmeldungen();
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
          <th>Gutschein</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach($kurse as $kurs){ ?>
        <tr>
          <td><a href= anmeldungen.php?anmeldung=<?= $kurs["anmeldung_id"]?>> <?= $kurs["name"] ?></td>
          <td><?= $kurs["vorname"] ?></td>
          <td><?= $kurs["adresse"] ?></td>
          <td><?= $kurs["plz"] ?></td>
          <td><?= $kurs["ort"] ?></td>
          <td><?= $kurs["email"] ?></td>
          <td><?= $kurs["gutschein"] ?></td>
        </tr>

        <?php } ?>

      </tbody>
    </table>
        </div>
</div>

<?php

require_once 'footer.php';

?>
