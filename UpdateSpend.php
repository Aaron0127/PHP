<?php require_once("Include/DB.php");?>
<?php require_once("Include/Session.php");?>

<?php 
	global $paymentname;
	global $datetime;
	global $payment;
	global $description;
	global $update_id;
	$Update_Record=$_GET['Update'];
	$ShowQuery="SELECT * FROM monthlypayment WHERE id='$Update_Record'";
	$Excute=mysql_query($ShowQuery);
	while($dataRow=mysql_fetch_array($Excute)){
		$update_id=$dataRow['id'];
		$paymentname=$dataRow['paymentname'];
		$datetime=$dataRow['datetime'];
		$payment=$dataRow['payment'];
		$description=$dataRow['description'];
	}
?>

<!DOCTYPE>

<html>
	<head>
		<title>Update Spend</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/addspendstyle.css">
	</head>

	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2">
					<ul id="Side_Menu" class="nav nav-pills nav-stacked">
						<li><a class="active" href="AddSpend.php" >
						<span class="glyphicon glyphicon-plus"></span>&nbsp; Add New Spend</a></li>
						<li><a href="MonthlyRecord.php">
						<span class="glyphicon glyphicon-list-alt"></span>&nbsp; View Monthly Record</a></li>	
						<li><a href="#">
						<span class="glyphicon glyphicon-calendar"></span>&nbsp; View All History</a></li>						
					</ul>
				</div><!--End of Side Area -->
				
				<div class="col-sm-10">
					<h1 class="text-primary">Update Spend</h1>
					<?php echo Message();
						echo SuccessMessage();?>
					<div>
						<form action="Update.php" method="POST">
							<fieldset>
								<div class="form.group">
									<label for="id"><span class="text-primary">ID:</span></label>
									<input readonly class="form-control" type="text" id="id" name="ID" value="<?php echo $update_id; ?>">
									<label for="paymentname"><span class="text-primary">Payment Name:</span></label>
									<input class="form-control" type="text" id="paymentname" name="PaymentName" value="<?php echo $paymentname; ?>">
									<label for="datetime"><span class="text-primary">Date Time:</span></label>
									<input readonly class="form-control" type="text" id="datetime" name="Datetime" value="<?php echo $datetime; ?>">
									<label for="payment"><span class="text-primary">Payment:</span></label>
									<input class="form-control" type="text" id="payment" name="Payment" value="<?php echo $payment; ?>">
									<div>
										<label for="description"><span class="text-primary">Optional Description:</span></label>
										<textarea class="form-control" name="Description" id="description"><?php echo $description; ?></textarea>
									</div><!--End of Textarea -->
								</div><!--End of form components -->
								<br>
								<input class="btn btn-primary" type="submit" name="Submit" value="Update Spend">
							</fieldset>
						</form>
					</div><!--End of Submit Form -->
				</div><!--End of Main Area -->
			</div>			
		</div>	
		<div  class="footer navbar-fixed-bottom" id="Footer">
			<hr><p>Created by Chao Mi | Used to Record Daily Expense</p></hr>
		</div><!--End of Footer-->	
	</body>
</html>
