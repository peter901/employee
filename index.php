<?php
    error_reporting(0);
	include_once"conn.php";
	$click = $_GET['click'];
	$id =$_GET['employee_id'];
	
function employee($id = null, $click = 'add'){
	
	if($click == 'delete'){
		$sql =mysql_query("DELETE FROM employee WHERE id = $id");
		header('Location: http://localhost/employee/index.php?click=view');
		exit;
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
		?> 
        <form id='form' name='form' method='post' action='index.php?click=<?php echo $click?>'>
        <input name="id" type="hidden" value="<?php echo $id; ?>" />
        <?php 
		if ($click=="add" || $click=="update_employee" || $click=="update_address" || $click=="update_email" ){
		?>
        <input name="fname" type="hidden" value="<?php echo $fname; ?>" />
        
		<?php } if($click=="add" || $click=="update_employee"){?>
        <tr>
    		<td colspan='3'>
      		First Name *
       		</td>    
      		<td colspan='3'>
      		<input type='text' name='fname' id='fname' value='<?php echo $fname?>'/>
       		</td>
  		</tr>
   		
        <tr>
    		<td colspan='3'>
      		Other names
      		</td>    
      		<td colspan='3'>
     		<input type='text' name='oname' id='oname' value='<?php echo $oname?>' />
      		</td>
      	</tr>
        <?php }//end if
		if($click=="add" || $click=="update_employee" || $click=="update_address"){
		?>
        
       	<tr>
    		<td colspan='3'>
      		Box 
      		</td>    
      		<td colspan='3'>
     		<input type='text' name='box' id='box' value='<?php echo $box?>' />
      		</td>
      	</tr>
      	<tr>
    		<td colspan='3'>
      		Town
      		</td>    
      		<td colspan='3'>
     		<input type='text' name='town' id='town' value='<?php echo $town?>' />
      		</td>
      	</tr>
       	<tr>
    		<td colspan='3'>
      		Country
      		</td>
    		<td colspan='3'>
      		<input type='text' name='country' id='country' value='<?php echo $country?>'  />
      		</td>
      	</tr>
        <?php }// end if 
		if ($click=="add" || $click=="update_employee" || $click=="update_address" || $click=="update_email" ){
		?>
       	<tr>
    		<td colspan='3'>
      		E-mail      
            </td>    
      		<td colspan='3'>
  			<input type='text' name='email' id='email' value='<?php echo $email?>' />
      		</td>
      	</tr>
        <?php } //end if 
		if($click=="add" || $click=="update_employee" || $click=="update_address"){
		?>
       	<tr>
    		<td colspan='3'>
      		Phone
      		</td>    
      		<td colspan='3'>
      		<input type='text' name='phone' id='phone' value='<?php echo $phone?>' />
      		</td>
      	</tr>
        <?php }//end if ?>
       	<tr>
    		<td colspan='6'>
    		<input name='submit' type='submit' id='submit' value='Submit'  />
    		</td>
			</tr>
    </form>
	
	<?php
	}// end function

function update($click){
		$sql =mysql_query("SELECT * FROM employee");
		if(mysql_num_rows($sql)>0){
				$employee_id = "<option value=''> Select Employee Id</option>";
			while($row = mysql_fetch_array($sql)){
				$employee_id .= "<option value='$row[id]'> $row[id].$row[fname] $row[oname]</option>";
					}//end while
			}//end if  ?> 
   		<form id="form1" name="form1" method="get" action="index.php?click=<?php echo $click?>">
        <input name="click" type="hidden" value="<?php echo $click?>" />
  			<tr>
    			<td colspan="6">Select Employee ID</td>
  			</tr>
  			<tr>
     			<td colspan="3">
    			Employee id
      			</td>
    			<td colspan="3">
      			<select name="employee_id" id="employee_id">
      			<?php 
     			echo $employee_id;
	  			?>
      			</select>
      			</td>
  			</tr>
            <tr>
                <td colspan="6">
                <input name="Submit" type="submit" value="Submit" />
                </td>
            </tr>
		</form>
<?php					
}// end function
	
function view(){
		$sql= mysql_query('SELECT * FROM employee');
		
		 if(mysql_num_rows($sql)>0){
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
if(!empty($_POST['fname'])){
		$id = $_POST['id'];
		$fname = $_POST['fname'];
		$oname = $_POST['oname'];
		$box = $_POST['box'];
		$town = $_POST['town'];
		$country = $_POST['country'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		
		if($click == 'add'){
		mysql_query("INSERT INTO `employee_db`.`employee` (`id`, `fname`, `oname`, `box`, `town`, `country`, `email`, `phone`) VALUES (NULL, '$fname', '$oname', '$box', '$town', '$country', '$email', '$phone')");
		}
		
		if($click == "update_employee"){
			mysql_query("UPDATE `employee_db`.`employee` SET `fname` = '$fname',`oname` = '$oname',`box` = '$box',`town` = '$town',
`country` = '$country',`email` = '$email',`phone` = '$phone' WHERE `employee`.`id` =$id;");
			}
			
		if($click == "update_address"){
			mysql_query("UPDATE `employee_db`.`employee` SET ,`box` = '$box',`town` = '$town',
`country` = '$country',`email` = '$email',`phone` = '$phone' WHERE `employee`.`id` =$id;");
			}
			
		if( $click == "update_email"){
			mysql_query("UPDATE `employee_db`.`employee` SET `email` = '$email' WHERE `employee`.`id` =$id;");
			}
			
		header('Location: http://localhost/employee/index.php?click=view');
		
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
  <tr>
    <td><a href="?click=add">Add</a></td>
    <td><a href="?click=update_employee">Update Employee</a></td>
    <td><a href="?click=update_address">Update Address</a></td>
    <td><a href="?click=update_email">Update E-mail</a></td>
    <td><a href="?click=delete">Delete</a></td>
    <td><a href="?click=view">View</a></td>
  </tr>
  <?php
  	 if($click == "add"){
	  employee();
	  }
	  
	 if($click == "update_employee" && empty($id)){
	  update($click);
	  }	 
	  
	  if($click == "update_address" && empty($id)){
	  update($click);
	  }	 
	  
	  if($click == "update_email" && empty($id)){
	  update($click);
	  }
	  
	  if($click == "delete" && empty($id)){
	  update($click);
	  }
	  
	  if(!empty($id) && ($click == "update_employee" || $click == "update_address" || $click == "update_email" || $click == "delete")){
	   employee($id , $click);
	   }
	  
  	 if($click == "view"){
	   view();
	   }
  ?>
</table>
</body>
</html>