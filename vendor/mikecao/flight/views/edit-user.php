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
        <form action='update/<?= $user['id']; ?>' method='POST' class="mt-3">
            <div class="form-group">
                <label for="username">Username:</label>
                <?= $user['username']; ?>
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
            </div>
            
        </form>
    </div>
</body>
</html>