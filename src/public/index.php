<h2>Test task for ILS company</h2>

<?php
require '../backend/Classes/Database.php';
require '../backend/Models/Delivery.php';

$db_connection = new Database('mysql','mysql', 'root', 's123123');
$connect = $db_connection->connect();
if($connect) {
    ?>
    <div>DB connected</div>
<?php
}else{
    ?>
    <div>DB is not connected</div>
<?php
};
$deliveriesObj = new Delivery($connect);
$deliveries = $deliveriesObj->getAll();

?>

<form action="../backend/Forms/insertForm.php" method="POST">

</form>


