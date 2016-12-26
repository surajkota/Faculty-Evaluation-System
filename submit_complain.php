<?php
session_start();
include("includes/config_db.php");

if(isset($_POST['submit']))
{

	
		
		$sql_insert="insert into complain (roll_no, complain, complain_date) values ('".$_POST['roll_no']."','".$_POST['remark']."','".date('Y-m-d')."')";//,strtotime($_POST['date'])
		mysql_query($sql_insert) or die(mysql_error());
		echo "<p align=\"center\">Complain is submited successfully!<br>You'll be redirected to Home Page after (3) Seconds</p>";
        echo "<meta http-equiv=Refresh content=3;url=studentcomplain.php>";
		exit;
	
}


?>