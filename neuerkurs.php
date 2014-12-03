<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once 'ebas.class.php';
require_once 'session.php';
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
require_once 'header.php';
?>
<script language="javascript" type="text/javascript">

	function formTestKurs (){
		//document.getElementById("txtErrorEmail").innerHTML = "New text!";
		var x = true;


		var bezeichnung_de, bezeichnung_fr, bezeichnung_it, bezeichnung_en, sortierung, sprache, max_teilnehmer, max_teilnehmer_PF,kursort,datum;
		bezeichnung_de=document.getElementById("bezeichnung_de").value;
		//alert(bezeichnung_de);
		bezeichnung_fr=document.getElementById("bezeichnung_fr").value;
		//alert(bezeichnung_fr);
		bezeichnung_it=document.getElementById("bezeichnung_it").value;
		//alert(bezeichnung_it);
		bezeichnung_en=document.getElementById("bezeichnung_en").value;
		//alert(bezeichnung_en);
		sortierung=document.getElementById("sortierung").value;
		//alert(sortierung);
		sprache=document.getElementById("sprache").value;
		//alert(sprache);
		max_teilnehmer=document.getElementById("max_teilnehmer").value;
		//alert(max_teilnehmer);
		max_teilnehmer_PF=document.getElementById("max_teilnehmer_PF").value;
		//alert(max_teilnehmer_PF);
		kursort=document.getElementById("kursort").value;
		//alert(kursort);
		datum=document.getElementById("datum").value;
		//alert(datum);

		if(bezeichnung_de==""){
			document.getElementById("txtErrorBezeichnung_de").innerHTML = " Bitte Bezeichnung ausfüllen!";
			x=false;
		}
		else{
			document.getElementById("txtErrorBezeichnung_de").innerHTML = "";
		}
		if(bezeichnung_fr==""){
			document.getElementById("txtErrorBezeichnung_fr").innerHTML = " Bitte Bezeichnung ausfüllen!";
			x=false;
		}
		else{
			document.getElementById("txtErrorBezeichnung_fr").innerHTML = "";
		}
		if(bezeichnung_it==""){
			document.getElementById("txtErrorBezeichnung_it").innerHTML = " Bitte Bezeichnung ausfüllen!";
			x=false;
		}
		else{
			document.getElementById("txtErrorBezeichnung_it").innerHTML = "";
		}
		if(bezeichnung_en==""){
			document.getElementById("txtErrorBezeichnung_en").innerHTML = " Bitte Bezeichnung ausfüllen!";
			x=false;
		}
		else{
			document.getElementById("txtErrorBezeichnung_en").innerHTML = "";
		}
		if(sortierung ==""){
			document.getElementById("txtErrorSortierung").innerHTML = " Bitte Feld ausfüllen!";
			x=false;
		}
		else{
			document.getElementById("txtErrorSortierung").innerHTML = "";
		}
		
		if(max_teilnehmer==""){
			document.getElementById("txtErrorMax_teilnehmer").innerHTML = " Bitte Feld ausfüllen!";
			x=false;
		}
		else{
			document.getElementById("txtErrorMax_teilnehmer").innerHTML = " ";
		}
		if(max_teilnehmer_PF==""){
			document.getElementById("txtErrorMax_teilnehmer_PF").innerHTML = " Bitte Feld ausfüllen!";
			x=false;
		}
		else{
			document.getElementById("txtErrorMax_teilnehmer_PF").innerHTML = " ";
		}
		if(kursort==""){
			document.getElementById("txtErrorKursort").innerHTML = " Bitte Feld ausfüllen!";
			x=false;
		}
		else{
			document.getElementById("txtErrorKursort").innerHTML = " ";
		}

		if(!(Boolean(x))){

		return false;
		}
		//document.sendButton.submit();

	  }
	  

   </script>
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
					<th>Kurs</th>
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
								<input type="date" name="datum" id="datum"  style="width: 260px"  ng-model="value" placeholder="dd-MM-yyyy" min="2013-01-01" value=<?= $kurs["datum"] ?> >
							</td>
						</tr>

			</tbody>
		</table>
		<input class="btn btn-primary"  type="submit" onSubmit="formTestKurs()" id="sendButton" value="Speichern" >
	</form>
		</div>
</div>
<?php

require_once 'footer.php';

?>
