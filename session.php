<?php
//const Host_URL definieren "/github/" = Pfad zu ebas
define("EBAS_URL", "http://".$_SERVER["HTTP_HOST"]."/github/");
$loginUrl = EBAS_URL.'ebas/login.php';

$ebas = new ebas;
if(!isset($_COOKIE['session']) && basename($_SERVER['PHP_SELF']) !== "login.php"){
  header('Location: '.$loginUrl);
} elseif(isset($_COOKIE['session'])){
  if(isset($_COOKIE['user']) && isset($_COOKIE['session'])){
    if(!$ebas->session->validate($_COOKIE['session'],$_COOKIE['user']) && basename($_SERVER['PHP_SELF']) !== "login.php"){
      header('Location: '.$loginUrl);
    }
  }
}
?>
