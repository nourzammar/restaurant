<?php

use App\Http\Controllers\billController;
use App\Http\Controllers\ChefController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Dashboard\DashBillController;
use App\Http\Controllers\Dashboard\DashMealController;
use App\Http\Controllers\Dashboard\DashOrderController;
use App\Http\Controllers\Dashboard\ReserController;
use App\Http\Controllers\DineOutController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\ItemMealController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\reservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\EditMealController;
use App\Http\Controllers\ManagerWarehouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');
    
Route::get('storage/{folder}/{path}', [ImageController::class , 'index']);


Route::resource('meal', MealController::class);


Route::resource('itemMeal', ItemMealController::class);
Route::resource('users', UserController::class);
Route::resource('bills', billController::class);
Route::resource('order', orderController::class);
Route::resource('dineout', DineOutController::class);
Route::resource('reservations', reservationController::class);
Route::get('reservations/delete/{id}', [reservationController::class, 'delete'])->name('res.delete');
Route::get('reservations/status/{id}', [reservationController::class, 'status'])->name('res.status');

Route::resource('manager', ManagerController::class);
Route::resource('index', indexController::class);
Route::get('/chef', [ChefController::class, 'index'])->name('chef.index');
Route::post('/chef/store', [ChefController::class, 'store'])->name('chef.store');
Route::post('/chef/update', [ChefController::class, 'update'])->name('chef.update');
Route::post('/login/store', [CustomAuthController::class, 'login'])->name('CustomAuth.login');
Route::post('/login/reg', [CustomAuthController::class, 'register'])->name('CustomAuth.register');

Route::get('DashMeal', [DashMealController::class, 'index'])->name('DashMeal');
Route::get('DashMeal/edit/{id}', [DashMealController::class, 'edit'])->name('meal.edit');
Route::post('/EditMeal/{id}', [EditMealController::class, 'updateMeal'])->name('update');
Route::resource('DashWare', ItemsController::class);
Route::get('DashManagWare', [ManagerWarehouseController::class, 'index'])->name('DashManagWare');
Route::resource('ManagWare', ManagerWarehouseController::class);
Route::get('/DashUser', [UsersController::class, 'index'])->name('DashUser');
Route::get('/DashOrder', [DashOrderController::class, 'index'])->name('DashOrder');
Route::get('/DashRes', [ReserController::class, 'index'])->name('DashRes');
Route::get('/DashBill/{bill}', [DashBillController::class, 'index'])->name('DashBill');
Route::get('/DashBill/status/{id}', [DashBillController::class, 'ChangeStatus'])->name('ChangeStatus');

Route::get('/meal/delete/{id}', [DashMealController::class, 'delete'])->name('meal.delete');
