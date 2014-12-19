<?php
/**
 * Created by PhpStorm.
 * User: Informatica
 * Date: 27/10/14
 * Time: 14:35
 */

namespace OC\Cliente;

use OC\Cliente\Interfaces\EnderecoInterface;

class Endereco implements EnderecoInterface
{
    private $array;

    public function endereco()
    {
        $this->array[] = $this->getArray();
    }

    /**
     * @param array $array
     */
    public function setArray($array)
    {
        $this->array = $array;
    }

    /**
     * @return array
     */
    public function getArray()
    {
        return $this->array;
    }

}