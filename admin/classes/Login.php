<?php
// login CLASS
class LoginClass
{

  function setsession($name){

    if(!isset($_SESSION["login"]))
    {
    $_SESSION["login"] = true;
    $_SESSION["name"]  = $name;
    }

  }

}


 ?>
