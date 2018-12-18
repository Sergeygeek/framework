<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.12.2018
 * Time: 20:11
 */

namespace app\models\repos;

use app\interfaces\IRepo;
use app\models\Record;
use app\services\Db;


abstract class Repo implements IRepo
{
    protected $db;
    protected $tableName;
    protected $params;
    protected $column;
    protected $initParams;

    public function __construct()
    {
        $this->db = static::getDb();
    }

    public function getDb()
    {
        return Db::getInstance();
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

    public function getOne(int $id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryObject($sql,  $this->getEntityClass(), [':id' => $id]);
    }

    public function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAllObjects($sql, $this->getEntityClass());
    }

    public function delete(Record $record)
    {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $this->id]);
    }

    public function insert(Record $record): bool
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

    public function update(Record $record)
    {
        $values = array_diff($this->getParams(), $this->initParams);
    }

    public function save(Record $record)
    {
        if(is_null($record->id)){
            $this->insert($record);
        }else{
            $this->update($record);
        }
    }

}