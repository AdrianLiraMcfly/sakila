<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;
use App\Models\Film;
use App\Models\Store;
use App\Models\Category;
use App\Models\Rental;

class HomeController extends Controller
{
    public function index()
    {
        // Contar los actores, películas, y tiendas
        $actors_count = Actor::count();
        $films_count = Film::count();
        $stores_count = Store::count();

        // Gráfico de películas por categoría
        $categories = Category::pluck('name')->toArray();
        $films_per_category = Category::withCount('films')->pluck('films_count')->toArray();

        // Últimos alquileres
        $recent_rentals = Rental::with('customer', 'film')->latest('rental_date')->limit(5)->get();

        return view('home', compact(
            'actors_count',
            'films_count',
            'stores_count',
            'categories',
            'films_per_category',
            'recent_rentals'
        ));
    }
}
