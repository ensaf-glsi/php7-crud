<?php

    require_once('../../manager/articleManger.php');
    
    // $article = ['name' => $_POST['name'], 'pu' => $_POST['pu']];
    createArticle($_POST);
    // print_r($_GET);
    // print_r($_POST);

    require('../../view/article/listArticle.php');
?>
