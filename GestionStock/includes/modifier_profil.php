<form method="POST" action='ModifierProfil.php'>

<p id='prenom'>Prénom : <input type='text' name='prenom' <?php echo "value='".$oUtilisateur->prenom."'" ?> required/></p>
<p id='nom'>Nom : <input type='text' name='nom' <?php echo "value='".$oUtilisateur->nom."'" ?> required/></p>
<p id='mail'>Adresse e-mail : <input type='email' name='mail' <?php echo "value='".$oUtilisateur->mail."' readonly='readonly'" ?> required/></p>
<p id='tel'>Numéro de téléphone (10 chiffres) : <input type='number' name='tel' <?php echo "value='".$oUtilisateur->telephone."'" ?> required/></p>
<p id='adresse'>Adresse : <input type='text' name='adresse' <?php echo "value='".$oUtilisateur->adresse."'" ?> required/></p>
<p id='mdp'>Mot de passe : <input type='password' name='mdp' <?php echo "value='".$oUtilisateur->mdp."'" ?> required/></p>
<p id='confmdp'>Confirmer le mot de passe : <input type='password' name='confmdp' <?php echo "value='".$oUtilisateur->mdp."'" ?> required/></p>
<p id='sexe'>Sexe (facultatif) : <input type='text' name='sexe' <?php echo "value='".$oUtilisateur->sexe."'" ?> /></p>
<p id='situation'>Situation familiale (facultatif) : <input type='text' name='situation' <?php echo "value='".$oUtilisateur->situation."'" ?> /></p>
<p id='dob'>Date de naissance (facultatif) : <input type='text' name='dob' <?php echo "value='".$oUtilisateur->datenaissance."'" ?> /></p>

<button type="submit" value="conf" class="btn btn-default" id='Confirmer'>Confirmer</button>

</form>

<?php
$oUtilisateur = new c_oUtilisateur();
 if (!empty($_POST['nom']))
     {
       if (strlen($_POST['nom']) >=2  &&  strlen($_POST['prenom']) >=2  &&  strlen($_POST['tel']) ==10  &&  $_POST['tel'][0]==0)
       {
           if ($_POST['mdp']==$_POST['confmdp'] && strlen($_POST['mdp']) >=8 && ctype_upper($_POST['mdp'][0]) && ctype_lower(substr($_POST['mdp'], -1)))
           {
             $oAccesBase = new c_AccesBase();
             $query = 'UPDATE utilisateurs SET Nom="'.$_POST['nom'].'", Prenom="'.$_POST['prenom'].'", Mail="'.$_POST['mail'].'", Telephone="'.$_POST['tel'].'", Adresse ="'.$_POST['adresse'].'", Mdp="'.$_POST['mdp'].'", Sexe="'.$_POST['sexe'].
             '", Situation ="'.$_POST['situation'].'", DateNaissance="'.$_POST['dob'].'" WHERE mail="'.$_POST['mail'].'"';
             $oAccesBase->update($query);
             header('location:PageClient.php');
           }
           elseif (!ctype_lower(substr($_POST['mdp'], -1)))
           {
             $errorMsg = 'Le mot de passe ne se finis pas par une minuscule';
           }
           elseif (!ctype_upper($_POST['mdp'][0]))
           {
             $errorMsg = 'Le mot de passe ne commence pas par une majuscule';
           }
           elseif (strlen($_POST['mdp']) <8)
           {
             $errorMsg = 'Le mot de passe ne contient pas 8 caractère';
           }
           else
           {
               $errorMsg = 'Les mots de passe ne sont pas identiques';
           }
       }
       else
       {
           $errorMsg = 'Les informations sont incorrectes, vérifiez que vos noms et prénoms contiennent au minimum 2 lettres et que votre numéro de téléphone contienne 10 chiffres';
       }
     }


?>
