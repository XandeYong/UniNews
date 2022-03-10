$(document).ready(function () {

    $("#menu").click(function (e) {
        if ($("#sidebar").hasClass("hided")) {
            sidebar("0", "16rem");
        } else {
            sidebar("-16rem", "0");  
        }
    });

    $("body").click(function (e) {
        if ($("#account-dropdown").hasClass("show")) {
            account_dropdown();
        }
    });
    
    $("#account").click(function (e){
        e.stopPropagation();
    });
    
    $("#account-frame").click(function (e) { 
        account_dropdown();
        e.preventDefault();
    }); 

    $("#sidebar .navlist-item-title").click(function (e) {
        $(this).siblings().slideToggle();
        $chevron = $(this).children().children(".ico-chevron");
        if ($chevron.hasClass("ico-chevron-right")) {
            $chevron.toggleClass("rotated-90");
        } else {
            $chevron.toggleClass("rotated--90");
        }
        
    });
});

function sidebar(ml, pl) {
    $("#sidebar").animate({
        marginLeft: ml
    });

    $("#wrapper").animate({
        paddingLeft: pl
    });
    $("#sidebar").toggleClass("hided");
}

function account_dropdown() {
    $dd = $("#account-dropdown");

    $dd.toggleClass("hide");
    $dd.toggleClass("show");
}

function active_page($id) {
    $idElem = $("#" + $id);
    $icoSidebar = "";

    if (~$id.indexOf("_")) {   
        $ids = $id.split("_");

        for (let i = 0; i < $ids.length - 1; i++) {
            $ids[i] = $("#" + $ids[i]);
            $ids[i].addClass("active");
        }
        $icoChevron = $ids[0].find(".ico-chevron");
        $icoSidebar = $ids[0].find(".ico-sidebar");
        $ddl = $ids[0].find(".dropdownlist");

        $icoChevron.removeClass("ico-chevron-right");
        $icoChevron.addClass("ico-chevron-down");
        
        $ddl.show();
    } else {
        $icoSidebar = $idElem.find(".ico-sidebar");
    }
    $idElem.addClass("active");

    $icoSidebar.removeClass("ico-sidebar-active");
    $icoSidebar.addClass("ico-sidebar-active");
}