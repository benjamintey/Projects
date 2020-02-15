<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">Site GSB</a>
    </div>
    <ul class="nav navbar-nav">
      <li <?php if ($_SESSION['page']=="home") {
        echo 'class="active"';
      } ?>><a href="seConnecter.php">Home</a></li>
      <li <?php if ($_SESSION['page']=="SaisieFicheFrais") {
        echo 'class="active"';
      } ?>><a href="SaisieFicheFrais.php">Saisie des Fiches de Frais</a></li>
      <li <?php if ($_SESSION['page']=="GestionConges") {
        echo 'class="active"';
      } ?>><a href="GestionConges.php">GestionConges</a></li>
    </ul>
    <!-- <form class="navbar-form navbar-right" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form> -->
  </div>
</nav>

</body>
</html>
