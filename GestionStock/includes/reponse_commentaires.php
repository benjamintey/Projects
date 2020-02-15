<?php
$oCommentaires = new c_oCommentaires();
$oCommentaire = $oCommentaires->collCommentaires[$_POST['reponse']];

if (!empty($_POST['confirmer']))
{
  $oAccesBase = new c_AccesBase();
  $query = 'UPDATE commentaire SET reponse ="'.$_POST['confirmer'].'"WHERE ID="'.$_POST['id'].'"';
  $oAccesBase->update($query);
  header('location:ConsultationCommentaires.php');
}

 ?>
<form method="POST" action='ReponseCommentaire.php'>

<p id='prenom'>ID Commentaire : <input type='text' name='id'  <?php echo "value='".$oCommentaire->ID."' readonly='readonly'"; ?> required/></p>
<p id='nom'>Auteur du commentaire : <input type='text' name='mail' <?php echo "value='".$oCommentaire->oUtilisateur->mail."' readonly='readonly'"; ?> required/></p>
<p id='mail'>Commentaire : </p>
<textarea type='number' required readonly="readonly" class="form-control" aria-label="Default" id='commentaire'/><?php echo $oCommentaire->commentaire ?></textarea>
<p id='tel'>Reponse : </p>
<textarea type='number' name='confirmer' required class="form-control" aria-label="Default" id='commentaire'/><?php echo $oCommentaire->reponse ?></textarea>
<button type="submit" value="conf" class="btn btn-default" id='Confirmer'>Confirmer</button>

</form>
