<?php

namespace OC\Cliente;

use \OC\Cliente\Interfaces\ClienteInterface;
use \OC\Cliente\Interfaces\EnderecoInterface;
use \OC\Cliente\Interfaces\tipoInterface;

class Cliente implements ClienteInterface
{
    private $id;
    private $nome;
    private $email;
    private $endereco;
    private $tipo;
    private $star;


    public function endereco(EnderecoInterface $endereco)
    {
        $this->getEndereco =  $endereco;
    }

    public function tipo(tipoInterface $tipo)
    {
        $this->gettipo = $tipo;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $tipo
     */
    public function settipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function gettipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $star
     */
    public function setStar($star)
    {
        $this->star = $star;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStar()
    {
        return $this->star;
    }

}