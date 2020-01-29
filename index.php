<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Accueil</title>
	<link rel="stylesheet" href="./style/bootstrap.css">
	<link rel="stylesheet" href="./style/style.css">
</head>
<body>
<div class = "page">
	<a href="./HTMLPage/ajouterDemande.php">Ajouter une demande</a>

	<a href="./HTMLPage/afficherDemande.php">Liste des demandes</a>
</div>
<div class = "formulaireAuthentification">
	<form method = "post" action = "HTMLPage/authentification.php">
		Pseudo
		<input type = "text" name = "pseudo" required />
		Mot de Passe
		<input type = "password" name = "motDePasse" required />
		<input type = "submit" value = "valider" />

	</form>
	<a href="index.php"> s'inscrire </a>
</div>

</body>
</html>