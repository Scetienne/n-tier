<link rel="stylesheet" href="../style/bootstrap.css">
<link rel="stylesheet" href="../style/style.css">

<?php

echo "je vais enregistrer la modif <br/>";

$toutMarche = true;

if (isset($_FILES['fichierPDF']) AND $_FILES['fichierPDF']['error'] == 0)
{
	if ($_FILES['fichierPDF']['size'] > 1000000 OR
		(pathinfo($_FILES['fichierPDF']['name']))['extension'] != "pdf" ){
			$toutMarche = false;
			echo " le pdf n'est pas conforme <br/>";
	}
}




// vérifier qu'il n'y a pas de pdf ou qu'il est conforme
if ($toutMarche)
{



	// connection a la base de donnée
	include "connectionBDD.php";

	// on cherche l'ancien nom du pdf pour le renommer
	$sqlNom = "SELECT NomEtudiant, DateSoumission FROM candidature WHERE Id = ?";
	$demandeDate = $bdd -> prepare($sqlNom);
	$demandeDate -> bind_param("i", $_POST['id']);
	$demandeDate->execute();
	$anciennesDonnees = $demandeDate->get_result()->fetch_array();
	$heureRendu = date('Y-m-d_H-m-s', strtotime($anciennesDonnees["DateSoumission"]));
	$ancienNom = $anciennesDonnees["NomEtudiant"];
	$nouveauNom = $_POST["nom"];
	$ancienChemin = '../uploads/'. $ancienNom . '_' . $heureRendu . '.pdf';
	$nouveauChemin = '../uploads/'. $nouveauNom . '_' . $heureRendu . '.pdf';
	rename($ancienChemin, $nouveauChemin);

	// modifications sur la base de donnée
	$sql = " UPDATE candidature SET NomEtudiant = ?, Entreprise = ?, Commentaire = ? WHERE Id = ? ";

	$ajoutDemande = $bdd -> prepare($sql);
	$ajoutDemande->bind_param("sssi", $_POST["nom"], $_POST["entreprise"], $_POST["commentaire"], $_POST['id']);
	$ajoutDemande->execute();
	$ajoutDemande->close();

	// si il y a un fichier pdf on l'enregistre au nouveau nom
	if (isset($_FILES['fichierPDF']) AND $_FILES['fichierPDF']['error'] == 0)
{


		// enregistrer le pdf
		move_uploaded_file($_FILES['fichierPDF']['tmp_name'], $nouveauChemin);


		echo " nouveau pdf enregistré <br/>";
	}

	echo " toutes les modifications ont étées effectuées <br/>";
}

	

?>

<a href="../index.php"> retour à l'index </a><br/>
<a href="./afficherDemande.php"> retour à la liste des demandes </a>

