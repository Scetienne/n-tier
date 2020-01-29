<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Ajouter une demande</title>
	<link rel="stylesheet" href="../style/bootstrap.css">
	<link rel="stylesheet" href="../style/style.css">
	<?php include "connectionBDD.php" ?>
</head>
<body>
	<?php 
		echo $_POST["recupId"];

		$sql = "SELECT * FROM candidature WHERE Id = ?";
		$queryDemandes = $bdd->prepare($sql);
		$queryDemandes->bind_param("i", $_POST["recupId"]);



		$queryDemandes->execute();
		$listeDemandes = $queryDemandes->get_result()->fetch_array();
	 ?>
	<input type="hidden" name = "NomEtudiant" value = <?php echo '"'.$listeDemandes['NomEtudiant'].'"' ?>>
	<input type="hidden" name = "Entreprise" value = <?php echo '"'.$listeDemandes['Entreprise'].'"' ?>>
	<input type="hidden" name = "Commentaire" value = <?php echo '"'.$listeDemandes['Commentaire'].'"' ?>>
	<input type="hidden" name = "DateSoumission" value = <?php echo '"'.$listeDemandes['DateSoumission'].'"' ?>>

	<table id = "inscription">
				<form action = "enregistrerDemandeModif.php" method = "post" enctype = "multipart/form-data">
					<input type="hidden" name="id" value = <?php echo '"'.$_POST["recupId"].'"' ?>>
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
			<form action="./afficherDemande.php">
				<input type="submit" value="annuler">
			</form>


		
	</div>
	<script type="text/javascript" src="../JavaScriptPage/jquery.js"></script>
	<script type="text/javascript" src="../JavaScriptPage/modifierDemande.js"></script>
</body>