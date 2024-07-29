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
    <link href="{{ asset('css/dashboard/index.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/dashboard/warehouse.css') }}" rel="stylesheet" >
    <link rel="stylesheet" href="css/items.css">

    <!-- Bootstrap CSS-->
   
    

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
                        
                        <h1>WAREHOUSE DATA</h1>
                        <h2>Raw Materials </h2>
                        <div class="container">
                          <table>
                            <tr>
                              <th>Material Name</th>
                              <th>Material Quantity</th>
                              <th>Material Type</th>
                            </tr>
                            @foreach ($items as $item)
                            <tr>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->quantity }} {{ $item->type === 'drink' ? 'L' : 'KG' }}</td>
                              <td>{{ $item->type }}</td>
                            </tr>
                            @endforeach
                          </table>
                        
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                          $(document).ready(function() {
                            $('#material1').on('change', function() {
                              var selectedOption = $(this).val();
                        
                              if (selectedOption === "existing_material") {
                                $('#existingMaterialContainer').show();
                                $('#newMaterialContainer').hide();
                              } else if (selectedOption === "new_material") {
                                $('#existingMaterialContainer').hide();
                                $('#newMaterialContainer').show();
                              } else {
                                $('#existingMaterialContainer').hide();
                                $('#newMaterialContainer').hide();
                              }
                            });
                        
                            $('#newMaterialForm').on('submit', function(e) {
                              e.preventDefault();
                        
                              var selectedOption = $('#material1').val();
                              var selectedType = $('#type1').val();
                        
                              if (selectedOption === "existing_material" && $('#existingMaterial').val() === "") {
                                alert('Please select an existing material');
                              } else if (selectedOption === "new_material" && $('#newMaterial').val() === "") {
                                alert('Please enter a new material');
                              } else {
                                if (selectedOption === "new_material") {
                                  var enteredMaterial = $('#newMaterial').val();
                                  $('#enteredMaterial').val(enteredMaterial);
                                } else {
                                  var existingMaterial = $('#existingMaterial').val();
                                  $('#enteredMaterial').val(existingMaterial);
                                }
                        
                                var quantity = $('#weight1').val();
                        
                                if (isNaN(quantity)) {
                                  alert('Please enter a valid quantity');
                                  return;
                                }
                        
                                var unit = $('#type1').val() === 'drink' ? 'L' : 'KG';
                                var newRow = "<tr><td>" + $('#enteredMaterial').val() + "</td><td>" + quantity + " " + unit + "</td><td>" + $('#type1').val() + "</td></tr>";
                        
                                $('table').append(newRow);
                                $('#newMaterialForm')[0].reset();
                        
                                $.ajax({
                                  url: "{{ route('DashWare.store') }}",
                                  type: "POST",
                                  data: {
                                    _token: "{{ csrf_token() }}",
                                    name: $('#enteredMaterial').val(),
                                    quantity: quantity,
                                    type: selectedType
                                  },
                                  success: function(response) {
                                    if (response.message === "new_item_added") {
                                      alert('New item added');
                                      location.reload();
                                    } else if (response.message === "quantity_updated") {
                                      alert('Quantity updated');
                                      location.reload();
                                    } else if (response.error === "error_type_mismatch") {
                                      alert('Cannot choose a different type for the same material');
                                    } else {
                                      alert('Cannot choose a different type for the same material');
                                    }
                                  },
                                  error: function() {
                                    alert('Cannot choose a different type for the same material');
                                  }
                                });
                              }
                            });
                          });
                        </script>
                       
                       
                       
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>
<!-- end document-->
