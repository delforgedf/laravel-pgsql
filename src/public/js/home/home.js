$(document).ready(function () {
    var modal = $("#modalDialog");
    var span = $(".close");
    span.on("click", function () {
        modal.fadeOut();
    });
    var map = L.map("map").setView([-16.6869, -49.2648], 10);
    map.setMinZoom(2);

    L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution: "© OpenStreetMap contributors",
    }).addTo(map);
    getData();
    $("#filterButton").on("click", function () {
        let filter = [];
        $(".filters input, .filters select").each(function (index) {
            var input = $(this);
            if (input.val()) {
                filter.push({ name: input.attr("name"), value: input.val() });
            }
        });
        getData(filter);
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
                isLongitude(location?.latitude)
            ) {
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
        return isFinite(lat) && Math.abs(lat) <= 90;
    }

    function isLongitude(lng) {
        return isFinite(lng) && Math.abs(lng) <= 180;
    }

    function openModal(data) {
        loading();

        $.ajax({
            url: "/api/deficit_habitacional",
            type: "GET",
            data: { cod_ibge: data.cod_ibge },
            dataType: "json",
            success: function (res) {
                if (data.tp_unidade == 1) {
                    document
                        .querySelector(".informationEducation")
                        .classList.toggle("d-none");
                } else {
                    document
                        .querySelector(".informationHealth")
                        .classList.remove("d-none");
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
                    document.querySelector("#municipio").innerHTML =
                        res.municipio;
                    console.log(res.municipio);
                }
                loading();
                $(".modal").modal({
                    fadeDuration: 300,
                    closeClass: "icon-close",
                    closeText: "x",
                    show: true,
                    width: 300,
                    height: 500,
                });
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
});
