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
                {{-- <div class="col-12 col-sm-4 my-2">
                    <select class="form-select form-select-md mb-3">
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>

                </div> --}}
                <div class="col-12 col-sm-4 my-2">
                    <select class="form-select form-select-md mb-3" name="tp_unidade" id="tp_unidade">
                        <option value="">Selecione o tipo de unidade</option>
                        <option value="1">Educação</option>
                        <option value="2">Saúde</option>
                    </select>
                </div>
                <div class="col-12 col-sm-4 my-2">
                    <select class="form-select form-select-md mb-3" name="cod_ibge" id="cod_ibge">
                        <option value="">Selecione um município</option>
                        @foreach ($municipios as $municipio)
                            <option value="{{ $municipio->cod_ibge }}"
                                {{ $municipio->cod_ibge == '5201405' ? 'selected' : '' }}>
                                {{ $municipio->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-sm-1 my-2">
                    <button type="button" id="filterButton" class="btn btn-success"
                        style="background: #2A9E0D; border: none;">Filtrar</button>
                </div>
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
                        <div class="row">
                            <div class="col-2">
                                <i class="bi bi-geo" style="color: #2A9E0D"></i>
                            </div>
                            <div class="col-10">
                                <h3 id="municipio">Goiânia</h3>
                            </div>
                        </div>


                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col-4">
                                <div class=" bg-primary rounded p-2">
                                    <h6 class="modalcountunidade">Unidades de educação</h6>
                                    <span class="modalcountunidadeVal">12345</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class=" bg-success rounded p-2">
                                    <h6 class="modalcountunidade">Unidades de educação</h6>
                                    <span class="modalcountunidadeVal">12345</span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class=" bg-warning rounded p-2">
                                    <h6 class="modalcountunidade">Unidades de educação</h6>
                                    <span class="modalcountunidadeVal">12345</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="informationEducation mb-4 d-none">
                    {{-- <div class="row mx-4">
                        <div class="col-6 border border-dark">CNES</div>
                        <div class="col-6 border border-dark cnes"></div>
                    </div>
                    <div class="row mx-4">
                        <div class="col-6 border border-dark">Nome Fantasia</div>
                        <div class="col-6 border border-dark nomeFantasia"></div>
                    </div>
                    <div class="row mx-4">
                        <div class="col-6 border border-dark">Vínculo SUS</div>
                        <div class="col-6 border border-dark vinculoSus"></div>
                    </div>
                    <div class="row mx-4">
                        <div class="col-6 border border-dark">Tipo de estabelecimento</div>
                        <div class="col-6 border border-dark tpEstabelecimento"></div>
                    </div>
                    <div class="row mx-4">
                        <div class="col-6 border border-dark">Tipo de unidade</div>
                        <div class="col-6 border border-dark tpUnidade"></div>
                    </div> --}}
                </div>
                <div class="informationHealth mb-4 d-none">
                    <div class="row mx-4">
                        <div class="col-6 border border-dark">CNES</div>
                        <div class="col-6 border border-dark cnes">as</div>
                    </div>
                    <div class="row mx-4">
                        <div class="col-6 border border-dark">Nome Fantasia</div>
                        <div class="col-6 border border-dark nomeFantasia"></div>
                    </div>
                    <div class="row mx-4">
                        <div class="col-6 border border-dark">Vínculo SUS</div>
                        <div class="col-6 border border-dark vinculoSus"></div>
                    </div>
                    <div class="row mx-4">
                        <div class="col-6 border border-dark">Tipo de estabelecimento</div>
                        <div class="col-6 border border-dark tpEstabelecimento"></div>
                    </div>
                    <div class="row mx-4">
                        <div class="col-6 border border-dark">Tipo de unidade</div>
                        <div class="col-6 border border-dark tpUnidade"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="loading d-none" id="loading">Carregando &#8230;</div>
@endsection
