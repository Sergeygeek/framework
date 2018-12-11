<?php

namespace app\models;

use app\interfaces\IRecord;
use app\services\Db;

abstract class Record implements IRecord
{
    protected $db;
    protected $tableName;
    protected $params;
    protected $column;
    protected $initParams;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public function setInitParams()
    {
        $this->initParams = get_object_vars($this);
        foreach ($this->initParams as $param => $value){
            if(is_object($value)){
                unset($this->initParams[$param]);
            }
        }
    }

    public function getParams()
    {
        $params = get_object_vars($this);
        foreach ($params as $param => $value){
            if(is_object($value)){
                unset($params[$param]);
            }
        }
        return $params;
    }

    public function getColumns()
    {
        return $this->column;
    }

    public static function getOne(int $id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql,  get_called_class(), [':id' => $id]);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAllObjects($sql, get_called_class());
    }

    public function delete()
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $this->id]);
    }

    public function insert(): bool
    {
        $params = [];
        $columns = [];

        foreach ($this as $key => $value) {
            if($key == 'db'){
                continue;
            }

            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }

        $columns = implode(", ", $columns);
        $placeholders = implode(", ", array_keys($params));

        $tableName = static::getTableName();
        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
        return $this->db->execute($sql, $params);
    }

    public function save()
    {
        // TODO: Implement save() method.
    }
    public function update()
    {
        $values = array_diff($this->getParams(), $this->initParams);
        var_dump($values);
    }
}