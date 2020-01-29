<?php 

include "connectionBDD.php";

$sql = "UPDATE candidature SET Valide = 1 WHERE Id = ? ";
$requeteValider = $bdd -> prepare($sql);
$requeteValider->bind_param("i", $_POST['id']);
$requeteValider->execute();

?>



la demande a bien étée validée