<?php require 'database.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Orders</title>
    <style>
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php require 'nav.html' ?>
    <main class="container">
        <h2>Orders</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Customer Name</th>
                    <th>Mobile Number</th>
                    <th>Manufacturer</th>
                    <th>Bike's Model</th>
                    <th>Bike's Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $result = $conn->query("SELECT * FROM orders;");
                    $i = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>". $i++ . "</td>";
                        echo "<td>". $row['date'] . "</td>";
                        echo "<td>". $row['c_name'] . "</td>";
                        echo "<td>". $row['num'] . "</td>";
                        echo "<td>". $row['man'] . "</td>";
                        echo "<td>". $row['model'] . "</td>";
                        echo "<td>". $row['plate_number'] . "</td>";
                        echo "<td><a class='btn btn-danger' href='delete.php?id=". $row['id'] . "'>X</a>
                                <a class='btn btn-primary' href='print?id=". $row['id'] . "'>Print</a>
                            </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>