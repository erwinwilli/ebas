
function formTestAnmeldung (){
	/*
	Diese Funktion überprüft ob alle Felder in der Seite neueAnmeldung.php ausgefüllt sind.
	Wenn diese Felder Leer sind, wird eine Fehlermeldung bei dem betreffenden Feld ausgegeben
	und der SQL Insert befehl wird abgebrochen da der return wert FALSE ist.


	*/
	var x = true; //Booleanscher wert


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
  /*
  Diese Funktion überprüft ob der Übergebene String der einer Email entspricht.
  er wird geprüft ob auf eine bellibiglange Zeichenkette ein "@" zeichen folgt,
  worafhin wieder auf eine belibiglange Zeichenkette ein "." folg
  und nach dem Punkt zwischen 2 bis 4 Zeichen stehen,
  */
	  var strReg = "^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$";
	  var regex = new RegExp(strReg);
	  return(regex.test(email));
	}

function formTestInteressent (){
	/*
	Diese Funktion überprüft ob alle Felder in der Seite neuerinteressent.php ausgefüllt sind.
	Wenn diese Felder Leer sind, wird eine Fehlermeldung bei dem betreffenden Feld ausgegeben
	und der SQL Insert befehl wird abgebrochen da der return wert FALSE ist.


	*/
	var x = true; //Booleanscher wert


	var name, vorname, adresse, plz, ort, kursort, email, sprache;
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
	kursort=document.getElementById("kursort").value;
	//alert(kursort);
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
	if(kursort==""){
		document.getElementById("txtErrorKursort").innerHTML = " Bitte Kursort ausfüllen!";
		x=false;
	}
	else{
		document.getElementById("txtErrorKursort").innerHTML = "";
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
	/*
	Diese Funktion überprüft ob der Übergebene String der einer Email entspricht.
	er wird geprüft ob auf eine bellibiglange Zeichenkette ein "@" zeichen folgt,
	worafhin wieder auf eine belibiglange Zeichenkette ein "." folg
	und nach dem Punkt zwischen 2 bis 4 Zeichen stehen,
	*/
		var strReg = "^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$";
		var regex = new RegExp(strReg);
		return(regex.test(email));
}

function formTestKurs (){
	/*
	Diese Funktion überprüft ob alle Felder in der Seite neuerkurs.php ausgefüllt sind.
	Wenn diese Felder Leer sind, wird eine Fehlermeldung bei dem betreffenden Feld ausgegeben
	und der SQL Insert befehl wird abgebrochen da der return wert FALSE ist.

	*/

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
