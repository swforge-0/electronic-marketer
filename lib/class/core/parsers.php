<?php
    //Разлиные парсеры
    
    class parsers {
        //Парсер файла с содержимым вида "" = ""
        public static function file_1($file) {
            $file_cont=file_get_contents($file);
            $file_cont=str_replace("\r","",$file_cont);
            $file_cont=str_replace("\n","",$file_cont);
            $file_cont=explode(";",$file_cont);
            foreach($file_cont AS $key=>$val) {
                if ($val!="") {
                    $tmpAr=explode("=",$val);
                    foreach($tmpAr AS $key_1=>$val_1) {
                        $tmpAr[$key_1]=trim($val_1);
                    }
                    $result[$tmpAr[0]]=$tmpAr[1];
                }
            }
                
            return $result;
        }
    }
    
?>