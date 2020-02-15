<div class="container">
    <h4><p class="text-primary">Ajouter un produit :</p></h4>
<form action="AjouterProduit.php" method="post">
  <table class='table table-hover'>
    <thead>
       <tr class='bg-info'>
        <th>Libellé</th>
        <th>Catégorie</th>
        <th>Marque</th>
        <th>Quantité en stock</th>
        <th>Prix Unitaire</th>
        <th>Description</th>
        <th>Taux TVA</th>
      </tr>
    </thead>
    <tbody>
        <?php
        $oUtilisateur = unserialize($_SESSION['oUtilisateur']);
        $oCategories= new c_oCategories();
        $oTauxTVA= new c_oTVA();
        $oMarques= new c_oMarques();
        if (!empty($_POST['valider']))
        {
          if (strlen($_POST['Libelle'])>2)
          {
            $oAccesBase = new c_AccesBase();
            $query = 'INSERT INTO produits VALUE(DEFAULT, "'.$_POST['Libelle'].'", '.$_POST['Categorie'].',"'.$_POST['Marque'].'", '.$_POST['Quantite'].', '.$_POST['Prix'].',' .$_POST['TVA'].',"'.$_POST['Description'].'")';
            $oAccesBase->update($query);
            header('location:GererProduits.php');
          }
          else {
            $errorMsg = "Le libellé doit avoir au moin 3 caractères";
          }
        }
        ?>
                <tr>
                    <td><input type="text" name="Libelle" required ></td>
                    <td><select name="Categorie"><?php
                    foreach ($oCategories->collCategories as $uneCategorie)
                    {
                      ?> <option value="<?php echo $uneCategorie->ID?>"><?php echo $uneCategorie->Libelle ?></option> <?php
                    }//la value d'une option est la valeur transmise dans le POST, on affiche le libelle mais si on le selectionne on transmet l'ID afin d'identifier quelle categorie a ete selectionné
                    ?></select></td>
                    <td><select name="Marque"><?php
                    foreach ($oMarques->collMarques as $uneMarque)
                    {
                      ?> <option value="<?php echo $uneMarque->ID?>"><?php echo $uneMarque->Libelle ?></option> <?php
                    }
                    ?></select></td>
                    <td><input type="number" name="Quantite" required ></td>
                    <td><input type="number" name="Prix" required></td>
                    <td><input type="text" name="Description"></td>
                    <td><select name="TVA"><?php
                    foreach ($oTauxTVA->collTauxTVA as $unTauxTVA)
                    {
                      ?> <option value="<?php echo $unTauxTVA->ID?>"><?php echo $unTauxTVA->Taux ?></option> <?php
                    }
                    ?></select></td>
                    <button name="valider" value="valider" id="valider" type="submit" class="btn btn-success">Valider</button>
  </form>
  <form method="post" action="GererProduits.php">
                    <button id="annuler" type="submit" class="btn btn-danger">Annuler</button>
  </form>
                </tr>
    </tbody>
</div>
