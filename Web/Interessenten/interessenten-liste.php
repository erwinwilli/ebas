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
  <h2>Alle Interessenten</h2>
</div>

<div class="row">
    <div class="col-md-3">
          <form action="<?php $_PHP_SELF ?>" method="POST">
          <input type="text" class="search form-control" size="12" name="searchText2" id="searchText2" value= <?php echo @$_POST['searchText2']?>>
          <input class="btn btn-primary" type="submit" value="Suchen" onclick=<?php $GLOBALS['strGlobAlleintre'] = @$_POST['searchText2'];?>>
        </form>
      </p>
    </div>
</div>
<div class="row">
    <div class="kurs col-md-12">
    <?php
      $kurse = $ebas->interessenten->searchInteressenten($GLOBALS['strGlobAlleintre']);
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
          <th>Kursort</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach($kurse as $kurs){ ?>
        <tr>
          <td><a href= interessenten.php?interessent=<?= $kurs["interessent_id"]?>> <?= $kurs["name"] ?></td>
          <td><?= $kurs["vorname"] ?></td>
          <td><?= $kurs["adresse"] ?></td>
          <td><?= $kurs["plz"] ?></td>
          <td><?= $kurs["ort"] ?></td>
          <td><a href='mailto: <?= $kurs["email"]?>'><?= $kurs["email"] ?></td>
          <td><?= $kurs["kursort"] ?></td>
        </tr>

        <?php } ?>

      </tbody>
    </table>
    <a class="btn btn-primary" href="neuanmeldung.php?kurs=<?php echo $_GET["kurs"]; ?>">Mail an alle Interessenten</a>
        </div>
</div>

<?php

require_once '../../footer.php';

?>
