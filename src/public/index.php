<h2>Test task for ILS company</h2>

<?php
require '../backend/Controllers/Controller.php';
require '../backend/Classes/Database.php';
require '../backend/Models/Delivery.php';

$mainController = new Controller();
$mainController->databaseConnect();
?>
<table border="1">
    <tr>
        <td>id</td>
        <td>weight</td>
        <td>departure</td>
        <td>destination</td>
        <td>date</td>
    </tr>


        <?php
        $deliveries = $mainController->getDeliveries();
        foreach ($deliveries as $delivery) {
            ?>
    <tr>
            <td><?php echo $delivery['id']; ?></td>
            <td><?php echo $delivery['weight']; ?></td>
            <td><?php echo $delivery['departure']; ?></td>
            <td><?php echo $delivery['destination']; ?></td>
            <td><?php echo $delivery['delivery_date']; ?></td>
    </tr>
            <?php
        }
        ?>

</table>

<form action="addForm.php" method="POST">
    <input aria-label="weight" type="text" placeholder="weight" id="weight" name="weight"><br/>
    <input aria-label="departure" type="text" placeholder="departure" id="departure" name="departure"><br/>
    <input aria-label="destination" type="text" placeholder="destination" id="destination" name="destination"><br/>
    <select name="deliveryType" id="deliveryType" aria-label="deliveryType">
        <option value="fast">Fast</option>
        <option value="slow">Slow</option>
    </select><br/>
    <button type="submit">Рассчитать</button>
</form>


