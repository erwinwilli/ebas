<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once 'ebas.class.php';
require_once 'session.php';
require_once 'header.php';

?>
<div class="row">
        <div class="col-md-12">*suche</div>
</div>
<div class="row">
        <div class="kurs col-md-12">
          <?php

          $ebas = new ebas;

          $kurse = $ebas->kurse->getAlleKurse();
          foreach($kurse as $kurs){
            echo '<div class="inner-kurs row">';
              echo '<div class="kurs-ort col-md-3">'.$kurs["bezeichnung_de"].'</div>';
              echo '<div class="kurs-datum col-md-5">'.''.'</div>';
              echo '<div class="kurs-sprache col-md-1">'.$kurs["sprache"].'</div>';
              echo '<div class="kurs-tz col-md-3">'.$kurs["max_teilnehmer"].'/'.$kurs["max_teilnehmer"].'</div>';
            echo '</div>';
          }


          ?>
        </div>
</div>
<table style="margin:50px">
  <thead>
    <tr>
      <th>ID</th>
      <th>Bezeichnung</th>
    </tr>
  </thead>
  <tbody>

</tbody>
</table>

<?php

require_once 'footer.php';

?>
