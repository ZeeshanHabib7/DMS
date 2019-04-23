<?php session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:../dashboard.php');
}
else{ ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    
    <title> DCMS | Template Designer</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="assets/lineicons/style.css">    
    <link href="jquery.selectareas.css" media="screen" rel="stylesheet" type="text/css" />
	
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <script src="assets/js/chart-master/Chart.js"></script>
    <style>
/* Style the close button */
.close {
  position: absolute;
  right: 0;
  top: 0;
  padding: 12px 16px 12px 16px;
}

.close:hover {
  background-color: #f44336;
  color: white;
}

  
 /* Style the "Add" button */
.addBtn {
  padding: 10px;
  width: 25%;
  background: #d9d9d9;
  color: #555;
  float: left;
  text-align: center;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
  border-radius: 0;
}

.addBtn:hover {
  background-color: #bbb;
}
	#output {
	margin: 0 20px;
	padding: 20px;
	width: 250px;
	height: 300px;
	position: relative;
	background-color: #000;
	color: #090;
	font-weight: bold;
	font-size: 16px;
	font-family: monospace;
	overflow-x: auto;
	overflow-y: scroll;
}


div.image-decorator {
	-moz-border-radius : 5px 5px 5px 5px;
	-moz-box-shadow : 0 0 6px #c8c8c8;
	-webkit-border-radius : 5px 5px 5px 5px;
	-webkit-box-shadow : 0 0 6px #c8c8c8;
	background-color : #ffffff;
	border : 1px solid #c8c8c8;
	border-radius : 5px 5px 5px 5px;
	box-shadow : 0 0 6px #c8c8c8;
	display : inline-block;
	padding : 5px 5px 5px 5px;
	position: relative;
	margin-bottom: 10px;
}

/* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
/*       
      background: url(includes/sidebar-5.jpg);
      background-repeat: no-repeat; /* Do not repeat the image 
      background-size: cover; /* Resize the background image to cover the entire container 
       */
      background-color: #333333;
      color: #ffffff;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
<?php include("includes/header.php");?>
<?php include("includes/sidenav.php");?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  
                  	<div class="col-md-2 col-sm-2 box0">
                        <div>
                 
                  </div></div>
                  <!-- <h3>DCMS V1.0</h3>	 -->
                  <h2><small>Image preview</small></h2>
     
      <div class="image-decorator">
				<img alt="Admit Card" id="out1" src="600/zxc.jpg"/>

  </div>
                  	
                  	</div><!-- /row mt -->	
                  
                      
                     
                    				
				
				
          </section>
      </section>

  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/jquery-1.8.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/jquery.sparkline.js"></script>
    <script src="jquery.selectareas.js" type="text/javascript"></script>
	   <!-- <script src="ADD.js" type="text/javascript"></script>
	 -->
 		   <script type="text/javascript">
				$(document).ready(function () {
				$('img#out1').selectAreas({
					minSize: [10, 10],
					onChanged: debugQtyAreas,
					
					areas: [
						{
							x: 724,
							y: 35,
							width: 248,
							height: 178,
						}
					]
				});
        
        $('#btnView').click(function () {
					var areas = $('img#out1').selectAreas('areas');
					displayAreas(areas);
				});
				
        
        $('#btnViewRel').click(function () {
					var areas = $('img#out1').selectAreas('relativeAreas');
					displayAreas(areas);
				});
        
        $('#btnReset').click(function () {
					output("reset")
					$('img#out1').selectAreas('reset');	
				});
				// $('#btnDestroy').click(function () {
				// 	$('img#out1').selectAreas('destroy');

				// 	output("destroyed")
				// 	$('.actionOn').attr("disabled", "disabled");
				// 	$('.actionOff').removeAttr("disabled")
				// });
				// // $('#btnCreate').attr("disabled", "disabled").click(function () {
				// 	$('img#out1').selectAreas({
				// 		minSize: [10, 10],
				// 		onChanged : debugQtyAreas,
				// 		width: 500,
				// 	});

				// 	output("created")
				// 	$('.actionOff').attr("disabled", "disabled");
				// 	$('.actionOn').removeAttr("disabled")
				// });
				// $('#btnNew').click(function () {
				// 	var areaOptions = {
				// 		x: Math.floor((Math.random() * 200)),
				// 		y: Math.floor((Math.random() * 200)),
				// 		width: Math.floor((Math.random() * 100)) + 50,
				// 		height: Math.floor((Math.random() * 100)) + 20,
				// 	};
				// 	output("Add a new area: " + areaToString(areaOptions))
				// 	$('img#out1').selectAreas('add', areaOptions);
				// });

				$('#btnNews').click(function () {
					var areaOption1 = {
						x: Math.floor((Math.random() * 200)),
						y: Math.floor((Math.random() * 200)),
						width: Math.floor((Math.random() * 100)) + 50,
						height: Math.floor((Math.random() * 100)) + 20,
					}, areaOption2 = {
						x: areaOption1.x + areaOption1.width + 10,
						y: areaOption1.y + areaOption1.height - 20,
						width: 50,
						height: 20,
					};
					
					output("Add a new area: " + areaToString(areaOption1) + " and " + areaToString(areaOption2))
					$('img#out1').selectAreas('add', [areaOption1, areaOption2]);
				});
			});

			var selectionExists;
// plus sign represnts the concatination
			function areaToString (area) {
				// return (typeof area.id === "undefined" ? "" : (area.id + ":"))
				//  + area.x + ':' + area.y  + '<br />' + area.width + 'x' + area.height + '<br />'
        return (typeof area.id === "undefined" ? "" : (area.id + ":"))
        + '<br />' + area.width+ 'x' + area.height + '<br />'+ '+' + area.x + '+' + area.y + '<br />'
			}
       
      
			function output (text) {
				$('#width').val(text);	
			}

			// Log the quantity of selections
			function debugQtyAreas (event, id, areas) {
				console.log(areas.length + " areas", arguments);
			};

			// Display areas coordinates in a div
			function displayAreas (areas) {
				var text = "";
				
				$.each(areas, function (id, area) {
					text += areaToString(area);
				
				});

			
				// output(text);
				$('#width').val(text);
				
				// $('#').val(text);
				// $('#').val(text);
				
				// $('#y').val(area.y);
				// $('#width').val(text);
				// $('#height').val(text);
			
			};
	
		</script><link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="assets/js/sparkline-chart.js"></script>    
	<script src="assets/js/zabuto_calendar.js"></script>	
  </body>
</html>
<?php 
 }
 ?>
