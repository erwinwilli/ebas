<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once '../../ebas.class.php';
require_once '../../session.php';
require_once '../../header.php';

?>
<div class="page-header">
  <h2>Bereinigungslauf</h2>
  <h3>Alle Kurse mit vergangenem Datum löschen (inklusive Anmeldungen): </h3>
</div>
<div class="row">
    <div class="kurs col-md-12">
    <?php
    $kurse = $ebas->kurse->getAlleVergangenenKurse();
    ?>
      <table class="table table-striped">
      <thead>
        <tr>
          <th>Kursort und Datum</th>
          <th>Kursort</th>
          <th>Sprache</th>
          <th>Datum</th>
          <th>Teilnehmer</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(!empty($kurse)){
          foreach($kurse as $kurs){
              echo "<tr>";
              echo "<td>".$kurs["bezeichnung_de"]."</td>";
              echo "<td>".$kurs["kursort"]."</td>";
              echo "<td>".$kurs["sprache"]."</td>";
              $datum = $kurs["datum"];
              $datum = date("d.m.Y", strtotime($datum));
              echo "<td>".$datum."</td>";
              echo "<td>".$kurs["count"]."/".$kurs["max_teilnehmer"]."</td>";
              echo "</tr>";
          }
        }
        ?>

      </tbody>
    </table>
    <a class="btn btn-danger" href="bereinigung-blank.php">Bereinigung Kurse </a>
        </div>
</div>

<?php

require_once '../../footer.php';

?>
