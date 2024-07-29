

<h1>RESERVATIONS</h1>
<form method="POST" action="{{ route('reservations.store') }}">
  @csrf
  <?php

use Illuminate\Support\Facades\DB;

  $reservationId = DB::table('reservations')->orderByDesc('reservations_id')->value('reservations_id') + 1;
  $user = DB::table('reservations')->orderByDesc('id')->value('id') + 1;
  ?>
  <input type="hidden" name="reservations_id" value="{{ $reservationId }}">
  <input type="hidden" name="users_id" value="{{ $user }}">
  <input type="number" name="guest_number"><br><br>
  <input type="text" name="table_number"><br><br>
  <input type="text" name="status" value ="Pending"><br><br>
  <input type="date" name="datetime"><br><br>
  <button type="submit">submit  </button>
</form>
