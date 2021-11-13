<?php
    //Контроллер БД
    
    class DBH {
        private static $link=null;
        
        private static function getLink() {
            if (self::$link) 
                {
                return self::$link;
                }

            $arSettings=parsers::file_1($_SERVER["DOCUMENT_ROOT"]."/ini/cfg.ini");

            $dsn="{$arSettings["db_driver"]}:host={$arSettings["db_host"]};port={$arSettings["db_port"]};dbname={$arSettings["db_base"]};";
            
            $options=[
                1002=>'SET NAMES utf8',
            ];
            
            self::$link=new PDO ($dsn,$arSettings["db_user"],$arSettings["db_password"],$options);

            self::$link->setAttribute(constant("PDO::ATTR_ERRMODE"),constant("PDO::ERRMODE_EXCEPTION")); 
            
            return self::$link;
        }

        public static function __callStatic($name,$args) {
            $callback=array(self::getLink(),$name);
            return call_user_func_array($callback,$args);
        }
    }
?>