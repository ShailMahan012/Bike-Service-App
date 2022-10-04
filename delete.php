<?php
require 'database.php';

$id =  $_GET["id"];

$conn->query("DELETE FROM orders where id=$id;");
$conn->query("DELETE FROM services where order_id=$id;");
header("Location: orders.php");
exit();

?>