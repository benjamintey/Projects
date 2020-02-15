<html>
<head>
<link href="includes/StyleSheet.css" type="text/css" rel="stylesheet" />
</head>
<body>
<?php
$oEtatJours = new c_CalendrierCongess($ovisiteur);
$ocalendar = new c_calendar($oEtatJours->collEtatJourVisiteur);
echo '<div id="calendar">'.$ocalendar->show().'</div>';


?>
</body>
</html>
