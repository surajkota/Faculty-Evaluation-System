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
        <td><a href="adminpage.php">Admin Feedback</a></td>
        <td><a href="adminachievement.php">Admin Achievement</a></td>
        <td><a href="admincomplain.php">Admin Complain</a></td>
    </tr>
        </table>
<table width="650" height="561"  border="0" align="center" cellpadding="5" cellspacing="5" >
    
  <tr>
    <td width="650"  valign="bottom" align="center"><p><b><font size="5" >Student Complains</font></b></p></td>
  </tr>
  <tr>
    <td width="650" height="126" valign=top>
        <form action="admincomplain.php" method="post" name="feedback_form" onsubmit="return chkForm();">
      <table width="711" border="0" align="center">        
        
          <td width="114">Login </td>
          <td width="228"><label>
                  <input name="roll_no" type="text" tabindex="1" align="left"  readonly value="<?php echo $_SESSION['user']?>"></input>
          </label></td>
          
          <!--<td width="98">Date</td>
          <td width="175"><label>
            <input type="text" name="date" id="date" readonly tabindex="2"/><a href="javascript:viewcalendar()">cal</a>
          </label></td>-->
	<tr>
          <td>Student ID </td>
          <td><label>
            <?php
			 $sel_fac="select distinct roll_no from complain";
			 $res_fac=mysql_query($sel_fac) or die(mysql_error());
			
			 while($fac_combo=mysql_fetch_array($res_fac))
			 {							
				$fac_array[] = array('id' => $fac_combo['roll_no'],
									 'text' => $fac_combo['roll_no']);								  
			 }
			 $default = 1;
			 echo tep_draw_pull_down_menu('stu_id', $fac_array, $default,' tabindex="5" onChange="AjaxFunction(this.value);"');
	      ?>
          </label></td>	  
        </tr>
        	<tr><td>&nbsp;</td></tr>
		<tr>
          <td colspan="5" align="center"></td>
        </tr>
		<tr>
          <td colspan="5">
		  <table width="100%" id="rounded-corner" cellpadding="10" cellspacing="0" border="0" align="center">
		  <thead>
		  <tr >
		     <th width="8%" class="rounded-company" align="center"></th>			 
			 <th width="86%" class="rounded-q1" align="center"></th>
			 <th width="6%" class="rounded-q4">&nbsp;</th>
		  </tr>
		  </thead>
                      
		  <?php
		  $roll = $_POST['stu_id'];	
                  $sql_que="select * from complain where roll_no='".$roll."'";
			$res_que=mysql_query($sql_que) or die(mysql_error());
			$i=1;
			$tab_ind=7;
			while($row_que=mysql_fetch_array($res_que))
			{
				echo "<tr>";
				echo "<td align=\"center\">".$i."</td>";
				echo "<td>".$row_que['complain']."</td>";
				//echo "<td> <input type=\"text\" name=\"ans_$i\" size=\"3\" onkeypress=\"return isNumberOnly(event);\" maxlength=\"2\" tabindex=\"$tab_ind\" /></td>";$tab_ind++;
				
                                echo "<td></td>";echo "</tr>";$i++;
                                
			}
		  ?>		  
                
		  <tr>
		  <td></td>
		  <td colspan="2"><textarea name="remark" style="width:605px; height:40px; visibility: hidden" onkeypress="return isCharOnly(event);" tabindex="16"></textarea></td>
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


<SCRIPT LANGUAGE="JavaScript">
<!-- Original:  Mikhail Esteves (miks80@yahoo.com) -->
<!-- Web Site:  http://www.freebox.com/jackol -->

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
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