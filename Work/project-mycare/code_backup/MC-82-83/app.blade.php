<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SapphireHub') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    {{--<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">--}}

    {{--<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>--}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Styles -->

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
    <link rel="stylesheet" href="{{url('css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{url('css/bulma.css')}}">
    <link rel="stylesheet" href="{{url('css/bulma-docs.css')}}">
   
    <link rel="stylesheet" href="{{url('css/style.css')}}">
   

    <!-- pick a date -->
    <link rel="stylesheet" href="{{url('css/default.css')}}">
    <link rel="stylesheet" href="{{url('css/default.date.css')}}">


    <link rel="stylesheet" href="{{url('css/bootstrap-switch.css')}}">
    


    {{-- Froala editor --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1/css/froala_style.min.css" rel="stylesheet" type="text/css" />

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>







</head>










<style>
body {
    position: relative;
    overflow-x: auto;
}



/*-------------------------------*/
/*           app                 */
/*-------------------------------*/

#app {
    /*padding-left: 0;*/
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}


#sidebar-wrapper {

    z-index: 1000;
    width: 25%;
    height: 100%;
    overflow-y: auto;
    overflow-x: hidden;
    background: #2f4050;
    
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
    
}

#sidebar-wrapper::-webkit-scrollbar {
  display: none;
}

#app.toggled #sidebar-wrapper {
    width: 0%;
}

#page-content-wrapper {
    position: fixed;
    right:0;
    width: 75%; /* = 100 - width of #sidebar-wrapper*/
    height: 100%;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#app.toggled #page-content-wrapper {
    right:0;
    width: 100%;
}
/*
@media screen and ( max-width:1224px ) {
  #sidebar-wrapper { 
      width: 25%;
  }

  #page-content-wrapper {
      width: 75%; 
  } 
}
*/
@media screen and ( max-width:768px ) {
  #sidebar-wrapper { 
      width: 80%;
  }

  #page-content-wrapper {
      right:-55%; /* (100 - width of #sidebar-wrapper@768px) - width of #page-content-wrapper */
  } 
}

/*-------------------------------*/
/*     Topbar nav styles        */
/*-------------------------------*/

#topbar-wrapper {
  display: block;
  height : 80px;  
}

#topbar-right {
  position: absolute;
  
  top:10%;
  right: 10%;
}


/*-------------------------------*/
/*     Sidebar nav styles        */
/*-------------------------------*/

.sidebar-nav {
    position: absolute;
    top: 0;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    position: relative; 
    line-height: 20px;
    display: inline-block;
    width: 100%;
}

.sidebar-nav li:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    height: 100%;
    width: 3px;
    background-color: #1c1c1c;
    -webkit-transition: width .2s ease-in;
      -moz-transition:  width .2s ease-in;
       -ms-transition:  width .2s ease-in;
            transition: width .2s ease-in;

}
/*
.sidebar-nav li:first-child a {
    color: #fff;
    background-color: #1a1a1a;
}
.sidebar-nav li:nth-child(2):before {
    background-color: #ec1b5a;   
}
.sidebar-nav li:nth-child(3):before {
    background-color: #79aefe;   
}
.sidebar-nav li:nth-child(4):before {
    background-color: #314190;   
}
.sidebar-nav li:nth-child(5):before {
    background-color: #279636;   
}
.sidebar-nav li:nth-child(6):before {
    background-color: #7d5d81;   
}
.sidebar-nav li:nth-child(7):before {
    background-color: #ead24c;   
}
.sidebar-nav li:nth-child(8):before {
    background-color: #2d2366;   
}
.sidebar-nav li:nth-child(9):before {
    background-color: #35acdf;   
}
*/

/*
.sidebar-nav li:hover:before {
    width: 100%;
    -webkit-transition: width .2s ease-in;
      -moz-transition:  width .2s ease-in;
       -ms-transition:  width .2s ease-in;
            transition: width .2s ease-in;

}
*/

.sidebar-nav li a {
    font-size: 18px;
    display: block;
    color: #ddd;
    text-decoration: none;
    padding: 10px 15px 10px 30px; 
}

.sidebar-nav li a:hover,
.sidebar-nav li a:active,
.sidebar-nav li a:focus {
   
    color: #37474F;
    background-color: #00BCD4;
    text-decoration: none;
    /*background-color: transparent;*/
}

