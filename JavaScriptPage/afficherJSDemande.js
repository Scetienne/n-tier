
$(function(){
	$('#changerRecherche').on('input', function(){
		var param = 'nom = ' + $('#nomJS').val() + '& entreprise = ' + $('#entrepriseJS').val();
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
	}

	function supprimerDemande(demande_id){
		$("#actionEffectuee").load('supprimerDemande.php', {id : demande_id});
		$("#" + demande_id).remove();
		$("." + demande_id).remove();

	}