<?php

/**
 * Description of Conexao
 *
 * https://plataforma.appcargo.com.br/
 * 
 * @author App Cargo
 */

class Mensagem
{

    private $Id;
    private $Origem;
    private $Destino;
    private $Carro;
    private $Carreta;
    private $Valor;
    private $Dia;
    private $Ton;
    private $Ped;

    function getId()
    {
        return $this->Id;
    }
    function getOrigem()
    {
        return $this->Origem;
    }
    function getDestino()
    {
        return $this->Destino;
    }
    function getCarro()
    {
        return $this->Carro;
    }
    function getCarreta()
    {
        return $this->Carreta;
    }
    function getValor()
    {
        return $this->Valor;
    }
    function getDia()
    {
        return $this->Dia;
    }

    function getTon()
    {
        return $this->Ton;
    }
    function getPed()
    {
        return $this->Ped;
    }

    function setId($Id)
    {
        $this->Id = $Id;
    }
    function setOrigem($Origem)
    {
        $this->Origem = $Origem;
    }
    function setDestino($Destino)
    {
        $this->Destino = $Destino;
    }
    function setCarro($Carro)
    {
        $this->Carro = $Carro;
    }
    function setCarreta($Carreta)
    {
        $this->Carreta = $Carreta;
    }
    function setValor($Valor)
    {
        $this->Valor = $Valor;
    }
    function setDia($Dia)
    {
        $this->Dia = $Dia;
    }
    function setTon($Ton)
    {
        $this->Ton = $Ton;
    }
    function setPed($Ped)
    {
        $this->Ped = $Ped;
    }
}
