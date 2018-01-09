<?php 
$connection=mysql_connect('localhost','root','');
if (!$connection) { 
    die('Could not connect: ' . mysql_error()); 
} 
echo 'Connected successfully'; 
$selected=mysql_select_db('paymentrecord',$connection);
?>