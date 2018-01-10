<?php require_once("Include/DB.php");?>
<?php 
	if(isset($_POST['Submit'])){
		$ID=$_POST['ID'];
		$PaymentName=mysql_escape_string($_POST['PaymentName']);
		$DateTime=$_POST['Datetime'];
		$Payment=mysql_escape_string($_POST['Payment']);
		$Description=mysql_escape_string($_POST['Description']);
		if(!empty($PaymentName)){		
		$Update_Query="UPDATE monthlypayment SET paymentname='$PaymentName',datetime='$DateTime',payment='$Payment',description='$Description' 
		WHERE id='$ID'";
		$Excute=mysql_query($Update_Query);
		if($Excute){
			header("Location: MonthlyRecord.php");
			exit;
		}
		}else 
			echo "Error";
	}
?>