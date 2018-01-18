/**
 * Created by Tristan LE GACQUE on 08/01/2018.
 */

const _action_supprimer_reservation = 'supprimer-reservation';

$(function() {
	
	// this will use clndr's default template, which you probably don't want.
    moment.locale('fr');
    $('#full-clndr').clndr();

    //Ajout des actions collapse
    onButtonAction('collapse', function() {
        $(this).closest('.box').boxWidget('toggle');
    });

    //Collapse par défaut
    $('*[data-default="collapse"]').closest('.box').boxWidget('toggle');

    onButtonAction(_action_supprimer_reservation, function() {
        var id_resa = $(this).attr('data-id');
        var item = $(this);
        submitAjaxRequest('traitement-reservation-supprimerReservation', 'reservation='+id_resa, function(resp) {
           if(resp.type === 'success') {
               toastr.success(resp.message);
               item.closest('.small-pad').hide();
           } else {
               toastr.error(resp.message);
           }
        });
    })





 
});


