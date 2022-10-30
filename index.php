<?php
session_start();
require "DB/users.php";
require "DB/items.php";

if (!isset($_SESSION['user'])) {
  include "login.php";
} else {
  include "shop.php";
}

// login
if (isset($_POST['login'])) {
  echo "mirko";
  if (login($_POST['username'], $_POST['password'])) {
    header("Location: .");
    include "shop.php";
    exit();
  };
}

// login function
function login($username, $password) {
  global $users;
  foreach ($users as $user) {
    if ($user['username'] == $username && $user['password'] == $password) {
      $_SESSION['user'] = $username;
    } elseif ($user['username'] == "admin" && $user['password'] == "admin"){
      $_SESSION['admin'] = $username;
    }
  }
}

?>