<?php
$oUtilisateur = unserialize($_SESSION['oUtilisateur']);
$oCommentaire = new c_oCommentaires();
$oUtilisateurs = new c_oUtilisateur();
$collCommentaires = $oCommentaire->collCommentaires;
$collUtilisateur = $oUtilisateurs->collUtilisateurByID;
?>
<div class="container">
  <form action="ConsultationCommentaires.php" method="post">
  <span>ID de l'utilisateur : </span>
  <select name="Utilisateur">
    <option value="tous">Tous</option>
    <?php
    foreach ($collUtilisateur as $unUtilisateur)
    {
      ?> <option <?php if (!empty($_POST['Utilisateur'])) { if($_POST['Utilisateur']==$unUtilisateur->ID){echo "selected";}}?> value="<?php echo $unUtilisateur->ID?>"><?php echo $unUtilisateur->ID ?></option> <?php
    }
    ?>
  </select>
  <button type="submit" class="btn btn-default">Afficher</button>
  </form>

    <h4><p class="text-primary">Liste des commentaires :</p></h4>

  <table class='table table-hover'>
    <thead>
       <tr class='bg-info'>
        <th>ID commentaire</th>
        <th>Mail client</th>
        <th>Commentaires</th>
        <th>Réponse</th>
        <th>Répondre</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody>
        <?php
      $compteur = 0;
        if($collCommentaires != null)
        {

            foreach($collCommentaires as $unCommentaire)
            {
              if (!empty($_POST['Utilisateur']))
              {
                if ($_POST['Utilisateur'] == 'tous')
                {
                  $compteur = 1;
                  ?>
                    <tr>
                        <td><?=$unCommentaire->ID?></td>
                        <td><?=$unCommentaire->oUtilisateur->mail?></td>
                        <td> <?=$unCommentaire->commentaire?></td>
                        <td> <?=$unCommentaire->reponse?></td>
                        <td><form  method="post" action="ReponseCommentaire.php"><button name="reponse" class="btn btn-default" value="<?php echo $unCommentaire->ID?>">Répondre</button></form></td>
                        <td><form  method="post" action="includes/supprimer_commentaire.php"><button id="bouton_supprimer" type="submit" name="supprimer" value="<?php echo $unCommentaire->ID?>"><img id="croix" src="Images/Croix.png"></button></form></td>
                    </tr>  <?php
                }
                elseif($_POST['Utilisateur'] != 'tous')
                {
                    if ($_POST['Utilisateur'] == $unCommentaire->oUtilisateur->ID)
                    {
                      $compteur = 1;
                      ?>
                        <tr>
                            <td><?=$unCommentaire->ID?></td>
                            <td><?=$unCommentaire->oUtilisateur->mail?></td>
                            <td> <?=$unCommentaire->commentaire?></td>
                            <td> <?=$unCommentaire->reponse?></td>
                            <td><form  method="post" action="ReponseCommentaire.php"><button name="reponse" class="btn btn-default" value="<?php echo $unCommentaire->ID?>">Répondre</button></form></td>
                            <td><form  method="post" action="includes/supprimer_commentaire.php"><button id="bouton_supprimer" type="submit" name="supprimer" value="<?php echo $unCommentaire->ID?>"><img id="croix" src="Images/Croix.png"></button></form></td>
                        </tr>  <?php
                    }

                }
              }
              else
              {
                $compteur = 1;?>
                <tr>
                    <td><?=$unCommentaire->ID?></td>
                    <td><?=$unCommentaire->oUtilisateur->mail?></td>
                    <td> <?=$unCommentaire->commentaire?></td>
                    <td> <?=$unCommentaire->reponse?></td>
                    <td><form  method="post" action="ReponseCommentaire.php"><button name="reponse" class="btn btn-default" value="<?php echo $unCommentaire->ID?>">Répondre</button></form></td>
                    <td><form  method="post" action="includes/supprimer_commentaire.php"><button id="bouton_supprimer" type="submit" name="supprimer" value="<?php echo $unCommentaire->ID?>"><img id="croix" src="Images/Croix.png"></button></form></td>
                </tr>  <?php
              }
            }
        }
        else
        {
            $errorMsg = "Il n'y a aucun commentaires";
        }
        if ($compteur == 0 && empty($errorMsg))
        {
          $errorMsg = "L'utilisateurs n'a pas fais de commentaires";
        }
        ?>



    </tbody>
  </table>
</div>
