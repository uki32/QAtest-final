
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="btn-group">
        <?php if ($_SESSION['logged-role'] === 'admin') { ?>
            <a href="users" class="btn btn-primary">Users Management</a>
            <a href="logs" class="btn btn-primary">View Admin and Moderator Activities</a>
                <?php } ?>
                <a href="products" class="btn btn-primary">Products Management</a>
                <a href="types" class="btn btn-primary">Product Types Management</a>
                <a href="tables" class="btn btn-primary">View Shop Statistics</a>
            </div>

        <h2>ORDERS STATISTICS</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>Order ID</th>
      <th>Username</th>
      <th>Price</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ordersData as $orderData): ?>
    <tr>
      <td><?= $orderData['id']; ?></td>
      <td><?= $orderData['username']; ?></td>
      <td><?= $orderData['order_price']; ?> $</td>
      <td><?= $orderData['created_at']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h2>USERS STATISTICS</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>User ID</th>
      <th>Money Spent</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($usersData as $userData): ?>
    <tr>
      <td><?= $userData['id']; ?></td>
      <td><?= $userData['order_price']; ?> $</td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h2>PRODUCT TYPES STATISTICS</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>Type Name</th>
      <th>Money Spent</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($typesData as $typeData): ?>
    <tr>
      <td><?= $typeData['name']; ?></td>
      <td><?= $typeData['order_price']; ?> $</td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h2>PRODUCTS STATISTICS</h2>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th>Product Name</th>
      <th>Money Spent</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($productsData as $productData): ?>
    <tr>
      <td><?= $productData['name']; ?></td>
      <td><?= $productData['order_price']; ?> $</td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


        
</body>
</html>