/**
 * Created by Tristan LE GACQUE on 08/01/2018.
 */

const _action_rechercher_salles =   'action-rechercher-salles';

$(function() {
    //Pour la page traitement
    $('button[data-action="traitement"]').click(function() {
        $('div[id=retourT]').text('Traitement en cours....');
        submitAjaxRequest('traitement-exemple-exempleTraitement', '', function(resp) {
            var message = 'Résultats renvoyés : <br />';
            $.each(resp, function(key, val) {
                message += '<br />' + key + ' => ' + val;
            });
            $('div[id=retourT]').html(message);
        })

    });

    $('button[id="reset"]').click(function() {
        $('div[id=retourT]').text('');
    });

});


