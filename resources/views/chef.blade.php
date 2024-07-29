<!DOCTYPE html>
<html lang="en">

<head>
	<link href="{{ asset('css/dashboard/index.css') }}" rel="stylesheet" >
	<link href="{{ asset('css/dashboard/chef.css') }}" rel="stylesheet" >
	<link rel="stylesheet" href="css/items.css">
	<script src="js/meal.js"></script>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
  
    <title>CHEF</title>

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
                                <h3 class="title-5 m-b-35">ORDERS</h3>
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
                                              
                                                <th style="color: white">Time</th>         
                                                <th style="color: white">Order Num</th>
                                                <th style="color: white">User Name</th>
                                                <th style="color: white">Status</th>
                                                <th style="color: white">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data2 as $data)
                                            <?php
                                            ?>
                                            <tr >
                                                <td>{{ $data['order']->created_at}}</td>
                                                <td>{{ $data['order']->orders_id }}</td>
                                                <td>{{ $data['user']->name }}</td>
                                                <td>{{ $data['order']->IsActive}}</td>
                                                <td>
                                                    <a href="{{ route('DashBill', ['bill'=>$data['bill']->bills_id]) }}" class="btn btn-sm btn-primary view-btn">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                      </svg>
                                                  </a>
                                                  <a href="{{ route('ChangeStatus', ['id'=>$data['order']->orders_id]) }}" class="btn btn-sm btn-primary view-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                                      <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                      <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                    </svg>
                                                 Done</a>
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
