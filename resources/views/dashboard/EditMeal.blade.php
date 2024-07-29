
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('css/dashboard/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/editmeal.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="css/items.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-/1EdIz35Quc/ksN4xMnq0FLkX7VMwGc+gk9UQQIzG8QVDoaR60UvmMWfm2L0UPy1tD2N6dVXj6g9yPTnzI4Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
        {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    
    <title>Edit Meal</title>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE -->
        <header class="header-mobile d-block d-lg-none">
            <!-- Your header content goes here -->
        </header>
        <!-- END HEADER MOBILE -->

        <!-- MENU SIDEBAR -->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <!-- Your sidebar navigation goes here -->
                </nav>
            </div>
        </aside>
        <div class="page-container" style="margin: 20ch">
            <!-- HEADER DESKTOP -->
            <header class="header-desktop">
                <!-- Your header content goes here -->
            </header>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-container">
                        <h3 class="title-5 m-b-35" style="">Edit Meal</h3>
                        <form action="{{ route('update', ['id' => $EditMeals->meal_id]) }}" method="POST">
                            @csrf
                            <!-- Add the required fields for updating the meal -->
                            <div class="form-group">
                                <label for="name">Meal Name:</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $EditMeals->name }}">
                            </div>
                            <div class="form-group">
                                <label for="price">Meal Price:</label>
                                <input type="number" name="price" id="price" class="form-control"
                                    value="{{ $EditMeals->price }}">
                            </div>
                            <select class="form-control selectItems" id="selectItems" multiple="multiple" name="items_ids[]" required {{ $items->count() < 1 ? 'disabled' : ''}}>
                                @if ($allItems->count() < 1) <option value="" disabled selected>No items available</option>
                                  @endif
                                  @foreach($allItems as $item)
                                  <option value="{{ $item->id }}"  {{ in_array($item->id, $EditMeals->items->pluck('id')->toArray()) ? 'selected="selected"' : "" }}>
                                    {{ $item->name }}
                                  </option>
                                  @endforeach
                              </select>
                           <button type="submit" class="submit-button" id="send-order-button">Update Meal</button>
                            {{-- <button type="submit" class="btn btn-primary">Update Meal</button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById('send-order-button').addEventListener('click', function(event) {
        event.preventDefault();
        const form = event.target.closest('form');
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Show the window message with the JSON response
            alert(data.message);

            // You can perform additional actions based on the response data if needed.
            // For example, you can clear the selected meals or redirect to another page.
        })
        .catch(error => {
            // Handle any errors that might occur during the request
            console.error('Error:', error);
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
  $(document).ready(function () {
    $('.selectItems').select2();
  });
</script>
</html>
<!-- end document -->




