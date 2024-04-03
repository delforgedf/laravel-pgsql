$(document).ready(function () {
    $("#btnLegenda").hover(
        function () {
            $(".legenda").toggleClass("d-none");
        },
        function () {
            $(".legenda").toggleClass("d-none");
        }
    );
    openModalDados();
    let map = L.map("map").setView([-16.6869, -49.2648], 8);
    map.setMinZoom(2);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "© OpenStreetMap contributors",
    }).addTo(map);
    getData();
    $("#filterButton").on("click", function () {
        let filter = [];
        $(".filters input, .filters select").each(function (index) {
            let input = $(this);
            if (input.val()) {
                filter.push({ name: input.attr("name"), value: input.val() });
            }
        });
        getData(filter);
    });
    $("#iconDados").on("click", function () {
        openModalDados();
    });

    function getData(filter = null) {
        loading();
        $.ajax({
            url: "/api/unidades",
            type: "GET",
            data: filter,
            dataType: "json",

            success: function (res) {
                loadDataMap(res, map);
                loading();
            },
            error: function (result) {
                console.log("Erro ao executar a chamada ajax");
                loading();
            },
        });
    }

    function loadDataMap(locations, map) {
        map.eachLayer((layer) => {
            if (layer instanceof L.Marker) {
                layer.remove();
            }
        });
        var i = 0;
        locations.forEach(function (location) {
            i++;

            if (
                isLatitude(location?.latitude) &&
                isLongitude(location?.longitude)
            ) {
                if (i === 1) {
                    map.setView([location?.latitude, location?.longitude], 8);
                }
                const icon = handlerMarkerPin(location?.tp_unidade);
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
                    .on("click", function (event) {
                        openModal(location);
                    });
            }
        });
    }

    function isLatitude(lat) {
        return isFinite(lat) && Math.abs(lat) <= 90 && lat != "";
    }

    function isLongitude(lng) {
        return isFinite(lng) && Math.abs(lng) <= 180 && lng != "";
    }

    function openModal(data) {
        loading();
        let modal = $("#modalUnidades");
        let span = $(".close");
        span.on("click", function () {
            modal.fadeOut();
            document.body.style.overflow = null;
        });

        $.ajax({
            url: "/api/deficit_habitacional",
            type: "GET",
            data: { cod_ibge: data.cod_ibge },
            dataType: "json",
            success: function (res) {
                let defict =
                    parseInt(res.rustico, 10) +
                    parseInt(res.adensado, 10) +
                    parseInt(res.improvisado, 10);

                let onus = res.onus?.replace(",", ".");
                onus = parseFloat(onus).toFixed(2);
                defict = parseFloat(defict) + parseFloat(onus);
                // defict.replace(".", ",");
                document.querySelector(".defict").innerHTML = defict;
                document.querySelector(".total_saude").innerHTML =
                    res.total_saude;
                document.querySelector(".total_educacao").innerHTML =
                    res.total_educacao;
                if (data.tp_unidade == 1) {
                    document
                        .querySelector(".informationEducation")
                        .classList.remove("d-none");
                    document
                        .querySelector(".informationHealth")
                        .classList.add("d-none");
                    document.querySelector(".cod_mec").innerHTML = data.cd_mec;
                    document.querySelector(".nm_unidade").innerHTML = data.nome;
                    document.querySelector(
                        ".dependencia_administrativa"
                    ).innerHTML = data.dep_administrativo;
                    document.querySelector(".logradouro").innerHTML =
                        data?.logradouro;
                    // document.querySelector(".bairro").innerHTML = data.bairro;
                    document.querySelector(".qtd_alunos").innerHTML =
                        data.qtd_alunos_matriculados;
                } else {
                    document
                        .querySelector(".informationHealth")
                        .classList.remove("d-none");
                    document
                        .querySelector(".informationEducation")
                        .classList.add("d-none");
                    document.querySelector(".cnes").innerHTML = data.cnes;
                    document.querySelector(".nomeFantasia").innerHTML =
                        data.nome_fantasia;
                    document.querySelector(".vinculoSus").innerHTML =
                        data.has_vinculo_sus ? "Sim" : "Não";
                    document.querySelector(".tpEstabelecimento").innerHTML =
                        data?.tp_estabelecimento
                            ? data?.tp_estabelecimento
                            : " - ";
                    document.querySelector(".tpUnidade").innerHTML =
                        data.tp_unidade_saude;
                }
                document.querySelector("#municipio").innerHTML = res.municipio;

                $("#modalUnidades").modal({
                    fadeDuration: 300,
                    closeClass: "icon-close",
                    closeText: "x",
                    show: true,
                });
                loading();
            },
            error: function (result) {
                console.log("Erro ao executar a chamada ajax");
                loading();
            },
        });
    }
    function handlerMarkerPin(marker) {
        switch (marker) {
            case 1:
                return "/img/markers/educacao.png";
                break;
            case 2:
                return "/img/markers/saude.png";
                break;
        }
    }

    function loading() {
        document.querySelector("#loading").classList.toggle("d-none");
    }

    function openModalDados() {
        let modalDados = $("#modaDados");
        let closeDados = $("#closeDados");
        closeDados.on("click", function () {
            modalDados.fadeOut();
            document.body.style.overflow = null;
        });
        $("#modaDados").modal({
            fadeDuration: 300,
            closeClass: "icon-close",
            closeText: "x",
            show: true,
            width: 300,
            height: 500,
        });
    }
});
