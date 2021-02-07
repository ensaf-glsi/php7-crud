<?php

namespace domain;

use \support\domain\AbstractPersistable;

class User extends AbstractPersistable
{
  // public $id;
  public $username;
  public $password;
  public $name;
  public $email;
  public $phone;

  // function __construct($username = null, $password = null, $name = null, $id = null)
  // {
  //   // parent::__construct($id);
  //   $this->id = $id;
  //   $this->username = $username;
  //   $this->password = $password;
  //   $this->name = $name;
  // }

  function toArray()
  {
    // return get_object_vars($this);
    return get_object_vars($this);
  }
}
