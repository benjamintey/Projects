<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="Images/Logo.png" id="logo">
    </div>
    <ul class="nav navbar-nav">
      <li <?php if ($_SESSION['page']=="Accueil") {
        echo 'class="active"';
      } ?>><a href="Accueil.php">Accueil</a></li>
      <li <?php if ($_SESSION['page']=="ConsulterProfil") {
        echo 'class="active"';
      } ?>><a href="ConsulterProfil.php">Consulter Votre Profil</a></li>
      <li <?php if ($_SESSION['page']=="GestionCommande") {
        echo 'class="active"';
      } ?>><a href="GestionCommande.php">Commandes</a></li>
      <li <?php if ($_SESSION['page']=="AjouterCommentaire") {
        echo 'class="active"';
      } ?>><a href="AjouterCommentaire.php">Ajout Commentaires</a></li>
      <li <?php if ($_SESSION['page']=="ConsultationCommentaires") {
        echo 'class="active"';
      } ?>><a href="ConsultationCommentaires.php">Consulter vos Commentaires</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li <?php if ($_SESSION['page']=="Inscription") {
        echo 'class="active"';
      } ?>><a href="<?php if(empty($_SESSION['oUtilisateur'])){echo "Inscription.php";}?>"><span class="glyphicon glyphicon-user"></span> <?php if(empty($_SESSION['oUtilisateur'])){echo "S'inscrire";}else{$Utilisateur = unserialize($_SESSION['oUtilisateur']);echo $Utilisateur->prenom.' '.$Utilisateur->nom;}
       ?>
      </a></li>
      <li <?php if ($_SESSION['page']=="Authentification") {
        echo 'class="active"';
      } ?>><a href="includes/deconnection.php"><span class="glyphicon glyphicon-log-in"></span> <?php if(empty($_SESSION['oUtilisateur'])){echo 'Se Connecter';}else{echo' Se Déconnecter';} ?></a></li>
    </ul>
  </div>
</nav>

</body>
</html>
