<div class="container">
    <h4><p class="text-primary">Modifier le produit :</p></h4>
<form action="FormulaireModification.php" method="post">
  <table class='table table-hover'>
    <thead>
       <tr class='bg-info'>
        <th>Référence</th>
        <th>Libellé</th>
        <th>Catégorie</th>
        <th>Marque</th>
        <th>Quantité en stock</th>
        <th>Prix Unitaire</th>
        <th>Description</th>
        <th>Taux TVA</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $oUtilisateur = unserialize($_SESSION['oUtilisateur']);
        $oProduit = unserialize($_SESSION['oProduit']);
        $oTauxTVA = new c_oTVA();
        if (!empty($_POST['Quantite']) && !empty($_POST['Prix']) && !empty($_POST['TVA']) && !empty($_POST['valider']))//verifie si le bouton valider a ete cliquer
        {
          unset($_SESSION['oProduit']);
          $oAccesBase = new c_AccesBase();
          $query = 'UPDATE produits SET Quantite ="'.$_POST['Quantite'].'", Prix="'.$_POST['Prix'].'", TVA="'.$_POST['TVA'].'", Description = "'.$_POST['Description'].'" WHERE Reference = "'.$_POST['valider'].'"';
          $oAccesBase->update($query);//execute la requete avec le contenant des champs remplies
          header('location:GererProduits.php');
        }
        ?>
                <tr>
                    <td><?=$oProduit->Reference?></td>
                    <td><?=$oProduit->Libelle?></td>
                    <td><?=$oProduit->oCategorie->Libelle?></td>
                    <td><?=$oProduit->oMarque->Libelle?></td>
                    <td><input type="number" name="Quantite" required value="<?=$oProduit->Quantite?>"></td>
                    <td><input type="number" name="Prix" required value="<?=$oProduit->Prix?>"></td>
                    <td><input type="text" name="Description" value="<?=$oProduit->Description?>"></td>
                    <td><select name="TVA"><?php
                    foreach ($oTauxTVA->collTauxTVA as $unTauxTVA)
                    {
                      ?> <option <?php if($oProduit->oTVA->Taux == $unTauxTVA->Taux){echo "selected='selected'";} ?>value="<?php echo $unTauxTVA->ID?>"><?php echo $unTauxTVA->Taux ?></option> <?php
                    }
                    ?></select></td>
                    <button name="valider" id="valider" type="submit" class="btn btn-success" value="<?=$oProduit->Reference?>">Valider</button>
  </form>
                    <form  method="post" action="GererProduits.php"><button name="annuler" id="annuler" type="submit" class="btn btn-danger" value="annuler">Annuler</button></form>
                    <td><form  method="post" action="includes/supprimer_produit.php"><button id="bouton_supprimer" type="submit" name="supprimer" value="<?php echo $oProduit->Reference ?>"><img id="croix" src="Images/Croix.png"></button></form></td>
                </tr>
    </tbody>
</div>
