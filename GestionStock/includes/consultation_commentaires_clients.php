<?php
$oUtilisateur = unserialize($_SESSION['oUtilisateur']);
$oCommentaire = new c_oCommentaires();
$oUtilisateurs= new c_oUtilisateur();
$collCommentaires = $oCommentaire->collCommentaires;
?>
<div class="container">
    <h4><p class="text-primary">Liste des commentaires :</p></h4>

  <table class='table table-hover'>
    <thead>
       <tr class='bg-info'>
        <th>ID Commentaire</th>
        <th>Mail client</th>
        <th>Commentaires</th>
        <th>Réponse</th>
      </tr>
    </thead>
    <tbody>
        <?php
      $compteur = 0;
        if($collCommentaires != null)
        {
            foreach($collCommentaires as $unCommentaire)
            {
                if ($oUtilisateur->ID == $unCommentaire->oUtilisateur->ID)
                {
                  $compteur = 1;
                ?>
                <tr>
                  <tr>
                      <td><?=$unCommentaire->ID?></td>
                      <td><?=$unCommentaire->oUtilisateur->mail?></td>
                      <td> <?=$unCommentaire->commentaire?></td>
                      <td> <?=$unCommentaire->reponse?></td>
                  </tr>  <?php
                }
            }
        }
        else
        {
            $errorMsg = "Il n'y a aucun commentaires";
        }
        if ($compteur == 0)
        {
          $errorMsg = "Vous n'avez fais aucun commentaires";
        }
        ?>



    </tbody>
  </table>
</div>
