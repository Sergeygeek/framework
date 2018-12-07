<?php

namespace app\models;

use app\interfaces\IModel;
use app\services\Db;

abstract class Model implements IModel
{
    protected $db;
    protected $tableName;
    protected $params;
    protected $column;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function getTableName() : string
    {
        return $this->tableName;
    }

    public function getColumns()
    {
        return $this->column;
    }

    public function getOne(int $id)
    {
        $this->id = $id;
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $id]);
    }

    public function setParams()
    {
        return $this->params;
    }

    public function getAll() : array
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

    public function deleteFromTable(int $id) : bool
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $id]);
    }

    public function addToTable(array $params): bool
    {
        $column = $this->getColumns();
        $values = implode(',', array_keys($params));
        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} ($column) VALUES ($values)";
        return $this->db->execute($sql, $params);
    }

    public function updateItem(int $id, $col, $colValue): bool
    {
        $tableName = $this->getTableName();
        $sql = "UPDATE {$tableName} SET $col = :colValue WHERE id = :id";
        return $this->db->execute($sql, [':id' => $id, ':colValue' => $colValue]);
    }
}