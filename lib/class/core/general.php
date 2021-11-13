<?php
    //Основа ядра
    
    class general {
        //Подгрузка js и css
        public static function cssJs($arSettings) {
            $version="32";
            $lib_catalog=$arSettings["template_path"].$arSettings["template_id"]."/";
            $lib_catalog_full=$_SERVER["DOCUMENT_ROOT"].'/'.$lib_catalog;
            $ar_type[0]="css";
            $ar_type[1]="js";
            for ($i=0;$i<count($ar_type);$i++) {
                $path_full=$lib_catalog_full.$ar_type[$i]."/";
                $path=$lib_catalog.$ar_type[$i]."/";
                $scan_dir=scandir($path_full);
                for ($j=0;$j<count($scan_dir);$j++) {
                    if ($scan_dir[$j]!="." AND $scan_dir[$j]!="..") {
                        $file_name=$path.$scan_dir[$j];
                        if ($ar_type[$i]=="css") {
                            $result.="<link rel='stylesheet' type='text/css' href='/{$file_name}?version={$version}'>\n";
                        }
                        if ($ar_type[$i]=="js") {
                            $result.="<script type='text/javascript' src='/{$file_name}?version={$version}'></script>\n";
                        }
                    }
                }
            }
            
            echo $result;
        }
    }
?>