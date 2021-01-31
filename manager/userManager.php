<?php
// on doit se connecter a la base de données

    require_once('db.php');

    // la recuperation de la liste des articles
    // function getAllArticle() {
    //     $bdd = dbConnection();
    //     $rs = $bdd->query("select * from article");
    //     $articleList = $rs->fetchAll();
    //     $rs->closeCursor();
    //     return $articleList;
    // }

    // recuperation d'un utilisateur par son id
    function findUserById($id) {
        $user = findOne('user', 'id', $id);
        return $user;
    }
    // recuperation d'un utilisateur par son nom d'utilisateur
    function findUserByUsername($username) {
        $user = findOne('user', 'username', $username);
        return $user;
    }

    function cryptPassword($password) {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    function createUser($user) {
        $user['password'] = cryptPassword($user['password']);
        create('user', $user);
    }

    function login($username, $password) {
        $user = findUserByUsername($username);
        if ($user && password_verify($password, $user['password'])) {
            $name = $user['name'];
            echo "<p>Bienvenu mr $name</p>";
        } else {
            echo "<p>login ou mot de passe incorrect</p>";
        }
    }

    // insertion d'un article
    function updateUser($user) {
        update('user', $user, 'id');
    }

    function deleteUser($id) {
        deleteEntity("user", "id", $id);
    }

    // createUser(
    //     ['name' => 'zouhir', 'username' => 'zouhir@gmail.com', 'password' => '123123']
    // );

    // createUser(
    //     ['name' => 'abdellah', 'username' => 'abdellah@gmail.com', 'password' => 'P@ssWord/-']
    // );

    login('zouhir@gmail.com', '123123'); // correct
    login('zouhir@gmail.com', '12123r'); // mdp incorrect
    login('zouhr@gmail.com', '123123'); // username incorrect
    login('abdellah@gmail.com', 'P@ssWord/-'); // username incorrect
?>
