<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Modifier Demande</title>
	<link rel="stylesheet" href="../style/bootstrap.css">
	<link rel="stylesheet" href="../style/style.css">
</head>
<body class ="d-flex align-items-center justify-content-center">
<div class = "page d-inline-flex flex-column align-items-center">
	<a href="../index.php">Accueil</a>
	<a href="./ajouterDemande.php">Ajouter une demande</a>

	
<div id="actionEffectuee">
	<br/>
</div>

<form method = "get" id = "changerRecherche">
		Nom
		<input type = "text" id = "nomJS"/>
		Entreprise
		<input type = "text" id = "entrepriseJS"/>
</form>


<div id = "afficherResultats" >



<?php

include "reccupererListeDemandes.php";

?>

</div>
<script src="../JavaScriptPage/jquery.js"></script>
<script type="text/javascript" src="../JavaScriptPage/afficherJSDemande.js"></script>
</div>
</body>
</html>