<?php
require 'database.php';

$sql_query = "SELECT max(id) FROM orders;";
$order_id = $conn->query($sql_query)->fetch_assoc()["max(id)"];
echo $order_id+1;
?>