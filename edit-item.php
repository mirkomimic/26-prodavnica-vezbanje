<?php
if (isset($_GET['edit-item'])) {
  $id = $_GET['id'];
  $index = 0;
  for ($i = 0; $i < count($_SESSION['items']); $i++) {
      if ($_SESSION['items'][$i]['id'] == $id) {
          $index = $i;
          break;
      }
  }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Edit Item</title>
</head>
<body>
  <div class="container form-container">
    <div class="card">
      <form action="" method="post" id="edit-item-form">
        <h3>Edit Item</h3>
        <input type="hidden" name="id" id="" placeholder="name" value="<?= $_SESSION['items'][$index]['id'] ?>">
        <input type="text" name="name" id="" placeholder="name" value="<?= $_SESSION['items'][$index]['name'] ?>">
        <input type="text" name="stock" id="" placeholder="stock" value="<?= $_SESSION['items'][$index]['stock'] ?>">
        <input type="text" name="price" id="" placeholder="price" value="<?= $_SESSION['items'][$index]['price'] ?>">
        <input type="text" name="date" id="" placeholder="date" value="<?= $_SESSION['items'][$index]['date'] ?>">
        <!-- <input type="submit" value="Add Item" name="add-item"> -->
      </form><br>
      <div class="form-control">
        <input type="submit" form="edit-item-form" value="Edit Item" name="edit-item"/>
        
        <form action="?" method="">
          <input type="submit" value="Cancel"/>
        </form>
      </div>
    </div>
  </div>
</body>
</html>