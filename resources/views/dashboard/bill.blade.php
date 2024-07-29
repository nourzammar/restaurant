<!DOCTYPE html>
<html lang="en">

<head>
	<link href="{{ asset('css/dashboard/index.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/dashboard/bill.css') }}" rel="stylesheet" >
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
                                <h3 class="title-5 m-b-35">Data Bills</h3>
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
                                              
                                                <th style="color: white">Meal Name</th>
                                                <th style="color: white">Price</th>
                                                <th style="color: white">quantity</th>
                                                <th style="color: white">Total</th>
                                                <th style="color: white"> </th>
                                             
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($meals as $meal)
                                            <tr >
                                                <td>{{$meal['meal']->name}}</td> 
                                                <td>{{$meal['billMeal']->price}}</td> 
                                                <td>{{$meal['billMeal']->quantity}}</td> 
                                                <td>{{$meal['billMeal']->price * $meal['billMeal']->quantity}}</td>
                                               
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
