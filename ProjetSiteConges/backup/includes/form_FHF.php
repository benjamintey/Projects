<?php

if(isset($_POST['btnFHF']))
{
    if(isset($_POST["libelle"]) && isset($_POST["montant"]))
    {
        //require_once '../Classes/Cfrais.php';
        
        $oLigneFHFs = new CligneFraisFHFs;
        try {
            
            $oLigneFHFs->insertFHF($_POST["libelle"], $_POST["montant"]);
            
        } catch (Exception $ex) {
            
            $errorMsg = "Erreur lors de l'insertion dans la base.".$ex->getMessage()." Prévenir l'administrateur.";
        }
        
    }
}
?>
<div class="container">
    <h3><p class="text-primary page-header">Saisie des frais hors forfait <span class="text-primary glyphicon glyphicon-pencil"</p></h3>
    <br>      
    <form id="formFHF" class="form-horizontal" role="form" method="post" action="<?= $formAction ?>">
           <!--   <input type="hidden" name="leformulaire" value="validerSaisieFHF" /> -->
            <div class="form-group">
              <label class="control-label col-sm-2" for="libelle">Libellé:</label>
              <div class="col-sm-10">
                  <textarea type="text" class="form-control" name="libelle" placeholder="Entrer libelle frais" required autofocus></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="montant">Montant:</label>
              <div class="col-sm-10">
                  <input class="form-control" name="montant" placeholder="Entrer montant frais" required="required" type="number" min="0" step="0.01">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="btnFHF" class="btn btn-default">Enregistrer</button>
              </div>
            </div>
    </form>
</div>

