<!DOCTYPE html>
<?php
session_start();
require_once 'Classes/Utilisateur.php';
require_once 'Classes/Commentaires.php';
$oUtilisateur = unserialize($_SESSION['oUtilisateur']);
$_SESSION['page']='ConsultationCommentaires';
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
      require_once 'includes/consultation_commentaires_clients.php';
    }
    else
    {
      require_once 'includes/navbarManager.php';
      require_once 'includes/consultation_commentaires.php';
    }
    require_once 'includes/gestion-erreur.php';
    require_once 'includes/footer.php';
?>
</html>
