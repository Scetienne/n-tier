<link rel="stylesheet" href="../style/bootstrap.css">

<?php



echo "je vais enregistrer <br/>";

// vérifier que le pdf est bien envoyé
if (isset($_FILES['fichierPDF']) AND $_FILES['fichierPDF']['error'] == 0)
{
	// vérifier que le fichier est conforme (taille et format)
	if ($_FILES['fichierPDF']['size'] <= 1000000)
	{

		$infosFichier = pathinfo($_FILES['fichierPDF']['name']);
		$extensionFichier = $infosFichier['extension'];
		if ($extensionFichier == "pdf"){


			$heureRendu = date('Y-m-d_H-m-s');
			// connection a la base de donnée
			include "connectionBDD.php";

			$sql = "INSERT INTO candidature(nomEtudiant, Entreprise, Commentaire, DateSoumission, Valide) VALUES (?, ?, ?, ?, 0)";

			$ajoutDemande = $bdd -> prepare($sql);
			$ajoutDemande->bind_param("ssss", $nomEtudiant, $entreprise, $commentaire, $heureRendu);

			$nomEtudiant = $_POST["nom"];
			$entreprise = $_POST["entreprise"];
			$commentaire = $_POST["commentaire"];

			$ajoutDemande->execute();
			$ajoutDemande->close();

			$nomEnregistrement = '../uploads/'. $nomEtudiant . '_' . $heureRendu . '.pdf';




			// enregistrer le pdf
			move_uploaded_file($_FILES['fichierPDF']['tmp_name'], $nomEnregistrement);


			echo "tout marche bien <br/>";

		}
		else
		{
			echo "echec de l'enregistrement : ceci n'est pas un document PDF<br/>";
		}
	}
	else
	{
		echo "echec de l'enregistrement : volume du fichier trop volumineux<br/>";
	}
}
else 
{
	echo "echec de l'enregistrement : fichier PDF manquant<br/>";
}

?>


<a href="../index.php"> retour à l'index </a><br/>
<a href="./ajouterDemande.php"> retour à l'ajout de demandes </a><br/>
<a href="./afficherDemande.php"> retour à la liste des demandes </a>

