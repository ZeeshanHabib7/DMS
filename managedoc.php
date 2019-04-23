<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Karachi');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$fname=$_POST['fullname'];
$author=$_POST['useremail'];
$address=$_POST['address'];
$state=$_POST['state'];
$country=$_POST['country'];
$pincode=$_POST['pincode'];
$doctype=$_POST['doctype'];

$eName=$_POST['eName'];
$sql="INSERT INTO entity (Entity_name) VALUES ('$eName')";
mysqli_query($con,$sql);
$last_id = mysqli_insert_id($con);
//$query=mysqli_query($con,"insert into document(Document_name ,Document_type_idDocument_type,Document_author,Document_description,Entity_idEntity) values('$docName','$doctype','$authorName','$docdescription','$last_id')");


$query=mysqli_query($con,"update document set Document_name ='$fname',Document_author ='$author',Document_description ='$address',Document_type_idDocument_type='$doctype',Entity_idEntity='$last_id'  where idDocument='".$_GET['cid']."'");
if($query)
{
$successmsg="Document updated Successfully !!";
header('location:docmanage.php');
}
else
{
$errormsg="Document not updated !!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>DCMS | Document Update </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Update Document</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	

                      <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
 <?php
 $query=mysqli_query($con,"select * from document where idDocument='".$_GET['cid']."'");
 
// $query=mysqli_query($con,"SELECT document.*,document_type.documentTypeName, entity.Entity_name FROM ((document INNER JOIN document_type ON document.Document_type_idDocument_type = document_type.idDocument_type) INNER JOIN entity ON document.Entity_idEntity = entity.idEntity)
// where idDocument='".$_GET['cid']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>                     

  <h4 class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($row['Document_name']);?></h4>
    <h5><b>Last Updated at :</b>&nbsp;&nbsp;<?php echo htmlentities($row['Document_modified_date']);?></h5>
                      <form class="form-horizontal style-form" method="post" name="profile" >

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Document Name</label>
<div class="col-sm-4">
<input type="text" name="fullname" required="required" value="<?php echo htmlentities($row['Document_name']);?>" class="form-control" >
 </div>
 <label class="col-sm-2 col-sm-2 control-label">Document Description </label>
<div class="col-sm-4">
<textarea  name="address" required="required" class="form-control"><?php echo htmlentities($row['Document_description']);?></textarea>
</div>

 </div>

 


 <div class="form-group">

<label class="col-sm-2 col-sm-2 control-label">Entity Name</label>
<div class="col-sm-4">
<input type="text" name="eName" required="required" value="" required="" onChange="getCat(this.value);" class="form-control">

</div>
<?php $query=mysqli_query($con,"select * from users where userEmail='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?>  
<div class="form-group">
<label class="col-sm-2 control-label">Document Author</label>
<div class="col-sm-3">

<input type="email" name="useremail" required="required" value="<?php echo htmlentities($row['userEmail']);?>" class="form-control" readonly>

</div>
</div>
<label class="col-sm-2 col-sm-2 control-label">Select Document Type</label>
<div class="col-sm-4">
<select name="doctype" id="category" class="form-control" onChange="getCat(this.value);" required="">
<!-- <option value="">Document Type</option> -->
<?php $sql=mysqli_query($con,"select idDocument_type,documentTypeName  from  document_type ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['idDocument_type']);?>"><?php echo htmlentities($rw['documentTypeName']);?></option>
<?php
}
?>
</select>
 </div>

</div>
<div>
<?php 
// $query=mysqli_query($con,"select document.*,users.Username as name from document join users on users.idUsers=document.userId where document.status is null ");
$query=mysqli_query($con,"select * from document where idDocument='".$_GET['cid']."'");

while($row=mysqli_fetch_array($query))

{
  
?>										

<!-- <a href="update-docimage.php?did=<?php echo htmlentities($row['idDocument']);?>"> 
upload Image
</a> -->

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Document Photo</label>
<div class="col-sm-4">
<?php $docphoto=$row['path'];
if($docphoto==""):
?>
<img src="docimages/noimage.png" width="700" height="1007" >
<?php else:?>
  <img src="<?php echo $row['path']; ?>" width="700" height="1007" >

<?php endif;?>
</div>


</div>
<?php  } ?>

</div>
<?php }?>

<?php } ?>

                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>

                          </form>
                          </div>
                          </div>
                          </div>
                          
          	
          	
		</section>
      </section>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>

<?php } ?>
