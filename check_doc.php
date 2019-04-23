<?php 
require_once("includes/config.php");
if(!empty($_POST['img'])) {
	$docName= $_POST['img'];
	
		$result =mysqli_query($con,"SELECT Document_name FROM document WHERE Document_name = '$docName'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> image already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> image name available for upload .</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
