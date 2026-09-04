<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Livraria Acácia')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons inserindo-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Tipografia (Merriweather + Plus Jakarta Sans) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Estilos do Layout Base -->
    <style>
        :root {
            --bg-canvas: #FAF6F0;
            --brand-dark: #2B170C;
            --brand-medium: #3B2314;
            --brand-accent: #8C5A3C;
            --brand-accent-hover: #70462D;
            --text-main: #2A1810;
            --border-color: #EADBCE;
        }

        body {
            background-color: var(--bg-canvas);
            color: var(--text-main);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Merriweather', serif;
            font-weight: 700;
        }

        .navbar-livraria {
            background: linear-gradient(135deg, var(--brand-dark), var(--brand-medium));
            border-bottom: 3px solid var(--brand-accent);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .navbar-livraria .navbar-brand {
            color: #FBF4EB !important;
            font-size: 1.5rem;
        }

        .navbar-livraria .nav-link {
            color: #EAD8C8 !important;
            font-weight: 500;
        }

        .navbar-livraria .nav-link:hover {
            color: #FFFFFF !important;
        }

        .btn-primary {
            background-color: var(--brand-accent);
            border-color: var(--brand-accent);
            color: #FFFFFF;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: var(--brand-accent-hover);
            border-color: var(--brand-accent-hover);
        }

        .footer-livraria {
            background-color: var(--brand-dark);
            color: #C8B8AB;
            margin-top: auto;
        }
    </style>
</head>

<body>

    <!-- Header & Menu -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-livraria py-3">
            <div class="container">
                <a class="navbar-brand brand-font d-flex align-items-center gap-2" href="{{ url('/') }}">
                    <i class="bi bi-book-half"></i> Livraria Acácia
                </a>
                
                <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                    <i class="bi bi-list fs-2"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}"><i class="bi bi-house-door me-1"></i> Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('livraria') }}"><i class="bi bi-journal-bookmark me-1"></i> Livros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('avaliacao') }}"><i class="bi bi-star me-1"></i> Avaliações</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Sidebar opcional -->
    @includeIf('sidebar')

    <!-- Conteúdo Dinâmico das Páginas -->
    <main class="container my-5">
        @yield('conteudo')
    </main>

    <!-- Rodapé -->
    <footer class="footer-livraria py-4">
        <div class="container text-center text-md-start">
            <span class="brand-font fw-bold fs-5 text-white">Livraria Acácia</span>
            <p class="small mb-0 mt-1">&copy; {{ date('Y') }} Livraria Acácia. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>