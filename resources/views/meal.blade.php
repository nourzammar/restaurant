<!DOCTYPE html>
<html>
<head>
   <img style="background-image: url(images/slide_2.jpg);">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <style>
    body{
      background-image: url(images/slide_1.jpg);
       background-size: cover;
    }
    h1 {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
    }

    form {
      max-width: 400px;
      margin: 0 auto;
    }

    input[type="text"],
    select,
    button {
      display: block;
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      font-size: 16px;
    }

    input[type="file"] {
      margin-top: 10px;
    }

    button {
      background-color: #fb6e14;
      color: white;
      border: none;
      cursor: pointer;
    }

    button:hover {
      background-color: #fb6e14;
    }
  </style>
</head>
<body>
  <h1>MEALS</h1>
  <img style="background-image: url(images/slide_2.jpg);">
  <?php

  use Illuminate\Support\Facades\DB;
  
    $mealId = DB::table('meals')->orderByDesc('meal_id')->value('meal_id');
    $mealId +=1;
    ?>
  <form method="POST" action="{{ route('meal.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id"   value="{{$mealId}}"> <br><br>
    <input type="text" name="name" placeholder="Enter the meal name" required><br> <br>
    <input type="text" name="price" placeholder="Enter the meal price" required><br> <br>
    <select class="form-control selectItems" id="selectItems" multiple="multiple" name="items_ids[]" required><br><br>
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
    <button type="submit">Submit</button>
  </form>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.selectItems').select2();
    });
  </script>
</body>
</html>

