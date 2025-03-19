<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="dist/img/icon.png" type="image/x-icon">
    <title>Sakila Movies</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Estilos personalizados -->
    <style>
        .content-wrapper {
            margin-left: 250px; /* Ancho del sidebar expandido */
            transition: margin-left 0.3s ease; /* Transición suave */
        }

        body {
            background-color: #f4f4f4; /* Color de fondo de la página */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
 /* Color de fondo de la navbar */
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: #f2f2f2; /* Color del texto en la navbar */
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd; /* Color de fondo al pasar el ratón */
            color: black; /* Color del texto al pasar el ratón */
        }

        .content {
            padding: 20px;
        }

        .sidebar-collapse .content-wrapper {
            margin-left: 80px; /* Ancho del sidebar contraído */
        }

        @media (max-width: 768px) {
            .content-wrapper {
                margin-left: 0; /* Sin margen en móviles */
            }
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- /.navbar -->

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            @include('layouts.sidebar')
        </aside>

        <!-- Contenido Principal -->
        <div class="content-wrapper">
            <main class="content">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE JS -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>