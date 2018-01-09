<?php require_once("Include/DB.php");?>
<?php require_once("Include/Session.php");?>

<?php 
if(isset($_POST["Submit"])){
	$PaymentName=mysql_escape_string($_POST["PaymentName"]);
	date_default_timezone_set("Australia/Adelaide");
	$currentTime=time();
	$DateTime=strftime("%Y-%m-%d %H:%M:%S",$currentTime);
	$Payment=mysql_escape_string($_POST["Payment"]);
	$Description=mysql_escape_string($_POST["Description"]);
	if(empty($PaymentName)||empty($Payment)){
		$_SESSION["ErrorMessage"]="Payment name and payment cannot be empty!";
	}else{
		global $selected;
		$Query="INSERT INTO monthlypayment(paymentname,datetime,payment,description) 
			VALUES ('$PaymentName','$DateTime','$Payment','$Description')";
			$Excute=mysql_query($Query);
			if($Excute){
				$_SESSION[SuccessMessage]="Data Saved";
			}else{
				$_SESSION["ErrorMessage"]="Fail to add date into database!";
			}
	}
	
}
?>

<!DOCTYPE>

<html>
	<head>
		<title>Add Spend</title>
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
					<h1 class="text-primary">Add New Spend</h1>
					<?php echo Message();
						echo SuccessMessage();?>
					<div>
						<form action="AddSpend.php" method="POST">
							<fieldset>
								<div class="form.group">
									<label for="paymentname"><span class="text-primary">Payment Name:</span></label>
									<input class="form-control" type="text" id="paymentname" name="PaymentName" placeholder="Payment Name">
									<label for="payment"><span class="text-primary">Payment:</span></label>
									<input class="form-control" type="text" id="payment" name="Payment" placeholder="Payment">
									<div>
										<label for="description"><span class="text-primary">Optional Description:</span></label>
										<textarea class="form-control" name="Description" id="description"></textarea>
									</div><!--End of Textarea -->
								</div><!--End of form components -->
								<br>
								<input class="btn btn-primary" type="submit" name="Submit" value="Add New Spend">
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