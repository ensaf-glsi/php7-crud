<?php

namespace domain;

use support\domain\AbstractPersistable;

class Article extends AbstractPersistable
{
  // public $id;
  private $name;
  public $pu;
  public $unite;

  // function __construct($name = "", $pu = 0, $unite = "u", $id = null)
  // {
  //   // parent::__construct($id);
  //   $this->id = $id;
  //   $this->name = $name;
  //   $this->pu = $pu;
  //   $this->unite = $unite;
  // }

  function getName()
  { // a public method
    return $this->name;
  }
  function setName($name)
  {
    $this->name = $name;
  }
  function getPu()
  {
    return $this->pu;
  }
  function setPu($pu)
  {
    $this->pu = $pu;
  }
  function toArray()
  {
    // return get_object_vars($this);
    return get_object_vars($this);
  }
}
