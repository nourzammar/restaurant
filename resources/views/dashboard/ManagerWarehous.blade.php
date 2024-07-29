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
                              <th>Quantity Mines</th>
                            </tr>
                            @foreach ($items as $item)
                            <tr>
                              <td>{{ $item->name }}</td>
                              <td>{{ $item->quantity }} {{ $item->type === 'drink' ? 'L' : 'KG' }}</td>
                              <td>{{ $item->type }}</td>
                              <td>{{ $item->mines }}</td>
                            </tr>
                            @endforeach
                          </table>
                          <form id="newMaterialForm" action="{{ route('ManagWare.store') }}" method="post" >
                            @csrf
                      
                            <div id="nameFieldContainer">
                              <label for="material1">Name:</label>
                              <select id="material1" name="name" required>
                                <option value="">Select an option</option>
                                <option value="existing_material">Existing Material</option>
                                <option value="new_material">New Material</option>
                              </select>
                            </div>
                      
                            <div id="existingMaterialContainer" style="display: none;">
                              <label for="existingMaterial">Existing Material:</label>
                              <select id="existingMaterial" name="existing_material">
                                @foreach($items as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                              </select>
                            </div>
                      
                            <div id="newMaterialContainer" style="display: none;">
                              <label for="newMaterial">New Material:</label>
                              <input type="text" id="newMaterial" name="new_material">
                            </div>
                      
                            <div>
                              <span id="newMaterialDisplay"></span>
                              <input type="hidden" id="enteredMaterial" name="entered_material">
                            </div>
                      
                            <label for="weight1">Quantity:</label>
                            <input type="text" id="weight1" name="quantity" required>

                            <label for="mines">Quantity Mines:</label>
                            <input type="text" id="mines" name="mines" required>
                      
                            <label for="type1">Type:</label>
                            <select id="type1" name="type" required>
                              <option value="food">Food</option>
                              <option value="drink">Drink</option>
                            </select>
                      
                            <br>
                            <input type="submit" value="Save">
                          </form>
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
                                var mines = $('#mines').val();
                        
                                if (isNaN(quantity)) {
                                  alert('Please enter a valid quantity');
                                  return;
                                }
                        
                                var unit = $('#type1').val() === 'drink' ? 'L' : 'KG';
                                var newRow = "<tr><td>" + $('#enteredMaterial').val() + "</td><td>" + quantity + " " + unit  + "</td><td>" + $('#type1').val() + "</td></tr>" + mines + "</td></tr>";
                        
                                $('table').append(newRow);
                                $('#newMaterialForm')[0].reset();
                        
                                $.ajax({
                                  url: "{{ route('ManagWare.store') }}",
                                  type: "POST",
                                  data: {
                                    _token: "{{ csrf_token() }}",
                                    name: $('#enteredMaterial').val(),
                                    quantity: quantity,
                                    mines: mines,
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
