<?php
//echo __FILE__.PHP_EOL;

//include "CommonAuth.php";

class FileBasedAuth extends CommonAuth
{
//   protected $fileUsername;
//   protected $filePassword;

   public function __construct($username = '', $password = '')
   {
      $this->username = $username;
      $this->password = $password;
   }

   public function test()
   {
      echo "hello";
   }

   public function authenticate($username = '', $password = '')
   {
      if ($username !== '') {
         $this->username = $username;
      }
      if ($password !== '') {
         $this->password = $password;
      }

      //openFile();
      //file getcontents
      //realpath();
      //autoloader
      $filename = "auth.txt";
      $filehandle = fopen($filename, "r") or die("fail to open file");
//while (!feof($filehandle)) {
//   echo fgets($filehandle).'<br>';
//}

      $fileUsername = fgets($filehandle);
      $filePassword = fgets($filehandle);
//echo 'filePassword'.$fileUsername;
//echo 'password'.$username;
      fclose($filehandle);

//echo $fileUsername;
      if (trim($fileUsername) !== $username){
         return false;
      }
      
      if (trim($filePassword) !== $password) {
         return false;
      }

      return true;
   }
}
