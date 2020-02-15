<!DOCTYPE html>
<?php
session_start();
$_SESSION['page']='Accueil';
require_once 'Classes/Utilisateur.php';
if (!empty($_SESSION['oUtilisateur']))
{
  $oUtilisateur = unserialize($_SESSION['oUtilisateur']);
  if ($oUtilisateur->Manager == 0)
  {
    require_once 'includes/navbarClient.php';
  }
  else
  {
    require_once 'includes/navbarManager.php';
  }
}
else
{
  require_once 'includes/navbarClient.php';
}
 ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title></title>
  </head>
  <body>
    <p>wewe le sang petite presentation de mon entreprise : la honda</p>
    <a href="Authentification.php"><button type="button" name="button">Authentification</button></a>
  </body>
</html>
<?php 
require_once 'includes/footer.php';
 ?>
