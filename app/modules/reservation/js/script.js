/**
 * Created by Tristan LE GACQUE on 08/01/2018.
 */

const _action_rechercherSalleDispo  = 'reservation-rechercher-salle',
    _action_annuler_reservation = 'reservation-annuler',
    _action_valider_reservation = 'reservation-valider';

const _identifier_recherche_texte   = 'recherche-texte',
    _identifier_recherche_texte2    = 'recherche-texte2',
    _identifier_recherche_resultat  = 'recherche-salles';

const _url_liste_des_salles         = 'listing-listeDesSalles';

//TODO

$(function() {

    //datePicker
    $('input[data-provide="datepicker"]').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        startDate: '0d',
        language: 'fr'
    }).datepicker('update', new Date());

    //timepicker
    $('input[data-provide="timepicker"]').timepicker({
        minuteStep: 15,
        showMeridian: false
    });

    //Rechercher les salles disponibles
    function rechercherSallesDispo() {
        reinitialiserRecherche();
        const element =
            '<div class="col-sm-12">' +
            ' <label>' +
            '  <input type="radio" name="optionsRadios" id="option_{id_salle}" value="{id_salle}">&nbsp;' +
            '    {nom_salle} ({code_salle})' +
            '  </label>' +
            '</div>';

        //Faire la recherche
        //TODO

        //Résultat de la recherche
        //TODO
        var result = [{
            nom: 'salle1',
            code: 'A001',
            id: 2
        },{
            nom: 'salle2',
            code: 'A002',
            id: 3
        },{
            nom: 'salle4',
            code: 'A004',
            id: 4
        }];

        //Mise en forme de la recherche
        const color = result.length > 0 ? 'green' : 'red';
        const icon  = result.length > 0 ? '<i class="fa fa-check-circle"></i>&nbsp;' : '<i class="fa fa-times-circle"></i>&nbsp;';

        $('#' + _identifier_recherche_texte).html('<span class="text-'+color+'">'+result.length + ' salles disponibles'+'</span>');
        $('#' + _identifier_recherche_texte2).html('<span class="text-'+color+'">'+icon+result.length + ' salles disponibles'+'</span>');
        $.each(result, function(id, salle) {
            $('#' + _identifier_recherche_resultat).append(
                element.replace('{nom_salle}', salle.nom)
                    .replace('{code_salle}', salle.code)
                    .replace('{id_salle}', salle.id)
                    .replace('{id_salle}', salle.id)
            )
        })

    }

    /**
     * Reinitialise les champs de resultat de recherche (id des salles)
     */
    function reinitialiserRecherche() {
        const icon = '<i class="fa fa-hourglass-half"></i>&nbsp;';
        $('#' + _identifier_recherche_texte).html('<span class="text-warning">En attente de recherche</span>');
        $('#' + _identifier_recherche_texte2).html('<span class="text-warning">'+icon+'En attente de recherche</span>');
        $('#' + _identifier_recherche_resultat).html('');
    }


    //-- INITIALISATION DES BOUTONS

    //Bouton rechercher
    onButtonAction(_action_rechercherSalleDispo, rechercherSallesDispo);

    //Envoyer une reservation
    onButtonAction(_action_valider_reservation, function() {
        //Récupération des valeurs
        var date         = getValueOfID('date_input');
        var temps_debut  = getValueOfID('dateDebut_input');
        var temps_fin    = getValueOfID('dateFin_input');
        var motif        = getValueOfID('motif_input');
        var salle_id     = $('input[name="optionsRadios"]:checked').val();

        const data   = 'date='+date+ '&debut='+temps_debut+ '&fin='+temps_fin+ '&motif='+motif+ '&salle='+salle_id;
        submitAjaxRequest('traitement-reservation-reserverSalle', data, function(resp) {
            if(resp.type === 'success') {
                toastr.success(resp.message);
                redirect(_url_liste_des_salles);
            } else {
                toastr.error(resp.message);
            }
        })
    });

    //Annuler
    onButtonAction(_action_annuler_reservation, function() {
        redirect(_url_liste_des_salles);
    });


    //-- INITIALISATION DE LA PAGE
    reinitialiserRecherche();

});


