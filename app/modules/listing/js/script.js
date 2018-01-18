/**
 * Created by Tristan LE GACQUE on 08/01/2018.
 */

const _action_rechercher_salles     =   'rechercherSalle';

const _identifier_salles_tableau    =   'listeSalles',
    _identifier_select_campus       =   'campus_select',
    _identifier_select_etage        =   'etage_select',
    _identifier_select_type         =   'type_select';

$(function() {

    /**
     * Lance une requete AJAX et affiche les salles correspndantes aux filtres
     */
    function searchSalle() {
        var campus  = $('#'+_identifier_select_campus).val();
        var etage   = $('#'+_identifier_select_etage).val();
        var type    = $('#'+_identifier_select_type).val();
        var table   = $('#'+_identifier_salles_tableau);

        //Recherche de la colonne à trier
        var colTri      = $('th[data-tri]').first();
        var colTriNom   = colTri.attr('data-col');
        var colTriOrd   = colTri.attr('data-tri');

        submitAjaxRequest('traitement-listing-recupererSalles',
            'campus='+campus + '&etage='+etage +'&type='+type +'&triCol='+colTriNom +'&triOrd='+colTriOrd,
            function(resp) {
                if(resp.type = 'success') {
                    console.log(resp);
                    table.html('');
                    if(resp.salles.length > 0) {
                        $.each(resp.salles, function(id, salle) {
                            $('#'+_identifier_salles_tableau).append(
                                '<tr>' +
                                '   <td class="col-sm-4">'+salle.nom+'</td>' +
                                '   <td class="col-sm-2">'+salle.code+'</td>' +
                                '   <td class="col-sm-2">'+salle.etage+'</td>' +
                                '   <td class="col-sm-4">'+salle.type+'</td>' +
                                '</tr>'
                            );
                        });
                    } else {
                        table.html('<tr><td colspan="4" align="center">Aucun résultat ¯\\_(ツ)_/¯</td></tr>');
                    }

                } else {
                    table.html('<tr><td colspan="4" align="center">Une erreur est survenue !</td></tr>');
                    console.log("Une erreur est survenue");
                }
            })
    }

    /**
     * Initialise la fonction de tri
     */
    function initTri() {
        $('th[data-col]').each(function() {
            var defTri  =   '<i class="fa fa-caret-up text-gray" aria-hidden="true"></i>' +
                            '<i class="fa fa-caret-down text-gray" aria-hidden="true"></i>';

            //Ajout du visuel par défaut
            $(this).append('&nbsp; <span>' + defTri + '</span>');

            $(this).click(function() {
                var tri = $(this).attr('data-tri');

                //Reinitialisation de toutes les autres colonnes
                $('th[data-col]').each(function() {
                    $(this).attr('data-tri', null);
                    $(this).find('span').html(defTri);
                });

                //On tri
                if(tri === undefined || tri === null) {
                    $(this).attr('data-tri', 'ASC');
                    $(this).find('span').html('' +
                        '<i class="fa fa-caret-up" aria-hidden="true"></i>' +
                        '<i class="fa fa-caret-down text-gray" aria-hidden="true"></i>');
                } else if(tri === 'ASC') {
                    $(this).attr('data-tri', 'DESC');
                    $(this).find('span').html('' +
                        '<i class="fa fa-caret-up text-gray" aria-hidden="true"></i>' +
                        '<i class="fa fa-caret-down" aria-hidden="true"></i>');
                } else {
                    $(this).attr('data-tri', null);
                    $(this).find('span').html(defTri);
                }
                searchSalle();
            });
        })
    }

    onButtonAction(_action_rechercher_salles, searchSalle);
    onSelectChange(_action_rechercher_salles, searchSalle);

    //Recherche par défaut
    searchSalle();

    //Initialiser tri
    initTri();

});


