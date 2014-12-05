</div>

 <?php
      if(basename($_SERVER['PHP_SELF']) == "index.php" || basename($_SERVER['PHP_SELF']) == "login.php" ){
        echo '<script src="js/bootstrap.min.js"></script>';
        echo '<script src="js/ebas.js"></script>';
        echo '<script src="js/jquery-ui.custom.js"></script>';
        echo '<script src="js/jquery.js"></script>';
        echo '<script src="js/modernizr.js"></script>';
      }else{
        echo '<script src="../../js/bootstrap.min.js"></script>';
        echo '<script src="../../js/ebas.js"></script>';
        echo '<script src="../../js/jquery-ui.custom.js"></script>>';
        echo '<script src="../../js/jquery.js"></script>';
        echo '<script src="../../js/modernizr.js"></script>';
      }
    ?>
</body>
</html>
