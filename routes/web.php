<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\actorController;
use App\Http\Controllers\filmController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\adressController;
use App\Http\Controllers\cityController;
use App\Http\Controllers\countryController;
use App\Http\Controllers\costumerController;
use App\Http\Controllers\film_actorController;
use App\Http\Controllers\film_categoryController;
use App\Http\Controllers\inventoryController;
use App\Http\Controllers\languageController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\rentalController;
use App\Http\Controllers\staffController;
use App\Http\Controllers\storeController;
use App\Http\Controllers\homecontroller;

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

Route::get('/', [homecontroller::class, 'index'])->name('home');

Route::get('/actors', [actorController::class, 'index'])->name('actors.index');
Route::get('/actors/create', [actorController::class, 'create'])->name('actors.create');
Route::post('/actors', [actorController::class, 'store'])->name('actors.store');
Route::get('/actors/{actor}', [actorController::class, 'show'])->name('actors.show');
Route::get('/actors/{actor}/edit', [actorController::class, 'edit'])->name('actors.edit');
Route::put('/actors/{actor}', [actorController::class, 'update'])->name('actors.update');
Route::delete('/actors/{actor}', [actorController::class, 'destroy'])->name('actors.destroy');


Route::get('/films', [filmController::class, 'index'])->name('films.index');
Route::get('/films/create', [filmController::class, 'create'])->name('films.create');
Route::post('/films', [filmController::class, 'store'])->name('films.store');
Route::get('/films/{film}', [filmController::class, 'show'])->name('films.show');
Route::get('/films/{film}/edit', [filmController::class, 'edit'])->name('films.edit');
Route::put('/films/{film}', [filmController::class, 'update'])->name('films.update');
Route::delete('/films/{film}', [filmController::class, 'destroy'])->name('films.destroy');

