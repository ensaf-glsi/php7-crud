<?php
    $title = "Article : Ajouter/Modifier un article";
?>

<?php ob_start(); ?>
<div class="row justify-content-center">
    <div class="col-8">
        <form action="controller/article/addArticleController.php" method="POST">
            <div class="mb-3">
                <label for="id" class="form-label">Référence : </label>
                <input type="text" disabled class="form-control" id="id" name="id" />
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Désignation : </label>
                <input type="text" required class="form-control" id="name" name="name" />
            </div>
            <div class="mb-3">
                <label for="pu" class="form-label">Prix unitaire : </label>
                <input type="number" step="0" class="form-control" id="pu" name="pu" />
            </div>
            <div class="mb-3">
                <label class="form-label">Unité de vente : </label>
                <select class="form-select" name="unite">
                    <option value=''>Veuillez selectionner une unité</option>
                    <option value="u">Unité</option>
                    <option value="kg">Kg</option>
                    <option value="m">Métre</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Valider</button>
        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/shared/template.php') ?>