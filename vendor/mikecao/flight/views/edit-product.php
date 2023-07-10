<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<form action='update/<?= $product['product_id']; ?>' method='POST'>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" value="<?= $product['name']; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" name="price" class="form-control">
    </div>
    <div class="form-group">
        <label for="type">Type:</label>
        <input list="types" name="type" class="form-control">
        <datalist id="types">
            <?php foreach ($types as $type) { ?>
                <option value="<?= $type['name'] ?>">
            <?php } ?>
        </datalist>
    </div>
    <br/>
    <input type='submit' value='Save' class="btn btn-primary">
</form>
</body>
</html>