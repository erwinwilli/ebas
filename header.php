<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>eBanking - aber sicher!</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="../../css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!-- link href="theme.css" rel="stylesheet" -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body id="ebas">
  <nav class="navbar navbar-default" role="navigation">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../../index.php">ebas</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Aufgaben <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="Web/Kurse/kurse-liste.php">Alle Kurse</a></li>
            <li><a href="Web/Anmeldungen/anmeldungen-liste.php">Alle Anmeldungen</a></li>
            <li><a href="Web/Interessenten/interessenten-liste.php">Alle Interessenten</a></li>
            <li class="divider"></li>
            <li><a href="Web/Anmeldungen/neuanmeldung.php">Neuer User erstellen</a></li>
			<li><a href="Web/Kurse/neuerkurs.php">Neuen Kurs erstellen</a></li>
			<li><a href="Web/Kurse/kurse-bearbeiten-liste.php">Kurse bearbeiten</a></li>
            <li class="divider"></li>
            <li><a href="Web/Interessenten/bereinigung.php">Bereinigungslauf</a></li>
          </ul>
      </li>
        <li><a href="task.php">Aufgaben</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="search form-control" placeholder="Search">
        </div>
      </form>
      <li><a href="help.php">Help</a></li>
      <?php
        if(basename($_SERVER['PHP_SELF']) !== "login.php"){
          echo '<li><a href="logout.php">Ausloggen</a></li>';
        }
      ?>
      </ul>
    </div>
  </nav>
  <div class="container">
