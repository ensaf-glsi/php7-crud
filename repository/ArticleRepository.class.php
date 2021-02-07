<?php

namespace repository;

use support\repository\AbstractRepository;

class ArticleRepository extends AbstractRepository
{

    function __construct()
    {
        // parent::__construct();
        $this->setDomainName('\\domain\\Article');
        $this->tableName = 'Article';
    }
}
