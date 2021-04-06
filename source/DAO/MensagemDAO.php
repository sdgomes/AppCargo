<?php

/**
 * Description of Conexao
 *
 * https://plataforma.appcargo.com.br/
 * 
 * @author App Cargo
 */

class MensagemDAO
{
    static public function insert_message(Mensagem $msg)
    {
        try {
            $con = Conexao::Banco();
            $sql = $con->prepare("INSERT INTO mensagens(origem, destino, caminhao, carroceria, preco, dia, ton, ped) VALUES (:1, :2, :3, :4, :5, :6, :7, :8)");
            $sql->bindValue(':1', $msg->getOrigem(), PDO::PARAM_INT);
            $sql->bindValue(':2', $msg->getDestino(), PDO::PARAM_INT);
            $sql->bindValue(':3', $msg->getCarro(), PDO::PARAM_INT);
            $sql->bindValue(':4', $msg->getCarreta(), PDO::PARAM_INT);
            $sql->bindValue(':5', $msg->getValor(), PDO::PARAM_STR);
            $sql->bindValue(':6', date("Y-m-d"));
            $sql->bindValue(':7', $msg->getTon(), PDO::PARAM_INT);
            $sql->bindValue(':8', $msg->getPed(), PDO::PARAM_INT);
            $sql->execute();
        } catch (Exception $exc) {
            echo ("Erro: " . $exc);
        }
    }