.sidebar-nav .dropdown-menu li a {
    background-color:#c0d0d3;
    color: #37474F;
}

.sidebar-nav .dropdown-menu li a:hover,
.sidebar-nav .dropdown-menu li a:active,
.sidebar-nav .dropdown-menu li a:focus {
    
    color: #37474F;
    background-color: #00BCD4;
    text-decoration: none;
    /*background-color: transparent;*/
}

.sidebar-nav > .sidebar-brand {
    height: 65px;
    font-size: 20px;
    line-height: 44px;
}
.sidebar-nav .dropdown-menu {
  
    position: relative;
    width: 100%;
    padding: 0;
    margin: 0;
    border-radius: 0;
    border: none;
    background-color: #222;
    box-shadow: none;

}

.sidebar-nav .fa.fa-angle-left,
.sidebar-nav .fa.fa-angle-down {
  float: right;
}

.sidebar-nav li .nav-label{ 
  display: inline;
  margin-left: 30px;
}

.sidebar-nav i {
  
  position: absolute;
  left: 6%;

}
/*-------------------------------*/
/*       Hamburger-Cross         */
/*-------------------------------*/

.hamburger {
  position: relative;
  top: 20px;  
  z-index: 999;
  display: block;
  width: 32px;
  height: 32px;
  margin-left: 15px;
  background: transparent;
  border: none;
}
.hamburger:hover,
.hamburger:focus,
.hamburger:active {
  outline: none;
}
.hamburger.is-open:before {
  content: '';
  display: block;
  width: 100px;
  font-size: 14px;
  color: #fff;
  line-height: 32px;
  text-align: center;
  opacity: 0;
  -webkit-transform: translate3d(0,0,0);
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-open:hover:before {
  opacity: 1;
  display: block;
  -webkit-transform: translate3d(-100px,0,0);
  -webkit-transition: all .35s ease-in-out;
}

.hamburger.is-open .hamb-top,
.hamburger.is-open .hamb-middle,
.hamburger.is-open .hamb-bottom,
.hamburger.is-closed .hamb-top,
.hamburger.is-closed .hamb-middle,
.hamburger.is-closed .hamb-bottom {
  position: absolute;
  left: 0;
  height: 4px;
  width: 100%;
}
.hamburger.is-open .hamb-top,
.hamburger.is-open .hamb-middle,
.hamburger.is-open .hamb-bottom {
  background-color: #1a1a1a;
}
.hamburger.is-open .hamb-top { 
  top: 5px; 
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-open .hamb-middle {
  top: 50%;
  margin-top: -2px;
}
.hamburger.is-open .hamb-bottom {
  bottom: 5px;  
  -webkit-transition: all .35s ease-in-out;
}

.hamburger.is-open:hover .hamb-top {
  top: 0;
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-open:hover .hamb-bottom {
  bottom: 0;
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-closed .hamb-top,
.hamburger.is-closed .hamb-middle,
.hamburger.is-closed .hamb-bottom {
  background-color: #1a1a1a;
}
.hamburger.is-closed .hamb-top,
.hamburger.is-closed .hamb-bottom {
  top: 50%;
  margin-top: -2px;  
}
.hamburger.is-closed .hamb-top { 
  -webkit-transform: rotate(45deg);
  -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);
}
.hamburger.is-closed .hamb-middle { display: none; }
.hamburger.is-closed .hamb-bottom {
  -webkit-transform: rotate(-45deg);
  -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);
}
.hamburger.is-closed:before {
  content: '';
  display: block;
  width: 100px;
  font-size: 14px;
  color: #fff;
  line-height: 32px;
  text-align: center;
  opacity: 0;
  -webkit-transform: translate3d(0,0,0);
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-closed:hover:before {
  opacity: 1;
  display: block;
  -webkit-transform: translate3d(-100px,0,0);
  -webkit-transition: all .35s ease-in-out;
}


/*-------------------------------*/
/* Override Bootstrap (app.css)  */
/*-------------------------------*/
.container {
  width: 97%;
}



</style>







<body class="layout-documentation page-components">

    <div id="app">

        <!-- Side Menu -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation" >
            <ul class="sidebar-nav">  <!-- remove class nav ? -->
                <li class="sidebar-brand">
                    <a href="{{ url('/') }}"  style="background-color : #263238;">
                        {{ config('app.name', 'myCare') }}
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-eercast"></i> 
                        <div class="nav-label"> Home </div>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-microchip"></i> 
                        <div class="nav-label"> About </div>
                    </a>
                </li>

                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                      <i class="fa fa-address-card"></i> 
                      <div class="nav-label"> Works </div>
                      <span class="fa fa-angle-left"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"> <div class="nav-label"> Test1 </div></a></li>
                    <li><a href="#"> <div class="nav-label"> Test2 </div></a></li>
                    <li><a href="#"> <div class="nav-label"> Test3 </div></a></li>
                    <li><a href="#"> <div class="nav-label"> Test4 </div></a></li>
                    <li><a href="#"> <div class="nav-label"> Test5 </div></a></li>
                  </ul>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-calendar"></i> 
                        <div class="nav-label"> Events </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-bus"></i> 
                        <div class="nav-label"> Team </div>
                    </a>
                </li>
                
                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"> 
                      <i class="fa fa-eye"></i> 
                      <div class="nav-label"> Actions </div>
                      <span class="fa fa-angle-left"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#"><div class="nav-label"> Action </div></a></li>
                    <li><a href="#"><div class="nav-label"> Another Action </div></a></li>
                    <li><a href="#"><div class="nav-label"> Something else here </div></a></li>
                    <li><a href="#"><div class="nav-label"> Sperated link </div></a></li>
                  </ul>
                </li>
                

                
                <li>
                    <a href="#">
                        <i class="fa fa-building"></i> 
                        <div class="nav-label"> Services </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-database"></i> 
                        <div class="nav-label"> Contact </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-cube"></i> 
                        <div class="nav-label"> Follow me </div>
                    </a>
                </li>
                

            </ul>
        </nav>
        <!-- End of Side Menu -->

        <!-- Page Content -->
        <div id="page-content-wrapper" >

            <!-- Top Menu -->
            <div class="navbar navbar-default navbar-static-top" id="topbar-wrapper">
                
                    <div class="navbar-header" >

                        <!-- Collapsed Hamburger -->
                        
                        <button type="button" class="hamburger is-closed" data-toggle="offcanvas" >
                            <span class="hamb-top"></span>
                            <span class="hamb-middle"></span>
                            <span class="hamb-bottom"></span>
                        </button>
                      

                    </div>

                    <div class="" id="app-navbar-collapse" >
                        <!-- Left Side Of Navbar -->
                        <!--
                        <ul class="nav navbar-nav" >
                            &nbsp;
                        </ul>
                        -->

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav" id ="topbar-right" >
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                                <li><a href="{{ route('login') }}">Login</a></li>
                                {{--<li><a href="{{ route('register') }}">Register</a></li>--}}
                            @else

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{trans_choice('mycare.clinical',2)}} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{url('/home')}}">{{trans_choice('mycare.resident',2)}}</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{trans_choice('mycare.admin_menu',2)}} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{url('/facility/show')}}">{{trans_choice('mycare.facility',2)}}</a></li>
                                        <li><a href="{{url('/user')}}">{{trans_choice('mycare.user',2)}}</a></li>
                                        <li><a href="{{url('/form/listing')}}">{{trans_choice('mycare.form',2)}}</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{trans_choice('mycare.language',2)}} <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="{{url('home/en')}}">English</a></li>
                                        <li><a href="{{url('home/zh')}}">中文</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                {{__('mycare.logout')}}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>


                            @endif
                        </ul>
                    </div>
                
            </div>
            <!-- End of Top Menu -->

          
            @yield('content')
         
        </div>
        <!-- End of Page Content -->

    </div>



    <!-- Scripts -->
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>--}}
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
  
    <script src="{{ asset('js/autosize.min.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/jquery.timepicker.js') }}"></script>
    <script src="{{ asset('js/picker.js') }}"></script>
    <script src="{{ asset('js/picker.date.js') }}"></script>
    <script src="{{ asset('js/bootstrap-switch.js') }}"></script>

    <script language="JavaScript">

        autosize(document.querySelectorAll('textarea'));

        // http://jonthornton.github.io/jquery-timepicker/
        $("#timepicker").timepicker({
            timeFormat: 'H:i',
            disableTextInput:true,
            show2400:true,
            step:15
        });

