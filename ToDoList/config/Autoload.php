<?php


class Autoload
{
    private static $_instance = null;

    public static function charger(){
        if(self::$_instance !== null){
            throw new RuntimeException(sprintf("%s déjâ chargé"), __CLASS__);
        }

        self::$_instance = new self();

        if(!spl_autoload_register(array(self::$_instance, '_autoload'), false)){
            throw RuntimeException(sprintf("%s : impossible de lancé l'autoload", __CLASS__));
        }
    }
    public static function shutDown(){
        if(self::$_instance !== null){
            if(!spl_autoload_unregister(array(self::$_instance, '_autoload'))){
                throw new RangeException("impossible d'arréter l'autoload");
            }

            self::$_instance = null;
        }
    }
    private static function _autoload($class){
        global $rep;
        $filename = $class.'.php';
        $dir = array('modeles/','./','config/','controleur/','DAL/','class_metiers/', 'DAL/gateway/');
        foreach ($dir as $d){
            $file=$rep.$d.$filename;
            if (file_exists($file)){
                include $file;
            }
        }
    }
}