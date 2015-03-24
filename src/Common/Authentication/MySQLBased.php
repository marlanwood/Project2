<?php

//echo __FILE__.PHP_EOL;

namespace Common\Authentication;

define('DB_SERVER', 'localhost');
define('DB_USER', 'marlan');
define('DB_PASSWORD', 'temp123');
define('DB_NAME','users');


//include "CommonAuth.php";

class MySQLBased 
{
   private $conn;

   public function __construct($username = '', $password = '')
   {
      $this->username = $username;
      $this->password = $password;

        //$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or
        //die('There was a problem connecting to the database.');

   }

   public function authenticate($username = '', $password = '')
   {
      $db_server = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
      if (!$db_server) die("unable to connect to MySQL: ".mysql_error());
      mysqli_select_db($db_server, DB_NAME) or die('There was a problem connecting to the database.'.mysql_error());


      if ($username !== '') {
         $this->username = $username;
      }
      if ($password !== '') {
         $this->password = $password;
      }

      $query = "SELECT USERNAME, PASSWORD FROM USERS WHERE username = '$username' AND password = '$password' LIMIT 1";
      $result = mysqli_query($db_server, $query);
      //$result = mysqli_query($query);

      if (!$result) die ("Database access failed: ".mysql_error());

      //$rows = mysql_num_rows($result);
      $rows = $result->num_rows;

      if ($rows)
      {
         return true;
      } else {
         return false;
      }

/*
        if ($stmt = $this->conn->prepare($query)) {
            $stmt->bind_param('ss', $username, $password);
            $stmt->execute();

            if ($stmt->fetch()) {
                $stmt->close();
                return true;
            } else {
                $stmt->close();
                return false;
            }
        }
*/
   }
}