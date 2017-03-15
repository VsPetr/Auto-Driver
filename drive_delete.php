<?php
spl_autoload_register(function ($className) {
    include $className . '.php';
});
if (isset($_GET['driver_id'])) {
    $auto = new Drive();
    $auto->setDriverId($_GET['driver_id'])
        ->delete();
}
header('Location: /drive_list.php', false, 301);