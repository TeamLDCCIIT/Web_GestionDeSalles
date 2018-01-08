Framework de Template **TTPL**

Ce framework a pour but d'exploiter le design pattern MVC,
séparant chaque partie du code distinctement. 
La partie visuelle (Vue) sera codée uniquement en HTML 
(+ du code de template TWIG).
Le controleur ainsi que le modèle seront codés en PHP.

**----- Utilisation -----**

Afin d'utiliser ce framework, il est necessaire
de télécharger les sources, et de les inclure directement 
en tant que projet. Toute votre application
devra être développée dans le dossier **APP**
à la racine du projet. Dans le dossier **modules**, il est necessaire
de séparer le projet en différents modules, contenant chacun
deux dossier : **pages** et **templates**, qui contiendront
respectivement le contrôleur ainsi que la vue. Un exemple est
disponible avec les sources. Le modèle, ainsi que les fonction générales,
se trouveront dans le dossier **lib**, qui est situé à la racine du dossier **app**.
Les fichiers js et css devront être situés dans les dossier **js** et **css** dans le dossier **app**.

**----- Configuration -----**

Il n'est normalement pas necessaire de modifier directement
les sources de ce template. Cependant, les fichiers
contenus dans le dossier **params** doivent être édités
afin de correspondre au mieux à votre application.
Le .htaccess doit être édité au niveau de la ligne TODO.


**----- Copyrights -----**

Ce framework utilise plusieurs modules externes qui sont la propriété
de leurs auteurs respectifs. Les détails peuvent être trouvés sur 
les modules en question (fichier .js, .css, .php)
Le module de template utilisé est Twig, la license est située dans le dossier **lib/Twig**

Le framework à été développé par Tristan LE GACQUE, et son utilisation
est régie par la license située à la racine du framework.
