/**
 * Created by Tristan LE GACQUE on 14/01/2018.
 */

function onButtonAction(data_action, callback) {
    $('button[data-action="' + data_action + '"]').click(callback);
}
