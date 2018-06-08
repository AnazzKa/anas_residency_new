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

<!-- 
Start of global snippet: Please do not remove
Place this snippet between the <head> and </head> tags on every page of your site.
-->
<!-- Global site tag (gtag.js) - DoubleClick -->
<script async src="https://www.googletagmanager.com/gtag/js?id=DC-6210620"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'DC-6210620');
</script>
<!-- End of global snippet: Please do not remove -->

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
                  <li  class="active">
                    <a href="elective.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Electives</a>
                  </li>
                  <li>
                    <a href="subspecialties.php"><i class="fa fa-caret-right" aria-hidden="true"></i>Subspecialties</a>
                  </li>
                </ul>                
              </div>
            </div>


            <div class="col-sm-9 right">
              <p>Elective rotations allow residents the flexibility to gain a concentrated experience in an area of interest.</p>
              <p>The resident will have eight weeks of electives:</p>
              <ul>
                <li>Four weeks in the 3rd year</li>
                <li>Four weeks in the 4th year</li>                  
              </ul>
              <p>Residents have the right to choose from the above subspecialties or other specialties related to paediatrics, such as paediatric radiology, paediatric dermatology, paediatric psychiatry, paediatric surgery etc.</p>                       
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