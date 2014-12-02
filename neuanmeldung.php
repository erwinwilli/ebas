<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once 'ebas.class.php';
require_once 'session.php';
if(isset($_POST) && !empty($_POST)){
Header('Location: '."kurse.php?kurs=".$_POST["kurs"]);
}
require_once 'header.php';
?>

<script language="javascript" type="text/javascript">

	function formtest (){
		//document.getElementById("txtErrorEmail").innerHTML = "New text!";
		var x = true;


		var name, vorname, adresse, plz, ort, email, sprache;
		name=document.getElementById("name").value;
		//alert(name);
		vorname=document.getElementById("vorname").value;
		//alert(vorname);
		adresse=document.getElementById("adresse").value;
		//alert(adresse);
		plz=document.getElementById("plz").value;
		//alert(plz);
		ort=document.getElementById("ort").value;
		//alert(ort);
		email=document.getElementById("email").value;
		//alert(email);
		sprache=document.getElementById("sprache").value;
		//alert(sprache);

		if(vorname==""){
			document.getElementById("txtErrorVorname").innerHTML = " Bitte Vorname ausfüllen!";
			x=false;
		}
		else{
			document.getElementById("txtErrorVorname").innerHTML = "";
		}
		if(name==""){
			document.getElementById("txtErrorName").innerHTML = " Bitte Name ausfüllen!";
			x=false;
		}
		else{
			document.getElementById("txtErrorName").innerHTML = "";
		}
		if(adresse==""){
			document.getElementById("txtErrorAdresse").innerHTML = " Bitte Strasse ausfüllen!";
			x=false;
		}
		else{
			document.getElementById("txtErrorAdresse").innerHTML = "";
		}
		if(plz==""){
			document.getElementById("txtErrorPlz").innerHTML = " Bitte PLZ ausfüllen!";
			x=false;
		}
		else if(plz.length<4){
			document.getElementById("txtErrorPlz").innerHTML = " Bitte PLZ ausfüllen!";
			x=false;
		}
		else{
			document.getElementById("txtErrorPlz").innerHTML = "";
		}
		if(ort==""){
			document.getElementById("txtErrorOrt").innerHTML = " Bitte Ort ausfüllen!";
			x=false;
		}
		else{
			document.getElementById("txtErrorOrt").innerHTML = "";
		}
		if(email==""){
			document.getElementById("txtErrorEmail").innerHTML = " Bitte E-Mail ausfüllen!";
			x=false;
		}
		else if (!validEmail(email)) {
			document.getElementById("txtErrorEmail").innerHTML = " Die E-Mail entspricht keinem Gültigen Format!";
			x=false;
		}
		else{
			document.getElementById("txtErrorEmail").innerHTML = " ";
		}

		if(!(Boolean(x))){

		return false;
		}
		//document.sendButton.submit();

	  }
	  function validEmail(email) {
		  var strReg = "^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$";
		  var regex = new RegExp(strReg);
		  return(regex.test(email));
		}

   </script>
<div class="row">
  <div class="col-md-3">

      </p>
    </div>
</div>

<div class="row">
    <div class="anmeldung col-md-12">
      <?php
      $anmeldung = $ebas->anmeldungen->neueAnmeldung($_POST);
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
          <td><select name="kurs">
              <?php
              $kurse = $ebas->kurse->getAlleKurse();
              foreach($kurse as $kurs){
								if($_GET["kurs"] == $kurs["kurs_id"]){
									echo '<option value="'.$kurs["kurs_id"].'" selected="selected">'.$kurs["bezeichnung_de"].'</option>';
								}else{
									echo '<option value="'.$kurs["kurs_id"].'">'.$kurs["bezeichnung_de"].'</option>';
								}
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <th>Name</th>
        </tr>
          <tr>
            <td><input type="text" name="name" id="name"><font id="txtErrorName" value="" color="#FF0000"></font> </td>
        </tr>
      <tr>
        <th>Vorname</th>
      </tr>
        <tr>
          <td><input type="text" name="vorname" id="vorname" ><font id="txtErrorVorname" value="" color="#FF0000"></font> </td>
        </tr>
      <tr>
        <th>Adresse</th>
      </tr>
        <tr>
          <td><input type="text" name="adresse" id="adresse" ><font id="txtErrorAdresse" value="" color="#FF0000"></font> </td>
        </tr>
      <tr>
        <th>PLZ</th>
      </tr>
        <tr>
          <td><input type="text" name="plz" id="plz"><font id="txtErrorPlz" value="" color="#FF0000"></font> </td>
        </tr>
      <tr>
        <th>Ort</th>
      </tr>
        <tr>
          <td><input type="text" name="ort" id="ort" ><font id="txtErrorOrt" value="" color="#FF0000"></font> </td>
        </tr>
      <tr>
        <th>E-Mail</th>
      </tr>
        <tr>
          <td><input type="text" name="email" id="email"><font id="txtErrorEmail" value="" color="#FF0000"></font> </td>
        </tr>
      <tr>
        <th>Sprache</th>
      </tr>
        <tr>
          <td>
			<select name="sprache" id="sprache" style="width: 100px">
				<option value="de">de</option>
				<option value="de">it</option>
				<option value="fr">fr</option>
			</select>

		  </td>
        </tr>
      <tr>
        <th>Gutschein</th>
      </tr>
        <tr>
          <td><input type="text" name="gutschein" ></td>
        </tr>

      </tbody>
    </table>
    <input class="btn btn-primary" type="submit" onSubmit="formtest()" id="sendButton" value="Speichern" >
  </form>
     </div>
</div>
<?php

require_once 'footer.php';

?>
