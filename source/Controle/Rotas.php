<?php

/**
 * Description of Conexao
 *
 * https://plataforma.appcargo.com.br/
 * 
 * @author App Cargo
 */

class Rotas
{
    public static function Encaminhar()
    {
        try {
            $s = $_SESSION[sha1("acaoClasse")];
            include_once $_SESSION[sha1("acaoClasse")] . ".php";
            $acao = new $s;
            $acao->executar();
            unset($_SESSION[sha1("acaoClasse")]);
        } catch (Exception $e) {
            $_SESSION['erro'] = $e;
            header("Location:index.php");
        }
    }
}
