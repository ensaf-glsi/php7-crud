<?php
    $title = "Gestion des articles";

    require('manager/articleManger.php');
    $articleList = getAllArticle();
?>

<?php ob_start(); ?>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>Réf.</th>
            <th>Nom</th>
            <th>PU</th>
            <th>Unité</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($articleList as $article) {
        ?>
            <tr>
                <td><?= $article['id'] ?></td> 
                <td><?= $article['name'] ?></td> 
                <td><?= $article['pu'] ?></td> 
                <td><?= $article['unite'] ?></td> 
                <td>
                    edit, delete
                </td> 
           </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<?php $content = ob_get_clean(); ?>

<?php require('view/shared/template.php') ?>