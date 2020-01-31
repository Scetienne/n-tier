
$(function(){
	$('#changerRecherche').on('input', function(){
		var param = 'nom = ' + $('#nomJS').val() + '& entreprise = ' + $('#entrepriseJS').val();
		console.log(param);
		$('#afficherResultats').load('reccupererListeDemandes.php', {
			nom : $('#nomJS').val(),
			entreprise : $('#entrepriseJS').val()
		});

	});




	
});

function afficherDetail(demande_id){
	if ($('.' +demande_id+'.details').html() == "" ) {
		$('.' +demande_id+'.details').load('afficherDetail.php .afficherDetail', {
				id : demande_id })

	}
	else {
		$('.' +demande_id+'.details').html("") ;
	}
}

	function validerDemande(demande_id){
		$("#actionEffectuee").load('validerDemande.php', {id : demande_id});
		$('#' + demande_id).addClass('validate');
		$('#' + demande_id).load('reccupererListeDemandes.php #' + demande_id + ' th');
	}

	function supprimerDemande(demande_id){
		var actionSupprimer = "'supprimerDemande(" + demande_id + ")'"
		$("#actionEffectuee").load('supprimerDemande.php', {id : demande_id});
		$('.celBoutton').html('<button onclick=' + actionSupprimer + '>supprimer</button>')
		$("#" + demande_id).remove();
		$("." + demande_id).remove();

	}