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
    <title>ORDER</title>

 
    <link href="{{ asset('css/dashboard/index.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/dashboard/order.css') }}" rel="stylesheet" >


   
</head>

<body class="animsition">
    <div class="page-wrapper">
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
     
        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                                <div class="table-responsive table--no-card m-b-30">
                                  <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Order ID</th>
                                            <th>User Name</th>
                                            <th class="text-center">Sub Total</th>
                                            <th class="text-center">Tax</th>
                                            <th class="text-center">Grand Total</th>
                                            <th class="text-center">Finish</th>
                                            <th class="text-center">Show Bill</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data2 as $data)
                                       
                                        <td>{{ $data['order']->created_at}}</td>
                                        <td>{{ $data['order']->orders_id }}</td>
                                        <td>{{ $data['user']->name }}</td>
                                        <td>{{ $data['total'] }}</td>
                                        <td>{{ $data['tax'] }}</td>
                                        <td>{{ $data['totalTax'] }}</td>
                                        <td>@if ($data['order']->IsActive)
                                          Done
                                      @else
                                      UnDone
                                          @endif
                                      </td>
                                        <td>
                                          <a href="{{ route('DashBill', ['bill'=>$data['bill']->bills_id]) }}" class="btn btn-sm btn-primary view-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                              <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                            </svg>
                                        </a>
                                        </td>
                                      </tbody>
                                        @endforeach
                                </table>
                                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
                        