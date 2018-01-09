<?php require_once("Include/DB.php");?>

<!DOCTYPE>

<html>
	<head>
		<title>View Mothly Record</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/monthrecordstyle.css">		
	</head>
		
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2">
					<ul id="Side_Menu" class="nav nav-pills nav-stacked">
						<li><a  href="AddSpend.php" >
						<span class="glyphicon glyphicon-plus"></span>&nbsp; Add New Spend</a></li>
						<li><a class="active" href="MonthlyRecord.php">
						<span class="glyphicon glyphicon-list-alt"></span>&nbsp; View Monthly Record</a></li>	
						<li><a href="#">
						<span class="glyphicon glyphicon-calendar"></span>&nbsp; View All History</a></li>						
					</ul>
				</div><!--End of Side Area -->
				<div class="col-sm-10">
					<h1 class="text-primary">View Monthly Record</h1>
					<div class="table-responsive">
						<table class="table table-striped table-hover">
							<tr>
								<th>Payment Name</th>
								<th>Date & Time</th>
								<th>Description</th>
								<th>Payment</th>								
							</tr>
							
							<?php 
								global $selected;
								$viewQuery="SELECT * FROM monthlypayment ORDER BY datetime desc";
								$excute=mysql_query($viewQuery);
								$Total=0;
								while($dataRaw=mysql_fetch_array($excute)){
									$PaymentName=$dataRaw['paymentname'];
									$DateTime=$dataRaw['datetime'];
									$Payment=$dataRaw['payment'];
									$Description=$dataRaw['description'];
									$Total=$Total+$Payment;								
							?>
							
							<tr>
								<td><?php echo $PaymentName;?></td>
								<td><?php echo $DateTime;?></td>
								<td><?php echo $Description;?></td>
								<td><?php echo "$".$Payment;?></td>
								
							</tr>
							<?php } ?>
							<tr>
								<th style="text-align:right" colspan="3">Cost In Total:</th>								
								<td><?php echo "$"."{$Total}" ?></td>
							</tr>
						<table>
					</div><!--End of table-->	
				</div><!--End of Main Area -->
			</div>
		</div>
		
		<div  class="footer navbar-fixed-bottom" id="Footer">
			<hr><p>Created by Chao Mi | Used to Record Daily Expense</p></hr>
		</div><!--End of Footer-->			
	</body>
</html>