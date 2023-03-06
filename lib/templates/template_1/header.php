<?php
    //Страница по умолчанию
    $data=$_GET["data"];
    if ($data=="" AND $_SERVER["REQUEST_URI"]!="/auth.php") {
        header("Location: /general/");
    }
    
    //Полный путь к странице
    $str=$_SERVER["DOCUMENT_ROOT"]."/".$arSettings["include_path"].$data.".php";
    if (!file_exists($str)) {
        $error="Данный функционал находится в разработке";
    }  
    
    //Устанавливаем кодировку
    header('Content-type: text/html; charset=utf-8');

    //Массив соответствия надписей заголовков и страниц
    $arTitle=[
        "general"=>"Главная",
        "trends"=>"Анализатор трендов",
        "agregators"=>"База агрегаторов",
    ];
?>
<html>
    <head>
        <title>Электронный Маркетолог - 1.0 alpha</title>
        <?php general::cssJs($arSettings);?>
        <link rel="stylesheet" href="/<?php echo $arSettings["template_path"].$arSettings["template_id"];?>/plugins/jquery-ui-1.12.1.custom/jquery-ui.css?version=1">
        <script src="/<?php echo $arSettings["template_path"].$arSettings["template_id"];?>/plugins/jquery-ui-1.12.1.custom/jquery-ui.js?version=1"></script>
        <link rel="stylesheet" type="text/css" href="/<?php echo $arSettings["template_path"].$arSettings["template_id"];?>/plugins/sweet-alert/sweet-alert.css">
        <script src="/<?php echo $arSettings["template_path"].$arSettings["template_id"];?>/plugins/sweet-alert/sweet-alert.min.js"></script>
        <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
        <link rel="manifest" href="/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
    </head>
    <body>
        <div class="general">
            <div id="dialog_1"></div>
            <?if($auth->test()):?>
                <div class="menu-1">
                    <a href="/general/">
                        <div class="item but-1">
                            Главная
                        </div>
                    </a>
                    <a href="/trends/">
                        <div class="item but-1">
                            Анализатор трендов
                        </div>
                    </a>
                    <a href="/agregators/">
                        <div class="item but-1">
                            База агрегаторов
                        </div>
                    </a>
                    <a href="/index.php?exit=yes">
                        <div class="item but-1 ended">
                            Выход
                        </div>
                    </a>
                </div>
                <div class="menu-1-but-block">
                    <div id="menu-1-but" class="menu-1-but menu-1-but-open">
                        <div class="line line-1"></div>
                        <div class="line line-2"></div>
                        <div class="line line-3"></div>
                    </div>
                </div>
            <?endif;?>