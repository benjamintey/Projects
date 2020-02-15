<?php
$oUtilisateur = unserialize($_SESSION['oUtilisateur']);
$oProduit = new c_oProduits();
$oMarques = new c_oMarques();
$oCategories = new c_oCategories();
$collProduits = $oProduit->collProduits;
?>
<div class="container">
<a href="AjouterProduit.php"><img id="ajouter" src="Images/Ajouter.png"></a>
  <form action="GererProduits.php" method="post">
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
        <th>Quantité en stock</th>
        <th>Prix Unitaire</th>
        <th>Description</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $compteur = 0;//verification qu'au moin une ligne va etre afficher afin d'afficher un message d'erreur
        if (!empty($_POST['modifier'])) {//verifie si le bouton modifier a ete cliquer, si oui creer une variable session contenant l'objet produit a modifier et lance le formuaire de modif
          $_SESSION['oProduit'] = serialize($oProduit->collProduits[$_POST['modifier']]);
          header('location:FormulaireModification.php');
        }
        $collProduits = $oProduit->collProduits;
        if($collProduits != null)//verifie qu'il existe des produits sinon affiche message d'erreur
        {
          if (!empty($_POST['Marque']))//verifie si on a cliquer sur le bouton Afficher
          {
            if ($_POST['Marque'] != 'toutes' && $_POST['Categorie'] != 'toutes')
            //si une marque et une categorie on ete selectionner on peut verifier si la marque et la categorie selectionner = marque et categorie pour chaque produit dans la colection des produits
            {
              foreach($collProduits as $unProduit)
              {
                if ($unProduit->oMarque->ID == $_POST['Marque'] && $unProduit->oCategorie->ID == $_POST['Categorie'])
                {
                  $compteur = 1;//change la valeur de compteur afin de ne pas afficher le message d'erreur
                ?>
                <tr>
                  <td><?=$unProduit->Reference?></td>
                  <td><?=$unProduit->Libelle?></td>
                  <td><?=$unProduit->oCategorie->Libelle?></td>
                  <td><?=$unProduit->oMarque->Libelle?></td>
                  <td><?=$unProduit->Quantite?></td>
                  <td><?=$unProduit->Prix?></td>
                  <td><?=$unProduit->Description?></td>
                  <td><form  method="post" action="GererProduits.php"><button name="modifier" value="<?php echo $unProduit->Reference ?>">Modifier</button></form></td>
                  <td><form  method="post" action="includes/supprimer_produit.php"><button id="bouton_supprimer" type="submit" name="supprimer" value="<?php echo $unProduit->Reference ?>"><img id="croix" src="Images/Croix.png"></button></form></td>
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
                  <td><?=$unProduit->Quantite?></td>
                  <td><?=$unProduit->Prix?></td>
                  <td><?=$unProduit->Description?></td>
                  <td><form  method="post" action="GererProduits.php"><button name="modifier" value="<?php echo $unProduit->Reference ?>">Modifier</button></form></td>
                  <td><form  method="post" action="includes/supprimer_produit.php"><button id="bouton_supprimer" type="submit" name="supprimer" value="<?php echo $unProduit->Reference ?>"><img id="croix" src="Images/Croix.png"></button></form></td>
                </tr> <?php
              }
              }
            }
            elseif ($_POST['Marque'] != 'toutes' && $_POST['Categorie'] == 'toutes')//si seulement une marque ou une categorie on ne peut effectuer la verif  que sur la marque/categorie
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
                  <td><?=$unProduit->Quantite?></td>
                  <td><?=$unProduit->Prix?></td>
                  <td><?=$unProduit->Description?></td>
                  <td><form  method="post" action="GererProduits.php"><button name="modifier" value="<?php echo $unProduit->Reference ?>">Modifier</button></form></td>
                  <td><form  method="post" action="includes/supprimer_produit.php"><button id="bouton_supprimer" type="submit" name="supprimer" value="<?php echo $unProduit->Reference ?>"><img id="croix" src="Images/Croix.png"></button></form></td>
                </tr> <?php
              }
              }
            }
            else//si toues les marques et categories sont selectionné pas besoin de faire de modif
            {
              $compteur = 1;
              foreach($collProduits as $unProduit)
              {?>
                <tr>
                  <td><?=$unProduit->Reference?></td>
                  <td><?=$unProduit->Libelle?></td>
                  <td><?=$unProduit->oCategorie->Libelle?></td>
                  <td><?=$unProduit->oMarque->Libelle?></td>
                  <td><?=$unProduit->Quantite?></td>
                  <td><?=$unProduit->Prix?></td>
                  <td><?=$unProduit->Description?></td>
                  <td><form  method="post" action="GererProduits.php"><button name="modifier" value="<?php echo $unProduit->Reference ?>">Modifier</button></form></td>
                  <td><form  method="post" action="includes/supprimer_produit.php"><button id="bouton_supprimer" type="submit" name="supprimer" value="<?php echo $unProduit->Reference ?>"><img id="croix" src="Images/Croix.png"></button></form></td>
                </tr> <?php
              }
            }
          }
          else//premier chargement de la page donc affiche tout les produits
          {
            $compteur = 1;
            foreach($collProduits as $unProduit)
            {?>
              <tr>
                <td><?=$unProduit->Reference?></td>
                <td><?=$unProduit->Libelle?></td>
                <td><?=$unProduit->oCategorie->Libelle?></td>
                <td><?=$unProduit->oMarque->Libelle?></td>
                <td><?=$unProduit->Quantite?></td>
                <td><?=$unProduit->Prix?></td>
                <td><?=$unProduit->Description?></td>
                <td><form  method="post" action="GererProduits.php"><button name="modifier" value="<?php echo $unProduit->Reference ?>">Modifier</button></form></td>
                <td><form  method="post" action="includes/supprimer_produit.php"><button id="bouton_supprimer" type="submit" name="supprimer" value="<?php echo $unProduit->Reference ?>"><img id="croix" src="Images/Croix.png"></button></form></td>
              </tr> <?php
            }
          }
        }
      else
      {
          $errorMsg = "Il n'existe aucun produits ";
      }
        if ($compteur ==0)
        {
          $errorMsg = "Liste des Produits a afficher vide ";
        }

    if (!empty($_SESSION['error']))
    {
      $errorMsg = $_SESSION['error'];
      unset($_SESSION['error']);
    }
        ?>
      </tbody>
    </table>
  </div>
