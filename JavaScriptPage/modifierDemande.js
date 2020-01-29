$(function(){
	$(".contenu").load("ajouterDemande.php #inscription");


	console.log($("[name='NomEtudiant']").val());
	$("[name='nom']").val($("[name='NomEtudiant']").val());
	$("[name='entreprise']").val($("[name='Entreprise']").val());
	$("[name='commentaire']").val($("[name='Commentaire']").val());






})

