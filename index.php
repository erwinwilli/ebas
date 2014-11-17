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
			echo "<table border='3' >";
			echo "<tr>";
			echo "<th style=' padding:5px'>Ort</th>";//Titel der Tabele wird eingefügt
			echo "<th style=' padding:5px'>Sprache</th>"; 
			echo "<th style=' padding:5px'>Teilnehmer</th>";
			echo "<tr>";
			foreach($kurse as $kurs){
				echo "<tr>";
				echo "<td style=' padding:5px'>". $kurs["bezeichnung_de"] . "</td>";
				echo "<td style=' padding:5px'>" .$kurs["sprache"]."</td>";
				echo "<td style=' padding:5px'>" .$kurs["max_teilnehmer"].'/'.$kurs["max_teilnehmer"]. "</td>";
				echo "</tr>";
			}
			echo "</table>";
		  
        

          
        

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
