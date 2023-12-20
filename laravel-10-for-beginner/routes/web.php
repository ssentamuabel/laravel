<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\Profile\AvatarController;
use OpenAI\Laravel\Facades\OpenAI;

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
    return view('welcome');


    // get all the users
    // $users = DB::select("SELECT * FROM users");
//    $users = User::all();
    // $user = User::find(9);

    // INSERT NEW USER
    // $insert = DB::insert("INSERT INTO users (name, email, password) VALUES(?, ?, ?)", ['abel', 'abel@gmail.com', 'password']);
    // $insert = DB::table('users')->insert([
    //     'name'=>'Daizy',
    //     'email'=> 'daisy@gmail.com',
    //     'password'=>bcrypt('password')
    // ]);

    // $insert = User::create([
    //     'name'=>'User3',
    //     'email'=> 'user3@gmail.com',
    //     'password'=>'password'
    // ]);



    // UPDATE USER
    // $update = DB::update("UPDATE users SET email=? WHERE id=? ", [
    //     'abel@gmail.com',
    //     2
    // ]);

    // $update = DB::table('users')->where('id', 5)->update([
    //     'email' => 'grace@kyu.ac.ug'
    // ]);

    // DELETE A USER
    // $delete = DB::delete("DELETE FROM users WHERE id=2");
    // $delete =  DB::table('users')->where('id',1 )->delete();




    dd($user->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('openai/', function(){

    

    $result = OpenAI::chat()->create([
        'model' => 'gpt-3.5-turbo',
        'messages' => [
            ['role' => 'user', 'content' => 'Hello!'],
        ],
    ]);

    echo $result->choices[0]->message->content; // Hello! How can I assist you today?

});
