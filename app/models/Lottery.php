<?php

namespace App\models;

class Lottery
{

    public $connection;

        public $dbTable = "sweepstake";

        public $id;
        public $number;
        public $date;
        public $name;


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

    public function getFirstLottery()
    {
        $sqlQuery = "SELECT * FROM " . $this->dbTable . " WHERE id = 1";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->execute();
        if ($stmt->rowCount() > 0){
            $arrayObj = $stmt->fetchAll(\PDO::FETCH_ASSOC)[0];

            $this->id = $arrayObj['id'];
            $this->number = $arrayObj['number'];
            $this->date = $arrayObj['date'];
            $this->name = $arrayObj['name'];

            return $arrayObj;
        }
        return $stmt;
    }







}