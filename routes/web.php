<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\portfolio\CategoryController;
use App\Http\Controllers\portfolio\HeaderController;
use App\Http\Controllers\portfolio\PortfolioController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        Route::get('/', function () {
            return view('welcome');
        });

        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->middleware(['auth', 'verified', 'accessToDashboard'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        Route::prefix('/dashboard')
            ->as('dashboard.')
            ->middleware(['auth', 'verified', 'accessToDashboard']) //
            ->group(function () {
                Route::get('/', function () {
                    return view('dashboard');
                })->name('main');

                Route::resource('users', UserController::class);
                Route::resource('portfolioHeader', HeaderController::class);
                Route::resource('portfolioCategory', CategoryController::class);
            });
            Route::get('/portfolio', [PortfolioController::class, 'index']);

            // Route::get('/portfolio', function () {
            //     return view('portfolio.portfolio');
            // });




        //...
    }
);


require __DIR__ . '/auth.php';
