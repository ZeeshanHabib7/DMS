<!Doctype html>
<html>
<head>

<title>image insertion </title>
</head>

<body>

<form action="" method="POST" enctype="multipart/form-data">
<h2 align="center"> image insertion </h2>

<table align="center"> 
<tr>
<td> <label>Image</label></td>
<td> <label>:</label></td>
<td> <label><input type="file" name="img"requires/></label></td>
</tr>
<tr>
<td> <label></label></td>
<td> <label></label></td>
<td> <label> <input type="submit" name="save_btn" value="save"/> </label></td>
</tr>
</table>
</form>
<?php
	
	if(isset($_POST['save_btn']))
	{
		if($con = mysqli_connect('localhost','root','','dms'))
		{
			$filetemp=$_FILES['img']['tmp_name'];
			$filename=$_FILES['img']['name'];
			$filetype=$_FILES['img']['type'];
			$filepath="docimages/".$filename;

			move_uploaded_file($filetemp,$filepath);
			$query=mysqli_query($con, "call uploaddocimage('$filename', '$filepath', '$filetype')");
			if($query)
			{
				echo"--------------------------------Image inserted Successfully------------------------------------------------------";
			}
			else
			{
				echo"insertion failed";
			}
		}

	}

?>

</body>
</html>
