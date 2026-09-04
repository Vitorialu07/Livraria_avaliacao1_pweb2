@extends('layout')

@section('titulo', 'Página Inicial - Livraria Acácia')

@section('conteudo')

<!-- Estilos exclusivos para os componentes da Página Inicial -->
<style>
    .hero-banner {
        background: linear-gradient(135deg, #2B170C, #8C5A3C);
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(43, 23, 12, 0.2);
    }
    
    .card-hover {
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }
    
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08) !important;
    }

    .stat-card {
        border-radius: 12px;
        border: 1px solid #EADBCE;
    }

    .badge-genre {
        background-color: #EADBCE;
        color: #3B2314;
        font-weight: 600;
    }
</style>

<!-- 1. Hero Banner Principal -->
<div class="card border-0 text-white overflow-hidden mb-5 hero-banner">
    <div class="card-body p-4 p-md-5">
        <span class="badge bg-light text-dark mb-3 px-3 py-2 rounded-pill fw-semibold">Destaque do Mês</span>
        <h1 class="display-5 brand-font fw-bold mb-3">Explore Histórias Incríveis</h1>
        <p class="col-md-8 fs-5 text-light opacity-90 mb-4">Descubra novos autores, gerencie seu acervo e acompanhe as melhores avaliações da nossa comunidade literária.</p>
        <div class="d-flex gap-3 flex-wrap">
            <a href="{{ url('livraria') }}" class="btn btn-light btn-lg text-dark fw-semibold px-4">
                <i class="bi bi-journal-bookmark me-2"></i>Ver Acervo
            </a>
            <a href="{{ url('avaliacao') }}" class="btn btn-outline-light btn-lg px-4">
                <i class="bi bi-star me-2"></i>Ver Avaliações
            </a>
        </div>
    </div>
</div>

<!-- 2. Dashboard de Estatísticas Rápida -->
<div class="row g-3 mb-5">
    <div class="col-6 col-md-3">
        <div class="card text-center p-3 h-100 stat-card card-hover">
            <i class="bi bi-journal-album fs-1 text-primary mb-2"></i>
            <h3 class="fw-bold mb-0">120+</h3>
            <small class="text-muted">Livros Cadastrados</small>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card text-center p-3 h-100 stat-card card-hover">
            <i class="bi bi-star-fill fs-1 text-warning mb-2"></i>
            <h3 class="fw-bold mb-0">4.8</h3>
            <small class="text-muted">Média de Avaliações</small>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card text-center p-3 h-100 stat-card card-hover">
            <i class="bi bi-people-fill fs-1 text-success mb-2"></i>
            <h3 class="fw-bold mb-0">45</h3>
            <small class="text-muted">Leitores Ativos</small>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card text-center p-3 h-100 stat-card card-hover">
            <i class="bi bi-bookmark-heart fs-1 text-danger mb-2"></i>
            <h3 class="fw-bold mb-0">12</h3>
            <small class="text-muted">Gêneros Literários</small>
        </div>
    </div>
</div>

<!-- 3. Vitrine de Destaques -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="brand-font m-0">Livros em Destaque</h3>
    <a href="{{ url('livraria') }}" class="text-decoration-none fw-semibold" style="color: #8C5A3C;">
        Ver catálogo completo <i class="bi bi-arrow-right ms-1"></i>
    </a>
</div>

<div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
    <!-- Card Livro 1 -->
    <div class="col">
        <div class="card h-100 card-hover border-0 shadow-sm">
            <div class="card-body d-flex flex-column p-4">
                <span class="badge badge-genre mb-3 align-self-start px-3 py-2 rounded-pill">Ficção</span>
                <h5 class="card-title brand-font fs-4">O Nome do Vento</h5>
                <p class="card-text text-muted small mb-2">Patrick Rothfuss</p>
                <div class="text-warning mb-3 small">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i> 
                    <span class="text-dark fw-bold ms-1">(5.0)</span>
                </div>
                <p class="card-text small text-secondary flex-grow-1">A trajetória de Kvothe, da infância em uma trupe de artistas mambembes até se tornar uma lenda.</p>
                <a href="{{ url('livraria') }}" class="btn btn-primary w-100 mt-3 py-2">Ver Detalhes</a>
            </div>
        </div>
    </div>

    <!-- Card Livro 2 -->
    <div class="col">
        <div class="card h-100 card-hover border-0 shadow-sm">
            <div class="card-body d-flex flex-column p-4">
                <span class="badge badge-genre mb-3 align-self-start px-3 py-2 rounded-pill">Clássico</span>
                <h5 class="card-title brand-font fs-4">Dom Casmurro</h5>
                <p class="card-text text-muted small mb-2">Machado de Assis</p>
                <div class="text-warning mb-3 small">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i> 
                    <span class="text-dark fw-bold ms-1">(4.7)</span>
                </div>
                <p class="card-text small text-secondary flex-grow-1">Um romance clássico brasileiro que explora os ciúmes e as incertezas da memória de Bento Santiago.</p>
                <a href="{{ url('livraria') }}" class="btn btn-primary w-100 mt-3 py-2">Ver Detalhes</a>
            </div>
        </div>
    </div>

    <!-- Card Livro 3 -->
    <div class="col">
        <div class="card h-100 card-hover border-0 shadow-sm">
            <div class="card-body d-flex flex-column p-4">
                <span class="badge badge-genre mb-3 align-self-start px-3 py-2 rounded-pill">Romance</span>
                <h5 class="card-title brand-font fs-4">Orgulho e Preconceito</h5>
                <p class="card-text text-muted small mb-2">Jane Austen</p>
                <div class="text-warning mb-3 small">
                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i> 
                    <span class="text-dark fw-bold ms-1">(4.9)</span>
                </div>
                <p class="card-text small text-secondary flex-grow-1">A tempestuosa relação entre Elizabeth Bennet e o altivo Sr. Darcy na Inglaterra do século XIX.</p>
                <a href="{{ url('livraria') }}" class="btn btn-primary w-100 mt-3 py-2">Ver Detalhes</a>
            </div>
        </div>
    </div>
</div>

<!-- 4. Seção de ÚLTIMAS AVALIAÇÕES -->
<div class="card p-4 border-0 shadow-sm mb-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="brand-font m-0"><i class="bi bi-chat-quote text-primary me-2"></i>O que os leitores estão dizendo</h4>
        <a href="{{ url('avaliacao') }}" class="btn btn-outline-primary btn-sm">Ver todas</a>
    </div>

    <div class="row g-3">
        <div class="col-md-6">
            <div class="p-3 border rounded-3 bg-light h-100">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong class="text-dark fs-6">Mariana Costa</strong>
                    <div class="text-warning small"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                </div>
                <p class="mb-2 small text-secondary">"Escrita impecável e personagens inesquecíveis. Não consegui largar o livro até a última página!"</p>
                <small class="text-muted fw-semibold">Sobre: <em>O Nome do Vento</em></small>
            </div>
        </div>

        <div class="col-md-6">
            <div class="p-3 border rounded-3 bg-light h-100">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong class="text-dark fs-6">Carlos Eduardo</strong>
                    <div class="text-warning small"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></div>
                </div>
                <p class="mb-2 small text-secondary">"Uma obra-prima da literatura. A grande dúvida sobre Capitu continua viva!"</p>
                <small class="text-muted fw-semibold">Sobre: <em>Dom Casmurro</em></small>
            </div>
        </div>
    </div>
</div>

@endsection