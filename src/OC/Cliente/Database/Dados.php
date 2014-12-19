<?php

namespace OC\Cliente\Database;
use OC\Cliente\Cliente;
use OC\Cliente\Database;

class Dados
{

    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
        $this->db->beginTransaction();
    }

    public function persist(Cliente $cliente)
    {


        try{
            if($cliente->getId() === null){

                $count = count($cliente->getEndereco());
                if($count > 1){
                    $end = $cliente->getEndereco()['Cobranca'].' - '.$cliente->getEndereco()['Residencial'];
                }else{
                    $end = $cliente->getEndereco()['Residencial'];
                }

                $SQL = "INSERT INTO cliente (nome, email, endereco, tipo, star) VALUES (:nome, :email, :endereco, :tipo, :star)";
                $stmt = $this->db->prepare($SQL);
                $stmt->execute(array(
                    'nome' => $cliente->getNome(),
                    'email' => $cliente->getEmail(),
                    'endereco' => $end,
                    'tipo' => $cliente->getTipo(),
                    'star' => $cliente->getStar()
                ));
            }else{
                $count = count($cliente->getEndereco());
                if($count > 1){
                    $end = $cliente->getEndereco()['Cobranca'].' - '.$cliente->getEndereco()['Residencial'];
                }else{
                    $end = $cliente->getEndereco()['Residencial'];
                }

                $SQL = "UPDATE cliente SET nome = :nome, email = :email, endereco = :endereco, tipo = :tipo, star = :star WHERE id = :id";
                $stmt = $this->db->prepare($SQL);
                $stmt->execute(array(
                    'id' => $cliente->getId(),
                    'nome' => $cliente->getNome(),
                    'email' => $cliente->getEmail(),
                    'endereco' => $end,
                    'tipo' => $cliente->getTipo(),
                    'star' => $cliente->getStar()
                ));
            }
        } catch (\PDOException $e) {
            $error = "Erro: " . $e->getMessage();
            $this->pdo->rollBack();
            die($error);
        }
    }

    public function flush()
    {
        $this->db->commit();
    }

    public function read()
    {
        $query = "Select * from cliente";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}