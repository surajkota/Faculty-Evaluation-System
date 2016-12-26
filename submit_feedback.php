<?php
session_start();
include("includes/config_db.php");

if(isset($_POST['submit']))
{
	//feedback no
	$check_feedback_no="select * from batch_master where batch_id='".$_POST['batch_name']."'";
	$res_feedback_no=mysql_query($check_feedback_no) or die(mysql_error());
	$result=mysql_fetch_array($res_feedback_no);
	
	
	$sql="select * from feedback_master where roll_no='".$_POST['roll_no']."' and b_id='".$_POST['b_name']."' and f_id='".$_POST['fac_name']."' and sub_id='".$_POST['sub_name']."' and sem_id='".$_POST['sem_name']."' and batch_id='".$_POST['batch_name']."' and division_id='".$_POST['division']."' and feedback_no='".$result['feedback_no']."'";
	//echo $sql;
	$res=mysql_query($sql) or die(mysql_error());
	
	//echo mysql_num_rows($res);
	//exit;
	if(mysql_num_rows($res)>=1)
	{
		echo "<p align=\"center\">Feedback is already submited by this '".$_POST['roll_no']."' roll no for this subject.<br>You'll be redirected to Home Page after (3) Seconds</p>";
		echo "<meta http-equiv=Refresh content=3;url=index.php>";
		exit;
	}
	else
	{
		
		$sql_insert="insert into feedback_master (roll_no, b_id, batch_id, feedback_no, sem_id, f_id, sub_id, division_id, ans1, ans2, ans3, ans4, ans5, ans6, ans7, ans8, ans9, remark, feed_date) values ('".$_POST['roll_no']."','".$_POST['b_name']."','".$_POST['batch_name']."','".$result['feedback_no']."','".$_POST['sem_name']."','".$_POST['fac_name']."','".$_POST['sub_name']."', '".$_POST['division']."', '".$_POST['ans_1']."','".$_POST['ans_2']."','".$_POST['ans_3']."','".$_POST['ans_4']."','".$_POST['ans_5']."','".$_POST['ans_6']."','".$_POST['ans_7']."','".$_POST['ans_8']."','".$_POST['ans_9']."','".$_POST['remark']."','".date('Y-m-d')."')";//,strtotime($_POST['date'])
		mysql_query($sql_insert) or die(mysql_error());
		echo "<p align=\"center\">Feedback is submited successfully!<br>You'll be redirected to Home Page after (3) Seconds</p>";
        echo "<meta http-equiv=Refresh content=3;url=studentpage.php>";
		exit;
	}
}


?>