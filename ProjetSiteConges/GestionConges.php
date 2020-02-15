<?php
session_start();
require_once 'Mes Classes/Cvisiteurs.php';
$_SESSION['page'] = "GestionConges";
$ovisiteur = unserialize($_SESSION['ovisiteur']);
if($ovisiteur == NULL)
    {
        header('location:seConnecter.php');
    }
require_once 'includes/navBar.php';
require_once 'includes/functions.php';
require_once 'Mes Classes/c_CalendrierConges.php';
require_once 'Mes Classes/c_calendar.php';
require_once 'Mes Classes/c_CompteurJour.php';

if (empty($_POST['typeconges']) == false && empty($_POST['dates']) == false)
{
$odao = new Cdao();
$oEtatJour = new c_EtatJours();
$oCompteurJour = new c_CompteurJours($ovisiteur);
$l_typeconges = $_POST['typeconges'];
$l_stringdates = $_POST['dates'];
$l_acquisition = $_POST['acquisition'];
$l_acquisitionutiliser = $l_acquisition."utiliser";
$colldates = explode(' / ',$l_stringdates);
$l_oTypeConges = $oEtatJour->getEtatJourbyID($l_typeconges);
$l_acquisitionutiliserquery = ltrim($l_acquisitionutiliser, 'c_');
  if($l_typeconges != 'JTR')
  {
    $l_jourcongesdisponible = $oCompteurJour->collCompteurJourVisiteur[$l_oTypeConges->c_ID]->$l_acquisition - $oCompteurJour->collCompteurJourVisiteur[$l_oTypeConges->c_ID]->$l_acquisitionutiliser;
    $successMsg = "Demande de conges effectué avec succès";
  }
  else
  {
    $l_jourcongesdisponible = 100000;
    $successMsg = "Jour de congés annulé avec succès";
  }
$l_nbdates = count($colldates);
$queryselectetatjourprecedent = "SELECT etatjour FROM calendrierconges WHERE idVisiteur = '".$ovisiteur->id."'AND jour ='".$colldates[0]."'"; //foreach dates in colldates englobant tout
  if ($l_nbdates <= $l_jourcongesdisponible || $l_typeconges == 'JTR')
  {
      if($l_typeconges != 'JTR')
      {
        $etatjouravantupdate = $odao->getTabDataFromSql($queryselectetatjourprecedent);
        $nbcongesutiliser = $oCompteurJour->collCompteurJourVisiteur[$l_oTypeConges->c_ID]->$l_acquisitionutiliser;
        $nbcongesutiliserapres =$nbcongesutiliser+count($colldates); //+1
        $queryupdatecompteurjour = "UPDATE compteurjour SET ".$l_acquisitionutiliserquery." = ".$nbcongesutiliserapres." WHERE idVisiteur = '".$ovisiteur->id."' AND typeconges = '".$l_typeconges."';";
        $odao->update($queryupdatecompteurjour);
      }
    elseif($l_typeconges == 'JTR')
    {
          $etatjouravantupdate = $odao->getTabDataFromSql($queryselectetatjourprecedent);
          foreach ($etatjouravantupdate as $unetatjouravantupdate)
          {
            if($unetatjouravantupdate['etatjour'] !='JTR')
            {
            $nbcongesutiliser = $oCompteurJour->collCompteurJourVisiteur[$unetatjouravantupdate['etatjour']]->$l_acquisitionutiliser;
            $nbcongesutiliserapres =$nbcongesutiliser-count($colldates);
            $queryupdatecompteurjour = "UPDATE compteurjour SET ".$l_acquisitionutiliserquery." = ".$nbcongesutiliserapres." WHERE idVisiteur = '".$ovisiteur->id."' AND typeconges = '".$unetatjouravantupdate['etatjour']."';";
            $odao->update($queryupdatecompteurjour);
          }
          }
    }
    foreach ($colldates as $date) // a enlever
      {
        $queryupdatecalendrierconges = "UPDATE calendrierconges SET etatjour = '".$l_oTypeConges->c_ID."' WHERE idVisiteur = '".$ovisiteur->id."' AND jour ='".$date."'" ;
        $odao->update($queryupdatecalendrierconges);
      }
  }
  else
  {
    unset($successMsg);
    $errorMsg = "Quantité de jour de congés insuffisante";
  }
}
elseif (empty($_POST['typeconges']) == false && empty($_POST['dates']))
{
    $errorMsg = "Selectionnez des dates dans le calendrier";
}
elseif (empty($_POST['typeconges']) && empty($_POST['dates']) == false)
{
    $errorMsg = "Selectionnez un Type de Conges";
}
elseif (empty($_POST['typeconges']) && empty($_POST['dates']))
{
    $errorMsg = "Selectionnez un Type de Conges et des dates dans le calendrier";
}
elseif ($_SESSION['test'] == 1) {
  $errorMsg = "test";
}
if ($ovisiteur->admin == 'oui')
{
  require_once 'includes/AffichageCalendrier.php';
  require_once 'includes/AffichageCompteurJour.php';
  require_once 'includes/AffichageDemandeConges.php';
  require_once 'includes/gestion-erreur.php';
}

