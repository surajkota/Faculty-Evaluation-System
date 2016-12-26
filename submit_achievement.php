<?php
session_start();
include("includes/config_db.php");

if(isset($_POST['submit']))
{

	
		
		$sql_insert="insert into achievement_master (roll_no, achievement_name, description) values ('".$_POST['roll_no']."','".$_POST['achievement_name']."','".$_POST['remark']."')";//,strtotime($_POST['date'])
		mysql_query($sql_insert) or die(mysql_error());
		echo "<p align=\"center\">Submited successfully!<br>You'll be redirected to Home Page after (3) Seconds</p>";
        echo "<meta http-equiv=Refresh content=3;url=studentachievement.php>";
		exit;
	
}


?>