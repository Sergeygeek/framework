<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.12.2018
 * Time: 20:11
 */

namespace app\models\repos;

use app\base\App;
use app\interfaces\IRepo;
use app\models\Record;
use app\services\Db;


abstract class Repo implements IRepo
{
    protected $db;
    protected $tableName;

    public function __construct()
    {
        $this->db = static::getDb();
    }

    public function getDb()
    {
        return App::call()->db;
    }

    public function getOne(int $id): Record
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->find($sql, [':id' => $id])[0];
    }

    public function getAll(): array
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->find($sql);
    }

    public function delete(Record $record)
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return $this->db->execute($sql, [":id" => $record->id]);
    }

    public function insert(Record $record): bool
    {
        $params = [];
        $columns = [];
        foreach ($record as $key => $value) {
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

    public function find($sql, $params = [])
    {
        return $this->db->queryObject($sql, $this->getEntityClass(), $params);
    }
}