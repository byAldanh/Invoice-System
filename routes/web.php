<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoicesController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ProductsController;
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

// The route for the home page 
Route::get('/', function () {
    // View the 'login' file that is located in the 'auth' forlder 
    return view('auth.login');
});

// See why in this way it doesn't work 
//Route::get('/{page}', 'AdminController@index');


// Default authentication for the routes of the application 
// It should be at the first, to apply to the below routes 

//Auth::routes();  // get all the authentication routes 

// get all the authentication routes except the 'register' 
Auth::routes(['register'=>false]); // remove the regitser , so it will not appear to the user 

// ******** Authentication Routes *********** .......
// $this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('login', 'Auth\LoginController@login');
// $this->post('logout', 'Auth\LoginController@logout')->name('logout');

// // Registration Routes...
// $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// $this->post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// $this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
// $this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
// $this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
// $this->post('passsword/reset', 'Auth\ResetPasswordController@reset');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// It will perform the logic of the index method in that controller (by default)
Route::resource('invoices',InvoicesController::class);
/* THE ROUTES OF THE RESOURCE 
GET /invoices/index
GET /invoices/ create
POST /invoices (storing)
GET /invoices/{invoice}
GET /invoices/{invoice}/edit 
(PUT and PATCH) /invoices/{invoice}
DELETE /invoices/{invoice} 
*/

Route::resource('sections',SectionsController::class); // as the previous one, it will contains many routes 
Route::resource('products',ProductsController::class); // as the previous one, it will contains many routes 

Route::get('/{page}', [AdminController::class, 'index']);

