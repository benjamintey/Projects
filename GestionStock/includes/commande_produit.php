<?php
$oUtilisateur = unserialize($_SESSION['oUtilisateur']);
if (!empty($_SESSION['erreur']))
{
  $errorMsg = $_SESSION['erreur'];
  unset($_SESSION['erreur']);
}
$oProduit = new c_oProduits();
$oMarques = new c_oMarques();
$oCategories = new c_oCategories();
$collProduits = $oProduit->collProduits;
?>
 <div class="container">
   <a href="AjouterProduit.php"><img id="ajouter" src="Images/Ajouter.png"></a>
     <form action="GestionCommande.php" method="post">
       <span>Marque :</span>
       <select name="Marque">
         <option value="toutes">Toutes</option>
         <?php
         foreach ($oMarques->collMarques as $uneMarque)//ajoute le libelle de la marque dans le select en parcourant la collection des marques
         {
           ?> <option <?php if (!empty($_POST['Marque'])) { if($_POST['Marque']==$uneMarque->ID){echo "selected";}}?> value="<?php echo $uneMarque->ID?>"><?php echo $uneMarque->Libelle ?></option> <?php
         }//verifie si $_POST['Marque'] existe donc si le bouton Afficher a ete cliquer, recupere la valeur du select et la preselectionne
         ?>
       </select>
       <span>Categorie :</span>
       <select name="Categorie">
         <option value="toutes">Toutes</option>
         <?php
       foreach ($oCategories->collCategories as $uneCategorie)//idem que pour les marques
       {
         ?> <option <?php if (!empty($_POST['Categorie'])) { if($_POST['Categorie']==$uneCategorie->ID){echo "selected";}}?> value="<?php echo $uneCategorie->ID?>"><?php echo $uneCategorie->Libelle ?></option> <?php
       }
       ?></select>
       <button type="submit" class="btn btn-default">Afficher</button>
     </form>

    <h4><p class="text-primary">Liste des Produits :</p></h4>

  <table class='table table-hover'>
    <thead>
       <tr class='bg-info'>
        <th>Référence</th>
        <th>Libellé</th>
        <th>Catégorie</th>
        <th>Marque</th>
        <th>Prix Unitaire</th>
        <th>Description</th>
        <th>Quantité en stock</th>
        <th>Quantité commandée</th>
      </tr>
    </thead>
    <tbody>
      <form action="includes/valider_commande.php" method="post">
        <?php
        $compteur = 0;
        if($collProduits != null)
        {
          if (!empty($_POST['Marque']))
          {
            if ($_POST['Marque'] != 'toutes' && $_POST['Categorie'] != 'toutes')
            {
              foreach($collProduits as $unProduit)
              {
                if ($unProduit->oMarque->ID == $_POST['Marque'] && $unProduit->oCategorie->ID == $_POST['Categorie'])
                {
                  $compteur = 1;
                ?>
                <tr>
                  <td><?=$unProduit->Reference?></td>
                  <td><?=$unProduit->Libelle?></td>
                  <td><?=$unProduit->oCategorie->Libelle?></td>
                  <td><?=$unProduit->oMarque->Libelle?></td>
                  <td><?=$unProduit->Prix?></td>
                  <td><?=$unProduit->Description?></td>
                  <td><?=$unProduit->Quantite?></td>
                  <td><input type="text" class="form-control" id="login" name="<?php echo $unProduit->Reference?>"></td>
                </tr> <?php
              }
              }
            }
            elseif ($_POST['Marque'] == 'toutes' && $_POST['Categorie'] != 'toutes')
            {
              foreach($collProduits as $unProduit)
              {
                if ($unProduit->oCategorie->ID == $_POST['Categorie'])
                {
                  $compteur = 1;
                ?>
                <tr>
                  <td><?=$unProduit->Reference?></td>
                  <td><?=$unProduit->Libelle?></td>
                  <td><?=$unProduit->oCategorie->Libelle?></td>
                  <td><?=$unProduit->oMarque->Libelle?></td>
                  <td><?=$unProduit->Prix?></td>
                  <td><?=$unProduit->Description?></td>
                  <td><?=$unProduit->Quantite?></td>
                  <td><input type="text" class="form-control" id="login" name="<?php echo $unProduit->Reference?>"></td>
                </tr> <?php
              }
              }
            }
            elseif ($_POST['Marque'] != 'toutes' && $_POST['Categorie'] == 'toutes')
            {
              foreach($collProduits as $unProduit)
              {
                if ($unProduit->oMarque->ID == $_POST['Marque'])
                {
                  $compteur = 1;
                ?>
                <tr>
                  <td><?=$unProduit->Reference?></td>
                  <td><?=$unProduit->Libelle?></td>
                  <td><?=$unProduit->oCategorie->Libelle?></td>
                  <td><?=$unProduit->oMarque->Libelle?></td>
                  <td><?=$unProduit->Prix?></td>
                  <td><?=$unProduit->Description?></td>
                  <td><?=$unProduit->Quantite?></td>
                  <td><input type="text" class="form-control" id="login" name="<?php echo $unProduit->Reference?>"></td>
                </tr> <?php
              }
              }
            }
            else
            {
              $compteur = 1;
              foreach($collProduits as $unProduit)
              {?>
                <tr>
                  <td><?=$unProduit->Reference?></td>
                  <td><?=$unProduit->Libelle?></td>
                  <td><?=$unProduit->oCategorie->Libelle?></td>
                  <td><?=$unProduit->oMarque->Libelle?></td>
                  <td><?=$unProduit->Prix?></td>
                  <td><?=$unProduit->Description?></td>
                  <td><?=$unProduit->Quantite?></td>
                  <td><input type="text" class="form-control" id="login" name="<?php echo $unProduit->Reference?>"></td>
                </tr> <?php
              }
            }
          }
          else
          {
            $compteur = 1;
            foreach($collProduits as $unProduit)
            {?>
              <tr>
                <td><?=$unProduit->Reference?></td>
                <td><?=$unProduit->Libelle?></td>
                <td><?=$unProduit->oCategorie->Libelle?></td>
                <td><?=$unProduit->oMarque->Libelle?></td>
                <td><?=$unProduit->Prix?></td>
                <td><?=$unProduit->Description?></td>
                <td><?=$unProduit->Quantite?></td>
                <td><input type="text" class="form-control" id="login" name="<?php echo $unProduit->Reference?>"></td>
              </tr> <?php
            }
          }
        }
        else
        {
            $errorMsg = "Liste de Produits Vide ";
        }
        if ($compteur ==0)
        {
          $errorMsg = "Liste de Produits Vide ";
        }
        ?>
      </tbody>
    </table>
    </div>
    <button type="submit" id="validercommande" class="btn btn-success">Valider la commande</button>
</form>
