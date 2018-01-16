**----- Module de login -----**

Le module de login permet de vérifier les accès des utilisateurs
ainsi que de lui attribuer les droits necessaires pour utiliser
l'application.

La structure de base de données est libre. Cependant, il est necessaire
de redéfinir les droits de l'utilisateur en php une fois l'authentification
reussie. Les lignes suivantes doivent être incluses dans le fichier
de gestion des droits :

```php
$_SESSION['user']['id_utilisateur'] = <id_utilisateur>
$_SESSION['user']['username']   = <nom_de_l'utilisateur>
$_SESSION['user']['group']      = array('groupe1', 'groupe2', ...)
```
