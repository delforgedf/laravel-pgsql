$(document).ready(function () {
    $("#filterButton").on("click", function () {
        let filter = [];
        $(".filters input, .filters select").each(function (index) {
            var input = $(this);
            if (input.val()) {
                filter.push({ name: input.attr("name"), value: input.val() });
            }
        });
        $.ajax({
            url: "https://app.asana.com/-/api/0.1/workspaces/",
            type: "GET",
            data: filter,
            dataType: "json", // added data type
            success: function (res) {
                console.log(res);
                alert(res);
            },
        });
    });
    initMap();
    function initMap() {
        var map = L.map("map").setView([-16.6869, -49.2648], 8);
        map.setMinZoom(2);

        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "© OpenStreetMap contributors",
        }).addTo(map);
        const locations = [
            {
                id: "3838",
                orgao: "DELEGACIA-GERAL DA POL\u00cdCIA CIVIL",
                sigla: "DGPC",
                tipos_do_projeto: "O",
                numero_dos_contratos: "060/2023 - SSP GO",
                cnpj: "0",
                empresa_contratada: "",
                contrato: "",
                planilha_contratada: "",
                id_projeto: "4611",
                nome_projeto:
                    "PCGO - GEPI (9.29) - 1\u00aa Etapa - Constru\u00e7\u00e3o do Complexo da Pol\u00edcia Civil",
                objeto: "Implanta\u00e7\u00e3o do Complexo Estadual da Pol\u00edcia Civil de Goi\u00e1s.",
                area_tematica: "Seguran\u00e7a P\u00fablica",
                processo_sei_da_contratacao: "202300007039618",
                municipios: "GOIANIA",
                latitude: "-16.757647",
                longitude: "-49.441135",
                data_de_inicio_ou_previsao: "01/12/2026",
                valor_total_do_projeto: "18587338.83",
                envolve_parceria_captacao_de_recursos: "N",
                tipo_de_instrumento: "-",
                numero_do_instrumento: "-",
                nome_do_parceiro_concedente: "-",
                "in\u00edcio_vig_instrumento": "",
                final_vig_Instrumento: "",
                repasse_financeiro: "",
                valor_recurso_parceiro: "0",
                contrapartida_pactuada: "",
                projeto_possui_emenda_parlamentar: "N",
                numero_da_emenda: "-",
                situacao_obra: "A",
                data_prevista_conclusao: "01/12/2026",
                estagio_execucao_percentual: "27",
                data_de_paralisacao: "-",
                data_previa_de_retomada: "-",
                motivo_da_paralisacao: "-",
                Tempo_de_paralisacao: "0",
                responsavel_pela_inexecucao: "-",
                valor_pago: "587065.99",
                saldo_a_pagar: "18000272.84",
                situacao: "A",
                is_edit: "1",
                valorEmpenhado: "587066",
                valorLiquidado: "587066",
                valorExecutado: "587066",
            },
            {
                id: "3885",
                orgao: "DELEGACIA-GERAL DA POL\u00cdCIA CIVIL",
                sigla: "DGPC",
                tipos_do_projeto: "O",
                numero_dos_contratos: "38/2023 SSP",
                cnpj: "0",
                empresa_contratada: "",
                contrato: "",
                planilha_contratada: "",
                id_projeto: "3743",
                nome_projeto:
                    "Constru\u00e7\u00e3o do complexo da 19\u00aa DRPC no munic\u00edpio de Caldas Novas - 919086/2021",
                objeto: "Constru\u00e7\u00e3o do complexo das unidades especializadas da pol\u00edcia civil na 19\u00aa delegacia regional de pol\u00edcia no munic\u00edpio de caldas novas/go.",
                area_tematica: "Seguran\u00e7a P\u00fablica",
                processo_sei_da_contratacao: "202100007048686",
                municipios: "ALVORADA DO NORTE",
                latitude: "-16.765694",
                longitude: "-49.433407",
                data_de_inicio_ou_previsao: "22/12/2021",
                valor_total_do_projeto: "1903591.8",
                envolve_parceria_captacao_de_recursos: "S",
                tipo_de_instrumento: "Contrato de Repasse",
                numero_do_instrumento: "919086/2021 ",
                nome_do_parceiro_concedente: "ministerio da justi\u00e7a",
                "in\u00edcio_vig_instrumento": "22/12/2021",
                final_vig_Instrumento: "30/09/2024",
                repasse_financeiro: "S",
                valor_recurso_parceiro: "1901688.21",
                contrapartida_pactuada: "",
                projeto_possui_emenda_parlamentar: "S",
                numero_da_emenda: "-",
                situacao_obra: "A",
                data_prevista_conclusao: "30/09/2024",
                estagio_execucao_percentual: "72",
                data_de_paralisacao: "-",
                data_previa_de_retomada: "-",
                motivo_da_paralisacao: "-",
                Tempo_de_paralisacao: "0",
                responsavel_pela_inexecucao: "-",
                valor_pago: "157493.59",
                saldo_a_pagar: "1568088.62",
                situacao: "A",
                is_edit: "1",
                valorEmpenhado: "1725580",
                valorLiquidado: "235727",
                valorExecutado: "157494",
            },
            {
                id: "3886",
                orgao: "DELEGACIA-GERAL DA POL\u00cdCIA CIVIL",
                sigla: "DGPC",
                tipos_do_projeto: "O",
                numero_dos_contratos: "38/2023 SSP",
                cnpj: "0",
                empresa_contratada: "",
                contrato: "",
                planilha_contratada: "",
                id_projeto: "3743",
                nome_projeto:
                    "Constru\u00e7\u00e3o do complexo da 19\u00aa DRPC no munic\u00edpio de Caldas Novas - 919086/2021",
                objeto: "Constru\u00e7\u00e3o do complexo das unidades especializadas da pol\u00edcia civil na 19\u00aa delegacia regional de pol\u00edcia no munic\u00edpio de caldas novas/go.",
                area_tematica: "Seguran\u00e7a P\u00fablica",
                processo_sei_da_contratacao: "202100007048686",
                municipios: "ALVORADA DO NORTE",
                latitude: "-16.763845",
                longitude: "-49.438320",
                data_de_inicio_ou_previsao: "22/12/2021",
                valor_total_do_projeto: "1903591.8",
                envolve_parceria_captacao_de_recursos: "S",
                tipo_de_instrumento: "Contrato de Repasse",
                numero_do_instrumento: "919086/2021 ",
                nome_do_parceiro_concedente: "ministerio da justi\u00e7a",
                "in\u00edcio_vig_instrumento": "22/12/2021",
                final_vig_Instrumento: "30/09/2024",
                repasse_financeiro: "S",
                valor_recurso_parceiro: "1901688.21",
                contrapartida_pactuada: "",
                projeto_possui_emenda_parlamentar: "S",
                numero_da_emenda: "-",
                situacao_obra: "A",
                data_prevista_conclusao: "30/09/2024",
                estagio_execucao_percentual: "72",
                data_de_paralisacao: "-",
                data_previa_de_retomada: "-",
                motivo_da_paralisacao: "-",
                Tempo_de_paralisacao: "0",
                responsavel_pela_inexecucao: "-",
                valor_pago: "157493.59",
                saldo_a_pagar: "1568088.62",
                situacao: "A",
                is_edit: "1",
                valorEmpenhado: "1725580",
                valorLiquidado: "235727",
                valorExecutado: "157494",
            },
        ];
        loadDataMap(locations, map);
    }

    function loadDataMap(locations, map) {
        loading();
        locations.forEach(function (location) {
            const icon = handlerMarkerPin(location.area_tematica);
            let tolltip = "<p>" + location.nome_projeto + "</p>";
            const valorTotalProjeto = parseFloat(
                location.valor_total_do_projeto
            ).toLocaleString("pt-br", { style: "currency", currency: "BRL" });
            tolltip +=
                "<div><p><b>Valor do projeto:</b> " +
                valorTotalProjeto +
                "</p></div>";
            const valorPago = parseFloat(location.valor_pago).toLocaleString(
                "pt-br",
                { style: "currency", currency: "BRL" }
            );
            tolltip += "<div><p><b>Valor pago:</b> " + valorPago + "</p></div>";
            var customIcon = L.icon({
                iconUrl: icon,
                iconSize: [26, 30],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32],
            });
            L.marker([location.latitude, location.longitude], {
                icon: customIcon,
            })
                .addTo(map)
                .bindTooltip(tolltip)
                .on("click", function (event) {
                    openModal(event);
                });
        });
    }

    function openModal(data) {
        $(".modal").modal({
            fadeDuration: 300,
            closeClass: "icon-close",
            closeText: "x",
        });
    }
    function handlerMarkerPin(marker) {
        switch (marker) {
            case "Habitação":
                return "https://mapadeobras.seinfra.go.gov.br/assets/landing/img/markers/habitacao.png";
                break;
            case "Esporte e Lazer":
                return "https://mapadeobras.seinfra.go.gov.br/assets/landing/img/markers/esporte.png";
                break;
            case "Educação":
                return "https://mapadeobras.seinfra.go.gov.br/assets/landing/img/markers/educacao.png";
                break;
            case "Segurança Pública":
                return "https://mapadeobras.seinfra.go.gov.br/assets/landing/img/markers/seguranca.png";
                break;
            case "Saúde":
                return "https://mapadeobras.seinfra.go.gov.br/assets/landing/img/markers/saude.png";
                break;
            default:
                return "https://mapadeobras.seinfra.go.gov.br/assets/landing/img/markers/default.png";
                break;
        }
    }

    function loading() {
        setTimeout(() => {
            document.querySelector("#loading").classList.toggle("d-none");
        }, 500);
    }
});
