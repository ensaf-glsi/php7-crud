<?php

namespace support\repository;

use \ReflectionClass;
use \support\utils\DbUtils;
use support\utils\ObjectUtils;
use support\utils\ReflectUtils;

// crud generics
abstract class AbstractRepository
{
    protected $tableName;
    private $domainName;
    protected $idName = 'id';
    // protected $fields = [];
    protected $idAuto = true;

    // function init()
    // {
    //     $reflectionClass = new ReflectionClass($this->getDomainName());
    //     $props = $reflectionClass->getProperties();
    //     foreach ($props as $prop) {
    //         $fields[] = $prop->getName();
    //     }
    //     // echo "<br> === fields : ";
    //     // var_dump($fields);
    //     // echo "<br> === fields : ";
    // }

    function findOne($id)
    {

        // echo "<br> valeur table name findone" . $this->getTableName();
        return DbUtils::findOne($this->getTableName(), $this->idName, $this->getDomainName(), $id);
    }
    function findAll()
    {
        return DbUtils::findAll($this->getTableName(), $this->getDomainName());
    }
    function create($object)
    {
        $exclude = [];
        if ($this->idAuto) {
            $exclude = [$this->idName];
        }
        $objectArray = ReflectUtils::objectToArray($object, $exclude);
        // $objectArray = array_filter($objectArray, filter, method);
        // var_dump($objectArray);
        $id = DbUtils::create($this->getTableName(), $objectArray);
        if ($this->idAuto) {
            ReflectUtils::setValue($object, $this->idName, $id);
        }
        return $object;
    }

    function update($object)
    {
    }

    function deleteById($id)
    {
    }

    function setDomainName($domainName)
    {
        $this->domainName = $domainName;
        // $this->init();
    }
    function getDomainName()
    {
        return $this->domainName;
    }
    function getTableName()
    {
        // echo "<br> get tablename : $this->tableName";
        return !empty($this->tableName) ? $this->tableName : $this->getDomainName();
    }
}
