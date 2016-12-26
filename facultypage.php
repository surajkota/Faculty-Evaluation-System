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
<table width="650" height="561"  border="0" align="center" cellpadding="5" cellspacing="5" >
  
  <tr>
    <td width="650"  valign="bottom" align="center"><p><b><font size="5" >Feedback Result</font></b></p></td>
  </tr>
  <tr>
    <td width="650" height="126" valign=top>
        <form action="facultypage.php" method="post" name="feedback_result" onsubmit="return chkForm();">
            
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
			 echo tep_draw_pull_down_menu('batch_name',$bat_combo,$default,' tabindex="2" ');
			
			$sel_para="select * from feedback_para";
			$res_para=mysql_query($sel_para) or die(mysql_error());
			$result_para=mysql_fetch_array($res_para);
			
			?>
            <!input type="hidden" name="batch_name" value="<?php echo $result_para['batch_id']?>"/>
			<?php //echo batch_name($result_para['batch_id']);?>
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
			 //echo tep_draw_pull_down_menu('fac_name', $fac_array, $default,' tabindex="5" onChange="AjaxFunction(this.value);"');
	      ?>
          </label>
          <?php echo faculty_name($_SESSION['user']);?>
          </td>
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
				<td colspan="2"  class="rounded-foot-left" align="center"><input class="button" type="submit" name="submit" value="Submit" tabindex="17"/></td>
				<td align="center" class="rounded-foot-right"></td>
                </tr>
                
                <tr>
          <td colspan="5" align="center">Rating average given by student on a Scale from 0 to 9.</td>
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
                        
                        if(isset($_POST['sub_name']))    
                        {   
                            $subject = $_POST['sub_name'];
                            $faculty = $_SESSION["user"];
                            $batch = $_POST['batch_name'];
                            $sql_que1="select * from feedback_ques_master";
                            $res_que1=mysql_query($sql_que1) or die(mysql_error());
                            $sql_avg="select ans1 as a1,avg(ans2) as a2,avg(ans3) as a3,avg(ans4) as a4,avg(ans5) as a5,avg(ans6) as a6,avg(ans7) as a7,avg(ans8) as a8,avg(ans9) as a9 from feedback_master where f_id='".$faculty."' AND sub_id='".$subject."' AND batch_id='".$batch."'";
                            $res_avg=mysql_query($sql_avg) or die(mysql_error());
                            $i=1;
                            $tab_ind=7;
                            $res_avg=mysql_fetch_array($res_avg);
                            while($row_que1=mysql_fetch_array($res_que1))
                            {
                                    echo "<tr>";
                                    echo "<td align=\"center\">".$i."</td>";
                                    echo "<td>".$row_que1['ques']."</td>";
                                    $col = 'a'.$i;
                                    echo "<td>" .$res_avg[$col]."</td>";$tab_ind++;
                                    echo "</tr>";$i++;
                            }
                        
                            ?>
                      
                            <tr>
                            <td>Remarks</td>
                            <td colspan="2" style="width:605px; height:40px;"></td>
                            </tr>		  
                            <?php    
                            $sql_que="select * from feedback_master where f_id='".$faculty."' AND sub_id='".$subject."' AND batch_id='".$batch."'";
                            $res_que=mysql_query($sql_que) or die(mysql_error());
                            
                            $tab_ind=7;
                            if(mysql_num_rows($res_que)>=1)
                            {
                                echo "hello";
                                while($row_que=mysql_fetch_array($res_que))
                                {
                                    echo "<tr>";
                                    echo "<td align=\"center\">".$i."</td>";
                                    echo "<td>".$row_que['remark']."</td>";
                                    echo "<td> </td>";$tab_ind++;
                                    echo "</tr>";$i++;
                                }
                            }
                        }
		  ?>		  
		  <tr>
		  <td></td>
		  <td colspan="2"><textarea name="remark" style="width:605px; height:40px; visibility: hidden" onkeypress="return isCharOnly(event);" tabindex="16"></textarea></td>
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


<SCRIPT LANGUAGE="JavaScript">
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