<?php

/**
 * Description of Conexao
 *
 * https://plataforma.appcargo.com.br/
 * 
 * @author App Cargo
 */

class SingleRandomViewer
{
    public function executar()
    {
        $m = new Mensagem;
        $m->setCarreta(rand(1,11));
        $array = MensagemDAO::select_single_random($m);
        echo json_encode($array);
    }
}
