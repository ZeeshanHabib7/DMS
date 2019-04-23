<?php
 include_once 'dbh.php';

 $template = $_POST['temp'];
 $fld_Name = $_POST['fl_name'];
 $dt_type = $_POST['dt_type'];
 $idt_type = $_POST['idt_type'];
 $coordinates = $_POST['coordinates'];
 $creator = $_POST['creator'];
 

//  $sql = "INSERT into test (tempName,fldName,dtType,idtType,coordinates) VALUES ('$template','$fld_Name','$dt_type','$idt_type','$coordinates');";
 
 $sql = "INSERT into template (tempName,createdBy) VALUES ('$template','$creator');";
 
 mysqli_query($conn,$sql);
header("Location:../index.php?datainserted=success");
?>