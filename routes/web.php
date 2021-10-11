<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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


// Home Controller Routes
Route::get('/',[ HomeController::class,'index' ]);
Route::get('/redirects',[ HomeController::class,'redirects' ]);
Route::post("/addtocart/{id}",[HomeController::class,'addtocart']);
Route::get("/showcart/{id}",[HomeController::class,'showcart']);
Route::get("/remove/{id}",[HomeController::class,'remove']);
Route::post('/orderconfirm',[ HomeController::class,'orderconfirm' ]);


// Admin Controller Routes

Route::get('/users',[ AdminController::class,'user' ]);
Route::get('/foodmenu',[ AdminController::class,'foodmenu' ])->name('foodmenu');
Route::post('/uploadfood',[ AdminController::class,'upload' ]);
Route::get('/deleteuser/{id}',[ AdminController::class,'deleteuser' ]);
Route::get('/deletemenu/{id}',[ AdminController::class,'deletemenu' ]);
Route::get('/updateview/{id}',[ AdminController::class,'updateview' ]);
Route::post('/update/{id}',[ AdminController::class,'update' ]);
Route::get('/viewreservation',[ AdminController::class,'viewreservation' ]);
Route::get('/viewchef',[ AdminController::class,'viewchef' ])->name('admin.viewchef');
Route::post('/uploadchef',[ AdminController::class,'uploadchef' ]);
Route::get('/updatechef/{id}',[ AdminController::class,'updatechef' ]);
Route::get('/deletechef/{id}',[ AdminController::class,'deletechef' ]);
Route::post('/updatefoodchef/{id}',[ AdminController::class,'updatefoodchef' ]);
Route::post('/reservation',[ AdminController::class,'reservation' ]);
Route::get("/orders",[AdminController::class,'orders']);
Route::get('/search',[ AdminController::class,'search' ]);




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
