<?php

namespace support\utils;

use \PDO;

class DbUtils
{
    static function dbConnection()
    {
        return new PDO(
            'mysql:host=localhost;dbname=commerce;charset=utf8',
            'root',
            'root',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
    }

    static function findOne($tableName, $idName, $domainName, $idValue)
    {
        // echo "<br> domainName : $domainName";
        // echo "<br> table name : $tableName";
        $bdd = self::dbConnection();
        $rs = $bdd->prepare("select * from $tableName where $idName = :$idName");
        $rs->execute([$idName => $idValue]);
        $rs->setFetchMode(PDO::FETCH_CLASS, $domainName);
        $value = $rs->fetch();
        $rs->closeCursor();
        return $value;
    }

    static function findAll($tableName, $domainName)
    {
        $bdd = self::dbConnection();
        $rs = $bdd->query("select * from $tableName");
        $list = $rs->fetchAll(PDO::FETCH_CLASS, $domainName);
        $rs->closeCursor();
        // print_r($list);
        return $list;
    }

    static function create($tableName, $entity)
    {
        $bdd = self::dbConnection();
        // $rs = $bdd->prepare("insert into {tableName}(name, pu, unite) values (:name, :pu, :unite)");
        // columns = name, pu, unite
        // values = :name, :pu, :unite
        $columns = '';
        $values = '';
        foreach ($entity as $column => $value) {
            if (strlen($columns) > 0) {
                $columns = "$columns, ";
                $values = "$values, ";
            }
            $columns = "$columns $column";
            $values .= " :$column";
        }
        // echo "<p>columns : $columns; values : $values</p>";
        $rs = $bdd->prepare("insert into $tableName($columns) values ($values)");
        $rs->execute($entity);
        $lastId = $bdd->lastInsertId();
        $rs->closeCursor();
        return $lastId;
    }
}
