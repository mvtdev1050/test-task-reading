/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    (function($) {
    "use strict";

    // Add active state to sidbar nav links
    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function() {
            if (this.href === path) {
                $(this).addClass("active");
            }
        });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function(e) {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });
})(jQuery);


$(document).on("click",".msg-close",function() {
    $(this).parent().remove();
});

$( document ).ready(function() {
      var FromEndDate = new Date();
    
    $("#dob").datepicker( {
        format: "yyyy-mm-dd",
       endDate:'today'
    });
    $('#reward_amount_to').datepicker({
       format: "yyyy-mm-dd", 
   });
    $('#reward_amount_from').datepicker({
       format: "yyyy-mm-dd", 
    });
    $('#times_from').datepicker({
       format: "yyyy-mm-dd", 
   });
    $('#times_to').datepicker({
       format: "yyyy-mm-dd", 
    });
     $('#lines_from').datepicker({
       format: "yyyy-mm-dd", 
   });
    $('#lines_to').datepicker({
       format: "yyyy-mm-dd", 
    });
});

