<?php

namespace repository;

use support\repository\AbstractRepository;

class UserRepository extends AbstractRepository
{

    function __construct()
    {
        $this->domainName = '\\domain\\User';
        $this->tableName = 'User';
    }
}
