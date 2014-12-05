</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

  <?php
      if(basename($_SERVER['PHP_SELF']) == "index.php" ){
        echo '<script src="js/bootstrap.min.js"></script>';
        echo '<script src="js/ebas.js"></script>';
        echo '<script src="js/jquery-ui.custom.js"></script>';
        echo '<script src="js/ebas.js"></script>';
      }else{
        echo '<script src="../../js/bootstrap.min.js"></script>';
        echo '<script src="../../js/ebas.js"></script>';
        echo '<script src="../../js/jquery-ui.custom.js"></script>>';
        echo '<script src="../../js/ebas.js"></script>';
      }
    ?>
</body>
</html>
