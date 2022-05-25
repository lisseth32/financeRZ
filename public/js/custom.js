$(function() {
    "use strict";

    $(".preloader").fadeOut();
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").on('click', function() {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
        $(".app-search").toggle(200);
        $(".app-search input").focus();
    });

    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body, .page-wrapper").trigger("resize");
    $(".page-wrapper").delay(20).show();
    
    //****************************
    /* This is for the mini-sidebar if width is less then 1170*/
    //**************************** 
    var setsidebartype = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        if (width < 1170) {
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    };
    $(window).ready(setsidebartype);
    $(window).on("resize", setsidebartype);


    jQuery(document).on("click",'.eliminar',  function() {
        console.log(eliminar);
        var id = $(this).data( "id" ); 
        var r = confirm("Esta seguro que desea eliminar este caso?");
        if (r == true) {
            $.ajax({
                'url': url_eliminar.replace("0", id),
                'type': 'GET',
                "dataType": "json",
                'success': function (res) {
                    console.log(res.msj);
                    if(res.msj == 'ok'){
                        location.reload();
                    }
                },
                'complete': function (params) {
                    location.reload();
                }
            });
        }
    });

    jQuery(document).on("click",'.editar',  function() {
        var id = $(this).data( "id" ); 
        window.open(url_editar.replace("0", id), '_self');
  
    });

});