<!DOCTYPE html>
<?php
session_start();
require_once 'Classes/Utilisateur.php';
$oUtilisateur = unserialize($_SESSION['oUtilisateur']);
$_SESSION['page']='ConsulterProfil';
if($oUtilisateur == NULL)
    {
        header('location:Authentification.php');
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
if ($oUtilisateur->Manager == 0)
{
  require_once 'includes/navbarClient.php';
}
else
{
  require_once 'includes/navbarManager.php';
}
    require_once 'includes/consulter_profil.php';
    require_once 'includes/gestion-erreur.php';
    require_once 'includes/footer.php';
?>
</html>