//       source http://amsul.ca/pickadate.js/date/
        $( "#datepicker" ).pickadate({
            format: 'dd/mm/yyyy',
            formatSubmit: 'yyyy-mm-dd',
            editable: false,
            selectMonths: true,
            selectYears: 50
        });

        // http://bootstrapswitch.com/options.html
        $("[type='radio']").bootstrapSwitch({
            size: 'small',
            onText: 'Yes',
            offText:'No'
        });

        $("[type='checkbox']").bootstrapSwitch({
            size: 'small',
            onColor: 'success',
        });

    </script>



    {{-- Froala editor --}}
    {{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>--}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.5.1//js/froala_editor.pkgd.min.js"></script>

    <script> 
    $(document).ready(function(e) {
        $(".alert-success").fadeOut(5000);

        $('[data-toggle="tooltip"]').tooltip()
    });
    $(function() { $('#froala-editor').froalaEditor({
            toolbarInline: false,
            charCounterCount: false,
            toolbarButtons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript',
                'paragraphFormat', 'align', 'formatOL', 'formatUL', 'indent', 'outdent', 'insertImage',
                'insertLink', 'insertFile', 'insertVideo', 'undo', 'redo', 'html'],
            toolbarVisibleWithoutSelection: true,

            // Set the image upload parameter.
            imageUploadParam: 'image_param',

            // Set the image upload URL.
            imageUploadURL: '/upload/image',

            // Additional upload params.
            imageUploadParams: {id: 'lms'},

            // Set request type.
            imageUploadMethod: 'POST',

            // Set max image size to 5MB.
            imageMaxSize: 5 * 1024 * 1024,

            // Allow to upload PNG and JPG.
            imageAllowedTypes: ['jpeg', 'jpg', 'png']
        })
            .on('froalaEditor.image.beforeUpload', function (e, editor, images) {
                // Return false if you want to stop the image upload.
                console.log('beforeUpload');
            })
            .on('froalaEditor.image.uploaded', function (e, editor, response) {
                // Image was uploaded to the server.
                console.log('uploaded');

            })
            .on('froalaEditor.image.inserted', function (e, editor, $img, response) {
                // Image was inserted in the editor.
                console.log('inserted');
            })
            .on('froalaEditor.image.replaced', function (e, editor, $img, response) {
                // Image was replaced in the editor.
                console.log('replaced');
            })
            .on('froalaEditor.image.error', function (e, editor, error, response) {
                console.log('error' + error.code);
                // Bad link.
                if (error.code == 1) {  }

                // No link in upload response.
                else if (error.code == 2) {  }

                // Error during image upload.
                else if (error.code == 3) {  }

                // Parsing response failed.
                else if (error.code == 4) {  }

                // Image too text-large.
                else if (error.code == 5) {  }

                // Invalid image type.
                else if (error.code == 6) { }

                // Image can be uploaded only to same domain in IE 8 and IE 9.
                else if (error.code == 7) { }

                // Response contains the original server response to the request if available.
            });

        }); </script>

    @if(url('')=='http://mycare.dev')
        <script id="fr-fek">try{(function (k){localStorage.FEK=k;t=document.getElementById('fr-fek');t.parentNode.removeChild(t);})('gmxabvc1D7cmF-11==')}catch(e){}</script>
    @elseif(url('')=='http://mycare-dev.sapphirecare.com')
        <script id="fr-fek">try{(function (k){localStorage.FEK=k;t=document.getElementById('fr-fek');t.parentNode.removeChild(t);})('5tcxA-9oH-8F2ddtE4wdvwj1c1xnolA-8jG1rA-21C-16==')}catch(e){}</script>
    @elseif(url('')=='http://mycare.sapphirecare.com')
        <script id="fr-fek">try{(function (k){localStorage.FEK=k;t=document.getElementById('fr-fek');t.parentNode.removeChild(t);})('Ocvspj1vC3fwghqsiyB-21D-16meD3ali==')}catch(e){}</script>
    @endif


    <!-- Side Menu script -->
    <script>
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
    </script>
    

</body>
</html>
