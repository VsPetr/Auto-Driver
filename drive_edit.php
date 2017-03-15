<?php
spl_autoload_register(function ($className) {
    include $className . '.php';
});
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $drive = new Drive();
    if (isset($_GET['driver_id'])) {
        $drive->load($_GET['driver_id']);
    }
    ?>
    <form action="/drive_edit.php" method="post">
        <input type="hidden" name="driver_id" value="<?php echo $drive->getDriverId() ?>">
        <div>
            <input type="text" name="name" placeholder="Name" value="<?php echo $drive->getName() ?>">
        </div>
        <div>
            <input type="text" name="age" placeholder="age" value="<?php echo $drive->getAge() ?>">
        </div>
        <div>
            <input type="submit" value="Save">
        </div>
    </form>
    <?php
} else {
    $drive = new Drive();
    if ($_POST['driver_id']) {
        $drive->setDriverId($_POST['driver_id']);
    }
    $drive->setName($_POST['name'])
        ->setAge($_POST['age'])
        ->save();
    header('Location: /drive_list.php', false, 301);
}
?>