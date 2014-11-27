<?php

require_once 'ebas.class.php';
require_once 'session.php';

if(isset($_COOKIE["session"])){
  $ebas->session->delete($_COOKIE["session"]);
  header('Location: login.php');
}

?>
