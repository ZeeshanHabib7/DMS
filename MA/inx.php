<!DOCTYPE html>
<html lang="en">
<head>
  <title>Template Designer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<!--   
  <link rel="stylesheet" href="imgareaselect-animated.css">
   -->
  <link href="../resources/jquery.selectareas.css" media="screen" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><link href="../resources/jquery.selectareas.ie8.css" media="screen" rel="stylesheet" type="text/css" /> <![endif]-->
		
		<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
		
		<script src="../jquery.selectareas.js" type="text/javascript"></script>
		
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
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
<script src="../jquery.selectareas.js" type="text/javascript"></script>
		
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Template Designer</h4>
      <br>
      <div class="input-group">
        <form action="cropper.php" method="post" enctype="multipart/form-data"> <br>
          Upload Image: <input type="file" name="image" id="image" />
          
          <br>
        </div>
        
          <!-- <p >X :  </p> 
           <input type="text" name="x1" value=""  placeholder="X-coordinate" /> 
           <p>Y : </p> 
           <input type="text" name="y1" value="" placeholder="Y-coordinate" />
           <p>Width : </p>
            <input type="text" name="w" value="" placeholder="Width"/>
           <p>Height :</p>
           <input type="text" name="h" value="" placeholder="Height"/> <br> <br> -->
</form>
</div>
<div class="col-sm-9">
      <h4><small>Image Preview</small></h4>
      <hr>
      
      <br><br>
      <p><img id="previewimage" style="display:none;"/></p>
      <script>
        jQuery(function($) {
     
            var p = $("#previewimage");
            $("body").on("change", "#image", function(){
     
                var imageReader = new FileReader();
                imageReader.readAsDataURL(document.getElementById("image").files[0]);
         
                imageReader.onload = function (oFREvent) {
                    p.attr('src', oFREvent.target.result).fadeIn();
                };
            });
     
            $('#previewimage').imgAreaSelect({
                onSelectEnd: function (img, selection) {
                    $('input[name="x1"]').val(selection.x1);
                    $('input[name="y1"]').val(selection.y1);
                    $('input[name="w"]').val(selection.width);
                    $('input[name="h"]').val(selection.height);            
                }
            });
        });
    </script>
<!-- 
New script for multiple area selection -->


</body>