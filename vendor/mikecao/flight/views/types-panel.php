<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
<div class="btn-group">
        <?php if ($_SESSION['logged-role'] === 'admin') { ?>
            <a href="users" class="btn btn-primary">Users Management</a>
                <?php } ?>
                <a href="products" class="btn btn-primary">Products Management</a>
                <a href="types" class="btn btn-primary">Product Types Management</a>
                <?php if ($_SESSION['logged-role'] === 'admin') { ?>
            <a href="logs" class="btn btn-primary">View Admin and Moderator Activities</a>
                <?php } ?>
                <a href="tables" class="btn btn-primary">View Shop Statistics</a>
            </div>

        <h2 class="mt-4">Admin Panel for Product Types Management</h2>
       <h3>Product Types List</h3>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($types as $type) { ?>
                        <tr>
                            <td><?= $type['name'] ?></td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href='types/<?= $type['id'] ?>' class="btn btn-sm btn-primary">Edit</a>
                                    <form action='types/delete/<?= $type['id'] ?>' method='POST' class="d-inline">
                                        <input type='submit' value='Delete' class="btn btn-sm btn-danger">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <br/>
        <h2>Add New Type</h2>
        <form action='types' method='POST'>
            <div class="form-group">
                <label for="name">Type Name:</label>
                <input type='text' name='name' class="form-control">
            </div>
            <input type='submit' value='Save' class="btn btn-primary">
        </form>
</div>
        </body>
        </html>