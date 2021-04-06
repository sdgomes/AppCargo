<?php

/**
 * Description of Conexao
 *
 * https://plataforma.appcargo.com.br/
 * 
 * @author App Cargo
 */

class InsereAndSelect
{
    public function executar()
    {
        try {
            if (isset($_POST['message'])) {
                $tabelas = ["estados", "estados", "caminhao", "carroceria"];
                $colunas = ["estado", "estado", "carro", "carreta"];
                $array = $_POST['message'];
                for ($i = 0; $i < sizeof($array); $i++) {
                    for ($j = 0; $j < (sizeof($array[$i]) - 3); $j++) {
                        $array[$i][$j] = MensagemDAO::select_strToId($tabelas[$j], $colunas[$j], $array[$i][$j]);
                    }
                }
                for ($i = 0; $i < sizeof($array); $i++) {
                    $m = new Mensagem;
                    $m->setOrigem($array[$i][0]);
                    $m->setDestino($array[$i][1]);
                    $m->setCarro($array[$i][2]);
                    $m->setCarreta($array[$i][3]);
                    $m->setValor($array[$i][4]);
                    $m->setTon($array[$i][5]);
                    $m->setPed($array[$i][6]);
                    MensagemDAO::insert_message($m);
                }
                echo "success";
            }
        } catch (Exception $ex) {
        }
    }
}
