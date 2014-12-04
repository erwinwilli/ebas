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

        <?php
        if(!empty($kurse)){
          foreach($kurse as $kurs){
              echo "<tr>";
              echo "<td>".$kurs["vorname"]."</td>";
              echo "<td>".$kurs["name"]."</td>";
              echo "<td>".$kurs["adresse"]."</td>";
              echo "<td>".$kurs["plz"]."</td>";
              echo "<td>".$kurs["ort"]."</td>";
              echo "<td>".$kurs["email"]."</td>";
              echo "<td>".$kurs["kursort"]."</td>";
              echo "<td>".$kurs["sprache"]."</td>";
              echo "</tr>";
          }
        }
        ?>

      </tbody>
    </table>
    <a class="btn btn-danger" href="bereinigung-blank.php">Bereinigung Interessenten </a>
        </div>
</div>

<?php

require_once '../../footer.php';

?>
