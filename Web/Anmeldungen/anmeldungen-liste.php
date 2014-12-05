<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once '../../ebas.class.php';
require_once '../../session.php';

//check Role
if($ebas->user->role >= 1){
  header('Location: ' .$loginUrl);
}

require_once '../../header.php';

?>
<div class="page-header">
  <h2>Alle Anmeldungen</h2>
</div>

<div class="row">
        <div class="col-md-3">
          <form action="<?php $_PHP_SELF ?>" method="POST">
          <input type="text" class="search form-control" size="12" name="searchText" id="searchText" value= <?php echo @$_POST['searchText']?> >
          <input class="btn btn-primary" type="submit" value="Suchen" onclick=<?php $GLOBALS['strGlobAlleAnmel'] = @$_POST['searchText'];?>>
        </form>
      </p>
    </div>
</div>
<div class="row">
    <div class="kurs col-md-12">
    <?php
      $kurse = $ebas->anmeldungen->searchAnmeldungen($GLOBALS['strGlobAlleAnmel']);
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
          <td><a href='mailto: <?= $kurs["email"]?>'><?= $kurs["email"] ?></td>
          <td><?= $kurs["gutschein"] ?></td>
        </tr>

        <?php } ?>

      </tbody>
    </table>
    <a class="btn btn-primary" href="neuanmeldung.php?kurs=<?php echo $_GET["kurs"]; ?>">neuer User</a>
    <button class="btn btn-info export-csv">Export in CSV</button>
        </div>
</div>

<?php

require_once '../../footer.php';

?>
