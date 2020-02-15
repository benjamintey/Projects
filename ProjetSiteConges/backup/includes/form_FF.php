<?php
$oLigneFFs = new CligneFFs;
$oVisiteur = unserialize($_SESSION['visiteur']);
if(isset($_POST['btnFF']))
{
    $tabIdFrais = array();
    $tabIdFrais[0] = 'ETP';
    $tabIdFrais[1] = 'KM';
    $tabIdFrais[2] = 'NUI';
    $tabIdFrais[3] = 'REP';
    
    for($x=0;$x<4;$x++)
    {
        $oLigneFFs->updateLigneFF($_POST[$tabIdFrais[$x]],$tabIdFrais[$x]);
    }
    
    header('location:saisirFicheFrais.php'); 
}
 else 
 {
     //Cela va créer les quatre lignes FF à 0
     $oLigneFFs->verifExistLFFByIdVisiteurMois($ovisiteur->id);
 }
 $oLigneFFs = new CligneFFs;
 $ocollLigneFF = $oLigneFFs->getLFFByIdVisiteurMois($ovisiteur->id);
?>

<div class="container">
  <h3><p class="text-primary page-header">Saisie des frais forfaitaires <span class="text-primary glyphicon glyphicon-pencil"</p></h3>
    <br>
  <form class="form-horizontal" action="<?=$_SERVER['PHP_SELF']?>" method="POST">
    <div class="form-group">
      <label class="control-label col-sm-2" for="etape">Forfait étape:</label>
      <div class="col-sm-4">
        <input type="number" step="1" min="0" class="form-control" id="etape" name="ETP" value="<?=$ocollLigneFF[0]->quantite?>">
      </div>
      <div class="well well-sm col-sm-4">110.0</div>
    </div>
      
    <div class="form-group">
      <label class="control-label col-sm-2" for="fraiskilometrique">Frais kilométrique:</label>
      <div class="col-sm-4">          
        <input type="number" step="1" min="0" class="form-control" id="fraiskilometrique" name="KM" value="<?=$ocollLigneFF[1]->quantite?>">
      </div>
      <div class="well well-sm col-sm-4">0.62</div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="nuitee">Nuitée hôtel:</label>
      <div class="col-sm-4">          
        <input type="number" step="1" min="0" class="form-control" id="nuitee" name="NUI" value="<?=$ocollLigneFF[2]->quantite?>">
      </div>
      <div class="well well-sm col-sm-4">80.00</div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Repas">Repas restaurant:</label>
      <div class="col-sm-4">          
        <input type="number" step="1" min="0" class="form-control" id="nuitee" name="REP" value="<?=$ocollLigneFF[3]->quantite?>">
      </div>
      <div class="well well-sm col-sm-4">25.00</div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="btnFF" class="btn btn-default">Enregistrer</button>
      </div>
    </div>
  </form>
</div>

