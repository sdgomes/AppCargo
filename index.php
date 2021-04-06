<?php
include_once './source/Util/Conf.php';
include_once './source/Conexao/Conexao.php';

include_once './source/Modelo/Mensagem.php';

include_once './source/DAO/MensagemDAO.php';
include_once './source/Controle/Rotas.php';

$estados = MensagemDAO::selectAll("estados");
$carro = MensagemDAO::selectAll("caminhao");
$carreta = MensagemDAO::selectAll("carroceria");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="./images/logo_phone_color.png">
    <!-- Font -->
    <link href="./fonts/FontAwesome/stylesheet.css" rel="stylesheet">
    <!-- Style -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>AppCargo | Cotação</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="./javascript/script.js"></script>
    <script src="./javascript/receptor.js"></script>
</head>

<body>
    <div id="root" class="cotacao">
        <div id="password"></div>
        <div style="display: none;" id="mask"></div>

        <nav class="right-navigation">
            <header class="logo">
                <div class="white-logo">
                    <img src="./images/carrobranco.png" alt="Carro Logo Branco /png">
                    <h4 class="text-uppercase">AppCargo</h4>
                </div>
            </header>
            <article>
                <div class="nav-list">
                    <ul>
                        <li class="active">
                            <a href="#"><span class="nav-li li-home"></span><span>Página Inicial</span></a>
                        </li>
                        <li>
                            <a href="#"> <span class="nav-li li-oferecer-frete"></span><span>Oferecer&ensp;<span class="text-uppercase font-weight-bold">fretes</span></span></a>
                        </li>
                        <li>
                            <a href="#"><span class="nav-li li-chat"></span><span>Conversas</span></a>
                        </li>
                        <li>
                            <a href="#"><span class="nav-li li-fretes"></span><span>Renovação e Exclusão</span></a>
                        </li>
                        <li class="senha">
                            <a><span class="nav-li li-senha"></span><span>Alterar&ensp;<span class="text-uppercase font-weight-bold">senha</span></span></a>
                        </li>
                    </ul>
                </div>
                <div id="banner-stand">
                    <div class="standard">
                        <div class="banner">
                            <div class="inside-banner-container">
                            </div>
                        </div>
                        <div class="shadow action-area">
                            <button></button>
                        </div>
                    </div>
                </div>
            </article>
            <footer>
                <a href="../">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 330 330" xml:space="preserve">
                            <g id="XMLID_2_">
                                <path id="XMLID_4_" d="M51.213,180h173.785c8.284,0,15-6.716,15-15s-6.716-15-15-15H51.213l19.394-19.393   c5.858-5.857,5.858-15.355,0-21.213c-5.856-5.858-15.354-5.858-21.213,0L4.397,154.391c-0.348,0.347-0.676,0.71-0.988,1.09   c-0.076,0.093-0.141,0.193-0.215,0.288c-0.229,0.291-0.454,0.583-0.66,0.891c-0.06,0.09-0.109,0.185-0.168,0.276   c-0.206,0.322-0.408,0.647-0.59,0.986c-0.035,0.067-0.064,0.138-0.099,0.205c-0.189,0.367-0.371,0.739-0.53,1.123   c-0.02,0.047-0.034,0.097-0.053,0.145c-0.163,0.404-0.314,0.813-0.442,1.234c-0.017,0.053-0.026,0.108-0.041,0.162   c-0.121,0.413-0.232,0.83-0.317,1.257c-0.025,0.127-0.036,0.258-0.059,0.386c-0.062,0.354-0.124,0.708-0.159,1.069   C0.025,163.998,0,164.498,0,165s0.025,1.002,0.076,1.498c0.035,0.366,0.099,0.723,0.16,1.08c0.022,0.124,0.033,0.251,0.058,0.374   c0.086,0.431,0.196,0.852,0.318,1.269c0.015,0.049,0.024,0.101,0.039,0.15c0.129,0.423,0.28,0.836,0.445,1.244   c0.018,0.044,0.031,0.091,0.05,0.135c0.16,0.387,0.343,0.761,0.534,1.13c0.033,0.065,0.061,0.133,0.095,0.198   c0.184,0.341,0.387,0.669,0.596,0.994c0.056,0.088,0.104,0.181,0.162,0.267c0.207,0.309,0.434,0.603,0.662,0.895   c0.073,0.094,0.138,0.193,0.213,0.285c0.313,0.379,0.641,0.743,0.988,1.09l44.997,44.997C52.322,223.536,56.161,225,60,225   s7.678-1.464,10.606-4.394c5.858-5.858,5.858-15.355,0-21.213L51.213,180z"></path>
                                <path id="XMLID_5_" d="M207.299,42.299c-40.944,0-79.038,20.312-101.903,54.333c-4.62,6.875-2.792,16.195,4.083,20.816   c6.876,4.62,16.195,2.794,20.817-4.083c17.281-25.715,46.067-41.067,77.003-41.067C258.414,72.299,300,113.884,300,165   s-41.586,92.701-92.701,92.701c-30.845,0-59.584-15.283-76.878-40.881c-4.639-6.865-13.961-8.669-20.827-4.032   c-6.864,4.638-8.67,13.962-4.032,20.826c22.881,33.868,60.913,54.087,101.737,54.087C274.956,287.701,330,232.658,330,165   S274.956,42.299,207.299,42.299z"></path>
                            </g>
                        </svg>&ensp;Sair
                    </div>
                </a>
            </footer>
        </nav>
        <main class="containt">
            <div class="d-sm-none d-flex">
                <div class="green-logo">
                    <img src="./images/carro.png" alt="Carro Logo Branco /png">
                    <h4 class="text-uppercase">AppCargo</h4>
                </div>
                <a class="out" href="../">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 330 330" xml:space="preserve">
                            <g id="XMLID_2_">
                                <path id="XMLID_4_" d="M51.213,180h173.785c8.284,0,15-6.716,15-15s-6.716-15-15-15H51.213l19.394-19.393   c5.858-5.857,5.858-15.355,0-21.213c-5.856-5.858-15.354-5.858-21.213,0L4.397,154.391c-0.348,0.347-0.676,0.71-0.988,1.09   c-0.076,0.093-0.141,0.193-0.215,0.288c-0.229,0.291-0.454,0.583-0.66,0.891c-0.06,0.09-0.109,0.185-0.168,0.276   c-0.206,0.322-0.408,0.647-0.59,0.986c-0.035,0.067-0.064,0.138-0.099,0.205c-0.189,0.367-0.371,0.739-0.53,1.123   c-0.02,0.047-0.034,0.097-0.053,0.145c-0.163,0.404-0.314,0.813-0.442,1.234c-0.017,0.053-0.026,0.108-0.041,0.162   c-0.121,0.413-0.232,0.83-0.317,1.257c-0.025,0.127-0.036,0.258-0.059,0.386c-0.062,0.354-0.124,0.708-0.159,1.069   C0.025,163.998,0,164.498,0,165s0.025,1.002,0.076,1.498c0.035,0.366,0.099,0.723,0.16,1.08c0.022,0.124,0.033,0.251,0.058,0.374   c0.086,0.431,0.196,0.852,0.318,1.269c0.015,0.049,0.024,0.101,0.039,0.15c0.129,0.423,0.28,0.836,0.445,1.244   c0.018,0.044,0.031,0.091,0.05,0.135c0.16,0.387,0.343,0.761,0.534,1.13c0.033,0.065,0.061,0.133,0.095,0.198   c0.184,0.341,0.387,0.669,0.596,0.994c0.056,0.088,0.104,0.181,0.162,0.267c0.207,0.309,0.434,0.603,0.662,0.895   c0.073,0.094,0.138,0.193,0.213,0.285c0.313,0.379,0.641,0.743,0.988,1.09l44.997,44.997C52.322,223.536,56.161,225,60,225   s7.678-1.464,10.606-4.394c5.858-5.858,5.858-15.355,0-21.213L51.213,180z"></path>
                                <path id="XMLID_5_" d="M207.299,42.299c-40.944,0-79.038,20.312-101.903,54.333c-4.62,6.875-2.792,16.195,4.083,20.816   c6.876,4.62,16.195,2.794,20.817-4.083c17.281-25.715,46.067-41.067,77.003-41.067C258.414,72.299,300,113.884,300,165   s-41.586,92.701-92.701,92.701c-30.845,0-59.584-15.283-76.878-40.881c-4.639-6.865-13.961-8.669-20.827-4.032   c-6.864,4.638-8.67,13.962-4.032,20.826c22.881,33.868,60.913,54.087,101.737,54.087C274.956,287.701,330,232.658,330,165   S274.956,42.299,207.299,42.299z"></path>
                            </g>
                        </svg>
                        <span>Sair</span>
                    </div>
                </a>
            </div>
            <div class="header-buttons">

                <div class="tooffer">
                    <a href="#">Clique para oferecer seus&ensp;<span class="text-uppercase font-weight-bold">fretes</span> <i class="far fa-long-arrow-right"></i></a>
                </div>
            </div>
            <div class="box">
                <!--  -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-9">
                            <h5 class="text-white font-weight-bold">Cotação&ensp;<span class="text-primary">$</span>&ensp; de fretes!</h5>
                            <small><span class="text-primary" id="carro">✱✱✱✱✱✱</span> <span class="text-white" id="carreta">✱✱✱</span></small>
                        </div>
                        <div class="col-3">
                            <div class="indicator">
                                <svg class="vL6BBg" viewBox="0 0 510.8 500.2">
                                    <path id="indicator" class="SQ2ADw" d="M5.7,-0.6m492.1,250.7c0,-26.1 13,-53.8 5,-77.3 -8.2,-24.4 -36,-39.4 -51.3,-59.7 -15.5,-20.5 -21.9,-50.4 -43.2,-65.3 -21.1,-14.7 -52.6,-11.4 -77.9,-19.4 -24.5,-7.6 -47.8,-28.4 -74.9,-28.4s-50.5,20.7 -74.9,28.4c-25.3,7.9 -56.9,4.6 -78,19.4 -21.3,14.9 -27.7,44.8 -43.2,65.3 -15.4,20.3 -43.1,35.3 -51.4,59.7 -7.9,23.5 5,51.2 5,77.3s-13,53.8 -5,77.3c8.2,24.4 36,39.4 51.3,59.7 15.5,20.5 21.9,50.4 43.2,65.3 21.1,14.8 52.6,11.5 78,19.4 24.5,7.6 47.8,28.4 74.9,28.4s50.5,-20.7 74.9,-28.4c25.3,-7.9 56.9,-4.6 78,-19.4 21.3,-14.9 27.7,-44.8 43.2,-65.3 15.4,-20.3 43.1,-35.3 51.3,-59.7 8,-23.6 -5,-51.3 -5,-77.3z" fill="#cfb682"></path>
                                </svg>
                                <span id="typepayment">✱✱✱</span>
                            </div>
                        </div>
                        <div class="w-100 row mt-1">
                            <div class="col-6 d-flex align-items-end text-white">
                                <small>R$</small>&ensp;<h2 class="mb-0" id="price">0,00</h2>
                            </div>
                            <div class="col-6 d-flex align-items-end pr-0">
                                <span class="place d-flex align-items-center">Origem:&ensp;<span id="origem">✱✱</span>&emsp;<i class="far fa-long-arrow-right"></i>&emsp;Destino:&ensp;<span id="destino">✱✱</span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="box-body box-body-form">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane show active" id="conatiner" role="tabpanel" aria-labelledby="conatiner-tab">
                            <p class="pl-2 text-white text-uppercase">Visão Geral das Estimativas</p>
                            <div class="table-responsive conatiner-table">
                                <table class="mb-1 mr-auto table-striped">
                                    <thead>
                                        <tr>
                                            <th>Carro</th>
                                            <th>Carreta</th>
                                            <th>Ori.</th>
                                            <th>Dest.</th>
                                            <th>Valor</th>
                                            <th>Tipo</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="px-3 tab-pane" id="form" role="tabpanel" aria-labelledby="form-tab">
                            <small class="text-italic">Escolha a cidade de origem e destino e o tipo de caminhão e veja quanto é o valor médio dos fretes!</small>
                            <form action="" method="post">
                                <div class="row mt-3">
                                    <div class="form-group">
                                        <label for="setOrigem">Origem:</label>
                                        <select name="" id="setOrigem">
                                            <option value=""></option>
                                            <?php
                                            for ($i = 0; $i < sizeof($estados); $i++) {
                                                echo '<option value="' . $estados[$i]['id'] . '">' . $estados[$i]['estado'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mx-4">
                                        <h3 class="mb-0 text-primary"><i class="far fa-long-arrow-right"></i></h3>
                                    </div>
                                    <div class="form-group">
                                        <label for="setDestino">Destino:</label>
                                        <select name="" id="setDestino">
                                            <option value=""></option>
                                            <?php
                                            for ($i = 0; $i < sizeof($estados); $i++) {
                                                echo '<option value="' . $estados[$i]['id'] . '">' . $estados[$i]['estado'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-group-large">
                                        <label for="setCarro">Caminhão:</label>
                                        <select name="" id="setCarro">
                                            <option value=""></option>
                                            <?php
                                            for ($i = 0; $i < sizeof($carro); $i++) {
                                                echo '<option value="' . $carro[$i]['id'] . '">' . $carro[$i]['carro'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-group-large">
                                        <label for="setCarreta">Carroceria:</label>
                                        <select name="" id="setCarreta">
                                            <option value=""></option>
                                            <?php
                                            for ($i = 0; $i < sizeof($carreta); $i++) {
                                                echo '<option value="' . $carreta[$i]['id'] . '">' . $carreta[$i]['carreta'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group form-group-large">
                                        <input type="checkbox" name="" id="setTonelada">
                                        <label for="setTonelada" class="text-italic font-weight-light">Preço Por Tonelada</label>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <button type="button" name="clear" class="ml-auto btn btn-secondary">Limpar</button>
                                    <button type="button" name="consultar" class="ml-3 btn btn-primary">Pesquisar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="row">
                    <div class="col-7 px-0">
                        <div class="box-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="conatiner-tab" data-toggle="tab" href="#conatiner" role="tab" aria-controls="conatiner" aria-selected="true">
                                        <h5><i class="far fa-chevron-left"></i></h5>
                                        <span class="font-weight-bold">Clique para voltar a visão geral</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="false">
                                        <h5><i class="fas fa-search-dollar"></i></h5>
                                        <span class="font-weight-bold">Clique para consultar frete médio</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-5 pr-0">
                        <div class="box-body">
                            <a href="https://wa.me/5511964382375/" target="_blank" rel="noopener noreferrer" class="whatsappbutton">
                                <span class="font-weight-bold text-uppercase">CONTATO</span> <i class="fab fa-whatsapp"></i><br>Mande mensagem para o suporte <i class="far fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>

</html>