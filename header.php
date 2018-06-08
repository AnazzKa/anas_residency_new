<div class="header-bar">
        <div class="container">  
          <div class="row">
            
            <!-- Brand Logo -->
            <div class="col-md-4 logo-wrap">                 
              <a class="brand-logo" href="index.php"><img class="img-responsive" src="assets/images/Al-Jalila-logo.png" alt="AJCH Logo"></a>
              <div class="mobile-menu-icon"></div>
            </div>     

            <!-- Main Navigation -->
            <div class="col-md-8">

              <!-- Navigation -->
              <div class="w-menu">                             
                <div class="mobile-menu">
                  <ul>
                    <li><a href="about-us.php">About us</a>
                      <ul>
                        <li><a href="directors-message.php">Director's message</a></li>
                        <li><a href="team.php">Team</a></li>
                        <li><a href="affiliation.php">Affiliation</a></li>
                      </ul>
                    </li>
                    <li><a href="curriculum.php">Curriculum</a>
                      <ul>
                        <li><a href="educational-activities.php">Educational Activities</a></li>
                      </ul>
                    </li>
                    <li><a href="admission.php">Admission</a>
                      <ul>
                        <li><a href="eligibility.php">Eligibility</a></li>
                        <li><a href="<?php if(isset($_SESSION['username'])){echo "application_form.php"; }else{ echo "apply-now.php"; } ?>">Apply Now</a></li>
                      </ul>
                    </li>
                    <li><a href="salary-benefits.php">Salary &amp; Benefits</a></li>
                  </ul>                
                </div>
              </div>
              <!-- /.Navigation -->
   
            </div>
            <!-- Main Navigation -->

          </div>
        </div>
      </div>