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


// if(isset($_POST['submit']))
// {
// $fname=$_POST['fullname'];
// $contactno=$_POST['contactno'];
// $address=$_POST['address'];
// $state=$_POST['state'];
// $country=$_POST['country'];
// $pincode=$_POST['pincode'];
// $query=mysqli_query($con,"update users set Username='$fname',contactNo='$contactno',address='$address' where userEmail='".$_SESSION['login']."'");
// if($query)
// {
// $successmsg="Profile Successfully !!";
// }
// else
// {
// $errormsg="Profile not updated !!";
// }
// }

if(isset($_POST['save_btn']))
{
    // if($con = mysqli_connect('localhost','root','','dms'))
    // {
 
        $filetemp=$_FILES['img']['tmp_name'];
        $filename=$_FILES['img']['name'];
        $filetype=$_FILES['img']['type'];
        $filepath="docimages/".$filename;
        $query=mysqli_query($con, "select Document_name  from document where Document_name like $filename");
        move_uploaded_file($filetemp,$filepath);
        $query=mysqli_query($con, "call uploaddocimage('$filename', '$filepath', '$filetype')");
        if($query)
        {
            header('location:adddoc.php');
            echo"--------------------------------Document inserted Successfully------------------------------------------------------";
        }
        else
        {
            echo"insertion failed";
        }
    //}

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

    <title>DCMS | User Profile </title>

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
          	<h3><i class="fa fa-angle-right"></i> Upload New Document</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	
                  <form action="" method="POST" enctype="multipart/form-data">
<h2 align="center"> Upload New Document </h2>

<table align="center"> 
<tr>
<td> <label>Document Image</label></td>
<td> <label>:</label></td>
<td> <label><input id="docimage" type="file" name="img" required="required" onBlur="userAvailability()" autofocus /></label></td>
<span id="user-availability-status1" style="font-size:12px;"></span>
</tr>
<tr>
<td> <label></label></td>
<td> <label></label></td>
<td> <label> <input type="submit" id=imagepreview name="save_btn" value="save"/> </label></td>
</tr>
</table>
</form>

<!-- <form id="form1" runat="server">
<form action="" method="POST" enctype="multipart/form-data">
    <input type='file' id="inputFile" />
    <img id="image_upload_preview" type="file" name="img"  required="required" autofocus width=500 height=700 />
    <label> <input type="submit" id=image_upload_preview name="save_btn" value="save"/> </label>
</form>

                       -->
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
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image_upload_preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#inputFile").change(function () {
        
        readURL(this);
    });
</script>

<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_doc.php",
data:'img='+$("#docimage").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
  </body>
</html>
<?php } ?>
