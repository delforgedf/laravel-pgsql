@extends('layouts.app')

@push('scripts')
    <script src="{{ asset('js/home/home.js') }}"></script>
@endpush
@push('styles')
    <link href="{{ asset('css/home/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/spinner/spinner.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div>
        <div class="shadow-lg p-3 rounded filters">
            <h3>Busca avançada</h3>
            <div class="row">
                <div class="col-12 col-sm-4 my-2">
                    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                </div>
                <div class="col-12 col-sm-4 my-2">
                    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-12 col-sm-4 my-2">
                    <select class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
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
            {{-- <div class="col-12 col-sm-11">
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
            </div> --}}

        </div>
        <div id="map" class="map"></div>
    </div>
    <div id="modalDialog" class="modal">
        <div class="modal-content animate-top">
            <div class="modal-header">
                <h5 class="modal-title">Detalhes da unidade</h5>
                <button type="button" class="close">
                    <span aria-hidden="true" style="color: #fff">x</span>
                </button>
            </div>
            <div class="modal-body py-2">
                <div class="row border-bottom border-bottom m-4 p-3">
                    <div class="col-4">
                        <h4>Goiânia</h4>
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-4">
                                <div class=" bg-primary rounded p-2">jonatas</div>
                            </div>
                            <div class="col-4">
                                <div class=" bg-success rounded p-2">jonatas</div>
                            </div>
                            <div class="col-4">
                                <div class=" bg-warning rounded p-2">jonatas</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-4">
                    <div class="col-6 border border-dark">as</div>
                    <div class="col-6 border border-dark">as</div>
                </div>
                <div class="row mx-4">
                    <div class="col-6 border border-dark">as</div>
                    <div class="col-6 border border-dark">as</div>
                </div>
                <div class="row mx-4">
                    <div class="col-6 border border-dark">as</div>
                    <div class="col-6 border border-dark">as</div>
                </div>
                <div class="row mx-4">
                    <div class="col-6 border border-dark">as</div>
                    <div class="col-6 border border-dark">as</div>
                </div>
            </div>
        </div>
    </div>

    <div class="loading d-none" id="loading">Carregando &#8230;</div>
@endsection
