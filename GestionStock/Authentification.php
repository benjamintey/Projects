<!DOCTYPE html>
<?php
session_start();
$_SESSION['page'] = "Authentification";
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title></title>
  </head>
    <body>

    <?php
        require_once 'Classes/Utilisateur.php';
        require_once 'includes/navbarClient.php';
        require_once 'includes/form_authentification.php';
        require_once 'includes/gestion-erreur.php';
        require_once 'includes/footer.php';
    ?>
    </body>
</html>
