<!DOCTYPE html>
<?php
session_start();
require_once 'Classes/Utilisateur.php';
require_once 'Classes/Produits.php';
require_once 'Classes/Marques.php';
$oUtilisateur = unserialize($_SESSION['oUtilisateur']);
$_SESSION['page']='GestionCommande';
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
    require_once 'includes/commande_produit.php';
    require_once 'includes/gestion-erreur.php';
    require_once 'includes/footer.php';
?>
</html>
