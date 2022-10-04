<?php
require 'database.php';

$raw_json = $_POST["raw_json"];
$all_data = json_decode($raw_json, true);


$insert_sql = "INSERT INTO orders SET ";
foreach ($all_data["data"] as $data) {
    $insert_sql .= "$data[0]=\"$data[1]\", ";
}
$insert_sql = substr($insert_sql, 0, -2);
$insert_sql .= ";";

$conn->query($insert_sql);
$order_id = $conn->query("select @@IDENTITY")->fetch_assoc()["@@IDENTITY"];

if (count($all_data["services"]) > 0) {
    $insert_sql = "INSERT INTO services (service, price, order_id) VALUES ";
    foreach ($all_data["services"] as $service) {
        $insert_sql .= "(\"$service[0]\", \"$service[1]\", \"$order_id\"), ";
    }

    $insert_sql = substr($insert_sql, 0, -2);
    $insert_sql .= ";";
    // echo $insert_sql;

    $conn->query($insert_sql);
}
echo 1;
?>