<?php

namespace Models;

use PDOStatement;
use src\classes\DatabaseConnect;

class Model extends DatabaseConnect
{

    protected $table;

    private $db;


    //preparer la requete
    public function requete(string $requestsql, array $attributs = null)
    {
        $instance = DatabaseConnect::getInstance();
        $this->db = $instance->getConnection();
        if($attributs !== null) {
            $query = $this->db->prepare($requestsql);
            $query->execute($attributs);
            return $query;
        } else {
            return $this->db->query($requestsql);
        }

    }

    //create
    public function create(array $data)
    {
        $keys = [];
        $values = [];
        $positional = [];

        foreach ($data as $key => $value) {
            $keys[] = $key;
            $positional[] = "?";
            $values[] = $value;
        }

        //convert tableau en chaine de caratère
        $keys_caraters = implode(', ', $keys);
        $positional_caraters = implode(', ', $positional);

        $query = $this->requete('INSERT INTO '.$this->table.' ('.$keys_caraters.') VALUES ('.$positional_caraters.')', $values);
        return $query;


    }

    public function findById(int $id)
    {
        return $this->requete('SELECT * FROM '.$this->table. ' WHERE id = '.$id)->fetch();
    }



    //get all
    public function getAll(): array
    {
        $query = $this->requete('SELECT * FROM users');
        return $query->fetchAll();
    }


    //delete by id
    public function deleteById(int $id)
    {
        return $this->requete('DELETE * FROM '.$this->table. ' WHERE id = ?', [$id]);
    }

    //update
    public function update (int $id, $data)
    {
        $keys = [];
        $values = [];

        foreach ($data as $key => $value) {
            $keys[] = "$key=?";
            $values[] = $value;
        }
        $values[] = $id;
        $keys_caraters = implode(', ', $keys);

        $query = $this->requete('UPDATE '.$this->table.' SET '.$keys_caraters, $values);

        return $query;
    }

}