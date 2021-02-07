<?php

namespace support\utils;

class ObjectUtils
{
    static function obj2array($object)
    {
        $clone = (array) $object;
        $rtn = array();
        foreach ($clone as $key => $value) {
            $aux = explode("\0", $key);
            $newkey = $aux[count($aux) - 1];
            $rtn[$newkey] = $value;
        }
        return $rtn;
    }
}
