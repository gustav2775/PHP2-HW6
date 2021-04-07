<?php


namespace app\model;

use app\engine\Db;

abstract class ModelDb extends Model
{
    abstract public static function getTableName();

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOneObject($sql, ['id' => $id], static::class);
    }
    public static function getOneArray($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOne($sql, ['id' => $id]);
    }
    public static function getOneLogin($login)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE login = :login";
        return Db::getInstance()->queryOneObject($sql, ['login' => $login], static::class);
    }
    public static function getOneHash($hash)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE hash = :hash";
        return Db::getInstance()->queryOne($sql, ['hash' => $hash]);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        echo $sql;
        return Db::getInstance()->queryAll($sql);
    }

    public static function getAllLimit($page = [])
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT 0 , ?";
        return Db::getInstance()->queryAllLimit($sql, $page);
    }

    public static function getAlltoId($id)
    {
      
            $tableName = static::getTableName();
            $sql = "SELECT * FROM {$tableName} WHERE id = :id";
            $params[':id'] = $id;

        return Db::getInstance()->queryAll($sql, $params);
    }

    public static function getAllOrders($iduser)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE iduser = :iduser";
        return Db::getInstance()->queryAll($sql, ['iduser' => $iduser]);
    }

    public function insert()
    {
        $tableName = static::getTableName();

        foreach ($this->prop as $key => $value) {
            if ($value) {
                $columns[] = $key;
                $values[] = ":" . $key;
                $params[":$key"] =  $this->$key;
            }
        }
        var_dump($columns,$values, $params);
        
        $values = implode(',', $values);
        $columns = implode(',', $columns);

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$values})";

        Db::getInstance()->execute($sql, $params);
        echo $sql;

        $this->id = Db::getInstance()->getLastId();
        return $this;
    }

    public function update()
    {
        $tableName = static::getTableName();

        $params[':id'] = $this->id;
        foreach ($this->prop as $key => $value) {
            if ($value) {
                if ($key != 'id') {
                    $columns[] = $key . "  = :" . $key;
                    $params[":$key"] =  $this->$key;
                }
            }
        }
        $columns = implode(',', $columns);
        $sql = "UPDATE `$tableName` SET $columns WHERE `id`=:id";
        Db::getInstance()->execute($sql, $params);
        return $this;
    }


    public function delete()
    {
        $tableName = static::getTableName();
        $sql = "DELETE FROM `$tableName` WHERE `id` = :id";
        Db::getInstance()->execute($sql, [':id' => $this->id]);
    }
}
