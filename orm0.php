<?php

spl_autoload_extensions('.class.php');

// Use default autoload implementation
spl_autoload_register();

// include 'Article.php';

use \domain\Article;
use repository\ArticleRepository;


// use \support\domain\AbstractPersistable;


$articleRepo = new ArticleRepository();

function ex1()
{
    global $articleRepo;
    var_dump($articleRepo->findOne(11));
    var_dump($articleRepo->findOne(1));
    echo "<br> ";
    var_dump($articleRepo->findAll());
}
function ex2()
{
    $clavier = new Article();
    $clavier->setName('Clavier querty');
    var_dump($clavier);

    echo "<br>";

    var_dump((array) $clavier);
}

function ex3()
{
    $clavier = new Article();
    $clavier->setName('Clavier querty');
    $clavier =  $GLOBALS['articleRepo']->create($clavier);
    var_dump($clavier);
}

ex3();
