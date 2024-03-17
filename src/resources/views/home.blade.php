@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('js/home/home.js') }}"></script>
@endpush
@push('styles')
    <link href="{{ asset('css/home/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/spinner/spinner.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="my-4 shadow-lg p-3 mb-5 rounded filters">
            <h3>Busca avançada</h3>
            <div class="row">
                <div class="col-12 col-sm-4 my-2">
                    <p>Status</p>
                    <select class="form-select" aria-label="Status" name="status">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-12 col-sm-4 my-2">
                    <p>Tipo do Projeto</p>
                    <select class="form-select" aria-label="Tipo de projeto" name="tp_projeto">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-12 col-sm-4 my-2">
                    <p>Orgão</p>
                    <select class="form-select" aria-label="Orgãoe" name="orgao">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 my-2">
                    <p>Município</p>
                    <select class="form-select" aria-label="Status" name="status">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>

            </div>


            <div class="col-12 col-sm-1 my-2">
                <button type="button" id="filterButton" class="btn btn-success"
                    style="background: #2A9E0D; border: none;">Filtrar</button>
            </div>
            <div class="col-12 col-sm-11">
                <div class="row">
                    <div class=" my-2 col-6 col-sm-2">
                        <img src="https://mapadeobras.seinfra.go.gov.br/assets/landing/img/markers/habitacao.png"
                            width="30px">
                        <span>Habitação</span>
                    </div>
                    <div class=" my-2 col-6 col-sm-2">
                        <img src="https://mapadeobras.seinfra.go.gov.br/assets/landing/img/markers/esporte.png"
                            width="30px">
                        <span>Esporte e Lazer</span>
                    </div>
                    <div class=" my-2 col-6 col-sm-2">
                        <img src="https://mapadeobras.seinfra.go.gov.br/assets/landing/img/markers/educacao.png"
                            width="30px">
                        <span>Educação</span>
                    </div>
                    <div class=" my-2 col-6 col-sm-2">
                        <img src="https://mapadeobras.seinfra.go.gov.br/assets/landing/img/markers/seguranca.png"
                            width="30px">
                        <span>Segurança Pública</span>
                    </div>
                    <div class=" my-2 col-6 col-sm-2">
                        <img src="https://mapadeobras.seinfra.go.gov.br/assets/landing/img/markers/saude.png"
                            width="30px">
                        <span>Saúde</span>
                    </div>
                    <div class=" my-2 col-6 col-sm-2">
                        <img src="https://mapadeobras.seinfra.go.gov.br/assets/landing/img/markers/default.png"
                            width="30px">
                        <span>Outras</span>
                    </div>
                </div>
            </div>

        </div>
        <div id="map" class="map"></div>
    </div>
    <div class="modal">
        <p>Exemplo de modal</p>
    </div>
    <div class="loading d-none" id="loading">Carregando &#8230;</div>
@endsection