Route::get('/categories', [categoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [categoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [categoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{category}', [categoryController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/edit', [categoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [categoryController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [categoryController::class, 'destroy'])->name('categories.destroy');

Route::get('/adresses', [adressController::class, 'index'])->name('adresses.index');
Route::get('/adresses/create', [adressController::class, 'create'])->name('adresses.create');
Route::post('/adresses', [adressController::class, 'store'])->name('adresses.store');
Route::get('/adresses/{adress}', [adressController::class, 'show'])->name('adresses.show');
Route::get('/adresses/edit/{adress}', [adressController::class, 'edit'])->name('adresses.edit');
Route::put('/adresses/{adress}', [adressController::class, 'update'])->name('adresses.update');
Route::delete('/adresses/{adress}', [adressController::class, 'destroy'])->name('adresses.destroy');

Route::get('/city', [cityController::class, 'index'])->name('city.index');
Route::get('/city/create', [cityController::class, 'create'])->name('city.create');
Route::post('/city', [cityController::class, 'store'])->name('city.store');
Route::get('/city/{city}', [cityController::class, 'show'])->name('city.show');
Route::get('/city/{city}/edit', [cityController::class, 'edit'])->name('city.edit');
Route::put('/city/{city}', [cityController::class, 'update'])->name('city.update');
Route::delete('/city/{city}', [cityController::class, 'destroy'])->name('city.destroy');

Route::get('/country', [countryController::class, 'index'])->name('countries.index');
Route::get('/country/create', [countryController::class, 'create'])->name('countries.create');
Route::post('/country', [countryController::class, 'store'])->name('countries.store');
Route::get('/country/{country}', [countryController::class, 'show'])->name('countries.show');
Route::get('/country/{country}/edit', [countryController::class, 'edit'])->name('countries.edit');
Route::put('/country/{country}', [countryController::class, 'update'])->name('countries.update');
Route::delete('/country/{country}', [countryController::class, 'destroy'])->name('countries.destroy');

Route::get('/customer', [costumerController::class, 'index'])->name('customers.index');
Route::get('/customer/create', [costumerController::class, 'create'])->name('customers.create');
Route::post('/customer', [costumerController::class, 'store'])->name('customers.store');
Route::get('/customer/{customer}', [costumerController::class, 'show'])->name('customers.show');
Route::get('/customer/{customer}/edit', [costumerController::class, 'edit'])->name('customers.edit');
Route::put('/customer/{customer}', [costumerController::class, 'update'])->name('customers.update');
Route::delete('/customer/{customer}', [costumerController::class, 'destroy'])->name('customers.destroy');

Route::get('/inventory', [inventoryController::class, 'index'])->name('inventories.index');
Route::get('/inventory/create', [inventoryController::class, 'create'])->name('inventories.create');
Route::post('/inventory', [inventoryController::class, 'store'])->name('inventories.store');
Route::get('/inventory/{inventory}', [inventoryController::class, 'show'])->name('inventories.show');
Route::get('/inventory/{inventory}/edit', [inventoryController::class, 'edit'])->name('inventories.edit');
Route::put('/inventory/{inventory}', [inventoryController::class, 'update'])->name('inventories.update');
Route::delete('/inventory/{inventory}', [inventoryController::class, 'destroy'])->name('inventories.destroy');

Route::get('/language', [languageController::class, 'index'])->name('languages.index');
Route::get('/language/create', [languageController::class, 'create'])->name('languages.create');
Route::post('/language', [languageController::class, 'store'])->name('languages.store');
Route::get('/language/{language}', [languageController::class, 'show'])->name('languages.show');
Route::get('/language/{language}/edit', [languageController::class, 'edit'])->name('languages.edit');
Route::put('/language/{language}', [languageController::class, 'update'])->name('languages.update');
Route::delete('/language/{language}', [languageController::class, 'destroy'])->name('languages.destroy');

Route::get('/payment', [paymentController::class, 'index'])->name('payments.index');
Route::get('/payment/create', [paymentController::class, 'create'])->name('payments.create');
Route::post('/payment', [paymentController::class, 'store'])->name('payments.store');
Route::get('/payment/{payment}', [paymentController::class, 'show'])->name('payments.show');
Route::get('/payment/{payment}/edit', [paymentController::class, 'edit'])->name('payments.edit');
Route::put('/payment/{payment}', [paymentController::class, 'update'])->name('payments.update');
Route::delete('/payment/{payment}', [paymentController::class, 'destroy'])->name('payments.destroy');

Route::get('/rental', [rentalController::class, 'index'])->name('rentals.index');
Route::get('/rental/create', [rentalController::class, 'create'])->name('rentals.create');
Route::post('/rental', [rentalController::class, 'store'])->name('rentals.store');
Route::get('/rental/{rental}', [rentalController::class, 'show'])->name('rentals.show');
Route::get('/rental/{rental}/edit', [rentalController::class, 'edit'])->name('rentals.edit');
Route::put('/rental/{rental}', [rentalController::class, 'update'])->name('rentals.update');
Route::delete('/rental/{rental}', [rentalController::class, 'destroy'])->name('rentals.destroy');

Route::get('/staff', [staffController::class, 'index'])->name('staffs.index');
Route::get('/staff/create', [staffController::class, 'create'])->name('staffs.create');
Route::post('/staff', [staffController::class, 'store'])->name('staffs.store');
Route::get('/staff/{staff}', [staffController::class, 'show'])->name('staffs.show');
Route::get('/staff/{staff}/edit', [staffController::class, 'edit'])->name('staffs.edit');
Route::put('/staff/{staff}', [staffController::class, 'update'])->name('staffs.update');
Route::delete('/staff/{staff}', [staffController::class, 'destroy'])->name('staffs.destroy');

Route::get('/store', [storeController::class, 'index'])->name('stores.index');
Route::get('/store/create', [storeController::class, 'create'])->name('stores.create');
Route::post('/store', [storeController::class, 'store'])->name('stores.store');
Route::get('/store/{store}', [storeController::class, 'show'])->name('stores.show');
Route::get('/store/{store}/edit', [storeController::class, 'edit'])->name('stores.edit');
Route::put('/store/{store}', [storeController::class, 'update'])->name('stores.update');
Route::delete('/store/{store}', [storeController::class, 'destroy'])->name('stores.destroy');