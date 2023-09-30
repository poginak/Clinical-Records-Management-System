<style>
  .uploadButton input[type="files"]{
      cursor: pointer;
      position: absolute;
      top: 0px;
      opacity: 0;
  }
  .uploadButton{
      position: relative;
      overflow: hidden;
      cursor: pointer;
      opacity: 0.3;
  }
  .uploadButton:hover{
      opacity: 1;
  }
  .rounded-circle{
    border-radius: 50%;
  }
</style>

<ul class="navbar-nav ml-auto">
    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <!-- Counter - Alerts -->
            <span class="badge badge-danger badge-counter">3+</span>
        </a>
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Alerts Center
            </h6>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
        </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $acctname;?></span>
            <?php
              if($login_profile!=''){ 
            ?>
                <img src="data:image/jpeg;base64,<?php echo base64_encode($login_profile);?>" alt="Image" class="img-profile rounded-circle">
            <?php }else{ ?>
                <img src="img/user.png" alt="Image" class="img-profile rounded-circle"/>
            <?php } ?>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editprofile">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Settings
            </a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changepass">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Change Password
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>

</nav>


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="includes/logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 align="left">Edit Profile</h4>
                </div>
                 <form action="functions/edit_profile.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                        <div class="form-group">
                            <center>
                            <?php
                              if($login_profile!=''){ 
                            ?>
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($login_profile);?>"  alt="Image" width="100px" height="100px" id="pprev" class="rounded-circle">
                            <?php }else{ ?>
                                <img src="img/user.png" alt="Image" width="100px" height="100px" id="pprev" class="rounded-circle"/>
                            <?php } ?>
                            </center>
                        </div>
                        <div class="form-group row">
                                <?php
                                    if($login_profile!=''){ 
                                ?>
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Change Photo:</label>
                                <?php } else { ?>
                                <label class="control-label col-md-4 col-sm-3 col-xs-12">Upload Photo:</label>
                                <?php }?>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                  <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
                                  <input name="files" type="file" id="files" class="uploadButton" />
                              </div>
                      </div>
                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Email Address: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="email" name="email" value="<?php echo $login_email;?>" class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Username: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" name="uname" value="<?php echo $username;?>" class="form-control" readonly>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Account Name: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="text" name="acctname" value="<?php echo $acctname;?>" class="form-control">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Password: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="password" name="pword" class="form-control" required>
                        </div>
                      </div>
                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">SAVE</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

     <!-- Change Password Modal -->
    <div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 align="left">Change Password</h4>
                </div>
                <form action="functions/change_pass.php" method="POST" onsubmit="return checkForm(this);">
                <div class="modal-body">
                    <input type="hidden" name="uname" value="<?php echo $username;?>">
                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Old Password: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="password" name="oldpword" class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">New Password: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="password" name="newpword" class="form-control" required>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="control-label col-md-4 col-sm-3 col-xs-12">Confirm Password: </label>
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            <input type="password" name="rpword" class="form-control" required>
                        </div>
                      </div>

                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">SAVE</button>
                </div>
            </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script type="text/javascript">
        function checkForm(form){
            if(form.newpword.value == form.rpword.value){
                if(form.newpword.value.length < 6){
                    alert("Password must be atleast 6 to 15 characters");
                    form.newpword.focus();
                    return false;
                }
                re = /[a-z]/;
                if(!re.test(form.newpword.value)){
                    alert("Password must have atleast one lower case letter");
                    form.newpword.focus();
                    return false;
                }
                re = /[A-Z]/;
                if(!re.test(form.newpword.value)){
                    alert("Password must have atleast one upper case letter");
                    form.newpword.focus();
                    return false;
                }
                re = /[0-9]/;
                if(!re.test(form.newpword.value)){
                    alert("Password must have atleast one digit/number");
                    form.newpword.focus();
                    return false;
                }
            }else{
                alert("Password mismatch");
                //document.getElementById("err1").value = "Password mismatch";
                form.newpword.focus();
                return false;
            }
        }

    </script>