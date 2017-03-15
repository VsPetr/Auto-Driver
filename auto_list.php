<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auto & Drivers</title>
    <style>
        .btn {
            display: inline-block;
            padding .5rem 2rem;
            margin: .3rem;
            border: 1px solid #eee;
            text-decoration: none;
            color: #444;

        }
        .btn:hover {
             background: #999;
         }
    </style>
</head>
<body>

<?php
spl_autoload_register(function ($className) {
    include $className . '.php';
});
$auto = new Auto();
$result = $auto->all();
?>
<a href="/auto_edit.php">Add New Auto</a>
<table border="1">
    <?php foreach ($result as $item): ?>
        <tr>
            <?php echo '<td>' . $item['auto_id'] . '</td><td>' . $item['name'] . '</td><td>' . $item['brand'] . '</td><td>' . $item['engine'] . '</td>'; ?>
            <td>
                <a class="btn" href="/auto_edit.php?auto_id=<?php echo $item['auto_id'] ?>">Edit</a>
            </td>
            <td>
                <a class="btn" href="/auto_delete.php?auto_id=<?php echo $item['auto_id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
