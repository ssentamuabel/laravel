<?php

use App\Http\Controllers\ProfileController;
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
    // return view('welcome');


    // get all the users
    $users = DB::select("SELECT * FROM users");

    // INSERT NEW USER
    // $user = DB::insert("INSERT INTO users (name, email, password) VALUES(?, ?, ?)", ['abel', 'abel@gmail.com', 'password']);


    // UPDATE USER
    // $user = DB::update("UPDATE users SET email=? WHERE id=? ", [
    //     'abel@gmail.com',
    //     2
    // ]);

    // DELETE A USER
    // $user_to_delete = DB::delete("DELETE FROM users WHERE id=2");
    dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
