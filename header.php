<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo $rootUrl;?>favicon.ico">

    <title>eBanking - aber sicher!</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo $cssUrl;?>bootstrap.min.css" rel="stylesheet">

    <script type="text/javascript" src="<?php echo $jsUrl;?>bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $jsUrl;?>ebas.js"></script>
    <script type="text/javascript" src="<?php echo $jsUrl;?>jquery-ui.custom.js"></script>
    <script type="text/javascript" src="<?php echo $jsUrl;?>jquery.js"></script>
    <script type="text/javascript" src="<?php echo $jsUrl;?>jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $jsUrl;?>modernizr.js"></script>
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

      <a class="navbar-brand" href="<?php echo $rootUrl;?>index.php">ebas</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Kurse <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo $webKurseUrl;?>kurse-liste.php">Alle Kurse</a></li>
            <li><a href="<?php echo $webKurseUrl;?>neuerkurs.php">Neuen Kurs erstellen</a></li>
            <li><a href="<?php echo $webKurseUrl;?>kurse-bearbeiten-liste.php">Kurse bearbeiten</a></li>
          </ul>
      </li>

      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Anmeldungen <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo $webAnmeldungUrl;?>anmeldungen-liste.php">Alle Anmeldungen</a></li>
            <li><a href="<?php echo $webAnmeldungUrl;?>neuanmeldung.php">Neue Anmeldung erstelle</a></li>
          </ul>
      </li>

      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Interessenten <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo $webInteressentenUrl;?>interessenten-liste.php">Alle Interessenten</a></li>
            <li><a href="<?php echo $webInteressentenUrl;?>neuerinteressent.php">Neuer Interessent erstellen</a></li>
          </ul>
      </li>
      <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bereinigungen <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo $webInteressentenUrl;?>bereinigung-interessenten.php">Interessenten Bereinigung </a></li>
            <li><a href="<?php echo $webKurseUrl;?>bereinigung-kurse.php">Kurse Bereinigung </a></li>
          </ul>
      </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
      <?php
        if(basename($_SERVER['PHP_SELF']) !== "login.php" ){
            if($ebas->user->role < 1){
              echo '<li><a href="'.$webUserUrl.'neueruser.php">Neuer User erstellen</a></li>';
              echo '<li><a href="'.$logoutUrl.'">Ausloggen</a></li>';
            }else{
              echo '<li><a href="logout.php">Ausloggen</a></li>';
              }
        }
      ?>
      </ul>
    </div>
  </nav>
  <div class="container">
