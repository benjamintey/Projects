<?php session_start(); ?>
<div class="container"
<?php
            require_once 'includes/functions.php';         
            require_once 'mesClasses/Cvisiteurs.php';
            
            if (!empty($_POST['username']) && !empty($_POST['pwd']))
            {
                $name = $_POST['username'];
                $mdp = $_POST['pwd'];
                
                $ovisiteurs = new Cvisiteurs();
                $ovisiteur = $ovisiteurs->verifierInfosConnexion($name,$mdp);
                
                if($ovisiteur != NULL)
                {
                  $_SESSION['visiteur'] = serialize($ovisiteur);
                  header('location:saisirFicheFrais.php');  
                 
                }
                
                $errorMsg = 'Login ou mot de passe incorrect !';
            }
            
                
            
        ?>

             <br>
             <br>
              <form role="form" method="post" action="<?=$formAction?>" class="formLogin">
                <div class="form-group">
                  <label class="control-label">Username:</label>
                  <input type="text" class="form-control" name="username"  placeholder="Enter username">
                </div>
                <div class="form-group">
                  <label class="control-label">Password:</label>
                  <input type="password" class="form-control" name="pwd"  placeholder="Enter password">
                </div>
                <!--<div class="checkbox">
                  <label><input type="checkbox"> Remember me</label>
                </div>-->
                <button type="submit" class="btn btn-default">Submit</button>
              </form>

</div>
        
        