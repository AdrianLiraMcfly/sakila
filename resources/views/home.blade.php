@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Encabezado -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><i class="fas fa-home"></i> Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Contenido principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Widget: Total de Actores -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $actors_count }}</h3>
                            <p>Total Actors</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('actors.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Widget: Total de Películas -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $films_count }}</h3>
                            <p>Total Films</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-film"></i>
                        </div>
                        <a href="{{ route('films.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Widget: Total de Tiendas -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $stores_count }}</h3>
                            <p>Total Stores</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-store"></i>
                        </div>
                        <a href="{{ route('stores.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Widget: Notificaciones -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>44</h3>
                            <p>Notifications</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Gráfico de Películas por Categoría -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Films per Category</h3>
                </div>
                <div class="card-body">
                    <canvas id="filmsChart"></canvas>
                </div>
            </div>

            <!-- Script para el gráfico -->
            <script>
                var ctx = document.getElementById('filmsChart').getContext('2d');
                var filmsChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($categories) !!},
                        datasets: [{
                            label: 'Films Count',
                            data: {!! json_encode($films_per_category) !!},
                            backgroundColor: 'rgba(54, 162, 235, 0.5)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: { beginAtZero: true }
                        }
                    }
                });
            </script>

            <!-- Tabla de Últimos Alquileres -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Rentals</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Customer</th>
                                <th>Film</th>
                                <th>Rental Date</th>
                                <th>Return Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent_rentals as $rental)
                                <tr>
                                    <td>{{ $rental->customer->first_name }} {{ $rental->customer->last_name }}</td>
                                    <td>{{ $rental->film ? $rental->film->title : 'No Film Available' }}</td>
                                    <td>{{ $rental->rental_date }}</td>
                                    <td>{{ $rental->return_date ?? 'Pending' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tarjeta de Bienvenida -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-info-circle"></i> Welcome</h3>
                </div>
                <div class="card-body">
                    <p>Welcome to the Admin Dashboard. Use the navigation to manage your content.</p>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Canvas para el gráfico -->
<canvas id="filmsChart"></canvas>

<!-- Script para inicializar el gráfico -->
<script>
    var ctx = document.getElementById('filmsChart').getContext('2d');
    var filmsChart = new Chart(ctx, {
        type: 'bar', // Tipo de gráfico (bar, line, pie, etc.)
        data: {
            labels: {!! json_encode($categories) !!}, // Etiquetas (categorías)
            datasets: [{
                label: 'Films Count', // Etiqueta del dataset
                data: {!! json_encode($films_per_category) !!}, // Datos (cantidad de películas por categoría)
                backgroundColor: 'rgba(54, 162, 235, 0.5)', // Color de fondo
                borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
                borderWidth: 1 // Ancho del borde
            }]
        },
        options: {
            responsive: true, // Hace que el gráfico sea responsive
            scales: {
                y: {
                    beginAtZero: true // Comienza el eje Y desde cero
                }
            }
        }
    });
</script>
@endsection
