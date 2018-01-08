/**
 * Created by Tristan LE GACQUE on 08/01/2018.
 */

/**
 * Execute une requete AJAX vers l'url fourni, et execute la fonction de callback en fonction du résultat
 * @param url string Url vers lequel envoyer la requête
 * @param datas string Données au format key1=value1&key2=value2&...
 * @param doneCallback Fonction de callback en cas de succès de la requete
 * La fonction de callback est toujours appelée avec la reponse ajax
 */
function submitAjaxRequest(url, datas, doneCallback) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'json',
        data: datas,
        timeout: 5000,
        error: function() {
            console.log("Erreur de requete !");
            console.log("URL=> " + url);
            console.log("TYPE=> POST / json");
            console.log("data=> " + datas);
        }
    }).done(function (resp) {
        doneCallback(resp);
    });
}
