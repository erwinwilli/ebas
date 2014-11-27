<?php
$ebas = new ebas;
if(!isset($_COOKIE['session']) && basename($_SERVER['PHP_SELF']) !== "login.php"){
  header('Location: login.php');
} elseif(isset($_COOKIE['session'])){
  if(isset($_COOKIE['user']) && isset($_COOKIE['session'])){
    if(!$ebas->session->validate($_COOKIE['session'],$_COOKIE['user']) && basename($_SERVER['PHP_SELF']) !== "login.php"){
      header('Location: login.php');
    }
  }
}
?>
