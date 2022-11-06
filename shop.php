<?php
if (isset($_GET['search-input'])) {
  $searchInput = $_GET['search-input'];
  $priceLowest = $_GET['price-lowest'];
  $priceHighest = $_GET['price-highest'];
} else {
  $searchInput = "";
  $priceLowest = "";
  $priceHighest = "";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Shop</title>
</head>
<body>
  <div class="container">
    <h1>SHOP</h1>
    <div class="logout">
      <p>Welcome: <?php echo $_SESSION['user']; ?></p>
      <div class="form-control">
        <!-- logout -->
        <form action="logout.php" method="get">
          <input type="submit" value="Logout" name="logout">
        </form>
        <!-- add item -->
        <form action="" method="get">
          <input type="submit" value="Add" name="add-item">
        </form>
      </div>
    </div>
    <div class="shop-container">
      <!-- aside -->
      <aside>
        <form class="aside-search" action="" method="get">
          <h3>Filter</h3><br>
          <input type="text" name="search-input" id="" placeholder="Search" value="<?= $searchInput; ?>"><br>
          <input type="text" name="price-lowest" id="" placeholder="Lowest price" value="<?= $priceLowest; ?>">
          <input type="text" name="price-highest" id="" placeholder="Highest price" value="<?= $priceHighest; ?>"><br>
          <!-- checkbox -->
          <fieldset>
            <legend>Category: </legend>
            <div class="form-control">
              <input class="checkbox" type="checkbox" name="category" id="asus" value="asus" <?php if (isset($_GET['category']) && $_GET['category'] == "asus") { echo "checked"; } ?>>
              <label for="asus">Asus</label>
            </div>
            <div class="form-control">
              <input class="checkbox" type="checkbox" name="category" id="acer" value="acer" <?php if (isset($_GET['category']) && $_GET['category'] == "acer") { echo "checked"; } ?>>
              <label for="acer">Acer</label>
            </div>
            <div class="form-control">
              <input class="checkbox" type="checkbox" name="category" id="benq" value="benq" <?php if (isset($_GET['category']) && $_GET['category'] == "benq") { echo "checked"; } ?>>
              <label for="benq">BenQ</label>
            </div>
            <div class="form-control">
              <input class="checkbox" type="checkbox" name="category" id="logitech" value="logitech" <?php if (isset($_GET['category']) && $_GET['category'] == "logitech") { echo "checked"; } ?>>
              <label for="logitech">Logitech</label>
            </div>
            <div class="form-control">
              <input class="checkbox" type="checkbox" name="category" id="razer" value="razer" <?php if (isset($_GET['category']) && $_GET['category'] == "razer") { echo "checked"; } ?>>
              <label for="razer">Razer</label>
            </div>
          </fieldset><br>
          <!-- select -->
          <select name="sortSelect" id="">
            <option value="" disabled selected hidden>Sort:</option>
            <option value="nameA" <?php if(isset($_GET['sortSelect']) && $_GET['sortSelect'] == "nameA") { echo "selected"; } ?>>Name &darr;</option>
            <option value="nameD" <?php if(isset($_GET['sortSelect']) && $_GET['sortSelect'] == "nameD") { echo "selected"; } ?>>Name &uarr;</option>
            <option value="priceD" <?php if(isset($_GET['sortSelect']) && $_GET['sortSelect'] == "priceD") { echo "selected"; } ?>>Price &darr;</option>
            <option value="priceA" <?php if(isset($_GET['sortSelect']) && $_GET['sortSelect'] == "priceA") { echo "selected"; } else echo ""; ?>>Price &uarr;</option>
          </select><br>
          <!-- date filter -->
            <label for="dateFrom">Date from:</label>
            <input type="date" name="" id="dateFrom" >
            <label for="dateTo">Date to:</label>
            <input type="date" name="" id="dateTo" ><br>
          <div class="form-control">
            <input type="submit" value="Reset" name="reset">
            <input type="submit" value="Search" name="search-btn">
          </div>
        </form>
      </aside>
      <!-- shop cards -->
      <section class="shop-cards">
        <?php 
        if(!isset($_SESSION['filter']))
          foreach($_SESSION['items'] as $item) {
          
        ?>
        <form action="" method="get">
          <article class="shop-card">
            <p><?= $item['id'] ?></p>
            <input type="hidden" name="id" value="<?= $item['id'] ?>">
            <div class="shop-card-img">
              <img src="https://picsum.photos/200/150" alt="slika">
            </div>
            <h3><?= $item['name'] ?></h3>
            <p class="cena">Price: <?= number_format($item['price'], 2, ",", "."); ?></p>
            <input type="submit" name="order" value="Order">
            <div class="admin-kolicina">
              <p>Stock: <?= $item['stock'] ?></p>
            </div>
            <p><?= date("d.m.y", strtotime($item['date'])) ?></p>
            <div class="form-control">
              <input type="submit" value="Edit" name="edit-item">
              <input type="submit" value="Delete" name="delete-item" id="delete-item">
            </div>
         </article>
        </form>
        <?php
         }
         else
          foreach($_SESSION['filter'] as $item) {
        ?>
        <form action="" method="get">
          <article class="shop-card">
            <p><?= $item['id'] ?></p>
            <input type="hidden" name="id" value="<?= $item['id'] ?>">
            <div class="shop-card-img">
              <img src="https://picsum.photos/200/150" alt="slika">
            </div>
            <h3><?= $item['name'] ?></h3>
            <p class="cena">Price: <?= number_format($item['price'], 2, ",", "."); ?></p>
            <input type="submit" name="order" value="Order">
            <div class="admin-kolicina">
              <p>Stock: <?= $item['stock'] ?></p>
            </div>
            <p><?= date("d.m.y", strtotime($item['date'])) ?></p>
            <div class="form-control">
              <input type="submit" value="Edit" name="edit-item">
              <input type="submit" value="Delete" name="delete-item" id="delete-item">
            </div>
         </article>
        </form>
        <?php
          }
        ?>
      </section>
    </div>
    <!-- footer -->
    <footer>
      <div>Shop</div>
    </footer>
  </div>
</body>
</html>