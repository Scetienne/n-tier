<div class = 'afficherDetail'>
	<?php 

	include "connectionBDD.php";


	$idRec = $_POST["id"];
	$sql = "SELECT * FROM candidature WHERE Id = ?";
	$queryDemande = $bdd->prepare($sql);
	$queryDemande->bind_param("i", $idRec);

	$queryDemande->execute();
	$detailDemande = $queryDemande->get_result();
	$contenu = $detailDemande->fetch_array() ?>

<div class = "commentaire">
	<strong>commentaire : </strong><br/>
	<?php echo $contenu["Commentaire"] ?>
</div>
<div class = "dateSoum">
	<strong>Date de Soumission : </strong>
	<?php echo $contenu["DateSoumission"] ?>
</div>
</div>

