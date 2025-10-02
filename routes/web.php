<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieCategoryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TheaterController;
use App\Http\Controllers\TranscationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;


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

Route::get('/', [HomeController::class,'index']);
Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/customer/dashboard',[HomeController::class,'dashboard'])->name('customer.dashboard');
});
Route::middleware(['auth', 'role:customer,admin,manager'])->group(function () {
    Route::get('/movie-details',[MovieController::class,'movieDetails'])->name('movieDetails');
    Route::get('/book-ticket',[MovieController::class,'bookTicket'])->name('bookTicket');
    Route::post('/book-confirm',[MovieController::class,'bookConfirm'])->name('bookConfirm');
    Route::post('/ticketBook',[MovieController::class,'ticketBook'])->name('ticketBook');
    Route::get('/movie-ticket',[MovieController::class,'movieticekt'])->name('movieticekt');
    Route::get('/customer/tickets',[CustomerController::class,'tickeList'])->name('tickeList');
    Route::get('/customer/transactions',[CustomerController::class,'showTranscation'])->name('showTranscation');
});


Route::get('/dashboard', function () {
    $role = auth()->user()->role;
    if ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($role === 'manager') {
        return redirect()->route('manager.dashboard');
    } else {
        return redirect()->route('customer.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard',[HomeController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/movie-category',[MovieCategoryController::class,'index'])->name('admin.addCategory');
    Route::get('/admin/add-category',[MovieCategoryController::class,'addmovieCategory'])->name('admin.addmovieCategory');
    Route::post('/admin/stor-category',[MovieCategoryController::class,'store'])->name('admin.storCategory');
    Route::get('/admin/delete-category',[MovieCategoryController::class,'deleteCategory'])->name('admin.DeleteCategory');
    Route::get('/admin/edit-category',[MovieCategoryController::class,'edit'])->name('admin.editCategory');
    Route::get('/admin/movies',[MovieController::class,'index'])->name('admin.movie');
    Route::get('/admin/add-movie',[MovieController::class,'create'])->name('admin.AddMovie');
    Route::post('/admin/store-movie',[MovieController::class,'store'])->name('admin.storeMovie');
    Route::get('admin/delete-movie',[MovieController::class,'destroyMovie'])->name('admin.deleteMovie');
    Route::get('admin/edit-movie',[MovieController::class,'editmovie'])->name('admin.editMovie');
    Route::get('admin/theatres',[TheaterController::class,'index'])->name('admin.Theater');
    Route::get('admin/add-theatres',[TheaterController::class,'addtheatres'])->name('admin.addtheatres');
    Route::post('admin/storeTheater',[TheaterController::class,'storeTheater'])->name('admin.storeTheater');
    Route::get('admin/deleteTheater',[TheaterController::class,'deleteTheater'])->name('admin.deleteTheater');
    Route::get('admin/editTheater',[TheaterController::class,'editTheater'])->name('admin.editTheater');
    Route::get('admin/transactions',[TranscationController::class,'transactionsRecord'])->name('admin.transactionsRecord');
    Route::get('admin/booking',[MovieController::class,'allBooking'])->name('allBooking');
});
    Route::get('admin/movie-booking',[MovieController::class,'movieBooking'])->name('movie.Booking');

// Manager routes
Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager/dashboard', [HomeController::class,'dashboard'])->name('manager.dashboard');
    Route::get('manager/transactions',[TranscationController::class,'transactionsRecord'])->name('admin.transactionsRecord');
    Route::get('/manager/booking',[MovieController::class,'allBooking'])->name('allBooking');
    Route::get('/manager/movies',[MovieController::class,'index'])->name('manager.movie');
    Route::get('/manager/add-movie',[MovieController::class,'create'])->name('manager.AddMovie');
    Route::post('/manager/store-movie',[MovieController::class,'store'])->name('manager.storeMovie');
    Route::get('manager/delete-movie',[MovieController::class,'destroyMovie'])->name('manager.deleteMovie');
    Route::get('manager/edit-movie',[MovieController::class,'editmovie'])->name('manager.editMovie');


});


require __DIR__.'/auth.php';
