<div class="topbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed top-nav" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="topbar-alert" href="#">
                    <p>
                        Registration Closes in <span id="demo">0</span> Days
                        <a class="apply-now" href="<?php if(isset($_SESSION['username'])){echo "application_form.php"; }else{ echo "apply-now.php"; } ?>">APPLY NOW</a>
                    </p>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                      <li><a href="http://www.aljalilachildrens.ae/">AJCH</a></li>
                      <li><a href="contact-us.php">CONTACT US</a></li>
                      <?php if(isset($_SESSION['username'])){ ?>
                      <li class="dropdown">
                        <a href="#"><?php echo strtoupper($_SESSION['username']); ?></a>
                        <ul class="dropdown-menu">
                          <li><a href="logout.php">Logout</a></li>
                        </ul>
                      </li>
                      <?php }  else{ ?>
                      <li><a href="apply-now.php">SIGN IN</a></li>
                      <?php } ?>
                  </ul>
              </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
    </div>