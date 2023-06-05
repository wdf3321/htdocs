<?php


use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers;

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
        'prefix' => LaravelLocalization::setlocale(),   
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::get('/', function () {
            return view('welcome');
        });

        Auth::routes();

        Route::get('/home', [Controllers\HomeController::class, 'index'])->name('home');
        Route::get('dashboard', [Controllers\DashboardController::class, 'index'])->name('dashboard');
        Route::post('/language/change', function (Request $request) {
            $locale = $request->input('locale');
            if (in_array($locale, ['en', 'zh-tw'])) {
                $request->session()->put('locale', $locale);
                LaravelLocalization::setLocale($locale);
            }
            return redirect()->route('dashboard');
        })->name('language.change');
        
        
        
    }
);
