<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Store;
use App\Models\Category;
use App\Models\Rental;
use App\Models\Film_category;
use App\Models\Customer;

class HomeController extends Controller
{
    public function index()
{
    // Contar los actores, películas, y tiendas
    $actors_count = Actor::count();
    $films_count = Film::count();
    $stores_count = Store::count();
    $customers_count = Customer::count();

// Gráfico de películas por categoría
$categories = Category::all();
$films_per_category = [];
foreach ($categories as $category) {
    $films_per_category[$category->name] = Film_category::where('category_id', $category->category_id)->count();
}

    // Últimos alquileres
    $recent_rentals = Rental::with('customer', 'staff')->latest('rental_date')->limit(5)->get();


    return view('home', compact(
        'actors_count',
        'films_count',
        'stores_count',
        'categories',
        'films_per_category',
        'recent_rentals',
        'customers_count'
    ));
}
}
