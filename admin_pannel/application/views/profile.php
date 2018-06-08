<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php $this->load->view('head'); ?>
        <link href="<?php $base_url; ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php $base_url; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?php $base_url; ?>assets/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
        <link href="<?php $base_url; ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?php $base_url; ?>assets/css/style.css" rel="stylesheet">
        <script src="<?php $base_url; ?>assets/time_ago.js"></script>
   
    </head>
    <body>

        <style>

        </style>
    </style>
    <div id="wrapper">
        <?php $this->load->view('menu'); ?>
        <div id="page-wrapper" class="gray-bg">
            <?php $this->load->view('header'); ?>
            <div class="wrapper wrapper-content">
                <div class="row animated fadeInRight">
                    <?php if ($msg != "") { ?>
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title navy-bg">
                                    <h5><?php echo $msg; ?></h5>
                                    <div class="ibox-tools">
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

<?php if(!empty($applications)){ ?>

                    <div class="col-md-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Attachments</button>
                                <span class="pull-right">
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                </span>
                            </div>
                            
                            <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Attachments</h4>
        </div>
        <div class="modal-body">
            <div class="row">
         <div class="col-md-4">
          <p>CV</p>
          <img src="../registration/uploads/<?php echo $applications[0]->cv; ?>" width="100">
          </div>
           <div class="col-md-4">
          <p>medical</p>
          <img src="../registration/uploads/<?php echo $applications[0]->medical; ?>" width="100">
          </div>
           <div class="col-md-4">
          <p>medicaldegreecertificate</p>
          <img src="../registration/uploads/<?php echo $applications[0]->medicaldegreecertificate; ?>" width="100">
          </div>
      </div>
      <div class="row">
           <div class="col-md-4">
          <p>otherdegree</p>
          <img src="../registration/uploads/<?php echo $applications[0]->otherdegree; ?>" width="100">
          </div>
           <div class="col-md-4">
          <p>personalstatement</p>
          <img src="../registration/uploads/<?php echo $applications[0]->personalstatement; ?>" width="100">
          </div>
           <div class="col-md-4">
          <p>personalphoto</p>
          <img src="../registration/uploads/<?php echo $applications[0]->personalphoto; ?>" width="100">
          </div>
      </div>
      <div class="row">
           <div class="col-md-4">
          <p>englishlangugaetestscore</p>
          <img src="../registration/uploads/<?php echo $applications[0]->englishlangugaetestscore; ?>" width="100">
          </div>
           <div class="col-md-4">
          <p>preentryexamresult</p>
          <img src="../registration/uploads/<?php echo $applications[0]->preentryexamresult; ?>" width="100">
          </div>
           <div class="col-md-4">
          <p>emiratesid</p>
          <img src="../registration/uploads/<?php echo $applications[0]->emiratesid; ?>" width="100">
          </div>
      </div>
      <div class="row">
           <div class="col-md-4">
          <p>passportid</p>
          <img src="../registration/uploads/<?php echo $applications[0]->passportid; ?>" width="100">
          </div>
           <div class="col-md-4">
          <p>deansletter</p>
          <img src="../registration/uploads/<?php echo $applications[0]->deansletter; ?>" width="100">
          </div>
          <div class="col-md-4">
          <p></p>
          <img src="" width="100">
          </div>
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

                            <div class="ibox-content profile-content">
                                <div class="row m-t-lg" style="padding:10px;">                                   
                                    <h3 style="color:#115E6E"><strong>Basic Details</strong></h3>     
                                    <h5 class="col-md-3 no-padding" style="color: #1a94ab"><strong>Full Name</strong></h5>
                                    <h5 class="col-md-3">: <?php echo $applications[0]->first_name . " " . $applications[0]->middle_name . " " . $applications[0]->last_name; ?></h5>
                                    <h5 class="col-md-3" style="color: #1a94ab"><strong>Gender</strong></h5>
                                    <h5 class="col-md-3">: <?php echo $applications[0]->gender; ?></h5>

                                    <h5 class="col-md-3 no-padding" style="color: #1a94ab"><strong>DOB</strong> </h5>
                                    <h5 class="col-md-3">: <?php
                                        if($applications[0]->date_of_birth!=''){
                                        $dat = $applications[0]->date_of_birth;
                                        $arr = explode("-", $dat);
                                        echo $arr[2] . "-" . $arr[1] . "-" . $arr[0]; }
                                        ?></h5>

                                    <h5 class="col-md-3" style="color: #1a94ab"><strong>Age</strong></h5> 
                                    <h5 class="col-md-3">: <?php
                                        $d = $applications[0]->date_of_birth;
                                        echo date_diff(date_create($d), date_create('today'))->y;
                                        ?></h5>

                                    <h5 class="col-md-3 no-padding" style="color: #1a94ab"><strong>Nationality</strong></h5>
                                    <h5 class="col-md-3">: <?php echo $applications[0]->nationality; ?></h5>

                                    <h5 class="col-md-3" style="color: #1a94ab"><strong>Date & Time</strong></h5>
                                    <h5 class="col-md-3">: <?php echo $applications[0]->entry_date; ?></h5>

                                    <h5 class="col-md-3 no-padding" style="color: #1a94ab"><strong>National/Residency Identification Card (ID)</strong> </h5>
                                    <h5 class="col-md-3">: <?php $applications[0]->passport_no; ?></h5>

                                    <h5 class="col-md-3" style="color: #1a94ab"><strong>Marital Status</strong></h5>
                                    <h5 class="col-md-3">: <?php echo $applications[0]->marital_status; ?></h5>

                                    <h5 class="col-md-3 no-padding" style="color: #1a94ab"><strong>Place Of Birth</strong> </h5>
                                    <h5 class="col-md-3">: <?php echo $applications[0]->place_of_birth; ?></h5>

                                    <h5 class="col-md-3" style="color: #1a94ab"><strong>Academic Institution</strong></h5>
                                    <h5 class="col-md-3">: <?php echo $applications[0]->university_name; ?></h5>
<div class="row">
                                    <h5 class="col-md-3 no-padding" style="color: #1a94ab;margin-left:15px"><strong>Final Grade (as it appears on academic transcript)</strong> </h5>
                                    <h5 class="col-md-3" style="margin-left:-6px">: <?php echo $applications[0]->final_grade; ?> : <?php echo $applications[0]->enter_mark; ?></h5>  

                                    <h5 class="col-md-3" style="color: #1a94ab;margin-left:-11px"><strong>Graduation Year</strong></h5>
                                    <h5 class="col-md-3" style="margin-left:-5px">: <?php echo $applications[0]->graduation_year; ?></h5>
</div>
                                    <h5 class="col-md-3 no-padding" style="color: #1a94ab"><strong>Medical Degree (MBBS,MD,etc…)</strong> </h5>
                                    <h5 class="col-md-3">: <?php echo $applications[0]->medical_degree; ?> </h5>

                                    <h5 class="col-md-3" style="color: #1a94ab"><strong>Other Degreer</strong></h5>
                                    <h5 class="col-md-3">: <?php echo $applications[0]->other_degree; ?></h5>

                                    <h5 class="col-md-3 no-padding" style="color: #1a94ab"><strong>Type of Residency Entrance Exam</strong> </h5>
                                    <h5 class="col-md-3">: <?php echo $applications[0]->pre_entry_exam; if($applications[0]->pre_exam_name!=''){ ?> <span style="color: #1a94ab"><strong> Exam Name </strong></span>: <?php echo $applications[0]->pre_exam_name; } ?><span style="color: #1a94ab"><strong> Score </strong></span>: <?php echo $applications[0]->enter_score ?> </h5>
                                     <h5 class="col-md-3" style="color: #1a94ab"><strong>English Language Proficiency</strong></h5>
                                    <h5 class="col-md-3">: <?php echo $applications[0]->english_langauge_proficiency; if($applications[0]->exam_name!=''){ ?> <span style="color: #1a94ab"><strong> Test Name </strong></span> : <?php echo $applications[0]->exam_name; } ?> <span style="color: #1a94ab"><strong> Score </strong></span> : <?php echo $applications[0]->enter_marks ?> </h5>

                                                                    
                                </div>
                                <div class="row m-t-sm" style="padding:10px">
                                    <h3 style="color:#115E6E;"><strong>Contact Details</strong></h3>                                          

                                    <h5 class="col-md-3 no-padding" style="color: #1a94ab"><strong>Email</strong> </h5>
                                    <h5 class="col-md-3" >: <?php echo $applications[0]->email; ?></h5>

                                    <h5 class="col-md-3" style="color: #1a94ab"><strong>Phone</strong> </h5>
                                    <h5 class="col-md-3" style="padding-bottom:3%">: <?php echo $applications[0]->mobile_no; ?></h5>
                                      
                                   

                                </div>
                                


                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">


                    </div>
                </div>
                <?php }else{ ?>
<div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title gray-bg">
                                    <h5>No Data Found</h5>
                                    <div class="ibox-tools">
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
               <?php } ?>
            </div>


            <?php $this->load->view('footer'); ?>
        </div>

        <?php // $this->load->view('chat');  ?>
    </div>

    <?php //$this->load->view('script'); ?>
    <script src="<?php $base_url; ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php $base_url; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php $base_url; ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php $base_url; ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php $base_url; ?>assets/js/inspinia.js"></script>
    <script src="<?php $base_url; ?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- blueimp gallery -->
    <script src="<?php $base_url; ?>assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
    <script type="text/javascript">
        
    </script>
    
</body>
</html>
