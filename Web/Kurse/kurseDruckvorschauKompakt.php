<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once '../../ebas.class.php';
require_once '../../session.php';

//check Role
if($ebas->user->role > 1){
  header('Location: ' .$loginUrl);
}

require_once '../../header.php';

?>

<div class="page-header">
  <h2><?php
    if(!is_numeric($_GET["kurs"])){
      die();
    }
      if(!empty($_GET["kurs"])){
          if (isset($_GET["kurs"])){
          $kurseX = $ebas->kurse->getKurs($_GET["kurs"]);
          }
            foreach($kurseX as $kursX){ ?>
              <tr >
                <td><?= $kursX["bezeichnung_de"] ?></td>
              </tr>
            <?php }}?>
  </h2>
</div>

<div class="row">
    <div class="kurs col-md-9">
    <?php
      if(!empty($_GET["kurs"])){
        if (isset($_GET["kurs"])){
        $kurse = $ebas->anmeldungen->getAnmeldungen($_GET["kurs"]);
          if(!empty($kurse)){
          }else{
            header('Location: '.$webAnmeldungUrl."neuanmeldung.php?kurs=". $_GET["kurs"]);
            }
        }
        ?>

        <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Vorname</th>
            <th>Ort</th>

          </tr>
        </thead>
        <tbody>

        <?php
        foreach($kurse as $kurs){ ?>
          <tr >
            <td><?= $kurs["name"] ?></td>
            <td><?= $kurs["vorname"] ?></td>
            <td><?= $kurs["ort"] ?></td>
          </tr>

          <?php }
        }else{
              header('Location: '.$rootUrl."index.php");
              }?>
        </tbody>
      </table>

      <textarea name="details" cols="40" rows="10"><?= $kursX["details"] ?></textarea>
      <br></br>
	   <script>window.onload= function () { window.print();window.history.back();   }  </script>

          </div>
  </div>
<?php

require_once '../../footer.php';

?>
