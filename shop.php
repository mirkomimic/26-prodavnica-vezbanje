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
      <form action="logout.php" method="get">
        <input type="submit" value="Logout" name="logout">
      </form>
      <form action="logout.php" method="get">
        <input type="submit" value="Add" name="add-item">
      </form>
    </div>
    <div class="shop-container">
      <aside></aside>

      <section class="shop-cards">
        <?php foreach($_SESSION['items'] as $item) : ?>
        <form action="" method="get">
          <article class="shop-card">
            <input type="hidden" name="id" value="<?= $item['id'] ?>">
            <div class="shop-card-img">
              <img src="https://picsum.photos/250/170" alt="slika">
            </div>
            <h3><?= $item['name'] ?></h3>
            <p class="cena">Price: <?= $item['price'] ?></p>
            <input type="submit" name="order" value="Order">
            <div class="admin-kolicina">
              <p>Stock: <?= $item['stock'] ?></p>
            </div>
            <div class="admin-shop-input">
              <input type="submit" value="Edit" name="edit-item">
            </div>
         </article>
        </form>
        <?php endforeach ; ?>
      </section>
    </div>
  </div>
</body>
</html>