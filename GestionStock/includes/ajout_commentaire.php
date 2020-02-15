<?php

if (!empty($_POST['commentaire']))
{
  $oAccesBase = new c_AccesBase();
  $query = 'INSERT INTO commentaire VALUES (DEFAULT, "'.$_POST['commentaire'].'", "'.$oUtilisateur->ID.'",NULL)';
  $oAccesBase->insertion($query);
  header('location:ConsultationCommentaires.php');
}

 ?>
<form method="POST" action='AjouterCommentaire.php'>

<p id='prenom'>Prénom : <input type='text' name='prenom'  <?php echo "value='".$oUtilisateur->prenom."' readonly='readonly'"; ?> required/></p>
<p id='nom'>Nom : <input type='text' name='nom' <?php echo "value='".$oUtilisateur->nom."' readonly='readonly'"; ?> required/></p>
<p id='mail'>Adresse e-mail : <input type='email' name='mail' <?php echo "value='".$oUtilisateur->mail."' readonly='readonly'"; ?> required/></p>
<p id='tel'>Commentaire : </p>
<textarea type='number' name='commentaire' required  class="form-control" aria-label="Default" id='commentaire'/></textarea>
<button type="submit" value="conf" class="btn btn-default" id='Confirmer'>Confirmer</button>

</form>
