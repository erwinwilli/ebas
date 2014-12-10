<?php
require_once '../../ebas.class.php';
require_once '../../session.php';

//check Role
if($ebas->user->role > 0){
  header('Location: ' .$loginUrl);
  exit;
}

require_once '../../header.php';

 $ebas->interessenten->bereinigungInteressenten();

 $test = "bereinigung-interessenten.php";
 ?>
 <script type="text/javascript">//Musste mit JS gelöst werden da mehrer Header Location aufrufe nicht möglich sind.
  document.location='<?php echo $test; ?>';
 </script>
