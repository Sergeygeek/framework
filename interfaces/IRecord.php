<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 02.12.2018
 * Time: 8:35
 */

namespace app\interfaces;


use app\models\Record;

interface IRecord
{

    public static function getOne(int $id);

    public static function getAll();

    public static function getTableName() : string;

    public function insert() : bool;

    public function update();

    public function delete();

    public function save();
}