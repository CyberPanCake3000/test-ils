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
} ?>

<div style="margin-top: 20px;">
    <table border="1">
        <tr>
            <td>id</td>
            <td>weight</td>
            <td>source</td>
            <td>destination</td>
            <td>date</td>
            <td>price</td>
        </tr>

        <?php
        $deliveries = $mainController->getDeliveries();
        foreach ($deliveries as $delivery) {
            ?>
            <tr>
                <td><?php echo $delivery['id']; ?></td>
                <td><?php echo $delivery['weight']; ?></td>
                <td><?php echo $delivery['source']; ?></td>
                <td><?php echo $delivery['destination']; ?></td>
                <td><?php echo $delivery['delivery_date']; ?></td>
                <td><?php echo $delivery['price']; ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<div style="margin-top: 20px;">
    <h2>Let's add new delivery!</h2>
    <form action="insertNewDelivery.php" method="POST">
        <input aria-label="weight" type="number" placeholder="weight" id="weight" name="weight" required>
        <input aria-label="source" type="text" placeholder="source" id="source" name="source" required>
        <input aria-label="destination" type="text" placeholder="destination" id="destination" name="destination"
               required>
        <select name="selectedStrategy" id="selectedStrategy" aria-label="selectedStrategy">
            <option value="0">Fast</option>
            <option value="1">Slow</option>
        </select>
        <button type="submit">Рассчитать</button>
    </form>
</div>


