<?php
session_start();  
include("includes/config_db.php");
//include("ajax_script.php");
$default = 1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<script src="php_calendar/scripts.js" type="text/javascript"></script>
<title>Faculty Evaluation System</title>
<link rel="stylesheet" type="text/css" href="includes/style.css" />
</head>

<body class="body">
    <table width="650"  border="0" align="center" cellpadding="5" cellspacing="5" >
    <tr>
        <td><a href="studentpage.php">Feedback</a></td>
        <td><a href="studentachievement.php">Achievement</a></td>
        <td><a href="studentcomplain.php">Complain</a></td>
    </tr>
        </table>
<table width="650" height="561"  border="0" align="center" cellpadding="5" cellspacing="5" >
    
  <tr>
    <td width="650"  valign="bottom" align="center"><p><b><font size="5" >Faculty Feedback</font></b></p></td>
  </tr>
  <tr>
    <td width="650" height="126" valign=top>
	<form action="submit_feedback.php" method="post" name="feedback_form" onsubmit="return chkForm();">
      <table width="711" border="0" align="center">        
        <tr>
		  <td width="161">Batch</td>
		  <td width="173"><label>
            <?php
			$sel_batch="select * from batch_master";
			$res_batch=mysql_query($sel_batch) or die(mysql_error());
			
			 while($batch_combo=mysql_fetch_array($res_batch))
			 {							
				$bat_combo[] = array('id' => $batch_combo['batch_id'],
									   'text' => $batch_combo['batch_name']);								  
			 }
			 //echo tep_draw_pull_down_menu('batch_name',$bat_combo,$default,' tabindex="2" ');
			
			$sel_para="select * from feedback_para";
			$res_para=mysql_query($sel_para) or die(mysql_error());
			$result_para=mysql_fetch_array($res_para);
			
                        $sel_para1="select * from student where roll_no='".$_SESSION['user']."'";
			$res_para1=mysql_query($sel_para1) or die(mysql_error());
			$result_para1=mysql_fetch_array($res_para1);
			?>
            <input type="hidden" name="batch_name" value="<?php echo $result_para1['batch_id']?>"/>
			<?php echo batch_name($result_para['batch_id']);?>
          </label>
		</td>
		  <td>&nbsp;</td>
          <td>Branch </td>
          <td><label>
            <?php
			$sel_b="select * from branch_master";
			$res=mysql_query($sel_b) or die(mysql_error());
			
			 while($b_combo=mysql_fetch_array($res))
			 {							
				$branch_combo[] = array('id' => $b_combo['b_id'],
									    'text' => $b_combo['b_name']);								  
			 }
			 //echo tep_draw_pull_down_menu('b_name',$branch_combo,$default,' tabindex="3" ');
			?>
            <input type="hidden" name="b_name" value="<?php echo $result_para['b_id']?>"/>
			<?php echo branch_name($result_para['b_id']);?>
          </label></td>
          
          			          
        </tr>
		
		<tr>
		<td></td>
          <td>
		  <?php
			 $sel_sem="select * from semester_master ";
			 $res_sem=mysql_query($sel_sem) or die(mysql_error());
			
			 while($sem_combo=mysql_fetch_array($res_sem))
			 {							
				$sem_array[] = array('id' => $sem_combo['sem_id'],
									 'text' => $sem_combo['sem_name']);								  
			 }
			 
			 //echo tep_draw_pull_down_menu('sem_name',$sem_array,$default,' tabindex="4" ');
	      ?>
		  <input type="hidden" name="sem_name" value="<?php echo $result_para['sem_id']?>"/>
			<?php //echo sem_name($result_para['sem_id']);?>
		  	</td>
		<td>&nbsp;</td>
		<td></td>
        <td>
		  <?php
			 $sel_div="select * from division_master ";
			 $res_div=mysql_query($sel_div) or die(mysql_error());
			
			 while($div_combo=mysql_fetch_array($res_div))
			 {							
				$div_array[] = array('id' => $div_combo['id'],
									  'text' => $div_combo['division']);								  
			 }
			 
			// echo tep_draw_pull_down_menu('division',$div_array, $default,' tabindex="4" ');
	      ?>
		  <input type="hidden" name="division" value="<?php echo $result_para['division_id']?>"/>
			<?php //echo division_name($result_para['division_id']);?>
		</td>
		</tr>
		<tr>
          <td width="114">Student ID </td>
          <td width="228"><label>
                  <input name="roll_no" type="text" tabindex="1" align="left"  readonly value="<?php echo $_SESSION['user']?>"></input>
          </label></td>
          <td width="1">&nbsp;</td>
          <!--<td width="98">Date</td>
          <td width="175"><label>
            <input type="text" name="date" id="date" readonly tabindex="2"/><a href="javascript:viewcalendar()">cal</a>
          </label></td>-->
		  
        </tr>
        <tr>
          <td>Faculty Name </td>
          <td><label>
            <?php
			 $sel_fac="select distinct fm.f_id, fm.f_name, fm.l_name from faculty_master as fm, subject_master as sm where fm.b_id='".$result_para['b_id']."' and sm.batch_id='".$result_para['batch_id']."' and fm.f_id=sm.f_id and sm.sem_id=".$result_para['sem_id'];
			 $res_fac=mysql_query($sel_fac) or die(mysql_error());
			
			 while($fac_combo=mysql_fetch_array($res_fac))
			 {							
				$fac_array[] = array('id' => $fac_combo['f_id'],
									 'text' => $fac_combo['f_name'].'&nbsp;'.$fac_combo['l_name']);								  
			 }
			 $default = 1;
			 echo tep_draw_pull_down_menu('fac_name', $fac_array, $default,' tabindex="5" onChange="AjaxFunction(this.value);"');
	      ?>
          </label></td>
          <td>&nbsp;</td>
          <td>Subject Taught </td>
          <td><label>
            <?php
			 $sel_sub="select * from subject_master as sm , faculty_master as fm where fm.b_id='".$result_para['b_id']."' and fm.f_id=sm.f_id";
			 $res_sub=mysql_query($sel_sub) or die(mysql_error());
			
			 while($sub_combo=mysql_fetch_array($res_sub))
			 {							
				$sub_array[] = array('id' => $sub_combo['sub_id'],
									  'text' => $sub_combo['sub_name']);								  
			 }
			 
			 echo tep_draw_pull_down_menu('sub_name',$sub_array,$default,' tabindex="6" ');
	      ?>
		  <!select name=sub_name>

          <!/select>
          </label></td>
        </tr>
		<tr><td>&nbsp;</td></tr>
		<tr>
          <td colspan="5" align="center">Note: Enter Rating from 0 to 9.</td>
        </tr>
		<tr>
          <td colspan="5">
		  <table width="100%" id="rounded-corner" cellpadding="10" cellspacing="0" border="0" align="center">
		  <thead>
		  <tr >
		     <th width="8%" class="rounded-company" align="center">ID</th>			 
			 <th width="86%" class="rounded-q1" align="center">Questions</th>
			 <th width="6%" class="rounded-q4">&nbsp;</th>
		  </tr>
		  </thead>
		  <?php
		  	$sql_que="select * from feedback_ques_master";
			$res_que=mysql_query($sql_que) or die(mysql_error());
			$i=1;
			$tab_ind=7;
			while($row_que=mysql_fetch_array($res_que))
			{
				echo "<tr>";
				echo "<td align=\"center\">".$i."</td>";
				echo "<td>".$row_que['ques']."</td>";
				echo "<td> <input type=\"text\" name=\"ans_$i\" size=\"3\" onkeypress=\"return isNumberOnly(event);\" maxlength=\"2\" tabindex=\"$tab_ind\" /></td>";$tab_ind++;
				echo "</tr>";$i++;
			}
		  ?>		  
		  <tr>
		  <td>Remark:</td>
		  <td colspan="2"><textarea name="remark" style="width:605px; height:40px;" onkeypress="return isCharOnly(event);" tabindex="16"></textarea></td>
		  </tr>		  
		  	<tr>
				<td colspan="2"  class="rounded-foot-left" align="center"><input class="button" type="submit" name="submit" value="Submit" tabindex="17"/>&nbsp;<input type="reset" name="reset" value="Reset" tabindex="18" class="button"/></td>
				<td align="center" class="rounded-foot-right"></td>
			</tr>			
		  </table>
		  </td>
        </tr>
      </table>
    </form></td>
  </tr>
  <tr>
    <td width="697"  height="1"><?php ?></td>
  </tr>
  
