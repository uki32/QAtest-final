<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Control Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php if ($_SESSION['logged-role'] === 'admin') { ?>
            <h1>Welcome To Admin Control Panel</h1>
            <div class="btn-group">
                <a href="users" class="btn btn-primary">Users Management</a>
                <a href="products" class="btn btn-primary">Products Management</a>
                <a href="types" class="btn btn-primary">Types Management</a>
                <a href="logs" class="btn btn-primary">View Admin and Moderator Activities</a>
                <a href="tables" class="btn btn-primary">View Shop Statistics</a>
            </div>
        <?php } ?>

        <?php if ($_SESSION['logged-role'] === 'mod') { ?>
            <h1>Welcome To Moderator Control Panel</h1>
            <div class="btn-group">
                <a href="products" class="btn btn-primary">Products Management</a>
                <a href="types" class="btn btn-primary">Types Management</a>
                <a href="tables" class="btn btn-primary">View Shop Statistics</a>
            </div>
        <?php } ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>