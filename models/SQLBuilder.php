<?php

//namespace MsibiQueryBuilder;

class SQLBuilder extends DBConnection{

    private $tablename = '';
    private $connection = null;
    private $statement = null;

    public function __construct($tablename) {

        if (empty($tablename)) return;

        $this->tablename = $tablename;
        $this->connection = DBConnection::getConnection();

    }

    public function commit() {


    
    }

    public function update() {
    
    }

    public function getAll() {

        $sql = "SELECT * FROM {$this->tablename}";
        $this->statement = $this->connection->prepare($sql);
        $result = $this->statement->execute();
        $result = $this->statement->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public function getById($id = 0) {
        
        $sql = "SELECT * FROM {$this->tablename} WHERE id = :id";
        $this->statement = $this->connection->prepare($sql);
        $this->statement->bindParam('id', $id);
        $result = $this->statement->execute();
        $result = $this->statement->fetch(PDO::FETCH_OBJ);
        return $result;
    }
}
