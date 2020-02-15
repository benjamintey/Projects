<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title></title>
  </head>
  <body>
    <?php
            if (!empty($_POST['login']) && !empty($_POST['mdp']))
        {
          $Utilisateurs = new c_oUtilisateur();
          $oUtilisateur = $Utilisateurs->verifierInfosConnexion($_POST['login'],$_POST['mdp']);

          if(!empty($oUtilisateur))
          {
              $_SESSION['oUtilisateur'] =  serialize($oUtilisateur);
              if ($oUtilisateur->Manager=='1')
              {
                header('location:GererProduits.php');
              }
              else {
                header('location:GestionCommande.php');
              }
          }
          else{
              $errorMsg = 'Login ou mot de passe incorrect !';
          }

        }
?>
    <div class="container">
      <h2>S'authentifier</h2>
      <form class="form-horizontal" method="post" action="Authentification.php">
        <div class="form-group">
          <label class="control-label col-md-2" for="username">Login:</label>
          <div class="col-md-3">
            <input type="text" class="form-control" id="login" placeholder="Entrer votre login" name="login">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-2" for="pwd">Mot de passe:</label>
          <div class="col-md-3">
            <input type="password" class="form-control" id="mdp" placeholder="Entrer votre Mot de Passe" name="mdp">
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-offset-2 col-md-10">
            <button type="submit" class="btn btn-default">Se Connecter</button>
          </div>
        </div>
      </form>

  <form action="Inscription.php" method="post">
    <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
        <button type="submit" class="btn btn-default">S'inscrire</button>
      </div>
    </div>
</form>
</div>
  </body>
</html>
