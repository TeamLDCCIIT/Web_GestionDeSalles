/**
 * Created by Tristan LE GACQUE on 15/01/2018.
 */
$(function() {

    $('button[data-action="login"]').click(function(){
        var login = $('input[id="InputUsername"]').val();
        var pass = $('input[id="InputPassword"]').val();
        submitAjaxRequest("traitement-login-retourLogin", 'InputUsername='+login+'&InputPassword='+pass, function(resp){
            console.log(resp);
        });
    });

    onButtonAction('logout', function() {
        submitAjaxRequest("traitement-login-deconnexion", '', function(resp){
            console.log(resp);
        });
    });



});