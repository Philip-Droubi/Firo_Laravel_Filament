<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\System\CustomerService\CustomerServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/admin');
});

Route::get('/login', function () {
    return redirect(route('filament.admin.auth.login'));
})->name('login');


Route::get('/admin/logoutAll', [AdminAuthController::class, 'logoutAll']);

Route::prefix('/admin/customer-service')->controller(CustomerServiceController::class)->group(function () {
    Route::post('/', 'store');
    Route::delete('/{id}', 'destroy');
});
