<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<form action='update/<?= $type['id']; ?>' method='POST' class="mt-3">
    <div class="form-group">
        <label for="name">Edit Type Name:</label>
        <input type="text" name="name" class="form-control" value="<?= $type['name']; ?>">
    </div>
    <input type='submit' value='Save' class="btn btn-primary">
</form>
</body>
</html>