<?php
    //php Настройки
    ini_set('memory_limit', '1000M');
    //Инициализация библиотек
    function ini_class() {
        $lib_catalog=$_SERVER["DOCUMENT_ROOT"]."/lib/class/";
        $scan_dir=scandir($lib_catalog);
        for ($i=0;$i<count($scan_dir);$i++) {
            if ($scan_dir[$i]!="." AND $scan_dir[$i]!="..") {
                $lib_catalog_level_1=$lib_catalog.$scan_dir[$i]."/";
                $scan_dir_level_1=scandir($lib_catalog_level_1);
                for ($j=0;$j<count($scan_dir_level_1);$j++) {
                    if ($scan_dir_level_1[$j]!="." AND $scan_dir_level_1[$j]!="..") {
                        $file_name=$lib_catalog_level_1.$scan_dir_level_1[$j];
                        include($file_name);
                    }
                }
            }
        }
    }
    
    //Инициализируем классы
    ini_class();
    
    //Получаем настройки
    $arSettings=parsers::file_1($_SERVER["DOCUMENT_ROOT"]."/ini/cfg.ini");
    
    //Авторизация
    $auth=new auth();
    
    if ($_GET["exit"]=="yes") {
        $auth->exit();
    }
    
    if (!$auth->test() AND $_SERVER["REQUEST_URI"]!="/auth.php") {
        header ("Location: /auth.php");
    }
?>