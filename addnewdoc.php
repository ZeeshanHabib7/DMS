<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$uid=$_SESSION['id'];
$doctype=$_POST['doctype'];
$authorName=$_POST['useremail'];
$docName=$_POST['docName'];
$docdescription=$_POST['docdescription'];
$compfile=$_FILES["compfile"]["name"];



move_uploaded_file($_FILES["compfile"]["tmp_name"],"complaintdocs/".$_FILES["compfile"]["name"]);
$eName=$_POST['eName'];
$sql="INSERT INTO entity (Entity_name) VALUES ('$eName')";
mysqli_query($con,$sql);
$last_id = mysqli_insert_id($con);

$query=mysqli_query($con,"insert into document(Document_name ,Document_type_idDocument_type,Document_author,Document_description,Entity_idEntity) values('$docName','$doctype','$authorName','$docdescription','$last_id')");


// code for show Document Name
$sql=mysqli_query($con,"select Document_name from document");
while($row=mysqli_fetch_array($sql))
{
 $cmpn=$row['Document_name'];
}
$complainno=$cmpn;
echo '<script> alert("Your document has been successfully filled and  Document Name is  "+"'.$complainno.'")</script>';
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

    <title>DCMS | Add New Document </title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <script>
function getCat(val) {
  //alert('val');

  $.ajax({
  type: "POST",
  url: "getsubcat.php",
  data:'catid='+val,
  success: function(data){
    $("#subcategory").html(data);
    
  }
  });
  }
  </script>
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
<?php          include('document.php'); ?>

          	<h3><i class="fa fa-angle-right"></i> Add New Document</h3>


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

                      <form class="form-horizontal style-form" method="post" name="complaint" enctype="multipart/form-data" >



              
<div class="form-group">
<div>
<label class="col-sm-2 col-sm-2 control-label">Document Name </label>
 <div class="col-sm-4">
 <input type="text" class="form-control" placeholder="Document Name" name="docname" required="required" autofocus>
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
 </div>




<!-- <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Request Type</label>
<div class="col-sm-4">
<select name="complaintype" class="form-control" required="">
                <option value=" Complaint"> Issuence of Document</option>
                  <option value="General Query">General Query</option>
                </select> 
</div>

<label class="col-sm-2 col-sm-2 control-label">Department</label>
<div class="col-sm-4">
<select name="state" required="required" class="form-control">
<option value="">Select Your Department</option>
<?php $sql=mysqli_query($con,"select stateName from state ");
while ($rw=mysqli_fetch_array($sql)) {
  ?>
  <option value="<?php echo htmlentities($rw['stateName']);?>"><?php echo htmlentities($rw['stateName']);?></option>
<?php
}
?>

</select>
</div>
</div> -->


<div class="form-group">

<label class="col-sm-2 col-sm-2 control-label">Entity Name</label>
<div class="col-sm-4">
<input type="text" name="eName" required="required" value="" required="" onChange="getCat(this.value);" class="form-control">

</div>

<!-- user/author name-->
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

<div>

<div class="form-group">
<label class="col-sm-2 control-label">Description </label>
<div class="col-sm-4">
<textarea  name="docdescription" required="required" cols="5" rows="5" class="form-control" maxlength="200"></textarea>
</div>
</div>

<br>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Doc Photo</label>
<div class="col-sm-4">
<?php 

$docphoto=$row['documentImage'];
if($docphoto==""):
?>
<img src="docimages/noimage.png" width="256" height="256" >
<!-- <a href="update-docimage.php?cid=<?php echo htmlentities($row['idDocument']);?>">Change Photo</a> -->
<a href="update-docimage.php">Change Photo</a>
<?php else:?>
	<img src="docimages/<?php echo htmlentities($docphoto);?>" width="256" height="256">
  <!-- <a href="update-docimage.php?cid=<?php echo htmlentities($row['idDocument']);?>">Change Photo</a> -->

	 <a href="update-docimage.php">Change Photo</a>
<?php endif;?>
</div>
</div>

<?php } ?>


<!-- <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Document file(if any) </label>
<div class="col-sm-4">
<input type="file" name="compfile" class="form-control" value="">
</div> -->
</div>



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
    <!-- <?php include("includes/footer.php");?> -->
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
