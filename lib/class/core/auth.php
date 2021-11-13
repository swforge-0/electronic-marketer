<?php
    //Авторизация
    class auth {
        function __construct() {
            
        }
        //Персональное хранилище
        public function storage($arParam) {
            if ($_COOKIE['dump']!="") {
                $base=new DBQ;
                if ($arParam["type"]=="set") {
                    $sql_text="SELECT * FROM auth_users_data WHERE dump='{$_COOKIE['dump']}' AND name='{$arParam['name']}'";
                    $res=$base->sql($sql_text);
                    if (is_array($res)) {
                        $sql_text="UPDATE auth_users_data SET val='{$arParam['val']}' WHERE dump='{$_COOKIE['dump']}' AND name='{$arParam['name']}'";
                    } else {
                        $sql_text="INSERT INTO auth_users_data(dump,name,val) VALUES('{$_COOKIE['dump']}','{$arParam['name']}','{$arParam['val']}')";
                    }
                    $base->sql($sql_text,false);
                }
                if ($arParam["type"]=="get") {
                    $sql_text="SELECT * FROM auth_users_data WHERE dump='{$_COOKIE['dump']}' AND name='{$arParam['name']}'";
                    $res=$base->sql($sql_text);
                    $result=$res[0]['val'];
                    
                    return $result;
                }
            }
        }
        //Вход
        public function enter($arParam) {
            $base=new DBQ;
            $pass_md5=md5($arParam['password']);
            $sql_text="SELECT * FROM auth_users WHERE login='{$arParam['user']}' AND pass='{$pass_md5}'";
            $sql_result=$base->sql($sql_text);
            
            if (is_array($sql_result)) {
                $dump=md5($arParam['user'].$pass_md5);
                $ui=$sql_result[0]['id'];
                setcookie("dump",$dump);
                setcookie("ui",$ui);
                header("Location: /");
            } else {
                $result="Неверный логин или пароль";
            }
            
            return $result;
        } 
        //Выход
        public function exit($redirect="yes") {
            setcookie("dump","");
            setcookie("ui","");
            if ($redirect=="yes") {
                header("Location: /");
            }
        }
        //Проверка авторизации
        public function test() {
            $base=new DBQ;
            $sql_text="SELECT * FROM auth_users WHERE id='{$_COOKIE['ui']}' AND block<>'1'";
            $sql_result=$base->sql($sql_text);
            if (is_array($sql_result)) {
                $dump=md5($sql_result[0]['login'].$sql_result[0]['pass']);
                if ($dump==$_COOKIE['dump']) {
                    if ($sql_result[0]['access_level']!="1") {
                        $result=false;
                    } else {
                        $result=true;
                    }
                } else {
                    $result=false;
                }
            } else {
                $result=false;
            }
            
            return $result;
        }
        //Получение данных текущего пользователя
        public function get_data_user() {
            $arResult['id']=$_COOKIE['ui'];
            
            return $arResult;
        }
    }
?>