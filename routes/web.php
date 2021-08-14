<?php


use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\CardsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageTypesController;
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


Auth::routes();

Route::get('/', [HomeController::class, 'dashboard'])->name('home')->middleware('auth');

Route::group(['middleware' => ['auth','role:admin|super_admin'], 'prefix' => 'admin'], function () {

    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/agents', [AgentController::class, 'agents'])->name('agents');
    Route::post('/agent/store', [AgentController::class, 'store'])->name('agent.store');
    Route::delete('/agent/{id}', [AgentController::class, 'destroy'])->name('agent.destroy');
    Route::put('/agent/{id}', [AgentController::class, 'update'])->name('agent.update');

    Route::get('/card/{id}', [CardsController::class, 'cards'])->name('cards');
    Route::get('/preview/{id}', [CardsController::class, 'printCard'])->name('preview');
    Route::post('/print/cards', [CardsController::class, 'printCards'])->name('print.cards');



    Route::resources([
        'cards' => CardsController::class,
        'p_types' => PackageTypesController::class
    ]);

});





//Route::group([
//    'prefix' => 'cards',
//], function () {
//    Route::get('/', 'CardsController@index')
//         ->name('cards.card.index');
//    Route::get('/create','CardsController@create')
//         ->name('cards.card.create');
//    Route::get('/show/{card}','CardsController@show')
//         ->name('cards.card.show')->where('id', '[0-9]+');
//    Route::get('/{card}/edit','CardsController@edit')
//         ->name('cards.card.edit')->where('id', '[0-9]+');
//    Route::post('/', 'CardsController@store')
//         ->name('cards.card.store');
//    Route::put('card/{card}', 'CardsController@update')
//         ->name('cards.card.update')->where('id', '[0-9]+');
//    Route::delete('/card/{card}','CardsController@destroy')
//         ->name('cards.card.destroy')->where('id', '[0-9]+');
//});
