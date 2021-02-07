<?php
// on doit se connecter a la base de données

require_once('db.php');

// la recuperation de la liste des articles
function getAllArticle()
{
    $bdd = dbConnection();
    $rs = $bdd->query("select * from article");
    $articleList = $rs->fetchAll(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    return $articleList;
}

// recuperation d'un article par son id
function getArticle($id)
{
    $bdd = dbConnection();
    $rs = $bdd->prepare("select * from article where id = :id");
    $rs->execute(['id' => $id]);
    $value = $rs->fetch(PDO::FETCH_ASSOC);
    $rs->closeCursor();
    return $value;
}

// insertion d'un article
function createArticle($article)
{
    // $rs = $bdd->prepare("insert into article(name, pu, unite) values (:name, :pu, :unite)");
    create('article', $article);
}

// insertion d'un article
function updateArticle($article)
{
    // $rs = $bdd->prepare("update article set name = :name, pu = :pu, unite = :unite where id = :id");
    update('article', $article, 'id');
}

function deleteArticle($id)
{
    deleteEntity("article", "id", $id);
}

    // deleteArticle(5);

    // $article = getArticle(4);
    // $article['pu'] = 80;
    // $article['name'] = 'Clavier sans fil';
    // updateArticle($article);

    // createArticle(
    //     ['name' => 'Ecran 17', 'pu' => 1000]
    // );
    // createArticle(
    //     ['name' => 'Ecran 19', 'pu' => 1500, 'unite' => 'u']
    // );

    // $articleList = getAllArticle();

    // echo "<table>";
    // foreach ($articleList as $article) {
    //     echo "<tr>";
    //     foreach ($article as $key => $value) {
    //         if (!is_int($key)) {
    //             echo "<td>$value</td>";
    //         }
    //     }
    //     echo "</tr>";
    // }
    // echo "</table>";
    // echo "<table>";
    // while ($row = $rs->fetch()) {
    //     print_r($row);
        // echo "<tr>";
        // foreach ($row as $columnName => $value) {
        //     echo "<td>$value</td>";
        // }
        // echo "</tr>";
    // }
    // echo "</table>";
