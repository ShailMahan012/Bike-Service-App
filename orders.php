<?php require 'database.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
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
                        echo "<td><button class='btn btn-danger' onclick=delete_order(" . $row['id'] . ")>X</button>
                                <a class='btn btn-primary' target='_blank' href='invoice.php?id=". $row['id'] . "'>Print</a>
                            </td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </main>

    <script>
    </script>
    <script>
        function delete_order(order_id) {
            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure?',
                buttons: {
                    confirm: function () {window.location.href="delete.php?id=" + order_id;},
                    cancel: function () {}
                }
            });
        }
    </script>
</body>
</html>