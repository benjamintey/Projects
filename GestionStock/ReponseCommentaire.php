<!DOCTYPE html>
<?php
session_start();
require_once 'Classes/Utilisateur.php';
require_once 'Classes/Commentaires.php';
$oUtilisateur = unserialize($_SESSION['oUtilisateur']);
if($oUtilisateur == NULL)
    {
        header('location:Authentification.php');
    }
else
{
      if ($oUtilisateur->Manager == 0)
      {
        header('location:Accueil.php');
      }
}
?>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="StyleSheet.css" rel="stylesheet">
  <title></title>
</head>
<?php
    require_once 'includes/navbarManager.php';
    require_once 'includes/reponse_commentaires.php';
    require_once 'includes/gestion-erreur.php';
    require_once 'includes/footer.php';
?>
</html>
