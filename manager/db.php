<?php
    function dbConnection() {
        return new PDO('mysql:host=localhost;dbname=commerce;charset=utf8', 'root', 'root',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
    }

    function check($entity) {
        $result = [];
        foreach ($entity as $key => $value) {
            $result[htmlspecialchars($key)] = htmlspecialchars($value);
        }
        return $result;

    }

    function create($tableName, $entity) {
        $entity = check($entity);
        $bdd = dbConnection();
        // $rs = $bdd->prepare("insert into {tableName}(name, pu, unite) values (:name, :pu, :unite)");
        // columns = name, pu, unite
        // values = :name, :pu, :unite
        $columns = '';
        $values = '';        
        foreach($entity as $column => $value) {
            if (strlen($columns) > 0) {
                $columns = "$columns, ";  
                $values = "$values, ";  
            }
            $columns = "$columns $column";
            $values .= " :$column";
        }
        // echo "<p>columns : $columns; values : $values</p>";
        $rs = $bdd->prepare("insert into $tableName($columns) values ($values)");
        $rs->execute($entity);
        $rs->closeCursor();
    }

    function update($tableName, $entity, $idName) {
        $entity = check($entity);
        $bdd = dbConnection();
        // $rs = $bdd->prepare("update $tableName set name = :name, pu = :pu, unite = :unite where $idName = :$idName");
        $clauseSet = '';
        foreach($entity as $column => $value) {
            if (strlen($clauseSet) > 0) {
                $clauseSet = "$clauseSet, ";
            }
            if ($column != $idName) {
                $clauseSet = "$clauseSet $column = :$column";
            }
        }
        // echo "<p>clauseSet : $clauseSet</p>";
        $rs = $bdd->prepare("update $tableName set $clauseSet where $idName = :$idName");
        $rs->execute($entity);
        $rs->closeCursor();
    }

    function deleteEntity($tableName, $idName, $idValue) {
        $bdd = dbConnection();
        $rs = $bdd->prepare("delete from $tableName where $idName = :$idName");
        $rs->execute([$idName => $idValue]);
        $rs->closeCursor();
    }

    function deleteIndexes($entity) {
        $result = [];
        foreach ($entity as $key => $value) {
            if (!is_int($key)) {
                $result[$key] = $value;
            }
        }
        return $result;
    }


?>

