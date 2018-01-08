**----- LISTE DES VARIABLES A REDEFINIR (Twig) -----**

La liste ci-dessous décrit les variables générales que l'on peut
redefinir via la méthode :

*$__template->setVar('nom_de_la_variable', valeur);*

**Variables à redefinir (Twig):**

* pagetitle [String] : Titre de la page (navigateur)
* page_title [String] : Titre de la page
* page_subtitle [String] : Titre de la section


**----- LISTE DES VARIABLES ACCESSIBLES (PHP) -----**

La liste ci-dessous décrit les variables générales que l'on peut
utiliser en php.

**Variables accessibles :**
* $__template [Template] : Template général
* $__page [String] : nom de la page
* $__module [String] : nom du module
* $__id [String] : Identifiant passé en paramètre
* $_GET [Array] : Variable générale $_GET

* $_SESSION['user']['username'] [String] : Nom de l'utilisateur
* $_SESSION['user']['group'] [String] : Nom du groupe de l'utilisateur

