<?php
/**
 * Created by Tristan LE GACQUE on 16/12/2017
 */
namespace Tpl;
class Template
{

    //TODO - Peut etre gérer autrement, comme dans phpStruct
    //TODO - Cad utiliser $__template et définir des sous templates par nom
    //TODO - Regarder PhpStruct
    var $variables;
    var $template;

    public function __construct($template_path)
    {
        $tpath = substr($template_path, 0, strrpos($template_path, '/'));
        $tname = substr($template_path, strrpos($template_path, '/'));

        $loader = new \Twig_Loader_Filesystem($tpath);
        $twig = new \Twig_Environment($loader, array(
            'cache' => false,
            'debug' => true,
            'autoescape' => false
        ));

        $this->template = $twig->load($tname);
        $this->variables = array();
    }

    /**
     * Renvoie l'objet Template de TWIG
     * @return \Twig_TemplateWrapper
     */
    public function getTemplate() {
        return $this->template;
    }

    /**
     * Défini la valeur d'une variable
     * @param $varname
     * @param $value
     */
    public function setVar($varname, $value) {
        $this->variables[$varname] = $value;
    }

    /**
     * Affiche le rendu du template à la place de la variable $variable du template $template
     * @param $template Template template global
     * @param $variable string
     */
    public function render($template, $variable) {
        $template->setVar($variable, $this->getRenderContent());
    }

    /**
     * Effectue un rendu de la page en remplacant les variables, et renvoies le contenu
     * @return string
     */
    public function getRenderContent() {
        return $this->template->render($this->variables);
    }

}