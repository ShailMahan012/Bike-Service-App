<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body, .form-group {
                margin-bottom: 20px;
            }
            .services_input, .services_price {
                /* margin-bottom: 10px; */
                margin-bottom: 0px;
            }
            h2, h4 {
                text-align: center;
            }
            .btn {
                width: 100%;
                color: white !important;
            }
            #submit {
                margin-top: 10px;
            }
            .col-md-5 {
                margin: 6px auto;
            }
            .service_row {
                margin: auto 30px;
            }
            td {
                padding-bottom: 6px;
                vertical-align: top;
            }
            th {
                text-align: left;
                padding-left: 5px;
            }
            .row {
                justify-content: center;
            }
        </style>
    <title>Document</title>
</head>
<body>
    <?php require 'nav.html' ?>
    <main class="container">
        <h2>Enter Data</h2>
        <h4>Order ID: <label id="order_id"></label></h4>
    <div class="row">
        <div class="col-md-5">
            <label for="date">Date of Arrival</label>
            <input type="date" class="form-control  form-control-sm" id="date" placeholder="Enter Date" name="date">
        </div>
        <div class="col-md-5">
            <label for="name">Customer Name</label>
            <input type="text" class="form-control  form-control-sm" id="c_name" placeholder="Enter Name" name="c_name">
        </div>
        <div class="col-md-5">
            <label for="num">Mobile Number</label>
            <input type="number" class="form-control  form-control-sm" id="num" placeholder="Mobile Number" name="number">
        </div>
        <div class="col-md-5">
            <label for="man">Manufacturer</label>
            <input type="text" class="form-control  form-control-sm" id="man" placeholder="Manufacturer" name="manufacturer">
        </div>
        <div class="col-md-5">
            <label for="model">Bike's Model</label>
            <input type="text" class="form-control  form-control-sm" id="model" placeholder="Bike's Model" name="model">
        </div>
        <div class="col-md-5">
            <label for="plate_number">Bike's Number</label>
            <input type="text" class="form-control  form-control-sm" id="plate_number" placeholder="Mobile Number" name="plate_number">
        </div>
    </div>

    <div class="row" style="margin-top: 40px;">
        <h2>Services & Parts</h2>

        <table style="width: 94%;" class="table">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Price</th>
                    <th style="padding-left: 0;"><button id="add" class="btn btn-sm btn-info">Add</button></th>
                </tr>
            </thead>
            <tbody id="services"></tbody>
        </table>
        <span>Discount: <input class="form-control form-control-sm" id="discount" value=0 style="width: 10%;display: inline;"><b><label>PERCENTAGE</label></b></span>
        <span>Total Price: <b><label id="total_price">0</label></b></span>
        <button type="button" class="btn btn-primary" id="submit">Send All Data</button>

    </div>
    </main>

    <script src="main.js"></script>
</body>
</html>