<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
                if (isset($_POST['username']) && isset($_POST['pwd']))
            {


                $lesVisiteurs = new Cvisiteurs();
                $ovisiteur = $lesVisiteurs->verifierInfosConnexion($_POST['username'],$_POST['pwd']);


                if(!empty($ovisiteur))
                {
                    $_SESSION['ovisiteur'] =  serialize($ovisiteur);

                    header('location:SaisieFicheFrais.php');
                }
                else{
                    $errorMsg = 'Login ou mot de passe incorrect !';
                }
            }
    ?>
<div class="container">
  <h2>Se Connecter à GSB</h2>
  <form class="form-horizontal" method="post" action="<?= $formAction ?>">
    <div class="form-group">
      <label class="control-label col-md-2" for="username">Username:</label>
      <div class="col-md-3">
        <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-2" for="pwd">Password:</label>
      <div class="col-md-3">
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
    </div>
    <div class="form-group">
      <div class="col-md-offset-2 col-md-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>
