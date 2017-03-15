<?php
spl_autoload_register(function ($className) {
    include $className . '.php';
});
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $auto = new Auto();
    if (isset($_GET['auto_id'])) {
        $auto->load($_GET['auto_id']);
    }
?>
<form action="/auto_edit.php" method="post">
    <input type="hidden" name="auto_id" value="<?php echo $auto->getAutoId() ?>">
    <div>
        <input type="text" name="name" placeholder="Name" value="<?php echo $auto->getName() ?>">
    </div>
    <div>
        <input type="text" name="brand" placeholder="Brand" value="<?php echo $auto->getBrand() ?>">
    </div>
    <div>
        <input type="text" name="engine" placeholder="Engine" value="<?php echo $auto->getEngine() ?>">
    </div>
    <div>
        <input type="submit" value="Save">
    </div>
</form>
<?php
} else {
    $auto = new Auto();
    if ($_POST['auto_id']) {
        $auto->setAutoId($_POST['auto_id']);
    }
    $auto->setName($_POST['name'])
        ->setBrand($_POST['brand'])
        ->setEngine($_POST['engine'])
        ->save();
    header('Location: /auto_list.php', false, 301);
}
?>