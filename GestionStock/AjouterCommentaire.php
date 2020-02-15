<!DOCTYPE html>
<?php
session_start();
require_once 'Classes/Utilisateur.php';
$oUtilisateur = unserialize($_SESSION['oUtilisateur']);
$_SESSION['page']='AjouterCommentaire';
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
    require_once 'includes/navbarClient.php';
    require_once 'includes/ajout_commentaire.php';
    require_once 'includes/gestion-erreur.php';
    require_once 'includes/footer.php';
 ?>

</html>
