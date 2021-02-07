<?php

namespace support\domain;

abstract class AbstractPersistable implements Persistable
{
    protected $id;

    // function __construct($id = null)
    // {
    //     $this->id = $id;
    // }

    function getId()
    {
        return $this->id;
    }
    function setId($id)
    {
        $this->id = $id;
    }

    function isNew(): bool
    {
        return null == $this->getId();
    }

    function toArray()
    {
        return get_object_vars($this);
    }
    function __destruct()
    {
        // echo "Destruct entity " . __CLASS__ . " : $this->id.";
        // echo "Destruct entity " . get_class($this) . " : $this->id.";
    }
}
