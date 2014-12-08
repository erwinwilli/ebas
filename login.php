<?php

error_reporting( E_ALL );
ini_set('display_errors', 'On');

require_once 'ebas.class.php';
require_once 'session.php';
require_once 'header.php';

if(isset($_POST) && !empty($_POST)){
  if($ebas->session->set($_POST["username"],$_POST["password"])){
    header('Location: index.php');
    exit;
  }
}

?>

<div class="row">
    <div class="anmeldung col-md-12">
        <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="POST" class="form-signin" role="form">
          <h2 class="form-signin-heading">Bitte loggen Sie sich ein.</h2>
          <input name="username" type="name" class="form-control" placeholder="Benutzername" required="" autofocus=""><br />
          <input name="password" type="password" class="form-control" placeholder="Passwort" required=""><br />
          <input class="btn btn-lg btn-primary btn-block" type="submit" value="Einloggen">
        </form>
     </div>
</div>
<?php

require_once 'footer.php';

?>
