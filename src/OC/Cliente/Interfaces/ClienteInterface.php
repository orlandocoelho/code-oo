<?php

namespace OC\Cliente\Interfaces;

interface ClienteInterface
{
    public function endereco(EnderecoInterface $endereco);
    public function tipo(TipoInterface $tipo);
}