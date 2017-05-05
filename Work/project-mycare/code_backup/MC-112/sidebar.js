function toggle_sidebar() {

    $('.row-offcanvas').toggleClass('active');
    $('.collapse').toggleClass('in').toggleClass('hidden-xs').toggleClass('visible-xs');
}



<!-- javascript for autocomplete search -->
function AutosearchResident(){
    var key = $('#residentsearch').val();
    var src = "/resident/autocomplete";
    $("#residentsearch").autocomplete({
        source: function( request, response ) {
            $.ajax({
                url: src,
                dataType: "json",
                data: {key: key},
                success: function(data){
                    response(data.message);
                }
            });
        },select: function(event, ui){
            var id = ui.item.id;
            // redirect to url
            window.location = "/resident/select/"+id;
        }
    });
}




//START :  Side Menu script        TODO : merge this with the other...
$(document).ready(function () {
  var trigger = $('.hamburger'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
       
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
      
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#app').toggleClass('toggled');

        // Remember user side menu show/hide
        var show_side_menu = localStorage.getItem("show_side_menu") ? localStorage.getItem("show_side_menu"):"show";
        show_side_menu = (show_side_menu == "show") ? "hide" : "show";
        localStorage.setItem("show_side_menu", show_side_menu);
  });

  $('[data-toggle="dropdown"]').click(function () {
        $('.sidebar-nav .dropdown-toggle').not(this).find('span').removeClass('fa-angle-down');
        $('.sidebar-nav .dropdown-toggle').not(this).find('span').addClass('fa-angle-left');

        if(  $(this).find('span').hasClass('fa-angle-left') ){
          $(this).find('span').removeClass('fa-angle-left');
          $(this).find('span').addClass('fa-angle-down');
        }else if( $(this).find('span').hasClass('fa-angle-down')  ) {
          $(this).find('span').removeClass('fa-angle-down');
          $(this).find('span').addClass('fa-angle-left');
        }
  });  

});





var show_side_menu = localStorage.getItem("show_side_menu");
if (show_side_menu == null){
    show_side_menu = "show";  // default
    localStorage.setItem("show_side_menu", show_side_menu);
}
if(show_side_menu == "hide"){

    document.write('<style>              \
            @media screen and ( min-width:768px ) {  \
              #sidebar-wrapper {           \
                  width: 0%;              \
              }                            \
                                           \
              #app.toggled #sidebar-wrapper {   \
                  width: 25%;                    \
              }                                 \
                                                \
              #page-content-wrapper {           \
                  width: 100%;                   \
              }                                 \
              #app.toggled #page-content-wrapper {  \
                  width: 75%;                      \
              }                                     \
            }                                        \
                                 \
            @media screen and ( max-width:768px ) {   \
              #sidebar-wrapper {                      \
                  width: 0%;                         \
              }                                       \
              #app.toggled #sidebar-wrapper {         \
                  width: 80%;                          \
              }                                       \
                                                      \
              #page-content-wrapper {                 \
                  right:0%;    \
              }                                       \
              #app.toggled #page-content-wrapper {    \
                  right:-80%; /* -(width of .toggled #sidebar-wrapper@768px) */            \
              }                                       \
            }                                         \
        </style>                                      \
    ');


}else{  

    document.write('<style>              \
            @media screen and ( min-width:768px ) {  \
              #sidebar-wrapper {           \
                  width: 25%;              \
              }                            \
                                           \
              #app.toggled #sidebar-wrapper {   \
                  width: 0%;                    \
              }                                 \
                                                          \
              #page-content-wrapper {           \
                  width: 75%;                   \
              }                                 \
              #app.toggled #page-content-wrapper {  \
                  width: 100%;                      \
              }                                     \
            }                                        \
                                 \
            @media screen and ( max-width:768px ) {   \
              #sidebar-wrapper {                      \
                  width: 80%;                         \
              }                                       \
              #app.toggled #sidebar-wrapper {         \
                  width: 0%;                          \
              }                                       \
                                                          \
              #page-content-wrapper {                 \
                  right:-80%; /* -(width of #sidebar-wrapper@768px) */   \
              }                                       \
              #app.toggled #page-content-wrapper {    \
                  right:0;                            \
              }                                       \
            }                                         \
        </style>                                      \
    ');

}

//END :  Side Menu script     
    
