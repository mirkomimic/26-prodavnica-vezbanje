<?php
session_start();
require "DB/users.php";
require "DB/items.php";


// login
if (isset($_POST['login'])) {
  if (isset($_POST['username']) && isset($_POST['password'])) {
    if (login($_POST['username'], $_POST['password'])) {
      $_SESSION['user'] = $_POST['username'];
      include "shop.php";
      exit();
    }
  }
}

if (!isset($_SESSION['user'])) {
  include "login.php";
} else {
  include "shop.php";
}


// login function
function login($username, $password) {
  global $users;

  foreach ($users as $user) {
    if ($user['username'] == $username && $user['password'] == $password) {
      return true;
    } 
  } 
  return false;
  
}

?>