</table>
</body>
</html>

<script>
var mikExp = /[$\\@\\!\\\#%\^\&\*\(\)\[\]\+\_\{\}\`\~\=\|]/;
function dodacheck(val) {
var strPass = val.value;
var strLength = strPass.length;
var lchar = val.value.charAt((strLength) - 1);
if(lchar.search(mikExp) != -1) {
var tst = val.value.substring(0, (strLength) - 1);
val.value = tst;
   }
}

//  End -->
</script>

<script language="javascript" type="text/javascript">
function isCharOnly(e)
{
	var unicode=e.charCode? e.charCode : e.keyCode
	//if (unicode!=8 && unicode!=9)
	//{ //if the key isn't the backspace key (which we should allow)
		 //disable key press
		if (unicode==45)
			return true;
		if (unicode>48 && unicode<57) //if not a number
			return false
	//}
}
function isNumberOnly(e)
{
	var unicode=e.charCode? e.charCode : e.keyCode
	if (unicode!=8 && unicode!=9)
	{ //if the key isn't the backspace key (which we should allow)
		 //disable key press
		//if (unicode==45)
		//	return true;
		if (unicode<48||unicode>57) //if not a number
			return false
	}
}
function chkForm(form)
{

		var RefForm = document.feedback_form;
		/*if (RefForm.roll_no.value.length != 11 )
		{
			alert("Enter Roll Number");	
			RefForm.roll_no.focus();				
			return false;
		}*/
		
		/*if (RefForm.date.value == '' )
		{
			alert("Enter Date");
			RefForm.date.focus();			
			return false;
		}
		if (RefForm.batch_name.value == 0 )
		{
			alert("Select Batch");
			RefForm.batch_name.focus();			
			return false;
		}
		if (RefForm.b_name.value == 0 )
		{
			alert("Select Branch");
			RefForm.b_name.focus();			
			return false;
		}
		if (RefForm.sem_name.value  == 0 )
		{
			alert("Select Semester");			
			RefForm.sem_name.focus();
			return false;
		}*/
		if (RefForm.fac_name.value == 0 )
		{
			alert("Select Faculty Name.");			
			RefForm.fac_name.focus();
			return false;
		}
		if (RefForm.sub_name.value == 0 )
		{
			alert("Select Subject");
			RefForm.sub_name.focus();			
			return false;
		}
		
		for(i=1;i<=9;i++)
		{
			if(eval("document.feedback_form.ans_"+i).value == '')
			{
				alert("Enter rating.");
				eval("document.feedback_form.ans_"+i).focus();	
				return false;
			}
			if(eval("document.feedback_form.ans_"+i).value > 9)
			{
				alert("Enter rating from 0 to 9.");
				eval("document.feedback_form.ans_"+i).focus();	
				return false;
			}
				
		}/**/
		
}
</script>