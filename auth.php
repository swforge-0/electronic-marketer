<?php
    //Инициализация движка
    include("ini/ini.php");
    
    //Обрабатываем попытку авторизации
    if (isset($_POST["user"])) {
        $error_auth=$auth->enter($_POST);
    }
    
    //Грузим шапку
    include($arSettings["template_path"].$arSettings["template_id"]."/header.php");
?>
<div class="auth_general">
    <div class="auth_form_bg">
        <div class="auth_label">
            Электронный Маркетолог
        </div>
        <div class="auth_form">
            <form name="auth_form_form" method="POST">
                <div class="item">
                    <div class="label">
                        Логин
                    </div>
                    <div class="field">
                        <input class="input_field" name="user" type="text" />
                    </div>
                </div>
                <div class="item">
                    <div class="label">
                        Пароль
                    </div>
                    <div class="field">
                        <input class="input_field" name="password" type="password" />
                    </div>
                </div>
                <div class="item">
                    <input class="form_but_1" type="submit" value="Авторизироваться" />
                </div>
            </form>
            <div class="error">
                <?php echo $error_auth;?>
            </div>
        </div>
    </div>
</div>
<?php
    //Грузим подвал
    include($arSettings["template_path"].$arSettings["template_id"]."/footer.php");
?>