<?php

include "connectionBDD.php";

if (isset($_POST["nom"]))
{
	$nomRec = "%" . $_POST["nom"] . "%";
}
else
{
	$nomRec = "%%";
}

if (isset($_POST["entreprise"]))
{
	$entrepriseRec = "%" . $_POST["entreprise"] . "%";
}
else
{
	$entrepriseRec = "%%";
}

echo $entrepriseRec;

$sql = "SELECT * FROM candidature WHERE NomEtudiant LIKE ? AND Entreprise LIKE ?";
$queryDemandes = $bdd->prepare($sql);
$queryDemandes->bind_param("ss", $nomRec, $entrepriseRec);



$queryDemandes->execute();
$listeDemandes = $queryDemandes->get_result();

?>
<table class = "table-affiche table table-bordered">
	<thead>
		<tr>
			<th>Nom de l'Etudiant</th>
			<th>Nom de l'entreprise</th>
			<th></th>
		</tr>
	</thead>
	<tbody>

		<?php



		while ($demande = $listeDemandes->fetch_array())
		{
			$heureRendu = date('Y-m-d_H-m-s', strtotime($demande['DateSoumission']));
			$nomPDF = $demande['NomEtudiant'] . '_'. $heureRendu;
			$cheminPDF = "../uploads/". $nomPDF. ".pdf";
			$actionDetail = "'afficherDetail(".$demande['Id'].")'";
			$actionValider = "'validerDemande(".$demande['Id'].")'";
			$actionSupprimer = "'supprimerDemande(".$demande['Id'].")'";

			if ($demande["Valide"] == 1){
				echo "<tr id = ". $demande['Id'] ." class = 'validate'>";

			}
			else{

				echo "<tr id = ". $demande['Id'] .">";
			}

			echo "<th onclick = ". $actionDetail . ">". $demande['NomEtudiant']. " </th>";
			echo "<th onclick = ". $actionDetail . ">".$demande['Entreprise']. "</th>";
			echo "<th ><a href = '$cheminPDF'>PDF</a></th>";
			echo "<th class = 'celBoutton d-flex'>";
			if ($demande["Valide"] == 0){
				echo '<form method="POST" action="./modifierDemande.php">
				<input type="hidden" name="recupId" value = '. $demande['Id'] .'>
				<input type="submit" name="modifier" value="modifier" >
				</form>
				<button onclick='. $actionValider . '>valider</button>
				';
			}
			echo '<button onclick='. $actionSupprimer . '>supprimer</button>
			';
			echo '</th></tr>
			<tr >
			<th colspan = "4" class= "'. $demande['Id'] .' details "></th>
			</tr>
			';

		}

		$listeDemandes->close()


		?>
	</tbody>
	<?php $demande['Id'] ?>
</table>

