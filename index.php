<?php
    error_reporting(0);
	include_once "conn.php";
	$click = $_GET['click'];
	$id =$_POST['employee_id'];
	$required_form =$_POST['required_form'];
	if (isset($required_form)){
		$click = $required_form;
	}
	$submit = $_POST['submit'];


function employee($id = null, $click = 'add'){
	
	if($click == 'delete'){
		$sql =mysql_query("DELETE FROM employee WHERE id = $id");
		view();
		//exit;
		}
		
	 if(isset($id)){
		$sql =mysql_query("SELECT * FROM employee WHERE id = $id");
		$fname= mysql_result($sql,0,1);
		$oname= mysql_result($sql,0,2);
		$box= mysql_result($sql,0,3);
		$town= mysql_result($sql,0,4);
		$country= mysql_result($sql,0,5);
		$email= mysql_result($sql,0,6);
		$phone= mysql_result($sql,0,7);
		}//end if

        echo "<form id='form' name='form' method='post' action='?click=$click'>
        <input name='id' type='hidden' value='$id' />";
/*
		if ($click=="add" || $click=="update_employee" || $click=="update_address" || $click=="update_email" ){
        echo "<input name='fname' type='hidden' value='$fname' />";
		 } 
*/
		 
		 if($click=="add" || $click=="update_employee"){
        echo "<tr>
    		<td colspan='3'>
      		First Name *
       		</td>    
      		<td colspan='3'>
      		<input type='text' name='fname' id='fname' value='$fname'/>
       		</td>
  		</tr>
   		
        <tr>
    		<td colspan='3'>
      		Other names
      		</td>    
      		<td colspan='3'>
     		<input type='text' name='oname' id='oname' value='$oname' />
      		</td>
      	</tr>";
         }//end if
		 
		if($click=="add" || $click=="update_employee" || $click=="update_address"){
       	echo"<tr>
    		<td colspan='3'>
      		Box 
      		</td>    
      		<td colspan='3'>
     		<input type='text' name='box' id='box' value='$box' />
      		</td>
      	</tr>
      	<tr>
    		<td colspan='3'>
      		Town
      		</td>    
      		<td colspan='3'>
     		<input type='text' name='town' id='town' value='$town' />
      		</td>
      	</tr>
       	<tr>
    		<td colspan='3'>
      		Country
      		</td>
    		<td colspan='3'>
      		<input type='text' name='country' id='country' value='$country'  />
      		</td>
      	</tr>";
        }// end if 
		if ($click=="add" || $click=="update_employee" || $click=="update_address" || $click=="update_email" ){
       	echo"<tr>
    		<td colspan='3'>
      		E-mail      
            </td>    
      		<td colspan='3'>
  			<input type='text' name='email' id='email' value='$email' />
      		</td>
      	</tr>";
        } //end if 
		if($click=="add" || $click=="update_employee" || $click=="update_address"){
       	echo"<tr>
    		<td colspan='3'>
      		Phone
      		</td>    
      		<td colspan='3'>
      		<input type='text' name='phone' id='phone' value='$phone' />
      		</td>
      	</tr>";
        }//end if 
		if(!($click=="delete")){
       	echo"<tr>
    		<td colspan='6'>
    		<input name='submit' type='submit' id='submit' value='submit'  />
    		</td>
			</tr>";
		}
    echo "</form>";
	}// end function
	
function is_valid_email($email){
	return eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email);
}

function menu(){
	echo"
	  <tr>
    <td><a href='?click=add'>Add</a></td>
    <td><a href='?click=update_employee'>Update Employee</a></td>
    <td><a href='?click=update_address'>Update Address</a></td>
    <td><a href='?click=update_email'>Update E-mail</a></td>
    <td><a href='?click=delete'>Delete</a></td>
    <td><a href='?click=view'>View</a></td>
  </tr>
	";
	
	}

