<!DOCTYPE html>
<html>
<head>
<title>Registration Form</title>
</head>
<body>
<h1>Registration Form</h1>
<?php
	include_once('common.php');
	if(isset($_GET['error']))
	{
		?>
		<font color="red"><?php echo $_GET['error'];?></font>
		<br><br>
		<?php
	}
	if(isset($_GET['edit']))
	{
		$data = getDetail($_GET['id']);
?>
<form action ="process_update.php" method="POST">
<table border="0">

<tr>
<td>Username:</td> <td><input type="text" name="username" required value="<?php echo $data['username'] ?>"></td>
</tr>

<tr>
<td>Password:</td> <td><input type="password" name="password" ></td>
</tr>

<tr>
<td>Confirm Password:</td><td><input type ="password" name="cpass"></td>
</tr>

<tr>
<td>First Name:</td><td><input type ="text" name="fname" value="<?php echo $data['fname'] ?>"></td>
</tr>

<tr>
<td>Last Name:</td><td><input type ="text" name="lname" value="<?php echo $data['lname'] ?>"></td>
</tr>

<tr>
<td>Email:</td><td><input type ="text" name="email" value="<?php echo $data['email'] ?>" ></td>
</tr>

<tr>
<td>Phone no.:</td><td><input type="text" name="phone" value="<?php echo $data['phone'] ?>" ></td>
</tr>

<tr>
<td>Location/City:</td><td><input type="text" name="loc" value="<?php echo $data['loc'] ?>" ></td>
</tr>

<tr>
<td>

<input type="hidden" name="edit" value="true">
<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
<input type="submit" value ="Save">
<?php
	}
	else
	{
?>
<form action ="process.php" method="POST">
<table border="0">

<tr>
<td>Username:</td> <td><input type="text" name="username" required "></td>
</tr>

<tr>
<td>Password:</td> <td><input type="password" name="password" ></td>
</tr>

<tr>
<td>Confirm Password:</td><td><input type ="password" name="cpass"></td>
</tr>

<tr>
<td>First Name:</td><td><input type ="text" name="fname" ></td>
</tr>

<tr>
<td>Last Name:</td><td><input type ="text" name="lname" ></td>
</tr>

<tr>
<td>Email:</td><td><input type ="text" name="email" ></td>
</tr>

<tr>
<td>Phone no.:</td><td><input type="text" name="phone" ></td>
</tr>

<tr>
<td>Location/City:</td><td><input type="text" name="loc" ></td>
</tr>

<tr>
<td>

<input type="submit" value ="Save">
<?php	
	}
?>
<input type="reset" value ="Reset"></td>
</tr>

</table>
</form>

<?php
$arr=getAllDetails();
if(count($arr)>0)
	{
?>
<table border="1">
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Phone No</th>
<th>Location</th>
<th></th>
</tr>
<?php
	}
for($i=0;$i<count($arr);$i++)
{
	$row=$arr[$i];
	?>
	<tr>
	<td><?php echo $row['fname'];?></td>
	<td><?php echo $row['lname'];?></td>
	<td><?php echo $row['email'];?></td>
	<td><?php echo $row['phone'];?></td>
	<td><?php echo $row['loc'];?></td>
	<td>
	<a href="index.php?edit=true&id=<?php echo $row['id'];?>">Edit</a>
	<a href="process_delete.php?id=<?php echo $row['id'];?>">Delete</a>
	</td>
	</tr>
	<?php
}	
?>
</table>
</body>
</html>