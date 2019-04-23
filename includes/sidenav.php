<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                 <?php $query=mysqli_query($con,"select Username,userImage from users where userEmail='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
                  <p class="centered"><a href="profile.php">
<?php $userphoto=$row['userImage'];
if($userphoto==""):
?>
<img src="userimages/noimage.png"  class="img-circle" width="70" height="70" >
<?php else:?>
  <img src="userimages/<?php echo htmlentities($userphoto);?>" class="img-circle" width="70" height="70">

<?php endif;?>
</a>
</p>
 
                  <h5 class="centered"><?php echo htmlentities($row['Username']);?></h5>
                  <?php } ?>
                    
                  <li class="mt">
                     
                        
                          <span>
                          <form action="insert.php" method="POST" >
      <div class="form-group">
                <label for="template">Template Name:</label>
                <input type="text" class="form-control" name="temp" id="template">
                </div>

      <div class="form-group">
                <label for="creator">Creator Name:</label>
                <input type="text" class="form-control" name="creator" id="crt">
                
                </div>  

              

                          </span>
                     
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-file-text-o"></i>
                          <span> Area 1 </span>
                          
                      </a>
                      <br>
                      <ul class="sub">
                          <li>
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
                          </li>
                          
                        
                      </ul>
                      <li class="sub-menu">
                      <a href="javascript:;" >
                      <i class="fa fa-file-text-o"></i>
                          <span>Area 2</span>
                      </a>
                      <br>
                      <ul class="sub">
                          <li>
                          <div class="form-group">
                <label for="fi_Name">Field Name:</label>
                <input type="text" class="form-control" name="fl_name1" id="fld_Name">
                </div> 
                <div class="form-group">
                <label for="sel1" >Detection Type:</label>
                <select class="form-control" id="sel1" name="dt_type1">
                <option>OCR</option>
                <option>Pattern Matching</option>
                </select>
                </div> 
                <div class="form-group">
                <label for="sel2">Identification:</label>
                <select class="form-control" id="sel2" name="idt_type1">
                <option>Entity</option>
                <option>Document</option>
                </select>
                </div>
                          </li>
                          <li>
                          </li>
                        
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i  class="fa fa-eye"></i>
                          <span>Display Areas</span>
                      </a>
                      <ul class="sub">
                          <li>
                          <br>
                          <p><input type="button" id="btnView" value="Display areas"class="btn btn-info btn-md" >
                         <br>
                          <p>
						 <input type="button" id="btnReset" value="Reset" class="btn btn-info btn-md" >
                         </p>
						 
                          </li>               <div class="form-group">
                            <label for="crd">Co-ordinates:</label>
                            <input type="text" class="form-control" name="coordinates" id="width">
                        </div>
                    	 <button type="submit" name=submit class="btn btn-primary">submit</button>
						</div>
          

                        </form>
                          <li>
                          </li>
                        
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>