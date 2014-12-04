<?php
require_once '../../ebas.class.php';
require_once '../../session.php';

//check Role
if($ebas->user->role >= 1){
  header('Location: ' .$loginUrl);
}

require_once '../../header.php';

 $ebas->interessenten->bereinigungInteressenten();
 header('Location: '."bereinigung-interessenten.php");
?>
