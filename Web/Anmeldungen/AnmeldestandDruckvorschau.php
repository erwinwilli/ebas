<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once '../../ebas.class.php';
require_once '../../session.php';

//check Role
if($ebas->user->role > 1){
  header('Location: '.$loginUrl);
}

require_once '../../header.php';

?>
<div class="row">
        <div class="col-md-3">
			</p>
		</div>
</div>
<div class="row">
    <div class="kurs col-md-12">
		<?php
			$kurse = $ebas->kurse->getAlleAktuellenKurse();
    ?>
      <table class="table table-striped">
      <thead>
        <tr>
          <th>Kursort und Datum</th>
          <th>Sprache</th>
          <th>Ort</th>
          <th>Datum</th>
          <th>Teilnehmer</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach($kurse as $kurs){ ?>
        <tr>
          <td><?= $kurs["bezeichnung_de"] ?></td>
          <td><?= $kurs["sprache"] ?></td>
          <td><?= $kurs["kursort"] ?></td>
		  <?php
      $datum = $kurs["datum"];
			$datum = date("d.m.Y", strtotime($datum));
			?>
          <td><?= $datum?></td>
          <td><?= $kurs["count"] ?> / <?= $kurs["max_teilnehmer"] ?> </td>
        </tr>

        <?php } ?>

      </tbody>
    </table>
	 </br> </br>

	<script>window.onload= function () { window.print();window.history.back();   }  </script>
        </div>
</div>

<?php

require_once '../../footer.php';

?>
