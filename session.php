<?php
//const Host_URL definieren "/github/" = Pfad zu ebas
define("EBAS_URL", "http://".$_SERVER["HTTP_HOST"]."/github/");
$loginUrl = EBAS_URL.'ebas/login.php';
$logoutUrl = EBAS_URL.'ebas/logout.php';
$rootUrl = EBAS_URL.'ebas/';
$jsUrl = EBAS_URL.'ebas/js/';
$cssUrl = EBAS_URL.'ebas/css/';
$webAnmeldungUrl = EBAS_URL.'ebas/Web/Anmeldungen/';
$webInteressentenUrl = EBAS_URL.'ebas/Web/Interessenten/';
$webKurseUrl = EBAS_URL.'ebas/Web/Kurse/';
$webUserUrl = EBAS_URL.'ebas/Web/User/';


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
