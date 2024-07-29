<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Tables</title>

   
    <!-- Bootstrap CSS-->
   
    <link href="{{ asset('css/dashboard/index.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/dashboard/user.css') }}" rel="stylesheet" >

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        
                        <li>
                            <a href="DashRes">
                                <i class="fas fa-map-marker-alt"></i>RESERVATION</a>
                        </li>
                        <li>
                            <a href="DashOrder">
                                <i class="fas fa-table"></i>ORDER</a>
                            </li>
                            <li>
                                <a href="DashMeal">
                                    <i class="fas fa-calendar-alt"></i>MEAL</a>
                            </li>
                        <li>
                            <a href="DashUser">
                                <i class="fas fa-chart-bar"></i>USER</a>
                        </li>
                            <li>
                            <a href="DashWare">
                                <i class="far fa-check-square"></i>WAREHOUSE</a>
                        </li>
                    
                     
                       
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
              
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar" ></i>user data</h3>
                                  
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        
                                                    </td>
                                                    <td>user Id</td>
                                                    <td>name</td>
                                                    <td>role</td>
                                                    <td>email</td>
                                                    <td></td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                <tr>
                                                    <td>
                                                    </td>
                                                    <td>
                                                        {{$user->user_id}}
                                                    </td>
                                                    <td>
                                                        {{$user->name}}
                                                    </td>
                                                    <td>
                                                        @if ($user->ISAdmin)
                                                            admin
                                                            @else
                                                            User
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$user->email}}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                  
                                </div>
                                <!-- END USER DATA-->
                            </div>
                            
                                <!--  END TOP CAMPAIGN-->
                            </div>
                        </div>
                       
                       
                       
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>
<!-- end document-->
