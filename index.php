<?php
session_start();
require "DB/users.php";
require "DB/items.php";


// reset aside form search
if (isset($_GET['reset'])) {
  sort($_SESSION['items']);
  unset($_SESSION['filter']);
  header("Location: .");
  exit();
}

// text filter
if (isset($_GET['search-btn'])) {
 
  if(isset($_GET['search-input']) && !empty($_GET['search-input'])) {
    $_SESSION['filter'] = [];
    foreach($_SESSION['items'] as $item) {
      if (str_contains(strtolower($item['name']), $_GET['search-input'])) {
        $_SESSION['filter'][] = $item;
      }
    }
    include "shop.php";
    exit();  
  // price search
  } else if ((isset($_GET['price-lowest']) || isset($_GET['price-highest'])) && (!empty($_GET['price-lowest']) || !empty($_GET['price-highest']))) {
    $_SESSION['filter'] = [];
    $lowest = $highest = 0;
    if(!empty($_GET['price-lowest'])) {
      $lowest = intval($_GET['price-lowest']);
    } else {
      $lowest = 0;
    }
    if(!empty($_GET['price-highest'])) {
      $highest = intval($_GET['price-highest']);
    } else {
      $highest = 1000000;
    }
    foreach($_SESSION['items'] as $item) {
      if ($item['price'] >= $lowest && ($item['price'] <= $highest)) {
        $_SESSION['filter'][] = $item;
      }
    }
    // header("Location: .");
    include "shop.php";
    exit();
    // SORT FROM SELECT
  } elseif (isset($_GET['sortSelect'])) {
    // $_SESSION['filter'] = [];
    if ($_GET['sortSelect'] == "nameA") {
      usort($_SESSION['items'], function ($a, $b) {
        return strcmp($a['name'], $b['name']);
      });
    } else if($_GET['sortSelect'] == "nameD") {
      usort($_SESSION['items'], function ($a, $b) {
        return strcmp($b['name'], $a['name']);
      });
    } else if($_GET['sortSelect'] == "priceD") {
      usort($_SESSION['items'], function ($a, $b) {
        return strcmp($b['price'], $a['price']);
      });
    } else if($_GET['sortSelect'] == "priceA") {
      usort($_SESSION['items'], function ($a, $b) {
        return strcmp($a['price'], $b['price']);
      });
    }
    include "shop.php";
    exit();
    // checkbox search
  } elseif (isset($_GET['category']))  {
    $_SESSION['filter'] = [];
    foreach($_SESSION['items'] as $item) {
      if (str_contains(strtolower($item['name']), $_GET['category'])) {
        $_SESSION['filter'][] = $item;
      }
    }
    include "shop.php";
    exit();  
  }
  // $_SESSION['filter'] = $_SESSION['items'];
  unset($_SESSION['filter']);
  header("Location: .");
  // include "shop.php";
  exit();
}
// end filter

// edit-item
if (isset($_POST['edit-item'])) {
  for ($i=0; $i < count($_SESSION['items']) ; $i++) { 
    if ($_SESSION['items'][$i]['id'] == $_POST['id']) {

      $_SESSION['items'][$i]['name'] = $_POST['name'];
      $_SESSION['items'][$i]['stock'] = $_POST['stock'];
      $_SESSION['items'][$i]['price'] = $_POST['price'];
      $_SESSION['items'][$i]['date'] = $_POST['date'];
      break;

    }
  }
  header("Location: .");
  exit();
}

if (isset($_GET['edit-item'])) {
  include "edit-item.php";
  exit();
}

// delete item
if (isset($_GET['delete-item'])) {
  for ($i = 0; $i < count($_SESSION['items']); $i++) {
      if ($_SESSION['items'][$i]['id'] == $_GET['id']) {
          array_splice($_SESSION['items'], $i, 1);
         // unset($_SESSION['timovi-search']); //ovo dodaj tek kad odradis SEARCH
          header("Location: .");
          exit();
      }
  }
}


// add item
if (isset($_POST['add-item'])) {
  $_SESSION['items'][] = array(
    "id" => maxID() + 1,
    "name" => $_POST['name'],
    "stock" => $_POST['stock'],
    "price" => $_POST['price'],
    "date" => date("d.m.y", strtotime($_POST['date'])),
  );
  header("Location: .");
  include "shop.php";
  exit();
}

if (isset($_GET['add-item'])) {
  include "add-item.php";
  exit();
}


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
function maxID() {
  // global $_SESSION['items'];
  $idjevi = [];
  foreach ($_SESSION['items'] as $item) {
    $idjevi[] = $item['id'];
  }
  return max($idjevi);
}
?>