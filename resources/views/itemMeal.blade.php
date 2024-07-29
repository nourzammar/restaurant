<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ORDERS</title>
    <link href="{{ asset('css/itemmeal.css') }}" rel="stylesheet">

</head>
<body style="background-color: rgb(250, 250, 250)" >

    <div  class="container mt-5">
        
        <h1>ORDERS</h1>
        <?php

use Illuminate\Support\Facades\DB;

$OrderId = DB::table('item_meals')->orderByDesc('item_meals_id')->value('item_meals_id') + 1;
?>
        <form action="{{ route('itemMeal.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="hidden" name="orders_id" value="{{ $OrderId }}">
                <label for="items_name" >Item Name</label>
                <select id="items_name" name="items_id" class="form-control" required>
                    <option value="" data-price="">Choose a Meal</option>

                    @foreach ($items as $item)
                        <option value="{{ $item->items_id }}">{{ $item->name }}</option> 
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="item_quantity">Required Quantity</label>
                <input type="text" id="item_quantity" name="item_quantity" class="form-control" required >
            </div>
            <button type="submit" class="btn btn-primary">Send Required</button>
        </div>
          </form>
     
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#meal_name').change(function() {
            var selectedOption = $(this).find('option:selected');
            var price = selectedOption.data('price');
            $('#meal_price').val(price);
        });
    });
</script>

</body>
</html>

