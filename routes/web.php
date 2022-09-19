<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SystemController;
use App\Http\Controllers\Backend\DepartmentController;

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
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class);
Route::post('users/{user}/change-password',[UserController::class,'change_password'])->name('users.change.password');
Route::get('/country', [SystemController::class, 'country'])->name('country');
Route::get('/add_country', [SystemController::class, 'add_country'])->name('add_country');
Route::post('/store_country', [SystemController::class, 'store_country'])->name('store_country');
Route::post('/update_country', [SystemController::class, 'update_country'])->name('update_country');
Route::get('/edit_country/{id}', [SystemController::class, 'edit_country'])->name('edit_country');
Route::get('/delete-country/{id}', [SystemController::class, 'delete_country'])->name('delete-country');
Route::get('/state', [SystemController::class, 'state'])->name('state');
Route::get('/add_state', [SystemController::class, 'add_state'])->name('add_state');
Route::post('/store_state', [SystemController::class, 'store_state'])->name('store_state');
Route::get('/edit_state/{id}', [SystemController::class, 'edit_state'])->name('edit_state');
Route::post('/update_state', [SystemController::class, 'update_state'])->name('update_state');
Route::get('/delete-state/{id}', [SystemController::class, 'delete_state'])->name('delete-state');
Route::get('/city', [SystemController::class, 'city'])->name('city');
Route::get('/add_city', [SystemController::class, 'add_city'])->name('add_city');
Route::post('/store_city', [SystemController::class, 'store_city'])->name('store_city');
Route::get('/edit_city/{id}', [SystemController::class, 'edit_city'])->name('edit_city');
Route::post('/update_city', [SystemController::class, 'update_city'])->name('update_city');
Route::get('/delete-city/{id}', [SystemController::class, 'delete_city'])->name('delete-city');
Route::get('/fetch_state', [SystemController::class, 'fetch_state'])->name('fetch_state');
Route::get('/fetch_city', [SystemController::class, 'fetch_city'])->name('fetch_city');
Route::resource('departments', DepartmentController::class);
Route::resource('employees', EmployeeController::class);
Route::get('/search-employees', [EmployeeController::class, 'search_employees'])->name('search-employees');
Route::get('/search-by-department', [EmployeeController::class, 'search_by_department'])->name('search-by-department');

