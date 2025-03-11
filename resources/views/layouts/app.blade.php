<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Sakila</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header class="bg-dark text-white p-3">
        <div class="container">
            <h1>CRUD Sakila</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('actors.index') }}">Actores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('films.index') }}">Películas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('categories.index') }}">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('adresses.index') }}">Direcciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('city.index') }}">Ciudades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('countries.index') }}">Países</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('customers.index') }}">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('inventories.index') }}">Inventario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('languages.index') }}">Idiomas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('payments.index') }}">Pagos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('rentals.index') }}">Rentas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('staffs.index') }}">Staffs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('stores.index') }}">Tiendas</a>
                    </li>
                    <!-- Agrega más enlaces para otras tablas -->
                </ul>
            </nav>
        </div>
    </header>

    <main class="container mt-4">
        @yield('content') <!-- Aquí se inyectará el contenido de cada vista -->
    </main>

    <!-- Modal para Crear y Editar -->
    <div class="modal fade" id="crudModal" tabindex="-1" aria-labelledby="crudModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="crudModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- El formulario se cargará aquí dinámicamente -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Eliminar -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Eliminar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white p-3 mt-4">
        <div class="container">
            <p class="text-center">© 2023 CRUD Sakila</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>