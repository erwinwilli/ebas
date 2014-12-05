
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

	$.fn.table2CSV = function(options){

  // get function options
  var options = $.extend({
    separator: ',',
    header: [],
    delivery: 'showCSV'
  },
  options);

  // arrays of csv rows
  var csvData = [];

  // this table
  var table = this;
  //header
  var headerRow = [];

  // construct header avalible array
  $(table).filter(':visible').find('th').each(function(){
    headerRow[headerRow.length] = formatData($(this).html());
  });
  // add to row to csv
  row2CSV(headerRow);

  // actual data
  $(table).find('tr').each(function(){
    var dataRow = [];
    $(this).filter(':visible').find('td').each(function(){
      // get select id
      if($(this).find('select').length){
        content = $(this).find('select').val();
      }else{
        content = $(this).html();
      }
      if($(this).css('display') != 'none'){
        dataRow[dataRow.length] = formatData(content);
      }
    });
    row2CSV(dataRow);
  });

  if(options.delivery == 'showCSV'){
    var data = csvData.join('\n');
    return showCSV(data);
  }else{
    var data = csvData.join('\n');
    return data;
  }

  // function to generate csv from different rows
  function row2CSV(dataRow){
    var tmp = dataRow.join('');
    // to remove any blank rows
    if (dataRow.length > 0 && tmp != '') {
      var csvrow = dataRow.join(options.separator);
      csvData[csvData.length] = csvrow;
    }
  }

  // remove invalid characters
  function formatData(input) {
    // replace " with â€œ
    var regexp = new RegExp(/["]/g);
    var output = input.replace(regexp, "â€œ");
    //HTML
    var regexp = new RegExp(/\<[^\<]+\>/g);
    var output = output.replace(regexp, "");
    if (output == "") return '';
    return '"' + output + '"';
  }

  // add link to csv file
  function showCSV(data) {
    // add link to csv file to page
    var blob = new Blob([data], { type: 'text/csv;charset=utf-8;' });
    if (navigator.msSaveBlob) { // IE 10+
      navigator.msSaveBlob(blob, document.title+".csv");
    }else{
      var link = document.createElement("a");
      if (link.download !== undefined) { // feature detection
        // Browsers that support HTML5 download attribute
        var url = URL.createObjectURL(blob);
        link.setAttribute("href", url);
        link.setAttribute("download", document.title+".csv");
        link.style = "visibility:hidden";
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      }
    }
  }
}

// csv export
$("button.export-csv").click(function(){
  $('table').table2CSV();
});
