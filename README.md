PHP and MySQL based faculty evaluation system which gives reports generated with remarks and scores entered by students. Ajax is used for filtration and to get faster response. 

Structure of the institute 

Batch -> Branch -> Semester -> Division -> Faculty -> Subject

Faculty evaluation Questions are in Feedback Ques table
Students can rate the Subject faculty within the range of 0 - 9 and give remarks. This rating can be changed.
Individual faculties was view their reports generated with remarks and scores entered by students.
Admin login is only to have a global view of all feedback, achievements and complains of students. To Add/Edit/Delete Batch, Branch, Semester, Division, Faculty & Subject please use the database directly for now.

Installation
============

1) Do following changes in php.ini file.

   1)	register_long_arrays = on
   2)	display_errors = on
   3)	short_open_tag = on
   4)	register_globals = on   

2) Create Database by importing misfeedback.sql file

4) Put extracted folder into www directory.

5) Change configuration in includes/common_functions.php  & update the 'host', 'database', 'user', and 'password' variables as necessary.

7) Open browser & type http://<ip-address>/<extractedfolder>/login.html
Student Login refer to student table, login with username as in 'roll_no' column
Faculty Login refer to faculty_master table, login with username as in 'f_id' column
Admin login refer to admin table, login with username as in 'username' column

8) Best view in Mozilla-Firefox / Google Chrome. System is tested on WAMP environment.

Suraj Kota
https://www.linkedin.com/in/surajkota



