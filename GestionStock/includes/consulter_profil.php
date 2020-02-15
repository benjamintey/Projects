<p id='prenom'>Prénom : <input type='text' name='prenom' <?php echo "value='".$oUtilisateur->prenom."' readonly='readonly'" ?> required/></p>
<p id='nom'>Nom : <input type='text' name='nom' <?php echo "value='".$oUtilisateur->nom."' readonly='readonly'" ?> required/></p>
<p id='mail'>Adresse e-mail : <input type='email' name='mail' <?php echo "value='".$oUtilisateur->mail."' readonly='readonly'" ?> required/></p>
<p id='tel'>Numéro de téléphone (10 chiffres) : <input type='number' name='tel' <?php echo "value='".$oUtilisateur->telephone."' readonly='readonly'" ?> required/></p>
<p id='adresse'>Adresse : <input type='text' name='adresse' <?php echo "value='".$oUtilisateur->adresse."' readonly='readonly'" ?> required/></p>
<p id='sexe'>Sexe (facultatif) : <input type='text' name='sexe' <?php echo "value='".$oUtilisateur->sexe."' readonly='readonly'" ?> /></p>
<p id='situation'>Situation familiale (facultatif) : <input type='text' name='situation' <?php echo "value='".$oUtilisateur->situation."' readonly='readonly'" ?> /></p>
<p id='dob'>Date de naissance (facultatif) : <input type='text' name='dob' <?php echo "value='".$oUtilisateur->datenaissance."' readonly='readonly'" ?> /></p>

<form method="POST" action='ModifierProfil.php'>
  <button type="submit" value="conf" class="btn btn-default" id='Confirmer'>Modifer</button>
</form>
