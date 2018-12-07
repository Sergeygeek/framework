<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.12.2018
 * Time: 8:35
 */

namespace app\interfaces;


interface IModel
{

    public function getOne(int $id);

    public function getAll() : array;

    public function getTableName() : string;

    public function deleteFromTable(int $id) : bool;

    public function addToTable(array $params) : bool;

    public function updateItem(int $id, $column, $value) : bool;
}