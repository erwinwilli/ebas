<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once '../../ebas.class.php';
require_once '../../session.php';
if(isset($_POST) && !empty($_POST)){
	//Ändern Kurs
	//if($_POST['sub']=="Speichern"){
		header('Location: '."kurse-liste.php");
	//}
}
//check Role
//if($ebas->user->role > 1){
//	header('Location: ' . $_SERVER['HTTP_REFERER']);
//}
require_once '../../header.php';
?>
<!-- Java Scripte weden eingebunden. -->
<script src="../../js/ebas.js"></script>
<script src="../../js/jquery.js"></script>
<script src="../../js/jquery-ui.custom.js"></script>
<script src="../../js/modernizr.js"></script>



<div class="page-header">
	<h2>Kurs erstellen</h2>
</div>
<div class="row">
		<div class="kurs col-md-12">
		<?php
			$kurs = $ebas->kurse->neuerkurs($_POST);
			?>
			<form onSubmit="return formTestKurs()" method="POST" action="#" >
			<table class="max-width-table table table-striped">
			<thead>
				<tr>
				<tr>
					<th>Bitte Kursdetails angeben</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Kurs Bezeichnung DE </th>
				</tr>
					<tr>
			<td><input type="text" name="bezeichnung_de" id="bezeichnung_de" ><font id="txtErrorBezeichnung_de" value="" color="#FF0000"></font></td>
					</tr>
				<tr>
					<th>Kurs Bezeichnung FR</th>
				</tr>
					<tr>
						<td><input type="text" name="bezeichnung_fr" id="bezeichnung_fr" ><font id="txtErrorBezeichnung_fr" value="" color="#FF0000"></font></td>
					</tr>
				<tr>
					<th>Kurs Bezeichnung IT</th>
				</tr>
					<tr>
						<td><input type="text" name="bezeichnung_it" id="bezeichnung_it" ><font id="txtErrorBezeichnung_it" value="" color="#FF0000"></font></td>
					</tr>
				<tr>
					<th>Kurs Bezeichnung ENG</th>
				</tr>
				<tr>
			<td><input type="text" name="bezeichnung_en" id="bezeichnung_en"><font id="txtErrorBezeichnung_en" value="" color="#FF0000"></font></td>
				</tr>
				<tr>
					<th>Sortierung</th>
				</tr>
				<tr>
			<td><input type="text" name="sortierung" id= "sortierung"><font id="txtErrorSortierung" value="" color="#FF0000"></font></td>
		</tr>
		<tr>
			<th>Sprache</th>
				</tr>
					<tr>
						<td>
							<select name="sprache" id="sprache" style="width: 100px">
								<option value="de">de</option>
								<option value="fr">fr</option>
								<option value="it">it</option>
								<option value="en">en</option>
							</select>
						</td>
					</tr>
				<tr>
					<th>max. Teilnehmer</th>
				</tr>
					<tr>
						<td><input type="text" name="max_teilnehmer" id="max_teilnehmer" ><font id="txtErrorMax_teilnehmer" value="" color="#FF0000"></font></td>
					</tr>
				<tr>
					<th>max. Teilnehmer PF</th>
				</tr>
					<tr>
						<td><input type="text" name="max_teilnehmer_PF" id="max_teilnehmer_PF" ><font id="txtErrorMax_teilnehmer_PF" value="" color="#FF0000"></font></td>
					</tr>
				<tr>
					<th>Kursort</th>
				</tr>
					<tr>
						<td><input type="text" name="kursort" id="kursort" ><font id="txtErrorKursort" value="" color="#FF0000"></font></td>
					</tr>
					<tr>
						<th>Datum</th>
					</tr>
						<tr>
							<td>
								<link href="../../css/ui-lightness/jquery-ui-1.10.0.custom.css" rel="stylesheet">

								<script>
								Modernizr.load({
									test: Modernizr.inputtypes.date,
									nope: "../../js/jquery-ui.custom.js",
									callback: function() {
									  $("input[type=date]").datepicker();
									}
								  });
								</script>
								<input type="date" name="datum" id="datum" date_format="dd/mm/yyyy" style="width: 260px"  ng-model="value" placeholder="dd-MM-yyyy" min="2013-01-01" value=<?= $kurs["datum"] ?> >
							</td>
						</tr>

			</tbody>
		</table>
		<input class="btn btn-primary"  type="submit" onSubmit="formTestKurs()" id="sendButton" value="Speichern" >
	</form>
		</div>
</div>
<?php

require_once '../../footer.php';

?>
