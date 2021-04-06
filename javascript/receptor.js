function putOnCard(params) {
    var str = Intl.NumberFormat('pt-br', { style: 'currency', currency: 'BRL' }).format(params[0].media);

    if (params[0].ton == 0) {
        $('#indicator').css('fill', '#2d483a')
        $('#typepayment').html('Valor Cheio').css('color', '#d8d8d8')
    } else if (params[0].ton == '-') {
        $('#indicator').css('fill', '#cfb682')
        $('#typepayment').html('✱✱✱').css('color', '#0e5831')
    } else {
        $('#indicator').css('fill', '#cfb682')
        $('#typepayment').html('Por Tonelada').css('color', '#0e5831')
    }

    $("#carreta").html(params[0].carreta);
    $("#carro").html(params[0].carro + ',');
    $("#price").html(str.substring(3));
    $("#origem").html(params[0].ori);
    $("#destino").html(params[0].dest);
}

function getRandom() {

    $.ajax({
        type: "POST",
        data: { opcaoConsulta: 'RandomViewer' },
        url: "./Rotas.php",
        success: function(res) {
            res = JSON.parse(res)
            if (res.length > 0) {
                createInfo(res)
            } else {
                getRandom()
            }
        }
    });
}

function createInfo(params) {
    var tbody = "";

    $('#tbody').empty();

    putOnCard(params)

    for (let index = 1; index < (params.length); index++) {
        tbody += '<tr><td>' + params[index].carro + '</td>';
        tbody += '<td>' + params[index].carreta + '</td>'
        tbody += '<td>' + params[index].ori + '</td><td>' + params[index].dest + '</td>'
        tbody += '<td ';
        if (params[index].porcentagem > 0) {
            tbody += 'class="up">';
        } else if (params[index].porcentagem < 0) {
            tbody += 'class="down">';
        } else {
            tbody += '>'
        }
        tbody += Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(params[index].media) + '</td>';
        if (params[index].ton == 1) {
            tbody += '<td title="Por Tonelada"><svg class="vL6BBg" viewBox="0 0 510.8 500.2"><path class="SQ2ADw" d="M5.7,-0.6m492.1,250.7c0,-26.1 13,-53.8 5,-77.3 -8.2,-24.4 -36,-39.4 -51.3,-59.7 -15.5,-20.5 -21.9,-50.4 -43.2,-65.3 -21.1,-14.7 -52.6,-11.4 -77.9,-19.4 -24.5,-7.6 -47.8,-28.4 -74.9,-28.4s-50.5,20.7 -74.9,28.4c-25.3,7.9 -56.9,4.6 -78,19.4 -21.3,14.9 -27.7,44.8 -43.2,65.3 -15.4,20.3 -43.1,35.3 -51.4,59.7 -7.9,23.5 5,51.2 5,77.3s-13,53.8 -5,77.3c8.2,24.4 36,39.4 51.3,59.7 15.5,20.5 21.9,50.4 43.2,65.3 21.1,14.8 52.6,11.5 78,19.4 24.5,7.6 47.8,28.4 74.9,28.4s50.5,-20.7 74.9,-28.4c25.3,-7.9 56.9,-4.6 78,-19.4 21.3,-14.9 27.7,-44.8 43.2,-65.3 15.4,-20.3 43.1,-35.3 51.3,-59.7 8,-23.6 -5,-51.3 -5,-77.3z" fill="#cfb682"></path></svg></td>'
        } else {
            tbody += '<td title="Valor Cheio"><svg class="vL6BBg" viewBox="0 0 510.8 500.2"><path class="SQ2ADw" d="M5.7,-0.6m492.1,250.7c0,-26.1 13,-53.8 5,-77.3 -8.2,-24.4 -36,-39.4 -51.3,-59.7 -15.5,-20.5 -21.9,-50.4 -43.2,-65.3 -21.1,-14.7 -52.6,-11.4 -77.9,-19.4 -24.5,-7.6 -47.8,-28.4 -74.9,-28.4s-50.5,20.7 -74.9,28.4c-25.3,7.9 -56.9,4.6 -78,19.4 -21.3,14.9 -27.7,44.8 -43.2,65.3 -15.4,20.3 -43.1,35.3 -51.4,59.7 -7.9,23.5 5,51.2 5,77.3s-13,53.8 -5,77.3c8.2,24.4 36,39.4 51.3,59.7 15.5,20.5 21.9,50.4 43.2,65.3 21.1,14.8 52.6,11.5 78,19.4 24.5,7.6 47.8,28.4 74.9,28.4s50.5,-20.7 74.9,-28.4c25.3,-7.9 56.9,-4.6 78,-19.4 21.3,-14.9 27.7,-44.8 43.2,-65.3 15.4,-20.3 43.1,-35.3 51.3,-59.7 8,-23.6 -5,-51.3 -5,-77.3z" fill="#2d483a"></path></svg></td>'
        }
        tbody += '</tr>';
    }
    $('#tbody').html(tbody);
}
getRandom();


