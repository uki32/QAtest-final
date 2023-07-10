<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ordering</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        form {
            display: inline;
        }
    </style>
</head>
<body>
    <div class="container">
<h3>Ordering:</h3>
<table>
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Add to Cart</th>
            <th>Remove from Cart</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product) { ?>
            <tr>
                <td><?= $product['name'] ?></td>
                <td><?= $product['price'] ?> $</td>
                <td>
                    <form action="add-product" method="POST" class="d-inline">
                        <input type="hidden" name="id" value="<?= $product['product_id'] ?>">
                        <input type="submit" value="Add To Cart" class="btn btn-primary btn-sm">
                    </form>
                </td>
                <td>
                    <?php if (isset($cartItems[$product['product_id']])) { ?>
                        <form action="remove-product" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?= $product['product_id'] ?>">
                            <input type="submit" value="Remove From Cart" class="btn btn-danger btn-sm">
                        </form>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<h3>Cart state:</h3>
<?php if ($cartItems) { ?>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0;
            foreach ($cartItems as $cartItem) {
                $i++; ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $cartItem['name'] ?></td>
                    <td><?= $cartItem['quantity'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
    <form method="POST" action="complete-order">
        <input type="submit" value="Complete order" class="btn btn-primary">
    </form>
<?php } else { ?>
    <p>Your cart is empty.</p>
<?php } ?>
</div>
</body>
</html>