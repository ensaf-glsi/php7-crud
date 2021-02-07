<?php

namespace support\domain;

interface Persistable
{
    function getId();
    function isNew(): bool;
}