function getSingleRandom() {

    $.ajax({
        type: "POST",
        data: { opcaoConsulta: 'SingleRandomViewer' },
        url: "./Rotas.php",
        success: function(res) {
            res = JSON.parse(res)
            if (res.length < 1) {
                getSingleRandom()
            } else {
                var tb = '<tr>';
                tb += '<td>' + $("#carro").text() + '</td>';
                tb += '<td>' + $("#carreta").text() + '</td>';
                tb += '<td>' + $("#origem").text() + '</td>';
                tb += '<td>' + $("#destino").text() + '</td>';
                tb += '<td>R$&nbsp;' + $("#price").text() + '</td>';
                tb += '<td title="' + $('#typepayment').text() + '">' + $("#indicator").parent().prop("outerHTML") + '</td>';
                tb += '</tr>';
                $('#tbody').prepend(tb)
                if($('#tbody')[0].childElementCount > 14){
                    $('#tbody tr').last().remove()
                }
                putOnCard(res)
            }
        }
    });
}


var myInterval;

function myStartInterval() {
    myInterval = setInterval(function() { getSingleRandom() }, 5000);
}

function myStopInterval() {
    clearInterval(myInterval);
}

myStartInterval()

$(document).on('click', '#form-tab', function() {
    var cleaner = [{
        carreta: "✱✱✱✱✱✱",
        carro: "✱✱✱",
        dest: "✱✱",
        media: "00.00",
        ori: "✱✱",
        porcentagem: null,
        ton: "-",
    }]
    putOnCard(cleaner)
    myStopInterval()
});

$(document).on('click', '#conatiner-tab', function() {
    getRandom();
    myStartInterval()
});

$(document).on('click', '[name="clear"]', function() {
    var cleaner = [{
        carreta: "✱✱✱✱✱✱",
        carro: "✱✱*",
        dest: "✱✱",
        media: "00.00",
        ori: "✱✱",
        porcentagem: null,
        ton: "-",
    }]
    putOnCard(cleaner)
    $('select').prop('selectedIndex', 0);
    $('input[type="checkbox"]').prop('checked', false)
});

$(document).on('click', '[name="consultar"]', function() {
    if ($('#setOrigem').val() == '' || $('#setDestino').val() == '') {
        alert('Por favor escolha um estado e origem e destino!');
        return false;
    } else if ($('#setCarro').val() == '' || $('#setCarreta').val() == '') {
        alert("Por favor escolha um caminhão e uma carreta!");
        return false;
    } else {
        var ton = $('#setTonelada').prop('checked') == false ? 0 : 1;
        $.ajax({
            type: "POST",
            data: {
                opcaoConsulta: 'RetornaMedia',
                origem: $('#setOrigem').val(),
                destino: $('#setDestino').val(),
                caminhao: $('#setCarro').val(),
                carreta: $('#setCarreta').val(),
                tonelada: ton
            },
            url: "./Rotas.php",
            success: function(res) {
                res = JSON.parse(res)
                console.log(res);
                $('select').prop('selectedIndex', 0);
                $('input[type="checkbox"]').prop('checked', false)
                putOnCard(res)
                $('.box-body').eq(0).css('background-color', '#189453')
                setTimeout(() => {
                    $('.box-body').eq(0).removeAttr('style')
                }, 500);
            }
        });
    }
});