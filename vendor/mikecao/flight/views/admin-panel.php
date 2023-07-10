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
                <?php } ?>
                <a href="products" class="btn btn-primary">Products Management</a>
                <a href="types" class="btn btn-primary">Product Types Management</a>
                <a href="logs" class="btn btn-primary">View Admin and Moderator Activities</a>
                <a href="tables" class="btn btn-primary">View Shop Statistics</a>
            </div>

        
            <div class="col">
                <h2>Admin Panel for Users Management</h2><br>
                <h3>Users List</h3>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <td><?= $user['username'] ?></td>
                                <td>
                                    <a href='users/<?= $user['id'] ?>' class="btn btn-sm btn-primary">Edit</a>
                                    <form action='users/delete/<?= $user['id'] ?>' method='POST' class="d-inline">
                                        <input type='submit' value='Delete' class="btn btn-sm btn-danger">
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <br/>

                <h3>Add New User</h3>
                <form action='users' method='POST'>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type='text' name='username' class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type='password' name='password' class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select id="role" name="role" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="mod">Moderator</option>
                                    <option value="user">User</option>
                        </select>
                    </div>
                    <input type='submit' value='Save' class="btn btn-primary">
                </form>
            </div>
    
    </div>
</div>
</body>
</html>
