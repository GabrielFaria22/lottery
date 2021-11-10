<?php

namespace App\models;

class Card
{

    public $connection;

        public $dbTable = "card";

        public $id;
        public $client_id;
        public $number_1;
        public $number_2;
        public $number_3;
        public $number_4;
        public $number_5;
        public $number_6;


    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function getAll()
    {
        $sqlQuery = "SELECT * FROM " . $this->dbTable;
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            $arrayObj = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $arrayObj;
        }
    }

    public function getOne($id)
    {
        $sqlQuery = "SELECT * FROM " . $this->dbTable . " WHERE id=:id";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue('id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            $arrayObj = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $arrayObj;
        }
    }

    public function getFromClientId($clientId)
    {
        $sqlQuery = "SELECT * FROM " . $this->dbTable . " WHERE client_id=:client_id";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue('client_id', $clientId);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            $arrayObj = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $arrayObj;
        }
    }

    public function create($arrayValues)
    {

        $sqlQuery = "INSERT INTO " . $this->dbTable . "(
            client_id,number_1,number_2,number_3,number_4,number_5,number_6
            ) 
            VALUES(:client_id,:number_1,:number_2,:number_3,:number_4,:number_5,:number_6
            )";

        $stmt = $this->connection->prepare($sqlQuery);

        $stmt->bindValue('client_id', $arrayValues['client_id']);
        $stmt->bindValue('number_1', $arrayValues['number_1']);
        $stmt->bindValue('number_2', $arrayValues['number_2']);
        $stmt->bindValue('number_3', $arrayValues['number_3']);
        $stmt->bindValue('number_4', $arrayValues['number_4']);
        $stmt->bindValue('number_5', $arrayValues['number_5']);
        $stmt->bindValue('number_6', $arrayValues['number_6']);

        $stmt->execute();
        return $this->connection->lastInsertId();

    }




}