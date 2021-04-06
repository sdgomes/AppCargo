<?php
/**
 * Description of Conexao
 *
 * https://plataforma.appcargo.com.br/
 * 
 * @author App Cargo
 */
 
class Conexao {

    public static function Banco() {
        try {
            $con = Conf::urlBanco();
            $pdo = new PDO($con[0], $con[1], $con[2], array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'set lc_time_names="pt_BR"'
            ));
            $pdo->query('SET NAMES utf8');
            if(isset($_SESSION)){
                $c = $pdo->prepare("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");
                $c->execute();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $pdo;
    }

}
