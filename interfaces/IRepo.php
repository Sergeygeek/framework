<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.12.2018
 * Time: 8:35
 */

namespace app\interfaces;

use app\models\Record;

interface IRepo
{

    public function getOne(int $id);

    public function getAll();

    public function getTableName() : string;

    public function getEntityClass(): string;

    public function insert(Record $record) : bool;

    public function update(Record $record);

    public function delete(Record $record);

    public function save(Record $record);
}