<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once 'ebas.class.php';
require_once 'session.php';
if(isset($_POST) && !empty($_POST)){
	//Ändern Kurs
	if($_POST['sub']=="Speichern"){
		header('Location: '."kurse-liste.php");
	}
}
//check Role
if($ebas->user->role > 1){
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
require_once 'header.php';
?>
<div class="page-header">
	<h2>Kurs bearbeiten</h2>
</div>
<div class="row">
		<div class="kurs col-md-12">
		<?php
			$kurs = $ebas->kurse->neuerkurs($_POST);
			?>
			<form onSubmit="return formtest()" method="POST" action="#" >
			<table class="max-width-table table table-striped">
			<thead>
				<tr>
				<tr>
					<th>Kurs</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Kurs Bezeichnung DE </th>
				</tr>
					<tr>
			<td><input type="text" name="bezeichnung_de" id="bezeichnung_de" ></td>
					</tr>
				<tr>
					<th>Kurs Bezeichnung FR</th>
				</tr>
					<tr>
						<td><input type="text" name="bezeichnung_fr" id="bezeichnung_fr" ></td>
					</tr>
				<tr>
					<th>Kurs Bezeichnung IT</th>
				</tr>
					<tr>
						<td><input type="text" name="bezeichnung_it" id="bezeichnung_it" ></td>
					</tr>
				<tr>
					<th>Kurs Bezeichnung ENG</th>
				</tr>
				<tr>
			<td><input type="text" name="bezeichnung_en" id="bezeichnung_en"	 ></td>
				</tr>
				<tr>
					<th>Sortierung</th>
				</tr>
				<tr>
			<td><input type="text" name="sortierung" id= "sortierung"></td>
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
						<td><input type="text" name="max_teilnehmer" id="max_teilnehmer" ></td>
					</tr>
				<tr>
					<th>max. Teilnehmer PF</th>
				</tr>
					<tr>
						<td><input type="text" name="max_teilnehmer_PF" id="max_teilnehmer_PF" ></td>
					</tr>
				<tr>
					<th>Kursort</th>
				</tr>
					<tr>
						<td><input type="text" name="kursort" id="kursort" ></td>
					</tr>
					<tr>
						<th>Datum</th>
					</tr>
						<tr>
							<td>
								<link href="css/ui-lightness/jquery-ui-1.10.0.custom.css" rel="stylesheet">
								<script src="js/jquery.js"></script>
								<script src="js/jquery-ui.custom.js"></script>
								<script src="js/modernizr.js"></script>
								<script>
								Modernizr.load({
									test: Modernizr.inputtypes.date,
									nope: "js/jquery-ui.custom.js",
									callback: function() {
									  $("input[type=date]").datepicker();
									}
								  });
								</script>
								<input type="date" name="datum"  style="width: 260px"  ng-model="value" placeholder="dd-MM-yyyy" min="2013-01-01" value=<?= $kurs["datum"] ?> >
							</td>
						</tr>

			</tbody>
		</table>
		<input class="btn btn-primary" name="sub" type="submit" onSubmit="formtest()" id="sendButton" value="Speichern" >
	</form>
		</div>
</div>
<?php

require_once 'footer.php';

?>
