<?php

namespace App\models;

class Client
{

    public $connection;

        public $dbTable = "client";

        public $id;
        public $number;
        public $date;
        public $name;


    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function getClients()
    {
        $sqlQuery = "SELECT * FROM " . $this->dbTable;
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
        if ($stmt->rowCount() > 0){
            $arrayObj = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $arrayObj;
        }
    }

    public function getFirstClient()
    {
        $sqlQuery = "SELECT * FROM " . $this->dbTable . " WHERE id = 1";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            $arrayObj = $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];

            $this->id = $arrayObj['id'];
            $this->name = $arrayObj['name'];
            $this->number_1 = $arrayObj['number_1'];
            $this->number_2 = $arrayObj['number_2'];
            $this->number_3 = $arrayObj['number_3'];
            $this->number_4 = $arrayObj['number_4'];
            $this->number_5 = $arrayObj['number_5'];
            $this->number_6 = $arrayObj['number_6'];

            return $arrayObj;
        }
        return $stmt;
    }

    public function getSecondClient()
    {
        $sqlQuery = "SELECT * FROM " . $this->dbTable . " WHERE id = 2";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            $arrayObj = $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];

            $this->id = $arrayObj['id'];
            $this->name = $arrayObj['name'];
            $this->number_1 = $arrayObj['number_1'];
            $this->number_2 = $arrayObj['number_2'];
            $this->number_3 = $arrayObj['number_3'];
            $this->number_4 = $arrayObj['number_4'];
            $this->number_5 = $arrayObj['number_5'];
            $this->number_6 = $arrayObj['number_6'];

            return $arrayObj;
        }
        return $stmt;
    }

    public function getThirdClient()
    {
        $sqlQuery = "SELECT * FROM " . $this->dbTable . " WHERE id = 3";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            $arrayObj = $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];

            $this->id = $arrayObj['id'];
            $this->name = $arrayObj['name'];
            $this->number_1 = $arrayObj['number_1'];
            $this->number_2 = $arrayObj['number_2'];
            $this->number_3 = $arrayObj['number_3'];
            $this->number_4 = $arrayObj['number_4'];
            $this->number_5 = $arrayObj['number_5'];
            $this->number_6 = $arrayObj['number_6'];

            return $arrayObj;
        }
        return $stmt;
    }







}