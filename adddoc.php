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
}
if(isset($_GET['uid']) && $_GET['action']=='del')
{
$userid=$_GET['uid'];
//DELETE FROM `userlog` WHERE `userlog`.`uid` = 12
//$query1=mysqli_query($con,"DELETE FROM `userlog` WHERE `userlog`.`uid` = $userid'");

$query=mysqli_query($con,"delete from document where idDocument='$userid'");
header('location:manage-users.php');
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

    <title>DCMS | Document not processed yet</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+500+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/sidebar.php");?>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-file-text-o"></i> Documents not processed yet</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
        
              <div class="span9">
					<div class="content">

          <div class="module-body table">


							
<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" >
  <thead>
    <tr>
      <th>Document ID</th>
      <th> Document Name</th>
      <th>last updation Date</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>

<tbody>
<?php 
// $query=mysqli_query($con,"select document.*,users.Username as name from document join users on users.idUsers=document.userId where document.status is null ");
$query=mysqli_query($con,"select * from document where Document_type_idDocument_type is null AND Entity_idEntity is null");

while($row=mysqli_fetch_array($query))

{
?>										
    <tr>
    <td><?php echo htmlentities($row['idDocument']);?></td>
      <td><?php echo htmlentities($row['Document_name']);?></td>
      <td><?php echo htmlentities($row['Document_modified_date']);?></td> 
      <td><button type="button" class="btn btn-danger">Not process yet</button></td>
      
      <td>   <a href="managedoc.php?cid=<?php echo htmlentities($row['idDocument']);?>"> View Details</a> 
      <a href="managedoc.php?uid=<?php echo htmlentities($row['idDocument']);?>&&action=del" title="Delete" onClick="return confirm('Do you really want to delete ?')">
<button type="button" class="btn btn-danger" disabled >Delete</button></a>

      </td>
 
 
      </tr>

    <?php  } ?>
    </tbody>
</table>
</div>						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->






</div>

                          </form>
                          </div>
                          </div>
                          </div>
                          
          	
          	
		</section>
      </section>
    <!-- <?php include("includes/footer.php");?>
   -->
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
