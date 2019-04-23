<?php
 

 $template = $_POST['temp'];
 $fld_Name = $_POST['fl_name'];
 $fld_Name1 = $_POST['fl_name1'];
 
 $dt_type = $_POST['dt_type'];
 $dt_type1 = $_POST['dt_type1'];

 $idt_type = $_POST['idt_type'];
 $idt_type1 = $_POST['idt_type1'];
 

 $coordinates = $_POST['coordinates'];
 
$var = $coordinates;
$result = explode("<br />",$var);
// var_dump($result);
 $area = $result[1].$result[2];
 $area1 = $result[4].$result[5];

 $creator = $_POST['creator'];


 $sql="INSERT INTO template (tempName,createdBy) VALUES ('$template','$creator')";
mysqli_query($con,$sql);
$last_id = mysqli_insert_id($con); 
 
$sql2="INSERT INTO templatefield (fieldName,Coordinates,dtType,idtType,template_idtemplate)
 VALUES ('$fld_Name',' $area','$dt_type','$idt_type','$last_id')";

mysqli_query($con,$sql2);

$sql3="INSERT INTO templatefield (fieldName,Coordinates,dtType,idtType,template_idtemplate)
 VALUES ('$fld_Name1',' $area1','$dt_type1','$idt_type1','$last_id')";

mysqli_query($con,$sql3);


header("Location:../tmpdesign.php?datainserted=success");
?>