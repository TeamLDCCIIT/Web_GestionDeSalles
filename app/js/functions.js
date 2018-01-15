/**
 * Created by Tristan LE GACQUE on 14/01/2018.
 */

function onAction(selector, data_action, callback) {
    $(selector+'[data-action="' + data_action + '"]').click(callback);
}

function onButtonAction(data_action, callback) {
    $('button[data-action="' + data_action + '"]').click(callback);
}

function onSelectChange(data_action, callback) {
    $('select[data-action="' + data_action + '"]').change(callback);
}
