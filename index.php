<?php
    //Инициализация движка
    include($_SERVER["DOCUMENT_ROOT"]."/ini/ini.php");
    
    //Грузим шапку
    include($arSettings["template_path"].$arSettings["template_id"]."/header.php");
?>
<div class="center">
    <?php
        //Подгружаем необходимую страницу
        if ($error!="") {
            echo "<div class='error-1'>\n";
                echo $error;
            echo "</div>\n";
        } else {
            include($str);
        }
    ?>
</div>
<?php
    //Грузим подвал
    include($arSettings["template_path"].$arSettings["template_id"]."/footer.php");
?>