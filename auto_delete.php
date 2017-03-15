<?php
spl_autoload_register(function ($className) {
    include $className . '.php';
});
if (isset($_GET['auto_id'])) {
    $auto = new Auto;
    $auto->setAutoId($_GET['auto_id'])
        ->delete();
}
header('Location: /auto_list.php', false, 301);
