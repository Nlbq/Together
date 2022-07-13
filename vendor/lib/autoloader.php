<?php
/**
 * Class Autoloader
 */
class Autoloader{

    /**
     * Enregistre notre autoloader
     */
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Inclue le fichier correspondant à notre classe
     * @param $class string Le nom de la classe à charger
     */
    static function autoload($class_name){
        if (file_exists('sources/entities/' . $class_name . '.class.php')) {
            require 'sources/entities/' . $class_name . '.class.php';
        }
        elseif (file_exists('sources/controllers/' . $class_name . '.php')) { 
            require 'sources/controllers/' . $class_name . '.php';
        }
    }

}