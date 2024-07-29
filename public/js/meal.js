function editMealModal(mealId) {
    // AJAX request to fetch meal data based on the mealId
    $.ajax({
        url: "{{ route('get_meal_data', ['id' => '']) }}/" + mealId,
        method: "GET",
        success: function(response) {
            // ... The rest of your AJAX code ...
        },
        error: function(error) {
            console.log(error);
        }
    });
}
