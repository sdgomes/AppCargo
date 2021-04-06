$(document).on('click', '#send', function() {
    sendMessage();
});

function sendMessage() {
    var msg = $.trim($("#areaChat").text());

    if (msg != '') {
        $('.chat-list').append('<li class="reverse">' + '<div class="chat-content">' + '<div class="ml-auto btn-group dropleft">' + '<button type="button" class="btn-ellipsis" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' + '<i class="fas fa-sort-down"></i>' + '</button>' + '<div class="dropdown-menu">' + '<a class="dropdown-item" href="#Apagar">Apagar Mensagem</a>' + '</div>' + '</div>' + '<div class="message-self">' + '<div class="text-left">' + $("#areaChat").html() + '</div>' + '<div class="chat-time">sex., 19/03 7:38</div>' + '</div>' + '</li>')

        scrolled = false;
        updateScroll()
        scrolled = true;

        if (msg.match(/OFERTA DE FRETE/)) {
            var origem = msg.substring(msg.indexOf('Origem:') + 8, msg.indexOf('Origem:') + 10)
            var destino = msg.substring(msg.indexOf('Destino:') + 9, msg.indexOf('Destino:') + 11)

            var preco = msg.substring(msg.indexOf('Preço:') + 7, msg.indexOf('Veículos:'))

            var ton = preco.search("TON") > -1 ? 1 : 0;
            var ped = preco.search("PED") > -1 ? 1 : 0;
            preco = preco.split(" + ");

            if (preco[0] == "A Combinar")
                return false;

            preco[0] = preco[0].replace('.', '');
            var caminhao = msg.substring(msg.indexOf('Veículos:') + 10, msg.indexOf('Carroceria:'))
            caminhao = caminhao.split(", ")

            caminhao = removeDupla(caminhao);

            var next = msg.search(/KM:/gi) > -1 ? 'KM:' : 'Espécie:';

            var carroceria = msg.substring(msg.indexOf('Carroceria:') + 12, msg.indexOf(next))

            carroceria = carroceria.split(", ")

            var back = converteAPPCARGO(origem, destino, caminhao, carroceria, preco[0], ton, ped);

            $.ajax({
                type: "POST",
                data: { opcaoConsulta: 'InsereAndSelect', message: back },
                url: "./Rotas.php",
                success: function(res) {
                    console.log(res)
                }
            });
        }
    } else {
        alert('Escreva uma mensagem para enviar!')
    }
    $("#areaChat").empty()

}

function removeDupla(vetor) {
    var colecao = {
        leves: ['TOCO', '3/4'],
        medio: ['BITRUCK', 'TRUCK'],
        pesados: ['VANDERLÉIA', 'CARRETA LS', 'CARRETA'],
        xpesados: ['RODOTREM', 'BITREM']
    }

    for (const key in colecao) {
        var flag = 0;

        for (let i = 0; i < vetor.length; i++) {
            for (let j = 0; j < colecao[key].length; j++) {
                if (vetor[i] == colecao[key][j]) {
                    flag++;
                }
            }
        }

        var fist = colecao[key][0]
        if (flag > 1) {
            if (key == "pesados") {
                if (vetor.indexOf('CARRETA') > -1) {
                    if (vetor.indexOf('VANDERLÉIA') > -1)
                        vetor.splice(vetor.indexOf('VANDERLÉIA'), 1);

                    if (vetor.indexOf('CARRETA LS') > -1)
                        vetor.splice(vetor.indexOf('CARRETA LS'), 1);
                } else if (flag > 1) {
                    vetor.splice(vetor.indexOf('CARRETA LS'), 1);
                }
            } else {
                vetor.splice(vetor.indexOf(fist), 1);
            }
        }
    }
    return vetor;
}

function converteAPPCARGO(orig, dest, carro, carreta, preco, ton, ped) {
    var colecao = {
        'VLC': ['Caminhão VUC'],
        '3/4': ['Caminhão 3/4', 'Caminhão Toco'],
        'TOCO': ['Caminhão Toco'],
        'TRUCK': ['Caminhão Truck', 'Caminhão Traçado', 'Caminhão Bitruck'],
        'BITRUCK': ['Caminhão Bitruck'],
        'CARRETA': ['Cavalo Mecânico Toco', 'Cavalo Mecânico Trucado', 'Cavalo Mecânico Traçado'],
        'VANDERLÉIA': ['Cavalo Mecânico Trucado', 'Cavalo Mecânico Traçado'],
        'CARRETA LS': ['Cavalo Mecânico Trucado', 'Cavalo Mecânico Traçado'],
        'RODOTREM': ['Cavalo Mecânico Traçado 8x4'],
        'BITREM': ['Cavalo Mecânico Traçado 8x4']
    }
    var send = [];
    for (const key in colecao) {
        for (let i = 0; i < carro.length; i++) {
            if (key == carro[i]) {
                for (let k = 0; k < carreta.length; k++) {
                    for (let j = 0; j < colecao[key].length; j++) {
                        send.push([orig, dest, colecao[key][j], carreta[k], preco, ton, ped]);
                    }
                }
            }
        }
    }
    return send;
}