
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Template Designer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="jquery.selectareas.css" media="screen" rel="stylesheet" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
	
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
     <script src="jquery.selectareas.js" type="text/javascript"></script>
	   <!-- <script src="ADD.js" type="text/javascript"></script>
	 -->
 		   <script type="text/javascript">
				$(document).ready(function () {
				$('img#out1').selectAreas({
					minSize: [10, 10],
					onChanged: debugQtyAreas,
					width: 500,
					areas: [
						{
							x: 10,
							y: 50,
							width: 60,
							height: 60,
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
				return (typeof area.id === "undefined" ? "" : (area.id + ": "))
				 + area.x + ':' + area.y  + ' ' + area.width + 'x' + area.height + '<br />'
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
      background-color: #f1f1f1;
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
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h3>Template Designer</h3>
      <hr>
			<form action = includes/insert.php method = "POST"  >
		 <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Area 1</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"><form action="insert.php" method="POST"  >
						 <div class="form-group">
                <label for="template">Template Name:</label>
                <input type="text" class="form-control" name="temp" id="template">
                </div>
                <div class="form-group">
                <label for="fi_Name">Field Name:</label>
                <input type="text" class="form-control" name="fl_name" id="fld_Name">
                </div> 
                <div class="form-group">
                <label for="sel1" >Detection Type:</label>
                <select class="form-control" id="sel1" name="dt_type">
                <option>OCR</option>
                <option>Pattern Matching</option>
                </select>
                </div> 
                <div class="form-group">
                <label for="sel2">Identification:</label>
                <select class="form-control" id="sel2" name="idt_type">
                <option>Entity</option>
                <option>Document</option>
                </select>
                </div> 
                <br>
								<hr>
								<br>
   							 <p>
            		<!-- <p>    
										<input type="button" id="btnViewRel" value="Display relative"class="btn btn-info btn-md" >
					</p>
				
										
									 <div  id="output" class='output'>
										
											</div> -->

							   <!-- <input type="textarea" id= "width" value=""  disabled="disabled"  >
								 -->
							 <!-- <input type="text" id="height" value="">
							 <input type="text" id="x" value="">
							 <input type="text" id="y" value=""> -->

								</form>
								</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Area 2</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
				<form action="insert.php" method="POST"  >
						 <div class="form-group">
                <label for="template">Template Name:</label>
                <input type="text" class="form-control" name="temp" id="template">
                </div>
                <div class="form-group">
                <label for="fi_Name">Field Name:</label>
                <input type="text" class="form-control" name="fl_name" id="fld_Name">
                </div> 
                <div class="form-group">
                <label for="sel1" >Detection Type:</label>
                <select class="form-control" id="sel1" name="dt_type">
                <option>OCR</option>
                <option>Pattern Matching</option>
                </select>
                </div> 
                <div class="form-group">
                <label for="sel2">Identification:</label>
                <select class="form-control" id="sel2" name="idt_type">
                <option>Entity</option>
                <option>Document</option>
                </select>
                </div> 
                <br>
								<hr>
								
					 <br>
 					  
					
								</form>
				</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Area 3</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
				<form action="insert.php" method="POST"  >
						 <div class="form-group">
                <label for="template">Template Name:</label>
                <input type="text" class="form-control" name="temp" id="template">
                </div>
                <div class="form-group">
                <label for="fi_Name">Field Name:</label>
                <input type="text" class="form-control" name="fl_name" id="fld_Name">
                </div> 
                <div class="form-group">
                <label for="sel1" >Detection Type:</label>
                <select class="form-control" id="sel1" name="dt_type">
                <option>OCR</option>
                <option>Pattern Matching</option>
                </select>
                </div> 
                <div class="form-group">
                <label for="sel2">Identification:</label>
                <select class="form-control" id="sel2" name="idt_type">
                <option>Entity</option>
                <option>Document</option>
                </select>
                </div> 
                <br>
								<hr>
					
					 <br>
    					<p>
  									
				
																</div>
      </div>
    </div>
  </div>
	</form>

							<form> 
							
							<div class="form-group">
							<label for="coordinates">Coordinates</label>	
							<br>			
						 <p><input type="button" id="btnView" value="Display areas"class="btn btn-info btn-md" >
						 </p>
						<p>
						 <input type="button" id="btnViewRel" value="Display relative"class="btn btn-info btn-md" >
						 </p>
						 <p>
						 <input type="button" id="btnReset" value="Reset" class="btn btn-info btn-md" >
             </p>
						 <!-- <button type="submit" id="sbt" name= "submit" value="submit" class="btn btn-info btn-md"  > </button>
						 -->
						 <textarea name ="coordinates " class="form-control" rows="5" id="width" value="" disabled="disabled" ></textarea>
						 <button type="button" name=submit class="btn btn-primary">submit</button>
							</div>



						</form>

						
				
  </div>
</form>
    <!-- 
This the content bar  -->

    <div class="col-sm-9">
      <h2><small>Image preview</small></h2>
      <hr>
	
      <div class="image-decorator">
				<img alt="Admit Card" id="out1" src="out1.png"/>
			</div>
			
    </div>

</body>
</html>
