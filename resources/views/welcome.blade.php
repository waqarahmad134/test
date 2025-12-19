<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    

    <!-- Title Page-->
    <title>Main</title>

    <!-- Fontfaces CSS-->
    <!-- <link href="css/font-face.css" rel="stylesheet" media="all"> -->
    {!! Html::style('css/font-face.css') !!}
    <!-- <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all"> -->

    {!! Html::style('vendor/font-awesome-4.7/css/font-awesome.min.css') !!}
    {!! Html::style('vendor/font-awesome-5/css/fontawesome-all.min.css') !!}
    {!! Html::style('vendor/mdi-font/css/material-design-iconic-font.min.css') !!}

    <!-- Bootstrap CSS-->
    <!-- <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all"> -->

    {!! Html::style('vendor/bootstrap-4.1/bootstrap.min.css') !!}

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
   
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <style>
 .btn-print{
    min-width: 100px;
    height: 40px;
    padding: 0 15px;
    background: #57b846;
    white-space: nowrap;
    border-radius: 3px;
    font-size: 14px;
    color: #fff;
    transition: all .2s ease-out, color .2s ease-out;
    border: 0;
    cursor: pointer;
    font-weight: bold;
    font-family: 'Roboto', sans-serif;
 }
    .page-container {
    background: lavender !important;
}
    .main-content{
        padding-top:10px !important;
    }
    .header-desktop{
        position:relative !important;
    }
    .dsjmessagediv {
    background-color: seashell;
    width: 100%;
    height: fit-content;
    border: solid 0px;
    border-radius: 10px;
    padding-top: 15px;
    padding-left: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    color: #666666;
    font-size:15px;
}
.dsjimages {
    width: 200px;
    height: 200px;
    padding-right: 10px;
    float: left;
}
.dsjmessageheading {
   
    margin-top: 5px;
    font-size: 18px;
}
#court_name{
direction: rtl;
}
#court_name::placeholder{
    direction: ltr;
}
    @media (max-width: 991px)
    {
.page-container {
    top:0px !important;
}
    }
    .page-wrapper{
        padding-bottom: 0px !important;
    }
    .footer{
        background:black !important;
    }
    .header-desktop{
        background:  #108E51 !important;
    }
    .nav-link{
        color: white;
    }
    .nav-link:hover{
        color: white;
    }
    .complete{
    display:none;
}

.more{
    background:lightblue;
    color:navy;
    font-size:13px;
    padding:3px;
    cursor:pointer;
}
    select.form-select
    {
        border: 0;
    background: #fff;
    display: block;
    border-bottom: 1px solid;
    width: 100%;
    font-size: 18px;
    color: #666;
   
    height: 70px;
    color: #555;
    }
    .fa, .far, .fas {
        font-size:45px;
        color: black;
    }
    .s007 form .inner-form .basic-search .input-field .icon-wrap svg{
        fill:black !important;
    }
    </style>
    <style>
        .overview-item--c1{
            background-image: -webkit-linear-gradient(90deg,  #108E51 0%, white 100%) !important;
        }
        @media (min-width:960px) {
            .menu-sidebar .logo{
                background: #108E51 !important;
                height: 150px !important;
            }
        }
        @media (max-width: 767px) {

.account-dropdown{
    position:fixed !important;
}}
    </style>
  
    <!-- Main CSS-->
    <!-- <link href="css/theme.css" rel="stylesheet" media="all"> -->
    {!! Html::style('css/theme.css') !!}
    <link href="css/main1.css" rel="stylesheet" />
    

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <!-- <header class="header-mobile d-block d-lg-none" style="background: #108E51">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="#">
                        <img src="images/marking.png" style="height:50px">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
         
        </header> -->
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
     
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container" style="padding:0">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop" style="width:100%; left:0;">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                        <div class="col-md-5">
                                <a href="{{ url('/') }}" class="navbar-brand">
                                    <img src="images/marking.png" class="img-fluid" width="43">
                                    <span class="header-brand-name" style="color:white; text-align:center;padding-left: 10px;"> District Courts Nankana</span>
                                </a>
                            </div>
                            <div class="header-button">
                               
                                <div class="account-wrap">
                                @guest
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @else
                            <a class="nav-link" href="{{ url('home') }}">Home</a>
                            @endguest
                            </div>
                        </div>
                    </div>
                </div>

              
                
            </header>

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img id="Headerimg" src="images/download.png" style="height:300px;width:100%;">
    </div>
    <div class="carousel-item">
    <img id="Headerimg" src="images/download.jpg" style="height:300px;width:100%;">
    </div>
    <div class="carousel-item">
    <img id="Headerimg" src="images/lhc.jpg" style="height:300px;width:100%;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
            <!-- <img id="Headerimg" src="images/download.png" style="height:230px;width:100%;"> -->
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
           
            @yield('content')
                        <div class="row footer">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2024 Sessions Court Nankana Sahib. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
    
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">

    </script>
    

    <!-- Main JS-->
    <script src="js/main.js"></script>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</body>

</html>
<!-- end document-->

