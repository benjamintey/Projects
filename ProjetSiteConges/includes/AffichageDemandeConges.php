<html>
<head>
<link href="includes/StyleSheet.css" type="text/css" rel="stylesheet" />
</head>
<body>
<form class="form-horizontal" action="GestionConges.php" method="post">
<div>
  <select name="typeconges" id="choixtypeconges">
    <option disabled selected value>Sélectionnez un Type de Congés</option>
<?php
  foreach ($CollCompteurJour as $TypeConges)
  {
    echo '<option value="'.$TypeConges->c_oTypeconges->c_ID.'">'.$TypeConges->c_oTypeconges->c_nom.'</option>';
  }
  echo '<option value="JTR">Annulé des jours de congés</option>';
?>
  </select>
  <select name="acquisition" id="choixacquisition">
    <option value="c_acquis">Acquis</option>
    <option value="c_ECA">En Cours</option>
  </select>
</div>
  <input class="form-control" type="text" name="dates" readonly="readonly" <?php if(empty($_POST['datecachesuiv'])==false){ echo "value='".$_POST['datecachesuiv']."'";} elseif (empty($_POST['datecache'])==false){ echo "value='".$_POST['datecache']."'";} ?>>
  <div class="form-group">
    <div class="col-md-offset-2 col-md-10">
      <button type="submit" class="btn btn-default">Valider la Demande</button>
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-offset-2 col-md-10">
      <button type="submit" class="btn btn-default" id="btnDeselection">Deselectionner tout les jours</button>
    </div>
  </div>
</form>
</body>
</html>
