<?php

/**
 * Description of Conexao
 *
 * https://plataforma.appcargo.com.br/
 * 
 * @author App Cargo
 */


class RetornaMedia
{
    public function executar()
    {

        $m = new Mensagem;
        $m->setOrigem($_POST['origem']);
        $m->setDestino($_POST['destino']);
        $m->setCarro($_POST['caminhao']);
        $m->setCarreta($_POST['carreta']);
        $m->setTon($_POST['tonelada']);
        $result = MensagemDAO::select_media($m);
        echo json_encode($result);
    }
}
