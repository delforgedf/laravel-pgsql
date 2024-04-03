<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="/img/favicon-96x96.png" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>


    <link href="/css/app.css" rel="stylesheet">
    @stack('styles')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- jQuery Modal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> --}}

    @stack('scripts')
</head>

<body>
    <div id="app">
        <div class=" header">
            <div class="py-1 px-4">
                <a href="https://goias.gov.br/"
                    style="font-weight: 700; color: #F8D61A !important; text-decoration: none;">GOIAS.GOV.BR</a>
            </div>
        </div>
        <nav class="navbar navbar-light shadow-sm navbar-bg">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-9">
                        <img src="/img/seinfra-logo-verde.png" alt=""class="img-fluid">
                    </div>
                </div>
            </div>
        </nav>
        <div class="ouvidoria">
            <div class="container-fluid">
                <div class="d-flex justify-content-end flex-wrap">
                    <a class="p-2" href="https://goias.gov.br/seinfra" target="_blank">Home</a>
                    <a class="p-2" href="https://goias.gov.br/seinfra/acesso-a-informacao" target="_blank">Saiba
                        Mais</a>
                    <a class="p-2" href="https://goias.gov.br/seinfra/programa-de-compliance-publico/"
                        target="_blank">Compliance</a>
                    <a class="p-2" href="https://www.go.gov.br/servicos-digitais/cge/nova-ouvidoria"
                        target="_blank">Ouvidoria</a>
                </div>
            </div>
        </div>

        <main class="">
            @yield('content')
        </main>
        <footer class="py-3">
            <div class="container-fluid">
                <div class="row pb-4 footer-border">
                    <div class="col-md-4 col-12">
                        <img src="/img/logo.png" alt="logo" class="img-fluid">
                    </div>
                    <div class="col-md-4  d-none d-sm-block"></div>
                    <div class="col-md-4 col-12 text-center">
                        <h3>Governo na palma da mão</h3>
                        <div class="row ">
                            <a href="https://play.google.com/store/apps/dev?id=8919028859101894808" target="_blank"
                                class="col-6 col-sm-6 col-12 mb-2">
                                <img src="/img/google-play-v2.png">
                            </a>
                            <a href="https://apps.apple.com/br/developer/estado-de-goias/id1520475540" target="_blank"
                                class="col-sm-6 col-12 mb-2">
                                <img src="/img/app-store-v2.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row pt-2">
                    <div class="col-md-4 col-12 text-center mb-2">
                        <h3 class="widgettitle">Serviços</h3>
                        <ul class="footer-list">
                            <li class="list-group-item">
                                <a href="https://www.go.gov.br/" class="text-decoration-none" target="_blank">Para o
                                    cidadão</a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://www.portaldoservidor.go.gov.br/" class="text-decoration-none"
                                    target="_blank">Para o servidor</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-12 text-center mb-2">
                        <h3 class="widgettitle">Transparência e Ouvidoria</h3>
                        <ul class="footer-list">
                            <li class="list-group-item">
                                <a href="https://transparencia.go.gov.br/" class="text-decoration-none"
                                    target="_blank">Acesso à Informação</a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://www.cge.go.gov.br/ouvidoria/" class="text-decoration-none"
                                    target="_blank">Ouvidoria</a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://vaptvupt.go.gov.br/unidades" class="text-decoration-none"
                                    target="_blank">SIC</a>
                            </li>
                            <li class="list-group-item">
                                <a href="http://www.cge.go.gov.br/ouvidoria/Register_1.php" class="text-decoration-none"
                                    target="_blank">e-SIC</a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://goias.gov.br/politica-de-privacidade/" class="text-decoration-none"
                                    target="_blank">Política de Privacidade</a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://goias.gov.br/politica-de-cookies/" class="text-decoration-none"
                                    target="_blank">Política de Cookies</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-12 text-center mb-2">
                        <h3 class="widgettitle">Contatos</h3>
                        <ul class="footer-list">
                            <li class="list-group-item">
                                <a href="https://goias.gov.br/administracao-direta/" class="text-decoration-none"
                                    target="_blank">Administração Direta</a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://goias.gov.br/autarquias-e-fundacoes/" class="text-decoration-none"
                                    target="_blank">Autarquias e Fundações</a>
                            </li>
                            <li class="list-group-item">
                                <a href="https://goias.gov.br/empresas-publicas/" class="text-decoration-none"
                                    target="_blank">Empresas Públicas</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <h6>Edifício Palácio de Prata - Rua 5, n° 833 - 5º, 6º e 7º andares - Setor Oeste - CEP 74.115-060 -
                        Goiânia - Goiás</h6>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
