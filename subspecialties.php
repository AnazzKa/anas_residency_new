<!DOCTYPE html>
<html lang="en-US">
  
  <!-- Heady -->
  <?php include 'head.php'; ?>
  <!-- /.Heady -->

  <!-- Body -->
  <body class="subpage curriculum-page">

    <!-- NavBar -->
     <?php include 'top_nav.php'; ?>
    <!-- /.NavBar -->

    <!-- Header -->
    <header>
      <!-- Header Bar -->
      <?php include 'header.php'; ?>
      <!-- /.Header Bar -->

      <!-- Banner -->
      <div class="sub-banner curriculum-tab">
        <div class="container">
          <ul class="tab-menu curriculum-tab">
            <li class="active"><a href="curriculum.php">Curriculum</a></li>
            <li><a href="educational-activities.php">Educational Activities</a></li>
          </ul>
        </div>
      </div>
      <!-- /.Banner -->

    </header>
    <!-- /.Header -->



    <!-- Content Area -->
    <div class="content-area sub-content curriculum">
      <div class="container">
      	<div class="row">
          <div id="rotation" class=" tab-pane fade active in">          

            <div class="col-sm-3 left"><!-- col-sm-4 left -->
              <div class="side-menu-wraper">
                <ul class="side-bar-tab supp_serv support_services web-menu">
                  <li>
                      <a href="curriculum.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Overview</a>
                  </li>
                  <li>
                    <a href="core-rotations.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Core Rotations</a>
                  </li>
                  <li>
                    <a href="elective.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Electives</a>
                  </li>
                  <li class="active">
                    <a href="subspecialties.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Subspecialties</a>
                  </li>
                </ul>                
              </div>
            </div>


            <div class="col-sm-9 right">
              <p>The following subspecialities are currently available at Al Jalila Children's:</p>
              <table class="table">
                <tbody><tr>
                    <td>Adolescent Medicine</td>
                    <td>Surgery</td>
                    <td>ENT</td>
                </tr>
                <tr>
                    <td>Cardiology</td>
                    <td>Gastroenterology</td>
                    <td>Hematology/Oncology</td>
                </tr>
                <tr>
                    <td>Infectious Disease</td>
                    <td>Nephrology</td>
                    <td>Neurology</td>
                </tr>
                <tr>
                    <td>Neurorehabilitation</td>
                    <td>Ophthalmology</td>
                    <td>Orthopedics</td>
                </tr>
                <tr>
                    <td>Psychiatry</td>
                    <td>Pulmonology</td>
                    <td>Radiology</td>
                </tr>
                <tr>
                    <td>Rheumatology</td>
                    <td>Neurodevelopment</td>
                    <td>Anaesthesia</td>
                </tr>
                <tr>
                    <td>Endocrinology</td>
                    <td>Oral Maxillofacial</td>
                    <td>Genetics</td>
                </tr>
              </tbody>
              </table>
                  
               
           </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.Content Area -->


    <?php include 'footer.php'; ?>
    <!-- /.Footer -->

    <!-- Java Script --> 
    <?php include 'script.php' ?>

  </body>
</html>