<?php
    //Контроллер запросов БД
    
    class DBQ {
        //Выполнение запроса, получение результата в виде массива, если таковой имеется
        public function sql($sql_text, $return=true) {
            $sql_sql=DBH::prepare($sql_text);
            $sql_sql->execute();
            
            
            if ($return==true) {
                for ($i=0;$i<$sql_sql->rowCount();$i++) {
                    $sql_result=$sql_sql->fetch(PDO::FETCH_OBJ);
                    unset($tmpAr);
                    foreach ($sql_result AS $key=>$val) {
                        $tmpAr[$key]=$val;
                    }
                    $arResult[]=$tmpAr;
                }
            }
            
            return $arResult;
        }
                
    }
?>