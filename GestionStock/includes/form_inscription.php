<form method="POST" action='Inscription.php'>

<p id='prenom'>Prénom : <input type='text' name='prenom' <?php if(!empty($_POST['prenom'])){echo "value='".$_POST['prenom']."'";} ?> required/></p>
<p id='nom'>Nom : <input type='text' name='nom' <?php if(!empty($_POST['nom'])){echo "value='".$_POST['nom']."'";} ?> required/></p>
<p id='mail'>Adresse e-mail : <input type='email' name='mail' <?php if(!empty($_POST['mail'])){echo "value='".$_POST['mail']."'";} ?> required/></p>
<p id='tel'>Numéro de téléphone (10 chiffres) : <input type='number' name='tel' <?php if(!empty($_POST['tel'])){echo "value='".$_POST['tel']."'";} ?> required/></p>
<p id='adresse'>Adresse : <input type='text' name='adresse' <?php if(!empty($_POST['adresse'])){echo "value='".$_POST['adresse']."'";} ?> required/></p>
<p id='mdpinscription'>Mot de passe : <input type='password' name='mdp'  required/></p>
<p id='confmdp'>Confirmer le mot de passe : <input type='password' name='confmdp'  required/></p>
<p id='sexe'>Sexe (facultatif) : <input type='text' name='sexe'  /></p>
<p id='situation'>Situation familiale (facultatif) : <input type='text' name='situation'  /></p>
<p id='dob'>Date de naissance (facultatif) : <input type='text' name='dob' placeholder='Année-Mois-Jour' /></p>

<button type="submit" value="conf" class="btn btn-default" id='Confirmer'>Confirmer</button>

</form>

<?php
$oUtilisateur = new c_oUtilisateur();
$emailexist = false;
 if (!empty($_POST['nom']))
     {
       if ($oUtilisateur->collUtilisateur)
       {
         foreach ($oUtilisateur->collUtilisateur as $unUtilisateur)
         {
           if ($_POST['mail'] == $unUtilisateur->mail)
           {
             $emailexist = true;
           }
         }
       }
       if (strlen($_POST['nom']) >=2  &&  strlen($_POST['prenom']) >=2  &&  strlen($_POST['tel']) ==10  &&  $_POST['tel'][0]==0)
       {
           if ($_POST['mdp']==$_POST['confmdp'] && strlen($_POST['mdp']) >=8 && ctype_upper($_POST['mdp'][0]) && ctype_lower(substr($_POST['mdp'], -1))  && $emailexist == false)
           {
             $oAccesBase = new c_AccesBase();
             $query = 'INSERT INTO utilisateurs VALUE ("'.$_POST['nom'].'", "'.$_POST['prenom'].'", "'.$_POST['mail'].'", "'.$_POST['tel'].'", "'.$_POST['adresse'].'",  "'.$_POST['mdp'].'",  "'.$_POST['sexe'].'", "'.$_POST['situation'].'",  "'.$_POST['dob'].'", DEFAULT, 0)';
             $oAccesBase->insertion($query);
             header('location:ConsulterProfil.php');
           }
           elseif ($emailexist == true)
           {
             $errorMsg = 'Un utilisateur utilise deja cet email';
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
