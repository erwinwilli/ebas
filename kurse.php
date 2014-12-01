<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once 'ebas.class.php';
require_once 'session.php';
require_once 'header.php';

?>

<div class="page-header">
  <h2><?php
      if(!empty($_GET["kurs"])){
          if (isset($_GET["kurs"])){
          $kurseX = $ebas->kurse->getKurs($_GET["kurs"]);
          }
            foreach($kurseX as $kursX){ ?>
              <tr >
                <td><?= $kursX["bezeichnung_de"] ?></td>
              </tr>
            <?php } }?>
  </h2>
</div>

<div class="row">
    <div class="kurs col-md-12">
    <?php
      if(!empty($_GET["kurs"])){
        if (isset($_GET["kurs"])){
        $kurse = $ebas->anmeldungen->getAnmeldungen($_GET["kurs"]);
          if(!empty($kurse)){
          }else{
            header('Location: '."index.php");
            }
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
            <td><a href= anmeldungen.php?anmeldung=<?= $kurs["anmeldung_id"]?>><?= $kurs["name"] ?></td>
            <td><?= $kurs["vorname"] ?></td>
            <td><?= $kurs["adresse"] ?></td>
            <td><?= $kurs["plz"] ?></td>
            <td><?= $kurs["ort"] ?></td>
            <td><?= $kurs["email"] ?></td>
            <td><?= $kurs["sprache"] ?></td>
          </tr>

          <?php }
        }else{
              header('Location: '."index.php");
              }?>
        </tbody>
      </table>
          </div>
  </div>
<?php

require_once 'footer.php';

?>
