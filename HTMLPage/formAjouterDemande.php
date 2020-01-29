<table id = "inscription">
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