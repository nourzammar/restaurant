<!DOCTYPE html>
<html lang="en">

<head>
	<link href="{{ asset('css/dashboard/index.css') }}" rel="stylesheet" >
	<link href="{{ asset('css/dashboard/reservation.css') }}" rel="stylesheet" >
	<link rel="stylesheet" href="css/items.css">
	<script src="js/meal.js"></script>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
     
    <title>Tables</title>

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
        <div class="page-container" style="margin: 20ch">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
              
            </header>
         
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Data Reservations</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                 
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2" style="font-size: 100%">
                                        <thead >
                                            <tr >
                                              
                                                <th style="color: white">Customer</th>
                                                <th style="color: white">guest number</th>
                                                <th style="color: white">Reservation date</th>
                                                <th style="color: white">Status</th>
                                                <th style="color: white">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reservations as $reservation)
                                            <tr >
                                                <td>{{$reservation->users->name}}</td>
                                                <td>{{$reservation->guest_number}}</td> 
                                                <td>{{$reservation->datetime}}</td>
                                                <td>
                                                    @if ($reservation->IsActive)
                                                        Active
                                                        @else
                                                        NotActive
                                                    @endif
                                                </td>
                                                <td >
                                                    @if ($reservation->IsActive == false)
                                                    <a style="color: Red" href="{{ route('res.delete', ['id'=>$reservation->reservations_id]) }}" >Delete</a>
                                                    <a style="color: black" href="{{ route('res.status', ['id'=>$reservation->reservations_id]) }}" >Aprove</a>                                                        
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                            
                                            
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
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
