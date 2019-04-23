
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
   // if(isset($_POST['update']))
  //{
// $complaintnumber=$_GET['cid'];
// $sql=mysqli_query($con,"update documnent set status='$status' where idDocument='$complaintnumber'");



 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Document Update</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<!-- <link href="anuj.css" rel="stylesheet" type="text/css"> -->
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

<?php 

//$ret1=mysqli_query($con,"select * FROM users where idUsers='".$_GET['uid']."'");
$query=mysqli_query($con,"SELECT document.*,document_type.documentTypeName, entity.Entity_name FROM ((document INNER JOIN document_type ON document.Document_type_idDocument_type = document_type.idDocument_type) INNER JOIN entity ON document.Entity_idEntity = entity.idEntity)
where document.idDocument=9");

while($row=mysqli_fetch_array($query))
{
?>

    
  
		
    <!-- <tr>
      <td colspan="2"><b><?php echo $row['Username'];?>'s profile</b></td>
      
    </tr>
    
    
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Reg Date:</b></td>
      <td><?php echo htmlentities($row['UsersRegistrationDate']); ?></td>
    </tr>
    <tr height="50">
      <td><b>User Email:</b></td>
      <td><?php echo htmlentities($row['userEmail']); ?></td>
    </tr>


      <tr height="50">
      <td><b>User Contact no:</b></td>
      <td><?php echo htmlentities($row['contactNo']); ?></td>
    </tr>
    


        <tr height="50">
      <td><b>Address:</b></td>
      <td><?php echo htmlentities($row['address']); ?></td>
    </tr>
      <tr height="50">
      <td><b>Last Updation:</b></td>
      <td><?php echo htmlentities($row['UsersUpadationDate']); ?></td>
    </tr>
     <tr height="50">
      <td><b>Status:</b></td>
      <td><?php if($row['status']==1)
      { echo "Active";
} else{
  echo "Block";
}
        ?></td>
    </tr>
    
    <tr>
  
      <td colspan="2">   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr> -->

    <tr height="50">
      <td><b>Document Id</b></td>
      <td><?php echo htmlentities($_GET['cid']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Status</b></td>
      <td><select name="status" required="required">
      <option value="">Select Status</option>
      <option value="in process">In Process</option>
    <option value="closed">Closed</option>
        
      </select></td>
    </tr>
    <tr height="50">
      <td><b>Document Name</b></td>
      <td><?php echo htmlentities($_GET['Document_name']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Document Description</b></td>
      <td><?php echo htmlentities($_GET['Document_description']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Document Creation Date</b></td>
      <td><?php echo htmlentities($_GET['Document_creation_date']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Document Last Modification Date</b></td>
      <td><?php echo htmlentities($_GET['Document_modified_date']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Document Author</b></td>
      <td><?php echo htmlentities($_GET['Document_author']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Document Size</b></td>
      <td><?php echo htmlentities($_GET['Document_size']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Document Entity Name</b></td>
      <td><?php echo htmlentities($_GET['Entity_name']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Document Type</b></td>
      <td><?php echo htmlentities($_GET['documentTypeName']); ?></td>
    </tr>

      <!-- <tr height="50">
      <td><b>Remark</b></td>
      <td><textarea name="remark" cols="50" rows="10" required="required"></textarea></td>
    </tr>
     -->


        <tr height="50">
      <td>&nbsp;</td>
      <td><input type="submit" name="update" value="Submit"></td>
    </tr>



       <tr><td colspan="2">&nbsp;</td></tr>
    
    <tr>
  <td></td>
      <td >   
      <input name="Submit2" type="submit" class="txtbox4" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>

    <?php } 
    ?>
 
</table>
 </form>
</div>

</body>
</html>
<?php } ?>
 