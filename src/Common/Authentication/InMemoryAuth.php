<?php

//echo __FILE__.PHP_EOL;

include "CommonAuth.php";

class InMemoryAuth extends CommonAuth
{
   public function __construct($username = '', $password = '')
   {
      $this->username = $username;
      $this->password = $password;
   }

   public function authenticate($username = '', $password = '')
   {
      $loginCheckArray = array("username" => "Chuck",
                               "password" => "Norris");

      if ($username !== '') {
         $this->username = $username;
      }
      if ($password !== '') {
         $this->password = $password;
      }
      if ($this->username !== $loginCheckArray["username"]) {
         return false;
      }
      if ($this->password !== $loginCheckArray["password"]) {
         return false;
      }

      return true;
   }
}