function update($click){
		$sql =mysql_query("SELECT * FROM employee");
		if(mysql_num_rows($sql)>0){
				$employee_id = "<option value=''> Select Employee Id</option>";
			while($row = mysql_fetch_array($sql)){
				$employee_id .= "<option value='$row[id]'> $row[id].$row[fname] $row[oname]</option>";
					}//end while
			}//end if  
   		echo "<form id='form1' name='form1' method='post' action='?'>
        <input name='required_form' type='hidden' value='$click' />
  			<tr>
    			<td colspan='6'>Select Employee ID</td>
  			</tr>
  			<tr>
     			<td colspan='3'>
    			Employee id
      			</td>
    			<td colspan='3'>
      			<select name='employee_id' id='employee_id'>
     			$employee_id
      			</select>
      			</td>
  			</tr>
            <tr>
                <td colspan='6'>
                <input type='submit' value='Submit' />
                </td>
            </tr>
		</form>";
					
}// end function
	
function view(){
		$sql= mysql_query('SELECT * FROM employee');
		
		 if(mysql_num_rows($sql)>0){
			 echo "<tr>
					<th>First Name</th>
					<th>Other Name</th>
					<th>Box No</th>
					<th>Town</th>
					 <th>Country</th>
					 <th>Email</th>
					 <th>Phone</th>
					 </tr>";
			while($row = mysql_fetch_array($sql)){
				
	    $fname= $row['fname'];
		$oname= $row['oname'];
		$box= $row['box'];
		$town= $row['town'];
		$country= $row['country'];
		$email= $row['email'];
		$phone= $row['phone'];
				
				echo "<tr>
					<td>$fname</td>
					<td>$oname</td>
					<td>$box</td>
					<td>$town</td>
					 <td>$country</td>
					 <td>$email</td>
					 <td>$phone</td>
					 </tr>";
				}//end while
			}// end if
}//end function

// posting data	
if(!empty($submit)){
		$id = $_POST['id'];
		$fname = str_replace("'",'`',trim($_POST['fname']));
		$oname = $_POST['oname'];
		$box = $_POST['box'];
		$town = $_POST['town'];
		$country = $_POST['country'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		
		if(empty($fname)){
			echo "<table align='center' border='0'><tr><td>Fill all required fields</td></tr></table>";
			exit;
			}
		if(!is_valid_email($email)){
			echo "<table align='center' border='0'><tr><td>invalid email \"$email\"</td></tr></table>";
			exit;
			}
			
		if($click == 'add'){
		mysql_query("INSERT INTO `employee_db`.`employee` (`id`, `fname`, `oname`, `box`, `town`, `country`, `email`, `phone`) VALUES (NULL, '$fname', '$oname', '$box', '$town', '$country', '$email', '$phone')");
		}
		
		if($click == "update_employee"){
			mysql_query("UPDATE `employee_db`.`employee` SET `fname` = '$fname',`oname` = '$oname',`box` = '$box',`town` = '$town',
`country` = '$country',`email` = '$email',`phone` = '$phone' WHERE `employee`.`id` =$id;");
			}
			
		if($click == "update_address"){
			mysql_query("UPDATE `employee_db`.`employee` SET `box` = '$box',`town` = '$town',
`country` = '$country',`email` = '$email',`phone` = '$phone' WHERE `employee`.`id` =$id;");
			}
			
		if( $click == "update_email"){
			mysql_query("UPDATE `employee_db`.`employee` SET `email` = '$email' WHERE `employee`.`id` =$id;");
			}
			
		view();		
	}// end if
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee</title>
</head>

<body>
<table width="200" border="1" align="center">
  <?php
  	 menu();
	 
  	 if($click == "add"){
	  employee();
	  }
	  
	  if(!empty($id) && ($click == "update_employee" || $click == "update_address" || $click == "update_email" || $click == "delete")){
	   employee($id , $click);
	   }
	  
  	 if($click == "view"){
	   view();
	   }
	   
	   
	  if(empty($id) && ($click == "update_employee" || $click == "update_address" || $click == "update_email" || $click == "delete")){
	  update($click);
	  }	 
	  
	  

	   
  ?>
</table>
</body>
</html>