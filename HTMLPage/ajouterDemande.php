	<!doctype html>
	<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Ajouter une demande</title>
		<link rel="stylesheet" href="../style/bootstrap.css">
		<link rel="stylesheet" href="../style/style.css">

	</head>
	<body class = "d-flex align-items-center justify-content-center">
		<div class = "page d-flex flex-column align-items-center border">
			<a href="../index.php">retour à l'accueil</a>
			<table id = "inscription" class = "table d-flex table-bordered table-hover">
				<form action = "enregistrerDemande.php" method = "post" enctype = "multipart/form-data">
					<tr>
						<td>Nom</td>
						<td><input type = "text" name = "nom" required></td>
					</tr>
					<tr>
						<td>Entreprise</td>
						<td><input type = "text" name = "entreprise" required></td>
					</tr>
					<tr>
						<td>Commentaire</td>
						<td><input type = "text" name = "commentaire" required></td>
					</tr>
					<tr>
						<td>Pdf de description</td>
						<td><input type = "file" name = "fichierPDF"></td>
					</tr>
					<tr>
						<td></td>
						<td><input type = "submit" name = "envoyer" ></td>
					</tr>

				</form>
			</table>

		</div>
	</body>
	</html>