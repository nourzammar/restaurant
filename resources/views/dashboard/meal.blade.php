<!DOCTYPE html>
<html lang="en">

<head>
	<link href="{{ asset('css/dashboard/index.css') }}" rel="stylesheet" >
	<link href="{{ asset('css/dashboard/meal.css') }}" rel="stylesheet" >
	<link rel="stylesheet" href="css/items.css">
	<script src="js/meal.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-/1EdIz35Quc/ksN4xMnq0FLkX7VMwGc+gk9UQQIzG8QVDoaR60UvmMWfm2L0UPy1tD2N6dVXj6g9yPTnzI4Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
        <!-- القسم العلوي -->
        <header class="header-desktop">
            <!-- القائمة والشعار -->
        </header>
        
        <!-- القائمة الجانبية -->
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
        
        <!-- الحاوية الرئيسية -->
        <div class="page-container" style="margin: 20ch">
            <div class="row">
                <div class="col-md-6">
                    <!-- جدول البيانات -->
                    <h3 class="title-5 m-b-35">DATA MEALS</h3>
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="dropDownSelect2"></div>
                        </div>
                    </div>
                </div>
                
                <!-- جدول البيانات -->
                <div class="col-md-8">
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <!-- الرأس -->
                            <thead>
                                <tr>
                                    <th style="color: white">image</th>
                                    <th style="color: white">meal name</th>
                                    <th style="color: white">price</th>
                                    <th style="color: white">type</th>
                                    <th style="color: white">items</th>
                                    <th style="color: white">actions</th>
                                </tr>
                            </thead>
                            <!-- البيانات -->
                            <tbody>
                                @foreach ($meals as $meal)
                                    <tr class="tr-shadow" data-meal-id="{{ $meal->meal_id }}"> <!-- Add data-meal-id attribute -->
                                        <td> <img src="{{$meal->getFirstMediaUrl()}}" alt="صورة الوجبة"></td>
                                        <td class="meal-name">{{$meal->name}}</td>
                                        <td class="meal-price">{{$meal->price}}</td>
                                        <td class="desc">{{$meal->type}}</td>
                                        <td>
                                            @foreach ($meal->items as $item)
                                                {{$item->name}} - 
                                            @endforeach
                                        </td>
                                        <td>
                                            <!-- Edit button -->
                                            <a href="{{ route('meal.edit', ['id' => $meal->meal_id]) }}" class="btn btn-sm btn-primary edit-btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                                </svg>
                                            </a>
                                            
                            
                                            <!-- Delete button -->
                                            
                                                <!-- Delete button -->
                                                <a href="{{ route('meal.delete', ['id' => $meal->meal_id]) }}" class="btn btn-sm btn-danger delete-btn">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                    </svg>
                                                </a>
                                            
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br> <br> <br>
                    <?php

                    use Illuminate\Support\Facades\DB;
                    
                      $mealId = DB::table('meals')->orderByDesc('meal_id')->value('meal_id');
                      $mealId +=1;
                      ?>
                <div class="col-md-6" style="width: 30cm">
                    <form method="POST" action="{{ route('meal.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$mealId}}"> <br><br>
                        <div>
                            <h3>Add New Meal</h3>
                            <label for="name">Name:</label>
                            <input type="text" id="Name" name="name">
                            <label for="price">Price:</label>
                            <input type="number" id="price" name="price">
                            <br>
                            <select class="form-control selectItems"  id="selectItems" multiple="multiple" name="items_ids[]" required>
                                @if ($items->count() < 1)
                                  <option value="" disabled selected>No items available</option>
                                @endif
                                @foreach($items as $item)
                                  <option value="{{ $item->id }}">
                                    {{ $item->name }}
                                  </option>
                                @endforeach
                              </select>
                              
                              <select name="type">
                                <option value="">Select meal type</option>
                                <option value="main_course">MAIN FOOD </option>
                                <option value="appetizer">APPETIZER</option>
                                <option value="drink">DRINK</option>
                              </select><br><br>
                              <input type="file" name="photo" accept="image/*" capture="camera" required><br><br>
                            
                            <button type="submit"  class="btn btn-lg-blue">SAVE MEAL</button>
                        </div>   
                    </form>
                </div>
            </div>
        </div>
        <!-- انتهت حاوية الصفحة -->
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
      $(document).ready(function () {
        $('.selectItems').select2();
      });
    </script>
</body>
</html>
