<?php
  
  use Illuminate\Support\Facades\Route;

  Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('dashboard');
?>