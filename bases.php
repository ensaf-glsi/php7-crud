<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bases php</title>
</head>
<body>
    <?php
        echo "Hello, World";

        $prenom = "Ahmed"; // string
        $age = 34; // int
        $taille = 1.8; // double
        $societe = false; // bool

        echo $prenom;
        echo '<br />';
        echo "<p>age : $age</p>";
        echo '<p>taille : $taille</p>';
        echo '<p>taille : ' . $taille. '</p>';

    ?>

    <p>
        prenom : <?= $prenom ?>
    </p>
    <=> 
    <p>
        prenom : <?php echo $prenom ?>
    </p>

    <?php 
        $a = 1;
        $b = 4;
        $c = 2;
        // axˆ2 + bx + c = 0
        // (-b +/- sqrt(d) ) / (2 * a)
        if ($a == 0) {
            // bx + c = 0
            // x = -c / b
            if ($b == 0) { // c = 0
                if ($c == 0) {
                    echo "La solution est R";
                } else {
                    echo "Ensemble vide";
                }
            } else {
                $x = -$c / $b;
                echo "<p>racine simple : $x</p>";
            }
        } else {
            $delta = pow($b, 2) - 4 * $a * $c;
            if ($delta > 0) {
                $x1 = (-$b + sqrt($delta) ) / (2 * $a);
                $x2 = (-$b - sqrt($delta) ) / (2 * $a);
                echo "<p>x1 = $x1, x2 = $x2</p>";
            } elseif ($delta == 0) {
                $x = -$b / (2 * $a);
                echo "<p>racine double : $x</p>";
            } else {
                echo "<p>Pas de solution dans R</p>";
            }
        }
        $n = 6; // n! = n * (n - 1) * ... * 2
        $fact = 1;
        for ($i = $n; $i > 1; $i--) {
            $fact *= $i; // <=> $fact = $fact * $i;
        }
        echo "<p>factoriel de $n est : $fact</p>";
        $n = 5; // n! = n * (n - 1) * ... * 2
        $fact = 1;
        for ($i = 2; $i <= $n; $i++) {
            $fact *= $i; // <=> $fact = $fact * $i;
        }
        echo "<p>factoriel de $n est : $fact</p>";
        // nombre premier
        $nbr = 18;
        $i = 2;
        while ($nbr % $i != 0 && $i <= ($nbr / 2)) {
            $i ++;
        }
        if ($nbr % $i == 0) {
            echo "<p>$nbr n'est pas un nombre premier</p>";
        } else {
            echo "<p>$nbr est un nombre premier</p>";
        }

        $tab1 = [3, 2, 4, 5]; // 0 est le premier elt; 3 est le dernier elt <=> array(3, 2, 4, 5)
        echo "<p>2eme element $tab1[1]</p>";
        $tab1[2] = 10;
        echo "<p>3eme element $tab1[2]</p>";
        echo "<ul>";
        for ($i = 0; $i < count($tab1); $i++) {
            echo "<li>element $i : $tab1[$i]</li>";
        }
        echo "</ul>";
        
        print_r($tab1);
        print($i);
        echo "<ul>";
        foreach($tab1 as $k => $elt) { // foreach($tab1 as $elt)
            echo "<li>element $k : $elt</li>";
        }
        echo "</ul>";

        // Tableau associatif
        // $tab1 = [0=> 3, 1 => 2, 2=> 4, 3=> 5];
        $produit = [
            "id" => 1,
            "name" => "souris",
            "pu" => 40,
            "unite" => "U"
        ];
        print_r($produit);
        foreach($produit as $k => $val) {
            echo "<p>cle : $k; valeur : $val</p>";
        }

        function estPremier($nb) {
            // $i = 2;
            // while ($nb % $i != 0 && $i <= ($nb / 2)) {
            //     $i ++;
            // }
            // if ($nb % $i == 0) {
            //     return false;
            // }
            // return true;
            $i = 2;
            while ($i <= ($nb / 2)) {
                if ($nb % $i == 0) {
                    return false;
                }
                $i ++;
            }
            return true;
        }
        $nombre = 15;
        if (estPremier($nombre)) {
            echo "<p>$nombre est un nombre premier</p>";
        } else {
            echo "<p>$nombre n'est pas un nombre premier</p>";
        }
        $max = 100;
        echo "<h1>les nombre premiers entre 2 et $max</h1>";
        echo "<ul>";
        for ($i = 2; $i < $max; $i++) {
            if (estPremier($i)) {
                echo "<li>$i</li>";
            }
        }
        echo "</ul>";
    ?>

</body>
</html>