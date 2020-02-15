<html>
<body>
<?php
$oCompteurJour = new c_CompteurJours($ovisiteur);
$CollCompteurJour = $oCompteurJour->collCompteurJourVisiteur;
?>

<div class="wrap-table100">
  <div class="table100">
    <table>
      <thead>
        <tr class="table100-head">
          <th class="column1">Type de Conges</th>
          <th class="column2">Conges Acquis</th>
          <th class="column3">Solde Conges Acquis</th>
          <th class="column4">Conges en Cours d'Acquisition</th>
          <th class="column5">Solde Conges en Cours d'Acquisition</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td class="column1"><?php echo $CollCompteurJour['CP']->c_oTypeconges->c_nom ?></td>
            <td class="column2"><?php echo $CollCompteurJour['CP']->c_acquis ?></td>
            <td class="column3"><?php echo $CollCompteurJour['CP']->c_acquis - $CollCompteurJour['CP']->c_acquisutiliser ?></td>
            <td class="column4"><?php echo $CollCompteurJour['CP']->c_ECA ?></td>
            <td class="column5"><?php echo $CollCompteurJour['CP']->c_ECA - $CollCompteurJour['CP']->c_ECAutiliser ?></td>
          </tr>
          <tr>
            <td class="column1"><?php echo $CollCompteurJour['CDM']->c_oTypeconges->c_nom ?></td>
            <td class="column2"><?php echo $CollCompteurJour['CDM']->c_acquis ?></td>
            <td class="column3"><?php echo $CollCompteurJour['CDM']->c_acquis- $CollCompteurJour['CDM']->c_acquisutiliser ?></td>
            <td class="column4"><?php echo $CollCompteurJour['CDM']->c_ECA ?></td>
            <td class="column5"><?php echo $CollCompteurJour['CDM']->c_ECA - $CollCompteurJour['CDM']->c_ECAutiliser ?></td>
          </tr>
          <tr>
            <td class="column1"><?php echo $CollCompteurJour['CDV']->c_oTypeconges->c_nom ?></td>
            <td class="column2"><?php echo $CollCompteurJour['CDV']->c_acquis ?></td>
            <td class="column3"><?php echo $CollCompteurJour['CDV']->c_acquis - $CollCompteurJour['CDV']->c_acquisutiliser ?></td>
            <td class="column4"><?php echo $CollCompteurJour['CDV']->c_ECA ?></td>
            <td class="column5"><?php echo $CollCompteurJour['CDV']->c_ECA - $CollCompteurJour['CDV']->c_ECAutiliser ?></td>
          </tr>
          <tr>
            <td class="column1"><?php echo $CollCompteurJour['CEM']->c_oTypeconges->c_nom ?></td>
            <td class="column2"><?php echo $CollCompteurJour['CEM']->c_acquis ?></td>
            <td class="column3"><?php echo $CollCompteurJour['CEM']->c_acquis - $CollCompteurJour['CEM']->c_acquisutiliser ?></td>
            <td class="column4"><?php echo $CollCompteurJour['CEM']->c_ECA ?></td>
            <td class="column5"><?php echo $CollCompteurJour['CEM']->c_ECA - $CollCompteurJour['CEM']->c_ECAutiliser ?></td>
          </tr>
          <tr>
            <td class="column1"><?php echo $CollCompteurJour['CJD']->c_oTypeconges->c_nom ?></td>
            <td class="column2"><?php echo $CollCompteurJour['CJD']->c_acquis ?></td>
            <td class="column3"><?php echo $CollCompteurJour['CJD']->c_acquis - $CollCompteurJour['CJD']->c_acquisutiliser ?></td>
            <td class="column4"><?php echo $CollCompteurJour['CJD']->c_ECA ?></td>
            <td class="column5"><?php echo $CollCompteurJour['CJD']->c_ECA - $CollCompteurJour['CJD']->c_ECAutiliser ?></td>
          </tr>
          <tr>
            <td class="column1"><?php echo $CollCompteurJour['CM']->c_oTypeconges->c_nom ?></td>
            <td class="column2"><?php echo $CollCompteurJour['CM']->c_acquis ?></td>
            <td class="column3"><?php echo $CollCompteurJour['CM']->c_acquis - $CollCompteurJour['CM']->c_acquisutiliser ?></td>
            <td class="column4"><?php echo $CollCompteurJour['CM']->c_ECA ?></td>
            <td class="column5"><?php echo $CollCompteurJour['CM']->c_ECA - $CollCompteurJour['CM']->c_ECAutiliser ?></td>
          </tr>
          <tr>
            <td class="column1"><?php echo $CollCompteurJour['CN']->c_oTypeconges->c_nom ?></td>
            <td class="column2"><?php echo $CollCompteurJour['CN']->c_acquis ?></td>
            <td class="column3"><?php echo $CollCompteurJour['CN']->c_acquis - $CollCompteurJour['CN']->c_acquisutiliser ?></td>
            <td class="column4"><?php echo $CollCompteurJour['CN']->c_ECA ?></td>
            <td class="column5"><?php echo $CollCompteurJour['CN']->c_ECA - $CollCompteurJour['CN']->c_ECAutiliser ?></td>
          </tr>
          <tr>
            <td class="column1"><?php echo $CollCompteurJour['CA']->c_oTypeconges->c_nom ?></td>
            <td class="column2"><?php echo $CollCompteurJour['CA']->c_acquis ?></td>
            <td class="column3"><?php echo $CollCompteurJour['CA']->c_acquis - $CollCompteurJour['CA']->c_acquisutiliser ?></td>
            <td class="column4"><?php echo $CollCompteurJour['CA']->c_ECA ?></td>
            <td class="column5"><?php echo $CollCompteurJour['CA']->c_ECA - $CollCompteurJour['CA']->c_ECAutiliser ?></td>
          </tr>
          <tr>
            <td class="column1"><?php echo $CollCompteurJour['CPA']->c_oTypeconges->c_nom ?></td>
            <td class="column2"><?php echo $CollCompteurJour['CPA']->c_acquis ?></td>
            <td class="column3"><?php echo $CollCompteurJour['CPA']->c_acquis - $CollCompteurJour['CPA']->c_acquisutiliser ?></td>
            <td class="column4"><?php echo $CollCompteurJour['CPA']->c_ECA ?></td>
            <td class="column5"><?php echo $CollCompteurJour['CPA']->c_ECA - $CollCompteurJour['CPA']->c_ECAutiliser ?></td>
          </tr>
          <tr>
            <td class="column1"><?php echo $CollCompteurJour['JRC']->c_oTypeconges->c_nom ?></td>
            <td class="column2"><?php echo $CollCompteurJour['JRC']->c_acquis ?></td>
            <td class="column3"><?php echo $CollCompteurJour['JRC']->c_acquis - $CollCompteurJour['JRC']->c_acquisutiliser ?></td>
            <td class="column4"><?php echo $CollCompteurJour['JRC']->c_ECA ?></td>
            <td class="column5"><?php echo $CollCompteurJour['JRC']->c_ECA - $CollCompteurJour['JRC']->c_ECAutiliser ?></td>
          </tr>
          <tr>
            <td class="column1"><?php echo $CollCompteurJour['JRI']->c_oTypeconges->c_nom ?></td>
            <td class="column2"><?php echo $CollCompteurJour['JRI']->c_acquis ?></td>
            <td class="column3"><?php echo $CollCompteurJour['JRI']->c_acquis - $CollCompteurJour['JRI']->c_acquisutiliser ?></td>
            <td class="column4"><?php echo $CollCompteurJour['JRI']->c_ECA ?></td>
            <td class="column5"><?php echo $CollCompteurJour['JRI']->c_ECA - $CollCompteurJour['JRI']->c_ECAutiliser ?></td>
          </tr>

      </tbody>
    </table>
  </div>
</div>
</body>
</html>
