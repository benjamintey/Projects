<?php
$oUtilisateur = unserialize($_SESSION['oUtilisateur']);
$collIDcommande = unserialize($_SESSION['collIDcommande']); //recupere la collection des ID commande passé
unset($_SESSION['collIDcommande']); //efface la variable de session car on en a plus besoin
$oCommandes = new c_oCommandes();
$prixtotal =0;
?>
<p>Nom : <?php echo $oUtilisateur->nom ?></p>
<p>Prenom : <?php echo $oUtilisateur->prenom ?></p>
<p>Mail : <?php echo $oUtilisateur->mail ?></p>
<p>Adresse : <?php echo $oUtilisateur->adresse ?></p>
<?php
//echo passe le contenant du echo en chaine de charactere HTML <p>Adresse : <?php echo $oUtilisateur->adresse </p> donne donc <p>Adresse : Adresse</p> soit du html
$date;
foreach ($collIDcommande as $unID)
{
  $oCommande = $oCommandes->collCommandes[$unID]; //recupere l'objet Commande dans la collection des commandes trier par ID grace a $collIDcommande
  $date = $oCommande->Date; //$oCommande->Date n'existe que dans le foreach il faut donc associer sa valeur a une autre variable que l'on pourra utiliser en dehors du foreach
  $prixtotal = $prixtotal + $oCommande->Prix;
  ?>
  <p>Référence du Produit : <?php echo $oCommande->oProduit->Reference  ?> Libellé du Produit : <?php echo $oCommande->oProduit->Libelle  ?> Quantité commandé : <?php echo $oCommande->Quantite  ?> Prix totale : <?php echo $oCommande->Prix  ?></p>
<?php
}
 ?>
<p>Date : <?php echo $date ?></p>
<p>Prix total de la commande : <?php echo $prixtotal ?></p>
