<h2>Test task for ILS company</h2>

<?php
require '../backend/Interfaces/DeliveryInterface.php';
require '../backend/Classes/SlowDelivery.php';
require '../backend/Classes/FastDelivery.php';
require '../backend/Classes/Database.php';
require '../backend/Models/Delivery.php';
require '../backend/Controllers/Controller.php';
$mainController = new Controller();
?>

<?php if ($mainController->databaseConnect()) {
    ?>
    <div>DB connected!</div>
    <?php
} else {
    ?>
    DB disconnected!
    <?php
};
$deliveries = $mainController->getDeliveries();
?>