    static public function select_strToId($tabela, $coluna, $valor)
    {
        try {
            $con = Conexao::Banco();
            $sql = $con->prepare("SELECT id FROM $tabela WHERE $coluna = :valor");
            $sql->bindValue(':valor', $valor, PDO::PARAM_STR);
            $sql->execute();
        } catch (Exception $exc) {
            echo ("Erro: " . $exc);
        }
        return $sql->fetch()[0];
    }
    static public function selectAll($tabela)
    {
        try {
            $con = Conexao::Banco();
            $sql = $con->prepare("SELECT * FROM $tabela WHERE 1");
            $sql->execute();
        } catch (Exception $exc) {
            echo ("Erro: " . $exc);
        }
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function select_media(Mensagem $msg)
    {
        try {
            $con = Conexao::Banco();
            $sql = $con->prepare("SELECT mensagens.ton, mensagens.caminhao AS idCarro, caminhao.carro, mensagens.carroceria AS isCarreta, carroceria.carreta, mensagens.origem AS idOri, ori.estado AS ori, mensagens.destino AS idDest, dest.estado AS dest,
            cast(exp(sum(log(CAST(mensagens.preco AS DECIMAL(10,2))))/count(*)) AS DECIMAL(10,2)) AS media,
            cast(((cast(exp(sum(log(CAST(mensagens.preco AS DECIMAL(10,2))))/count(*)) AS DECIMAL(10,2)) - (SELECT 
            cast(exp(sum(log(CAST(m.preco AS DECIMAL(10,2))))/count(*)) AS DECIMAL(10,2))
        FROM
            mensagens m 
        WHERE
            m.caminhao = mensagens.caminhao AND m.carroceria = mensagens.carroceria AND m.origem = mensagens.origem AND
            m.destino = mensagens.destino AND m.ton = mensagens.ton AND m.dia = subdate(curdate(), 1))) * 100)/ (SELECT 
            cast(exp(sum(log(CAST(m2.preco AS DECIMAL(10,2))))/count(*)) AS DECIMAL(10,2))
         FROM
            mensagens m2 
         WHERE
            m2.caminhao = mensagens.caminhao AND m2.carroceria = mensagens.carroceria AND m2.origem = mensagens.origem AND
            m2.destino = mensagens.destino AND m2.ton = mensagens.ton AND m2.dia = subdate(curdate(), 1))AS DECIMAL(10,2))AS porcentagem	
        FROM mensagens 
            INNER JOIN estados ori ON ori.id = mensagens.origem INNER JOIN estados dest ON dest.id = mensagens.destino 
            INNER JOIN caminhao ON caminhao.id = mensagens.caminhao INNER JOIN carroceria ON carroceria.id = mensagens.carroceria 
        WHERE 
            mensagens.origem = :1 AND mensagens.destino = :2 AND mensagens.caminhao = :3 AND mensagens.carroceria = :4 AND mensagens.ton = :5 AND mensagens.dia = subdate(curdate(), 0)
            GROUP BY caminhao.carro, carroceria.carreta, ori.estado, dest.estado ORDER BY porcentagem");
            $sql->bindValue(':1', $msg->getOrigem(), PDO::PARAM_INT);
            $sql->bindValue(':2', $msg->getDestino(), PDO::PARAM_INT);
            $sql->bindValue(':3', $msg->getCarro(), PDO::PARAM_INT);
            $sql->bindValue(':4', $msg->getCarreta(), PDO::PARAM_INT);
            $sql->bindValue(':5', $msg->getTon(), PDO::PARAM_INT);
            $sql->execute();
        } catch (Exception $exc) {
            echo ("Erro: " . $exc);
        }
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    static public function select_random(Mensagem $msg)
    {
        try {
            $con = Conexao::Banco();
            $sql = $con->prepare("SELECT mensagens.ton, mensagens.caminhao AS idCarro, caminhao.carro, mensagens.carroceria AS isCarreta, carroceria.carreta, mensagens.origem AS idOri, ori.estado AS ori, mensagens.destino AS idDest, dest.estado AS dest,
                cast(exp(sum(log(CAST(mensagens.preco AS DECIMAL(10,2))))/count(*)) AS DECIMAL(10,2)) AS media,
                cast(((cast(exp(sum(log(CAST(mensagens.preco AS DECIMAL(10,2))))/count(*)) AS DECIMAL(10,2)) - (SELECT 
                cast(exp(sum(log(CAST(m.preco AS DECIMAL(10,2))))/count(*)) AS DECIMAL(10,2))
            FROM
                mensagens m 
            WHERE
                m.caminhao = mensagens.caminhao AND m.carroceria = mensagens.carroceria AND m.origem = mensagens.origem AND
                m.destino = mensagens.destino AND m.dia = subdate(curdate(), 1))) * 100)/ (SELECT 
                cast(exp(sum(log(CAST(m2.preco AS DECIMAL(10,2))))/count(*)) AS DECIMAL(10,2))
             FROM
                mensagens m2 
             WHERE
                m2.caminhao = mensagens.caminhao AND m2.carroceria = mensagens.carroceria AND m2.origem = mensagens.origem AND
                m2.destino = mensagens.destino AND m2.dia = subdate(curdate(), 1))AS DECIMAL(10,2))AS porcentagem	
            FROM mensagens 
                INNER JOIN estados ori ON ori.id = mensagens.origem INNER JOIN estados dest ON dest.id = mensagens.destino 
                INNER JOIN caminhao ON caminhao.id = mensagens.caminhao INNER JOIN carroceria ON carroceria.id = mensagens.carroceria 
            WHERE 
                mensagens.carroceria = :1 AND mensagens.dia = subdate(curdate(), 0)
                GROUP BY caminhao.carro, carroceria.carreta, ori.estado, dest.estado ORDER BY porcentagem DESC LIMIT 15");
            $sql->bindValue(':1', $msg->getCarreta(), PDO::PARAM_INT);
            $sql->execute();
        } catch (Exception $exc) {
            echo ("Erro: " . $exc);
        }
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    static public function select_single_random(Mensagem $msg)
    {
        try {
            $con = Conexao::Banco();
            $sql = $con->prepare("SELECT mensagens.ton, mensagens.caminhao AS idCarro, caminhao.carro, mensagens.carroceria AS isCarreta, carroceria.carreta, mensagens.origem AS idOri, ori.estado AS ori, mensagens.destino AS idDest, dest.estado AS dest,
                cast(exp(sum(log(CAST(mensagens.preco AS DECIMAL(10,2))))/count(*)) AS DECIMAL(10,2)) AS media,
                cast(((cast(exp(sum(log(CAST(mensagens.preco AS DECIMAL(10,2))))/count(*)) AS DECIMAL(10,2)) - (SELECT 
                cast(exp(sum(log(CAST(m.preco AS DECIMAL(10,2))))/count(*)) AS DECIMAL(10,2))
            FROM
                mensagens m 
            WHERE
                m.caminhao = mensagens.caminhao AND m.carroceria = mensagens.carroceria AND m.origem = mensagens.origem AND
                m.destino = mensagens.destino AND m.dia = subdate(curdate(), 1))) * 100)/ (SELECT 
                cast(exp(sum(log(CAST(m2.preco AS DECIMAL(10,2))))/count(*)) AS DECIMAL(10,2))
             FROM
                mensagens m2 
             WHERE
                m2.caminhao = mensagens.caminhao AND m2.carroceria = mensagens.carroceria AND m2.origem = mensagens.origem AND
                m2.destino = mensagens.destino AND m2.dia = subdate(curdate(), 1))AS DECIMAL(10,2))AS porcentagem	
            FROM mensagens 
                INNER JOIN estados ori ON ori.id = mensagens.origem INNER JOIN estados dest ON dest.id = mensagens.destino 
                INNER JOIN caminhao ON caminhao.id = mensagens.caminhao INNER JOIN carroceria ON carroceria.id = mensagens.carroceria 
            WHERE 
                mensagens.carroceria = :1 AND mensagens.dia = subdate(curdate(), 0)
                GROUP BY caminhao.carro, carroceria.carreta, ori.estado, dest.estado ORDER BY RAND() DESC LIMIT 1");
            $sql->bindValue(':1', $msg->getCarreta(), PDO::PARAM_INT);
            $sql->execute();
        } catch (Exception $exc) {
            echo ("Erro: " . $exc);
        }
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
