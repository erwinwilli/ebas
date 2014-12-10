<?php
require_once '../../ebas.class.php';
require_once '../../session.php';
//check Role
if($ebas->user->role > 0){
  header('Location: ' .$loginUrl);
}

require_once '../../header.php';

 $kurse = $ebas->kurse->getAlleVergangenenKurse();

  foreach($kurse as $kurs){
    $kurse2 = $ebas->anmeldungen->getAnmeldungen($kurs['kurs_id']);

      if(empty($kurse2)){
        $ebas->kurse->deleteKurs($kurs['kurs_id']);
      }else{
        $ebas->anmeldungen->deleteAnmeldungWithKurs($kurs['kurs_id']);
        $ebas->kurse->deleteKurs($kurs['kurs_id']);
      }
  }
 header('Location: '."bereinigung-kurse.php");
?>
