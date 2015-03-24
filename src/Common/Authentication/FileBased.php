<?php
//echo __FILE__.PHP_EOL;

namespace Common\Authentication;
//include "CommonAuth.php";


class FileBased 
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

//$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
//$txt = "John Doe\n";
//fwrite($myfile, $txt);
//$txt = "Jane Doe\n";
//fwrite($myfile, $txt);
//fclose($myfile);

      //openFile();
      //file getcontents
      //realpath();
      //autoloader
      $filename = "auth.txt";
      $filehandle = fopen($filename, "r") or die("fail to open file");
//echo $filehandle;
//while (!feof($filehandle)) {
//	$line_of_text = fgets($filehandle);
//   echo $line_of_text.'<br>';
//}

      $fileUsername = fgets($filehandle);
      $filePassword = fgets($filehandle);
//echo '$fileUsername:'.$fileUsername.'<br>';
//echo '$filePassword:'.$filePassword.'<br>';
//echo '$username:'.$username.'<br>';
//echo '$password:'.$password.'<br>';
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
