<?php
/*
 * (C) Copyright 2020 Smart Control Pro (https://smartcontrolpro.com.br/) and others.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 */

/**
 * Description of Alertas
 *
 * @author Smart Control Pro
 */

include_once './source/Util/Conf.php';
include_once './source/Conexao/Conexao.php';
include_once './source/Controle/Rotas.php';

include_once './source/Modelo/Mensagem.php';

include_once './source/DAO/MensagemDAO.php';

session_start();
if (isset($_POST[sha1("opcaoClasse")])) {
    $_SESSION[sha1("acaoClasse")] = $_POST[sha1("opcaoClasse")];
    Rotas::Encaminhar();
}

if (isset($_GET['opcaoConsulta'])) {
    $_SESSION[sha1("acaoClasse")] = $_GET['opcaoConsulta'];
    Rotas::Encaminhar();
}
if (isset($_POST['opcaoConsulta'])) {
    $_SESSION[sha1("acaoClasse")] = $_POST['opcaoConsulta'];
    Rotas::Encaminhar();
}
