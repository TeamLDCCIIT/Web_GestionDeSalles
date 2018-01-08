**----- Edition des droits -----**

Les différents modules de l'application peuvent être
régies par des droits, c'est à dire qu'un certain niveau 
d'accès est nécessaire pour acceder au module en question.

Pour activer la gestion des droits sur le module, il est necessaire
d'éditer le fichier *droits.json* dans le dossier **params** du module.
Le fichier doit contenir la ligne suivante :

* **"group" : '<nom_du_groupe>'**

La valeur *<nom_du_groupe>* doit être remplacé par le groupe
nécessaire pour accéder au module. Pour autoriser l'accès quelque
soit le groupe, choisissez la valeur suivante : '*'

 
**----- Edition des menus -----**

Le menu est généré automatiquement en chargeant les fichiers *menus.json* 
de chaque module. Afin de définir les différents boutons du menu, il est
necessaire d'éditer le fichier *menus.json* dans le dossier **params** du module.
Le fichier être défini de la façon suivante :

```json
[{
    "name"      :  "Nom du module",
    "icon"      :  "fa-icone",
    "smenus"    :  
        [{
            "name" :   "Nom du sous-menu",
            "icon" :   "fa-home",
            "link" :   "<module>-<page>"
        },
        {
            "name" :  "Nom du sous-menu 2",
            "icon" :   "fa-icone",
            "link" :   "<module>-<page>"
        },
        ...
        ]
}, 
...
]
```
La variable *smenus* est facultative, et peut être remplacée par la variable *link*



