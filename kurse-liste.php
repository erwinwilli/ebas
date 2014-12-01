<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once 'ebas.class.php';
require_once 'session.php';
require_once 'header.php';

?>
<div class="row">
        <div class="col-md-3">
			</p>
		</div>
</div>
<div class="row">
    <div class="kurs col-md-12">
		<?php
			$kurse = $ebas->kurse->getAlleKurse();
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
          <td><a href= kurse.php?kurs=<?= $kurs["kurs_id"]?>><?= $kurs["bezeichnung_de"] ?></td>
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
        </div>
</div>

<?php

require_once 'footer.php';

?>
