<?php

abstract class CommonAuth
{
   protected $username;
   protected $password;

   abstract function authenticate($username = '', $password = '');

}