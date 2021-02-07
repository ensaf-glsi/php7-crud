<?php
require('manager/db.php');

//   // Your custom class dir
// define('CLASS_DIR', '/');

// // Add your class dir to include path
// set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);

// // You can use this trick to make autoloader look for commonly used "My.class.php" type filenames

spl_autoload_extensions('.class.php');

// Use default autoload implementation
spl_autoload_register();


$clavier = new domain\Article("clavier", 50, "U", 300);
var_dump($clavier);
echo "<br>";
echo $clavier->isNew();
echo $clavier->getName();

function test()
{
  $souris = new Article("souris", 45);
  var_dump($souris);
}
function obj2array(&$Instance)
{
  $clone = (array) $Instance;
  $rtn = array();
  // $rtn['___SOURCE_KEYS_'] = $clone;

  // while ( list ($key, $value) = each ($clone) ) {
  foreach ($clone as $key => $value) {
    $aux = explode("\0", $key);
    $newkey = $aux[count($aux) - 1];
    $rtn[$newkey] = $value;
  }

  return $rtn;
}
test();
echo "<br> casting";
print_r((array) $clavier);
echo "<br> get_object_vars";
print_r(get_object_vars($clavier));
echo "<br> to array";
print_r($clavier->toArray());
echo "<br> obj2array";
print_r(obj2array($clavier));

//   function noId($v) {
//       echo $v;
//     return $k != 'id';
//   }
$bdd = dbConnection();
$rs = $bdd->prepare("insert into article(name, pu, unite) values (:name, :pu, :unite)");
$clavierArray = obj2array($clavier);
$noId = fn ($k) => $k != 'id';
$clavierArray = array_filter($clavierArray, $noId, ARRAY_FILTER_USE_KEY);
$rs->execute($clavierArray);
$rs = $bdd->prepare("select * from article");
$rs->execute();
$articleList = $rs->fetchAll(PDO::FETCH_CLASS, "Article");
var_dump($articleList);

echo "<br><br> reflection";
$articleClass = new ReflectionClass('Article');
foreach ($articleClass->getProperties() as $attribut) {
  $attribut->setAccessible(true);
  echo '<br>' . $attribut->getName(), ' => ', $attribut->getValue($clavier);
}
