<?php

namespace support\utils;

use ReflectionClass;

class ReflectUtils
{
    static function getProperties($object)
    {
        $classReflection = new ReflectionClass(get_class($object));
        return $classReflection->getProperties();
    }

    static function getProperty($object, $property)
    {
        $classReflection = new ReflectionClass(get_class($object));
        return $classReflection->getProperty($property);
    }

    static function setValue($object, $property, $value)
    {
        $prop = self::getProperty($object, $property);
        $prop->setAccessible(true);
        $prop->setValue($object, $value);
        $prop->setAccessible(false);
    }

    static function objectToArray($object, $exclude = [])
    {
        $props = self::getProperties($object);
        $result = [];
        foreach ($props as $prop) {
            $propName = $prop->getName();
            if (!in_array($propName, $exclude)) {
                $prop->setAccessible(true);
                $result[$propName] = $prop->getValue($object);
                $prop->setAccessible(false);
            }
        }
        return $result;
    }
}