?>
<script src="lib/jquery/jquery.min.js"></script>
<script type="text/javascript">
$("li").click(function() {
  var l_date = $(this).attr("id");
  var l_datewithoutli = l_date.substring(3, l_date.length);
  var l_dateprecedente = $('.form-control').val();
  $.post("includes/AffichageCalendrier.php",
  {
  },
  function(data){
    $('.calendar').html(data);
    var l_etat = $('#' + l_date).children('span').text();
    if ($('#' + l_date).attr('class') != 'selectionne' && l_etat != "WE" && l_etat != "JF" && l_etat != "")
    {
      l_dateprecedente = $('.form-control').val();
      $('#' + l_date).attr('class', 'selectionne');
      if (l_dateprecedente == '')
      {
        $('.form-control').val(l_datewithoutli);
      }
      else
      {
        $('.form-control').val(l_dateprecedente+' / '+l_datewithoutli);
      }
    }
    else if ($('#' + l_date).attr('class') == 'selectionne')
    {
      if (l_etat != "JF" && l_etat != "JTR" && l_etat != "WE" && l_etat != "" && l_etat != 'CMA')
      {
        $('#' + l_date).attr('class', 'JC');
        if (l_dateprecedente.indexOf(l_datewithoutli + ' / ') >= 0)
        {
          var datewithslash = $('.form-control').val().replace(l_datewithoutli + ' / ','');
        }
        else if (l_dateprecedente.indexOf(' / ' + l_datewithoutli) >= 0)
        {
          var datewithslash = $('.form-control').val().replace(' / ' + l_datewithoutli,'');
        }
        else
        {
          var datewithslash = $('.form-control').val().replace(l_datewithoutli,'');
        }
        $('.form-control').val(datewithslash);
      }
      else if (l_etat == 'CMA')
      {
        $('#' + l_date).attr('class', l_etat);
        if (l_dateprecedente.indexOf(l_datewithoutli + ' / ') >= 0)
        {
          var datewithslash = $('.form-control').val().replace(l_datewithoutli + ' / ','');
        }
        else if (l_dateprecedente.indexOf(' / ' + l_datewithoutli) >= 0)
        {
          var datewithslash = $('.form-control').val().replace(' / ' + l_datewithoutli,'');
        }
        else
        {
          var datewithslash = $('.form-control').val().replace(l_datewithoutli,'');
        }
        $('.form-control').val(datewithslash);
      }
      else
      {
        $('#' + l_date).attr('class', l_etat);
        if (l_dateprecedente.indexOf(l_datewithoutli + ' / ') >= 0)
        {
          var datewithslash = $('.form-control').val().replace(l_datewithoutli + ' / ','');

        }
        else if (l_dateprecedente.indexOf(' / ' + l_datewithoutli) >= 0)
        {
          var datewithslash = $('.form-control').val().replace(' / ' + l_datewithoutli,'');
        }
        else
        {
          var datewithslash = $('.form-control').val().replace(l_datewithoutli,'');
        }
        $('.form-control').val(datewithslash);
      }
    }
    $('#datecache').val($('.form-control').val());
    $('#datecachesuiv').val($('.form-control').val());
  });

});
</script>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function() {
$('#datecache').val($('.form-control').val());
$('#datecachesuiv').val($('.form-control').val());
var l_alldateselected = $('.form-control').val();
if (l_alldateselected!='')
{
  l_dateselected = l_alldateselected.split(' / ')
  for (var i = 0; i < l_dateselected.length; i++)
  {
    $('#li-' + l_dateselected[i]).attr('class', 'selectionne');
  }

}

});
</script>
<script type="text/javascript">
$("#btnDeselection").click(function() {
  $('#datecache').val('');
  $('#datecachesuiv').val('');
  $('.form-control').val('');
});
</script>
