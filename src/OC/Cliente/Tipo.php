<?php
/**
 * Created by PhpStorm.
 * User: Informatica
 * Date: 27/10/14
 * Time: 12:10
 */

namespace OC\Cliente;

use OC\Cliente\Interfaces\TipoInterface;

class tipo implements tipoInterface
{
    private $tipo;

    public function tipo()
    {
        $this->tipo = $this->getTipo();
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

}