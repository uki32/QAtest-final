
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
            <a href="users" class="btn btn-primary">Users Management</a>
            <a href="products" class="btn btn-primary">Products Management</a>
            <a href="types" class="btn btn-primary">Product Types Management</a>
            <a href="tables" class="btn btn-primary">View Shop Statistics</a>
        </div>
        <h2>Recent Logs</h2> 
        <table class="table">
            <tbody>
                <?php foreach ($logs as $log) { ?>
                    <tr>
                        <td><?= $log['id'] . ". " . $log['log'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        </div>
</body>
</html>