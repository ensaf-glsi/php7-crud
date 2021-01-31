<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />

    <title>
      <?= isset($title) ? $title : "Gestion commerciale" ?> <!-- < ? php if
      (!isset($title)) { $title = "Gestion commerciale"; } echo $title; ?> -->
    </title>
  </head>
  <body>
    <?php 
    // echo phpinfo() 
    ?>
    <div class="container-fluid">
      <?php
            require('menu.php'); //inclure un fichier
        ?>
      <?= isset($content) ? $content : "pas de contenu" ?>
      <footer>
        <div class="row justify-content-center fixed-bottom">
          ENSAF copyright 2021
        </div>
      </footer>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
