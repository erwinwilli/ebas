<?php
require_once 'ebas.class.php';
require_once 'session.php';
require_once 'header.php';

 $ebas->interessenten->bereinigungInteressenten();
 header('Location: '."bereinigung.php");
?>
