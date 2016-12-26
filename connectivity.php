<?php 
session_start();
define('DB_HOST', 'localhost'); 
define('DB_NAME', 'misfeedback'); 
define('DB_USER','root'); 
define('DB_PASSWORD',''); 
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error()); 
/* $ID = $_POST['user']; $Password = $_POST['pass']; */
//echo $_POST['login_type'];

function SignIn() 
{ 
    $logintype =  $_POST['login_type'];
    if($logintype == 1)
    { 
        
        if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text 
        { 
            $query = mysql_query("SELECT * FROM student where roll_no = '$_POST[user]' AND password = '$_POST[pass]'") or die(mysql_error()); 
            $row = mysql_fetch_array($query) or die(mysql_error()); 
            if(!empty($row['roll_no']) AND !empty($row['password']))
            { 
                $_SESSION["user"] = $row['roll_no'];
                $_SESSION["logintype"] = 1;
                echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
                header('Location: studentpage.php');
            } 
            else 
            { 
                echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
            } 
        }
    }
    elseif ($logintype == 2) 
    {
        
        if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text 
        { 
            $query = mysql_query("SELECT * FROM faculty_master where f_id = '$_POST[user]' AND password = '$_POST[pass]'") or die(mysql_error()); 
            $row = mysql_fetch_array($query) or die(mysql_error()); 
            if(!empty($row['f_id']) AND !empty($row['password']))
            { 
                $_SESSION["user"] = $row['f_id'];
                $_SESSION["name"] = $row['f_name'];
                $_SESSION["logintype"] = 2;
                
                echo $_SESSION["user"]."SUCCESSFULLY LOGIN TO USER PROFILE PAGE...";
                header('Location: facultypage.php');
            } 
            else 
            { 
                echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
            } 
        }
    
    }
    elseif ($logintype == 3) 
    {
        
        if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text 
        { 
            $query = mysql_query("SELECT * FROM admin where username = '$_POST[user]' AND password = '$_POST[pass]'") or die(mysql_error()); 
            $row = mysql_fetch_array($query) or die(mysql_error()); 
            if(!empty($row['username']) AND !empty($row['password']))
            { 
                //$_SESSION['username'] = $row['password']; 
                $_SESSION['user'] = $row['username'];
                $_SESSION['logintype'] = 3;
                echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 
                header('Location: adminpage.php');
            } 
            else 
            { 
                echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
            } 
        }
    }
    else 
    {
        echo "SORRY... ENTER VALID CREDENTIALS AND RETRY...";
    }
    
    /* session_start(); //starting the session for user profile page 
    if(!empty($_POST['user'])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text 
    { 
        $query = mysql_query("SELECT * FROM users where username = '$_POST[user]' AND password = '$_POST[pass]' AND logintype =". $logintype) or die(mysql_error()); 
        $row = mysql_fetch_array($query) or die(mysql_error()); 
        if(!empty($row['username']) AND !empty($row['password']))
        { 
            $_SESSION['username'] = $row['password']; 
            echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 
        } 
        else 
        { 
            echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY..."; 
        } 
    } */
}

if(isset($_POST['submit'])) { SignIn(); } 
?>
