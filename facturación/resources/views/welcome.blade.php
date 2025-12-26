<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FacturaSys | Sistema de Facturación</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            min-height: 100vh;
        }

        .glass {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 20px;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
        }

        .feature-card {
            transition: all .3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,.2);
        }
    </style>
</head>

<body class="text-white">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="/">
                <i class="bi bi-receipt-cutoff me-2"></i>FacturaSys
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto gap-3">

                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('factura.index') }}">
                            Facturas
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('cliente.index') }}">
                            Clientes
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('articulo.index') }}">
                            Artículos
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-warning fw-semibold px-4" href="{{ route('factura.index') }}">
                            <i class="bi bi-lightning-charge-fill"></i> Acceder
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="container py-5">
        <div class="glass p-5 shadow-lg">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <span class="badge bg-warning text-dark mb-3">Sistema Profesional</span>
                    <h1 class="hero-title mb-4">
                        Sistema de<br>Facturación Digital
                    </h1>

                    <p class="lead">
                        Administra clientes, controla inventarios y genera facturas
                        electrónicas de forma rápida, segura y eficiente.
                    </p>

                    <div class="mt-4">
                        <a href="{{ route('factura.index') }}" class="btn btn-warning btn-lg me-3">
                            <i class="bi bi-arrow-right-circle"></i> Empezar Ahora
                        </a>

                        <a href="#" class="btn btn-outline-light btn-lg">
                            <i class="bi bi-info-circle"></i> Ver Demo
                        </a>
                    </div>
                </div>

                <div class="col-md-6 text-center mt-4 mt-md-0">
                    <img src="https://cdn-icons-png.flaticon.com/512/1041/1041916.png"
                         class="img-fluid"
                         style="max-height: 320px;">
                </div>

            </div>
        </div>
    </section>

    <!-- FEATURES -->
    <section class="container pb-5">
        <div class="row g-4">

            <div class="col-md-4">
                <div class="card feature-card h-100 border-0 text-dark">
                    <div class="card-body text-center">
                        <i class="bi bi-people-fill fs-1 text-primary"></i>
                        <h5 class="mt-3 fw-bold">Clientes</h5>
                        <p class="text-muted">
                            Registro y seguimiento completo de clientes.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card h-100 border-0 text-dark">
                    <div class="card-body text-center">
                        <i class="bi bi-box-seam-fill fs-1 text-success"></i>
                        <h5 class="mt-3 fw-bold">Inventario</h5>
                        <p class="text-muted">
                            Control de productos y stock en tiempo real.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card feature-card h-100 border-0 text-dark">
                    <div class="card-body text-center">
                        <i class="bi bi-receipt fs-1 text-warning"></i>
                        <h5 class="mt-3 fw-bold">Facturación</h5>
                        <p class="text-muted">
                            Emisión de facturas rápida y confiable.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer class="text-center py-4 text-white-50">
        <small>
            © {{ date('Y') }} FacturaSys | Laravel & Bootstrap 5
        </small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
