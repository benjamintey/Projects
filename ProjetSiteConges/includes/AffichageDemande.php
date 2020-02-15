<html>
<head>
<link href="includes/StyleSheet.css" type="text/css" rel="stylesheet" />
</head>
<body>
  <p id="testinsertion"></p>
<form class="form-horizontal" action="GestionConges.php" method="post">
  <select name="typeconges">
<?php
  foreach ($CollCompteurJour as $TypeConges)
  {
    echo '<option value="'.$TypeConges->c_oTypeconges->c_ID.'">'.$TypeConges->c_oTypeconges->c_nom.'</option>';
  }
?>
  </select>
  <input class="form-control" type="text" name="dates" disabled="disabled">
  <div class="form-group">
    <div class="col-md-offset-2 col-md-10">
      <button type="submit" class="btn btn-default">Valider la Demande</button>
    </div>
  </div>
</form>


</body>
</html>
