$(document).ready(function() {
    //Кнопка меню открыть
    $("body").on("click", ".menu-1-but-open", function(){
        $("#menu-1-but").removeClass("menu-1-but-open");
        $("#menu-1-but").addClass("menu-1-but-close");
        $(".menu-1").css("display", "block");
    });
    //Кнопка меню закрыть
    $("body").on("click", ".menu-1-but-close", function(){
        $("#menu-1-but").removeClass("menu-1-but-close");
        $("#menu-1-but").addClass("menu-1-but-open");
        $(".menu-1").css("display", "none");
    });
});