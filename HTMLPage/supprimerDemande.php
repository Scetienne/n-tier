<?php


include "connectionBDD.php";

// on cherche l'ancien nom du pdf pour le supprimer
$sqlNom = "SELECT NomEtudiant, DateSoumission FROM candidature WHERE Id = ?";
$demandeDate = $bdd -> prepare($sqlNom);
$demandeDate -> bind_param("i", $_POST['id']);
$demandeDate->execute();
$anciennesDonnees = $demandeDate->get_result()->fetch_array();
$heureRendu = date('Y-m-d_H-m-s', strtotime($anciennesDonnees["DateSoumission"]));
$ancienNom = $anciennesDonnees["NomEtudiant"];
$ancienChemin = '../uploads/'. $ancienNom . '_' . $heureRendu . '.pdf';

unlink($ancienChemin);

// on supprime de la base de donnée
$sql = "DELETE FROM candidature WHERE Id = ?";
$demandeSupression = $bdd -> prepare($sql);
$demandeSupression -> bind_param("i", $_POST['id']);
$demandeSupression -> execute();

?>

<div>
<font color="red">demande supprimée<br/></font>

</div>