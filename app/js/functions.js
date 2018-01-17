/**
 * Created by Tristan LE GACQUE on 14/01/2018.
 */


function onButtonAction(data_action, callback) {
    $('button[data-action="' + data_action + '"]').click(callback);
}

function onSelectChange(data_action, callback) {
    $('select[data-action="' + data_action + '"]').change(callback);
}

function getValueOfID(id) {
    return $('#'+id).val();
}

function redirect(url) {
    window.location.replace(url);
}

//Fonctions maison
$(function(){
    $.fn.pressEnter = function(callback) {
        this.keyup(function(e) {
            if (e.keyCode === 13) {
                callback();
            }
        });
    }
});