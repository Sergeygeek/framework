<?php

namespace app\models;

use app\interfaces\IModel;

abstract class Model implements IModel
{
    protected $db;
    protected $tableName;



    public function __construct($tableName)
    {
        $this->setTableName($tableName);
    }

    public function setTableName(string $name)
    {
        $this->tableName = $name;
    }

    public function getTableName() : string
    {
        return $this->tableName;
    }

    public function getOne(int $id) : array
    {
          $sql = "SELECT * FROM {$this->getTableName()} WHERE id = {$id}";
          return $this->db->queryOne($sql);
    }

    public function getAll() : array
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return $this->db->queryAll($sql);
    }

    public function deleteFromTable(int $id) : bool
    {
        $sql = "DELETE * FROM {$this->getTableName()} WHERE id = {$id}";
        return $this->db->queryAll($sql);
    }
}