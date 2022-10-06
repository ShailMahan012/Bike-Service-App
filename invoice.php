<?php 
	require 'database.php';
	$order_id =  $_GET["id"];
	
	$sql_query = "SELECT * FROM orders where id=$order_id;";
	$order = $conn->query($sql_query)->fetch_assoc();
	$sql_query = "SELECT * from services WHERE order_id=$order_id";
	$services = $conn->query($sql_query);
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Bike Service Center</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				/* border: 1px solid #eee; */
				/* box-shadow: 0 0 10px rgba(0, 0, 0, 0.15); */
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: black;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #ffffff;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			tr.heading {
				background: #000000;
			}
			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<!-- <img src="https://www.sparksuite.com/images/logo.png" style="width: 100%; max-width: 300px" /> -->
								</td>

								<td>
									Invoice #: <?php echo $order_id;?><br />
									Date: <?php echo $order['date'];?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Sparksuite, Inc.<br />
									12345 Sunny Road<br />
									Sunnyville, CA 12345
								</td>

								<td>
									<?php echo $order['c_name'] . "<br>" . $order['num'];?>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<!-- <tr class="heading">
					<td>Payment Method</td>

					<td>Check #</td>
				</tr>

				<tr class="details">
					<td>Check</td>

					<td>1000</td>
				</tr> -->

				<tr class="heading" style="">
					<td>Item</td>

					<td>Price</td>
				</tr>
				<?php
					$total_price = 0;
					while($service = $services->fetch_assoc()) {
						echo "<tr class='item'>";
						echo "<td>" . $service['service'] . "</td>";
						echo "<td>" . $service['price'] . "</td>";
						echo "</tr>";
						$total_price += $service['price'];
					}
				?>
				<tr class="total">
					<td></td>

					<td>Total: <?php echo $total_price; ?></td>
				</tr>
			</table>
		</div>
		<script>
			window.print();
		</script>
	</body>
</html>
