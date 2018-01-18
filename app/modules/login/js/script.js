/**
 * Created by Tristan LE GACQUE on 15/01/2018.
 */
$(function() {

    function login() {
        var login = getValueOfID('InputUsername');
        var pass = getValueOfID('InputPassword');

        submitAjaxRequest("traitement-login-retourLogin", 'InputUsername='+login+'&InputPassword='+pass, function(resp){
            if(resp.type === 'success') {
                toastr.success('Vous êtes bien connecté !');
                window.setTimeout(function(){
                    redirect('index.php');
                }, 500);
            } else {
                //Vider le mot de passe
                $('#InputPassword').val('');
                toastr.error('Erreur de connexion, vérifiez vos identifiants');
            }
        });
    }

    onButtonAction('login', login);
    $('#InputPassword').pressEnter(login);
    $('#InputUsername').pressEnter(login);



});