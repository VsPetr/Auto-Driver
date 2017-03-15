<!doctype html>
</<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
spl_autoload_register(function ($className) {
    include $className . '.php';
});
$drive = new Drive();
$result = $drive->all();
?>
<a href="/drive_edit.php">Add New Drive</a>
<table border="1">
    <?php foreach ($result as $item): ?>
        <tr>
            <?php echo '<td>' . $item['driver_id'] . '</td><td>' . $item['name'] . '</td><td>' . $item['age'] . '</td>'; ?>
            <td>
                <a class="btn" href="/drive_edit.php?driver_id=<?php echo $item['driver_id'] ?>">Edit</a>
            </td>
            <td>
                <a class="btn" href="/drive_delete.php?driver_id=<?php echo $item['driver_id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>