<?php

	function add_employee($id = null){
	if(isset($id)){
		$sql =mysql_query("SELECT * FROM employee WHERE id = $id");
		$fname= mysql_result($sql,0,1);
		$oname= mysql_result($sql,0,2);
		$box= mysql_result($sql,0,3);
		$town= mysql_result($sql,0,4);
		$country= mysql_result($sql,0,5);
		$email= mysql_result($sql,0,6);
		$phone= mysql_result($sql,0,7);
		}
	}
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
  <form id="form1" name="form1" method="post" action="">
  <tr>
    <td colspan="3">
      First Name *
       </td>    
       <td colspan="3">
      <input type="text" name="fname" id="fname" />
       </td>
  </tr>
   <tr>
    <td colspan="3">
      Other names
      </td>    
      <td colspan="3">
     <input type="text" name="oname" id="oname" />
      </td>
      </tr>
       <tr>
    <td colspan="3">
      Box 
      </td>    
      <td colspan="3">
     <input type="text" name="box" id="box" />
      </td>
      </tr>
       <tr>
    <td colspan="3">
      Town
      </td>    
      <td colspan="3">
     <input type="text" name="town" id="town" />
      </td>
      </tr>
       <tr>
    <td colspan="3">
      Country
      </td>
    <td colspan="3">
      <input type="text" name="country" id="country" />
      </td>
      </tr>
       <tr>
    <td colspan="3">
      E-mail      </td>    
      <td colspan="3">
  <input type="text" name="email" id="email" />
      </td>
      </tr>
       <tr>
    <td colspan="3">
      Phone
      </td>    
      <td colspan="3">
      <input type="text" name="phone" id="phone" />
      </td>
      </tr>
       <tr>
    <td colspan="6">
    <input name="submit" type="submit" id="submit" value="Submit"  />
    </td>
  </tr>
  </form>
</table>
</body>
</html>