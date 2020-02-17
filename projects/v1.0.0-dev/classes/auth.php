<?php
session_start();
class Auth{

  static function loggedUser(){
    global $db;
    if(!isset($_SESSION["USER_ID"]))
     return false;
    $id = $_SESSION["USER_ID"];
    return User::getById($id);
  }

  static function logout(){
    unset($_SESSION["USER_ID"]);
  }

  static function login($email, $password){
    if($user=user::getByEmail($email)){
      if($user["password"]!=$password) {
        return false;
      }
      else {
        $_SESSION["USER_ID"]=$user["id"];
        return $user["id"];
      }
    } else {
      return false;
    }
  }

}
