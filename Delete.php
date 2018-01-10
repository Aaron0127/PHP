<?php require_once("Include/DB.php"); ?>
<?php 
	$Delete_Recode=$_GET['Delete'];
	$Delete_Query="DELETE FROM monthlypayment WHERE id='$Delete_Recode'";
	$Execute=mysql_query($Delete_Query);
	if($Execute){
		header("Location: MonthlyRecord.php");
		$_SESSION[SuccessMessage]="Data Deleted";
		exit;
	}else{
		echo "Delete failed";
	}
?>