<!DOCTYPE html>
<html>
<head>
  <title>قائمة الوجبات</title>
  
  <link href="{{ asset('css/order.css') }}" rel="stylesheet">
</head>
<body>
   <h1>Menu</h1>
  <h2>Main Meals</h2>
  <form method="POST" action="{{ route('order.store') }}" onsubmit="return validateForm()">
    @csrf
    <?php
						use Illuminate\Support\Facades\DB;

						$reservationId = DB::table('orders')->orderByDesc('reservations_id')->value('reservations_id') ;
            $reservationId +=1;
            ?>
    <div class="meal-container">
      <input type="hidden" name="reservations_id" value="{{ $reservationId }}">
      @foreach ($mainCourses as $meal)
      <div class="meal" onclick="selectMeal(this)" data-id="{{ $meal->meal_id }}" data-type="main_course">

        <div>
          <img src="{{$meal->getFirstMediaUrl()}}"  alt="صورة الوجبة">
          
        </div>
        <h3>{{ $meal->name }}</h3>
        <p>Ingredients: @foreach($meal->items as $items) 
          {{$items->name}}-
          @endforeach</p>
        <p>Price: {{ $meal->price }}</p>
        <input type="number" name="quantity[{{ $meal->meal_id }}]" min="1" max="10" value="1" style="display: none;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="cart-icon" viewBox="0 0 16 16">
          <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
        </svg>
        
      </div>
      @endforeach
    </div>
    <div id="selected-meals-container"></div>  
 
    <h2>Appetizers</h2>
    <div class="meal-container">
     
      @foreach ($appetizers as $meal)
      <div class="meal" onclick="selectMeal(this)" data-id="{{ $meal->meal_id }}" data-type="appetizer">
        
        <div>
          <img src="{{$meal->getFirstMediaUrl()}}" alt="صورة الوجبة">
        </div>
        <h3>{{ $meal->name }}</h3>
        <p>Ingredients: @foreach($meal->items as $items) 
          {{$items->name}}-
          @endforeach</p>
        <p>Price: {{ $meal->price }}</p>
        
        <input type="number" name="quantity[{{ $meal->meal_id }}]"  min="1" max="10" value="1" style="display: none;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="cart-icon" viewBox="0 0 16 16">
          <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
        </svg>
      
       
      
      </div>
      @endforeach
    </div>
    <h2>Drinks</h2>
    <div class="meal-container">
      @foreach ($drinks as $meal)
      <div class="meal" onclick="selectMeal(this)" data-id="{{ $meal->meal_id }}" data-type="drink">
        <div>
          <img src="{{$meal->getFirstMediaUrl()}}"  alt="صورة الوجبة">
        </div>
        
        <h3>{{ $meal->name }}</h3>
        <p>Ingredients: @foreach($meal->items as $items) 
          {{$items->name}}-
          @endforeach</p>
        <p>Price: {{ $meal->price }}</p>
        <input type="number" name="quantity[{{ $meal->meal_id }}]" min="1" max="10" value="1" style="display: none;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="cart-icon" viewBox="0 0 16 16">
          <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
        </svg>
       
        <!-- Note: I removed the closing `</select>` tag as it's not needed -->
      </div>
      @endforeach
    </div>
    <button type="submit" class="submit-button" id="send-order-button">Send Order</button>

  </form>
  <script>
    function selectMeal(mealElement) {
        const cartIcon = mealElement.querySelector('.cart-icon');
        const mealId = mealElement.dataset.id;
        if (!mealId) {
            mealId = mealElement.dataset.mealId;
        }

        if (mealElement.classList.contains('selected')) {
            mealElement.classList.remove('selected');
            cartIcon.classList.remove('selected');
            mealElement.querySelector('.quantity-input').remove();
        } else {
            mealElement.classList.add('selected');
            cartIcon.classList.add('selected');

            const quantityInput = document.createElement('input');
            quantityInput.type = 'number';
            quantityInput.min = 1;
            quantityInput.max = 10;
            quantityInput.name = 'quantity[' + mealId + ']'; // Set the correct name with the mealId as the key
            quantityInput.classList.add('quantity-input');
            mealElement.appendChild(quantityInput);
            quantityInput.value = '1';

            const selectedMealsContainer = document.getElementById('selected-meals-container');
            const mealIdInput = document.createElement('input');
            mealIdInput.type = 'hidden';
            mealIdInput.name = 'selected_meals[]';
            mealIdInput.value = mealId;
            selectedMealsContainer.appendChild(mealIdInput);

            // Add an event listener to prevent click events on the quantity input from propagating
            quantityInput.addEventListener('click', function (event) {
                event.stopPropagation();
            });
        }
    //     document.getElementById('send-order-button').addEventListener('click', function(event) {
    //     event.preventDefault();
    //     const form = event.target.closest('form');
    //     const formData = new FormData(form);

    //     fetch(form.action, {
    //         method: 'POST',
    //         body: formData
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         // Show the window message with the JSON response
    //         alert(data.message);

    //         // You can perform additional actions based on the response data if needed.
    //         // For example, you can clear the selected meals or redirect to another page.
    //     })
    //     .catch(error => {
    //         // Handle any errors that might occur during the request
    //         console.error('Error:', error);
    //     });
    // });
    
    }
</script>

  
</body>
</html>