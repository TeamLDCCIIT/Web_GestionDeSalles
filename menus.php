<?php

//Génération des menus

//Récupération de la liste des modules
$menusFiles     = array();
foreach(getModuleFolders() as $folder) {
    $mpath = $folder . '/params/menus.json';

    //Si le fichier existe et que l'on peut acceder au module, on charge le fichier
    if(file_exists($mpath) && checkRights($folder)) {
        array_push($menusFiles, $mpath);
    }
}

//Pour chaque fichier menu
$menus = array();
foreach($menusFiles as $mfile) {
    //Ajout de chaque item menu au menu général
    foreach (json_decode(file_get_contents($mfile), true) as $mitem) {
        array_push($menus, $mitem);
    }
}

//Activation du menu courant
$currentPath = $__module . '-' . $__page;
foreach($menus as &$menu) {
    $isActive = false;
    if(isset($menu['smenus'])) {
        foreach($menu['smenus'] as &$smenu) {
            if($smenu['link'] == $currentPath) {
                $smenu['active'] = true;
                $menu['active'] = true;
            }
        }
    } else {
        if($menu['link'] == $currentPath) {
            $menu['active'] = true;
        }
    }
}

//Application des menus
$__template->setVar('menus', $menus);