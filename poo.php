<?php

interface Persistable
{
    function getId();
    function isNew();
}


class Entity implements Persistable
{
    protected $id; // attribut protected : accessible dans les classes filles

    function __construct($id = null)
    {
        $this->id = $id;
    }
    function getId()
    {
        return $this->id;
    }
    function setId($id)
    {
        $this->id = $id;
    }

    function isNew()
    {
        return $this->getId() == null;
    }

    protected function methP()
    {
        echo "method protected methP";
    }
    private function calcul()
    {
        echo "method private calcul";
    }

    protected function allProperties()
    {
        return ["id" => $this->id];
    }

    public function print()
    {
        // echo "<p>" . __CLASS__ .  "(id : $this->id)</p>";
        echo "<p>" . get_class($this) .  "(";
        $props = $this->allProperties();
        // $props = ["id" => $this->id];
        foreach ($props as $k => $v) {
            echo "$k : $v, ";
        }
        echo ")</p>";
    }
}


class Article extends Entity
{
    public $name; // accessible par tout
    private $pu;

    function __construct($name = "", $pu = null, $id = null)
    {
        parent::__construct($id);
        // $this->id = $id;
        $this->name = $name;
        $this->pu = $pu;
        // $this->methP();
        // $this->calcul();
    }
    function setName($_name)
    {
        // $name = $_name; // interdit
        $this->name = $_name;
    }
    function setPu($pu)
    {
        $this->pu = $pu;
    }
    function getPu()
    {
        return $this->pu;
    }
    // public function print()
    // {
    //     // echo "<p>" . __CLASS__ .  "(id : $this->id)</p>";
    //     echo "<p>Article(id : $this->id, name: $this->name, pu: $this->pu)</p>";
    // }

    protected function allProperties()
    {
        $result = parent::allProperties();
        $result["name"] = $this->name;
        $result["pu"] = $this->pu;
        return $result;
    }
}

class CategoryArticle extends Entity
{
    public $name; // accessible par tout

    function __construct($name = "", $id = null)
    {
        parent::__construct($id);
        $this->name = $name;
    }

    protected function allProperties()
    {
        $result = parent::allProperties();
        $result["name"] = $this->name;
        return $result;
    }
}

function ex1()
{
    $article = new Article();
    $clavier = new Article("Clavier");
    $souris = new Article("Souris", 40);
    $ecran = new Article("Ecran", 500, 1);

    var_dump($clavier);
    echo "<br>";
    var_dump($souris);
    echo "<br>";
    var_dump($ecran);
    echo "<br>";

    echo $ecran->getId();
    // echo $ecran->calcul();
    // echo $ecran->methP();

    // echo $ecran->name; // ok
    // echo "<br>";
    // echo $ecran->id; // erreur
    // echo "<br>";
    // echo $ecran->pu; // erreur
}

// ex1();

function ex2()
{
    $clavier = new Article("Clavier", 40, 1);
    $clavier->print();
    $fourniture = new CategoryArticle("Fourniture", 100);
    $fourniture->print();
}
// ex2();



abstract class Geometry
{
    protected $color;
    public static $staticProp = "W3Schools";

    abstract function paint();

    function getColor()
    {
        return $this->color;
    }

    public static function staticMethod()
    {
        // echo $this->color; // erreur
        // echo self::$staticProp; // ok

        echo "Hello " . self::$staticProp;
    }
}

class Line extends Geometry
{
    private $a;
    private $b;
    function paint()
    {
        echo "je suis une ligne";
    }
}

class Circle extends Geometry
{
    private $c;
    private $rayon;

    function paint()
    {
        echo "je suis un cercle";
    }
}

function ex3()
{
    $geom = new Line();
    $geom->paint();
    $geom = new Circle();
    $geom->paint();
}
// ex3();

function ex4()
{
    $clavier = new Article("Clavier", 40, 1);
    echo "<p> is new : " . $clavier->isNew() . " </p>";
    $souris = new Article("Souris", 40);
    echo "<p> is new : {$souris->isNew()} </p>";
}

// ex4();
function ex5()
{
    Geometry::staticMethod();

    echo "<h1>acces a l exterieur : </h1>";
    echo Geometry::$staticProp;
}


function getClassData($class)
{
    // Trying to create a new object of ReflectionClass class
    $class = new ReflectionClass($class);

    $details = sprintf(
        '%s - %s%s%s%s%s%s%s%s',
        $class->getName(),
        $class->isInternal()     ? 'internal class,' : 'user-defined class,',
        $class->isTrait()        ? '  is trait,'  : '',
        $class->isInterface()    ? '  is interface,'  : '',
        $class->isAbstract()     ? '  is abstract,'  : '',
        $class->isFinal()        ? '  is final,'  : '',
        $class->isCloneable()    ? '  is cloneable,'  : '',
        $class->isInstantiable() ? ' is instantiable,'  : '',
        $class->isIterateable()  ? ' is iterable'  : ''
    );
    return '<pre class="debug">' . rtrim($details, ',') . '</pre>';
}

function ex6()
{
    echo getClassData('Persistable');
    echo getClassData('Entity');
    echo getClassData('Article');
    echo getClassData('Geometry');
}

// ex6();

function ex7()
{
    // modifier dynamiquement un attribut
    $souris = new Article("Souris", 40);

    $class = new ReflectionClass(get_class($souris));
    $props = $class->getProperties();
    // var_dump($props);

    $idProp = $class->getProperty("id");
    // var_dump($idProp);
    $idProp->setAccessible(true);
    $idProp->setValue($souris, 100);

    echo "<ul>";
    foreach ($props as $prop) {
        $prop->setAccessible(true);
        echo "<li>" . $prop->getName() . '  : ' . $prop->getValue($souris) . " </li>";
    }
    echo "</ul>";
}
ex7();
