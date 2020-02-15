<?php

$oLigneFHFs = new CligneFraisFHFs;


if(isset($_GET['idLFHF']))
{
    try {
        
        $oLigneFHFs->deleteFHF($_GET['idLFHF']);
        echo '<meta http-equiv="refresh" content="0;URL=SaisieFicheFrais.php">';
        //header('location:SaisieFicheFrais.php'); 
        
    } catch (Exception $ex) {
        
        $errorMsg = "La ligne n° ".$_GET['idLFHF']." "." n'a pas été correctement correctement supprimée.";
        
    }   
    
}
?>
<div class="container">
    <h4><p class="text-primary">Récapitulatif des frais hors forfait du mois :<?= ' '.moisEnFrancais(date('F')).' ';?><span class="glyphicon glyphicon-align-justify"></p></h4>
 
  <table class='table table-hover'>
    <thead>
       <tr class='bg-info'>
        <th>Libellé</th>
        <th>Date</th>
        <th>Montant</th>
        <th>Action</th>  <!-- supprimer ligne -->
      </tr>
    </thead>
    <tbody>
        <?php
        
        $mois = getAnneeMois();
        $ovisiteur = unserialize($_SESSION['ovisiteur']);
        $ocollLigneFHFsByVisiteur = $oLigneFHFs->getFHFByIdVisiteurMois($ovisiteur->id, $mois);
        if($ocollLigneFHFsByVisiteur != null)
        {
            foreach($ocollLigneFHFsByVisiteur as $LigneFHF)
            { ?>
                <tr>
                    <td><?=$LigneFHF->libelle?></td>
                    <td><?=$LigneFHF->date?></td>
                    <td <?=($LigneFHF->montant >= 100)?"class='text-danger'":"";?>><?=$LigneFHF->montant?></td>
                    <td><a href="SaisieFicheFrais.php?idLFHF='<?=$LigneFHF->id?>'" class="btn btn-danger" id="btnSuppLigneFHF" role="button">Supprimer</a></td>
                </tr>
          <?php  }  
        }
        else
        {
            $errorMsg = "Pas de frais hors forfait enregistrés ";
        }
        ?>

        

    </tbody>
  </table>

        
