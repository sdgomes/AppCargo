<?php

/**
 * Description of Conexao
 *
 * https://plataforma.appcargo.com.br/
 * 
 * @author App Cargo
 */

class RandomViewer
{
    public function executar()
    {
        $m = new Mensagem;
        $m->setCarreta(rand(1,11));
        $array = MensagemDAO::select_random($m);
        echo json_encode($array);
    }
}
