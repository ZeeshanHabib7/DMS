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
                      <a href="dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-file-text-o"></i>
                          <span>Manage Documents </span>
                          
                      </a>
                      <ul class="sub">
                          <li><a class="fa fa-plus" href="adddoc.php"> Add Documents</a></li>
                          <li><a  href="#">Edit Documents</a></li>
                        
                      </ul>
                      <li class="sub-menu">
                      <a href="javascript:;" >
                      <i class="fa fa-file-text-o"></i>
                          <span>Templates</span>
                      </a>
                      <ul class="sub">
                          <li><a class="fa fa-plus" href="MA/tmpdesign.php">  Add New Templates</a></li>
                          <li><a  href="change-password.php">View Templates</a></li>
                        
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Account Setting</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="profile.php"> Profile</a></li>
                          <li><a  href="change-password.php">Change Password</a></li>
                        
                      </ul>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>