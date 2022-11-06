<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Add Item</title>
</head>
<body>
  <div class="container form-container">
    <div class="card">
      <form action="" method="post" id="add-item-form">
        <h3>Add Item</h3>
        <input type="text" name="name" id="" placeholder="name">
        <input type="text" name="stock" id="" placeholder="stock">
        <input type="text" name="price" id="" placeholder="price">
        <input type="date" name="date" id="" placeholder="date" >
        <!-- <input type="submit" value="Add Item" name="add-item"> -->
      </form><br>
      <div class="form-control">
        <input type="submit" form="add-item-form" value="Add Item" name="add-item"/>
        
        <form action="" method="">
          <input type="submit" value="Cancel"/>
        </form>
      </div>
    </div>
  </div>
</body>
</html>