<?php
require 'index.php';

$result = $mainController->calculateDeliveryCost($_POST);
?>

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

<?php
if ($result) {
    ?>
    <div>Delivery added!</div>
    <?php
} else {
    ?>
    <div>
        Cant add delivery
    </div>
<?php }
?>

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
