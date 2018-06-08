<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php $this->load->view('head'); ?>

    <link href="<?php $base_url; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php $base_url; ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php $base_url; ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php $base_url; ?>assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="<?php $base_url; ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php $base_url; ?>assets/css/style.css" rel="stylesheet">
    <script src="<?php $base_url; ?>assets/time_ago.js"></script>
<style>
    .others{width: 50px;!important;}
</style>
</head>

<body>

<div id="wrapper">
    <?php $this->load->view('menu'); ?>

    <div id="page-wrapper" class="gray-bg">
        <?php $this->load->view('header'); ?>

        <div class="wrapper wrapper-content animated fadeInRight">
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

            <?php // if(!empty($applications)){ ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">

                        <div class="ibox-content">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Personal Details</a></li>
                                <li><a data-toggle="tab" href="#menu2"> Attachments</a></li>
                                <li><a data-toggle="tab" href="#menu3">Write Note</a></li>
                                <li><a href="dowlaod_zip?f=<?php echo $applications[0]->reg_id; ?>"><button class="btn btn-primary">Download</button></a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <h3>&nbsp;</h3>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <dl class="dl-horizontal">
                                            <dt>Date Of Submission:</dt> <dd><?php $dd=explode(" ",$applications[0]->date_submission); echo $dd[0]; ?></dd>
                                            </dl>
                                        </div>
                                        <div class="col-lg-4">
                                            <dl class="dl-horizontal">
                                            <dt>Ref NO:</dt> <dd><?php echo $applications[0]->reference_no; ?></dd>
                                            </dl>
                                        </div>
                                        <div class="col-lg-4">
                                            <dl class="dl-horizontal">
                                            <dt>Status:</dt>
                                                <dd>
                                                    <select class="form-control" name="status" onchange="change_status(<?php echo $id; ?>,this.value);">
                                                        <option <?php if($applications[0]->admin_status==0){echo "selected"; } ?> value="">Change Status</option>
                                                        <option <?php if($applications[0]->admin_status==1){echo "selected"; } ?> value="1">Screening</option>
                                                        <option <?php if($applications[0]->admin_status==2){echo "selected"; } ?> value="2">Qualified</option>
                                                        <option <?php if($applications[0]->admin_status==3){echo "selected"; } ?> value="3">Selected</option>
                                                    </select>
                                                </dd>
                                            </dl>

                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <?php $directory_name="../".$applications[0]->directory_name."/"; ?>
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <dl class="dl-horizontal">
                                                <dt>Full Name:</dt> <dd><?php echo $applications[0]->first_name . " " . $applications[0]->middle_name . " " . $applications[0]->last_name; ?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Phone:</dt> <dd>  <?php echo $applications[0]->mobile_no; ?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Email:</dt> <dd><?php echo $applications[0]->email; ?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Gender:</dt> <dd>   <?php echo $applications[0]->gender; ?> </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Age:</dt> <dd>  <?php $d = $applications[0]->date_of_birth;echo date_diff(date_create($d), date_create('today'))->y;?> </dd>
                                            </dl>

                                        </div>
                                    
                                    <div class="col-lg-5">
                                        <dl class="dl-horizontal">
                                            <dt>Marital Status:</dt> <dd><?php echo $applications[0]->marital_status; ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Nationality:</dt> <dd><?php echo $applications[0]->nationality; ?></dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Place of Birth:</dt> <dd>   <?php echo $applications[0]->place_of_birth; ?> </dd>
                                        </dl>
                                        <dl class="dl-horizontal">
                                            <dt>Date of Birth:</dt> <dd>  <?php
                                                if($applications[0]->date_of_birth!=''){
                                                    $dat = $applications[0]->date_of_birth;
                                                    $arr = explode("-", $dat);
                                                    echo $arr[2] . "-" . $arr[1] . "-" . $arr[0]; }
                                                ?></dd>
                                        </dl>

                                        <dl class="dl-horizontal">
                                            <dt>National/Residency(ID):</dt> <dd>  <?php echo $applications[0]->passport_no; ?></dd>
                                        </dl>

                                    </div>
                                    <div class="col-lg-2">
                                        <div class="photos">
                                            <?php
                                            if($applications[0]->personalphoto=='')
                                                echo "<img alt='image' class='feed-photo others' src='./uploads/no-photo.jpg'>";
                                            else{
                                                $dat = $applications[0]->personalphoto;
                                                $arr = explode('.',$dat);
                                                $type= end($arr);
                                                if($type=='pdf' || $type=='PDF')
                                                    echo '<a target="_blank" href="'.$directory_name.$applications[0]->personalphoto .'"><img alt="image" class="feed-photo others" src="./uploads/pdf-icon.png"></a>';
                                                elseif($type=='docx' || $type=='doc')
                                                    echo '<a target="_blank" href="'.$directory_name.$applications[0]->personalphoto .'"><img alt="image" class="feed-photo others" src="./uploads/doc.png"></a>';
                                                else
                                                    echo '<img alt="image" class="feed-photo" src="'.$directory_name.$applications[0]->personalphoto .' ">';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                    <div class="row">
                                        <div class="col-lg-12"> 
                                            <h3 style="color: #115E6E;">Academic  Details</h3>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="col-lg-5">
                                            <dl class="dl-horizontal">
                                                <dt>Academic Institution:</dt> <dd><?php echo $applications[0]->university_name; ?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Final Grade:</dt> <dd>  <?php echo $applications[0]->final_grade; ?> : <?php echo $applications[0]->enter_mark; ?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Graduation Year:</dt> <dd><?php echo $applications[0]->graduation_year; ?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Medical Degree:</dt> <dd>   <?php echo $applications[0]->medical_degree; ?> </dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>Other Degree:</dt> <dd>     <?php echo $applications[0]->other_degree;?> </dd>
                                            </dl>
                                        </div>

                                        <div class="col-lg-6">
                                            <dl class="dl-horizontal">
                                                <dt>Type of Residency Entrance Exam:</dt> <dd><?php echo $applications[0]->pre_entry_exam; ?></dd>
                                                <?php if($applications[0]->pre_exam_name!=''){ ?>
                                                    <dt>Exam Name :</dt> <dd><?php echo $applications[0]->pre_exam_name; ?></dd>
                                                <?php } ?>
                                                <dt>Score :</dt> <dd><?php echo $applications[0]->enter_score; ?></dd>
                                            </dl>
                                            <dl class="dl-horizontal">
                                                <dt>English Language Proficiency:</dt> <dd><?php echo $applications[0]->english_langauge_proficiency; ?></dd>
                                                <?php if($applications[0]->exam_name!=''){ ?>
                                                    <dt>Test Name :</dt> <dd><?php echo $applications[0]->exam_name; ?></dd>
                                                <?php } ?>
                                                <dt>Score :</dt> <dd><?php echo $applications[0]->enter_marks; ?></dd>
                                            </dl>
                                        </div>
                                    </div>
                                </div>

                                <div id="menu2" class="tab-pane fade">
                                    <h3>&nbsp;</h3>
                                    <div class="row">
                                    <div class="photos col-lg-4">
                                        <p>CV</p>
                                        <?php
                                        echo "<p>".$applications[0]->cv."</p>";
                                        if($applications[0]->cv=='')
                                            echo "<img alt='image' class='feed-photo others' src='./uploads/no-photo.jpg'>";
                                        else{
                                            $dat = $applications[0]->cv;
                                            $arr = explode('.',$dat);
                                            $type= end($arr);
                                            if($type=='pdf' || $type=='PDF')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->cv .'"><img alt="image" class="feed-photo others" src="./uploads/pdf-icon.png"></a>';
                                            elseif($type=='docx' || $type=='doc')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->cv .'"><img alt="image" class="feed-photo others" src="./uploads/doc.png"></a>';
                                            else
                                              echo '<a target="_blank" href="'.$directory_name.$applications[0]->cv .'"><img alt="image" class="feed-photo others" src="'.$directory_name.$applications[0]->cv .'"></a>';
                                          
                                        }
                                        ?>
                                    </div>
                                    <div class="photos col-lg-4">
                                        <p>Medical</p>
                                        <?php
                                        echo "<p>".$applications[0]->medical."</p>";
                                        if($applications[0]->medical=='')
                                            echo "<img alt='image' class='feed-photo others' src='./uploads/no-photo.jpg'>";
                                        else{
                                            $dat = $applications[0]->medical;
                                            $arr = explode('.',$dat);
                                            $type= end($arr);
                                            if($type=='pdf' || $type=='PDF')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->medical .'"><img alt="image" class="feed-photo others" src="./uploads/pdf-icon.png"></a>';
                                            elseif($type=='docx' || $type=='doc')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->medical .'"><img alt="image" class="feed-photo others" src="./uploads/doc.png"></a>';
                                            else
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->medical .'"><img alt="image" class="feed-photo others" src="'.$directory_name.$applications[0]->medical .'"></a>';
                                            
                                            
                                        }
                                        ?>
                                    </div>
                                    <div class="photos col-lg-4">
                                        <p>Medical Degree Certificate</p>
                                        <?php
                                        echo "<p>".$applications[0]->medicaldegreecertificate."</p>";
                                        if($applications[0]->medicaldegreecertificate=='')
                                            echo "<img alt='image' class='feed-photo others' src='./uploads/no-photo.jpg'>";
                                        else{
                                            $dat = $applications[0]->medicaldegreecertificate;
                                            $arr = explode('.',$dat);
                                            $type= end($arr);
                                            if($type=='pdf' || $type=='PDF')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->medicaldegreecertificate .'"><img alt="image" class="feed-photo others" src="./uploads/pdf-icon.png"></a>';
                                            elseif($type=='docx' || $type=='doc')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->medicaldegreecertificate .'"><img alt="image" class="feed-photo others" src="./uploads/doc.png"></a>';
                                            else
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->medicaldegreecertificate .'"><img alt="image" class="feed-photo others" src="'.$directory_name.$applications[0]->medicaldegreecertificate .'"></a>';

                                            
                                        }
                                        ?>
                                    </div>
                                    <div class="photos col-lg-4">
                                        <p>Other Degree</p>
                                        <?php
                                        echo "<p>".$applications[0]->otherdegree."</p>";
                                        if($applications[0]->otherdegree=='')
                                            echo "<img alt='image' class='feed-photo others' src='./uploads/no-photo.jpg'>";
                                        else{
                                            $dat = $applications[0]->cv;
                                            $arr = explode('.',$dat);
                                            $type= end($arr);
                                            if($type=='pdf' || $type=='PDF')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->otherdegree .'"><img alt="image" class="feed-photo others" src="./uploads/pdf-icon.png"></a>';
                                            elseif($type=='docx' || $type=='doc')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->otherdegree .'"><img alt="image" class="feed-photo others" src="./uploads/doc.png"></a>';
                                            else
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->otherdegree .'"><img alt="image" class="feed-photo others" src="'.$directory_name.$applications[0]->otherdegree .'"></a>';

                                            
                                        }
                                        ?>
                                    </div>
                                    <div class="photos col-lg-4">
                                        <p>Personal Statement</p>
                                        <?php
                                        echo "<p>".$applications[0]->personalstatement."</p>";
                                        if($applications[0]->personalstatement=='')
                                            echo "<img alt='image' class='feed-photo others' src='./uploads/no-photo.jpg'>";
                                        else{
                                            $dat = $applications[0]->personalstatement;
                                            $arr = explode('.',$dat);
                                            $type= end($arr);
                                            if($type=='pdf' || $type=='PDF')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->personalstatement .'"><img alt="image" class="feed-photo others" src="./uploads/pdf-icon.png"></a>';
                                            elseif($type=='docx' || $type=='doc')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->personalstatement .'"><img alt="image" class="feed-photo others" src="./uploads/doc.png"></a>';
                                            else
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->personalstatement .'"><img alt="image" class="feed-photo others" src="'.$directory_name.$applications[0]->personalstatement .'"></a>';

                                            

                                        }
                                        ?>
                                    </div>
                                    <div class="photos col-lg-4">
                                        <p>Personal Photo</p>
                                        <?php
                                        echo "<p>".$applications[0]->personalphoto."</p>";
                                        if($applications[0]->personalphoto=='')
                                            echo "<img alt='image' class='feed-photo others' src='./uploads/no-photo.jpg'>";
                                        else{
                                            $dat = $applications[0]->personalphoto;
                                            $arr = explode('.',$dat);
                                            $type= end($arr);
                                            if($type=='pdf' || $type=='PDF')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->personalphoto .'"><img alt="image" class="feed-photo others" src="./uploads/pdf-icon.png"></a>';
                                            elseif($type=='docx' || $type=='doc')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->personalphoto .'"><img alt="image" class="feed-photo others" src="./uploads/doc.png"></a>';
                                            else
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->personalphoto .'"><img alt="image" class="feed-photo others" src="'.$directory_name.$applications[0]->personalphoto .'"></a>';

                                            
                                        }
                                        ?>
                                    </div>
                                    <div class="photos col-lg-4">
                                        <p>English Language Test Score</p>
                                        <?php
                                        echo "<p>".$applications[0]->englishlangugaetestscore."</p>";
                                        if($applications[0]->englishlangugaetestscore=='')
                                            echo "<img alt='image' class='feed-photo others' src='./uploads/no-photo.jpg'>";
                                        else{
                                            $dat = $applications[0]->englishlangugaetestscore;
                                            $arr = explode('.',$dat);
                                            $type= end($arr);
                                            if($type=='pdf' || $type=='PDF')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->englishlangugaetestscore .'"><img alt="image" class="feed-photo others" src="./uploads/pdf-icon.png"></a>';
                                            elseif($type=='docx' || $type=='doc')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->englishlangugaetestscore .'"><img alt="image" class="feed-photo others" src="./uploads/doc.png"></a>';
                                            else
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->englishlangugaetestscore .'"><img alt="image" class="feed-photo others" src="'.$directory_name.$applications[0]->englishlangugaetestscore .'"></a>';

                                            
                                        }
                                        ?>
                                    </div>
                                    <div class="photos col-lg-4">
                                        <p>Pre Entry Exam Result</p>
                                        <?php
                                        echo "<p>".$applications[0]->preentryexamresult."</p>";
                                        if($applications[0]->preentryexamresult=='')
                                            echo "<img alt='image' class='feed-photo others' src='./uploads/no-photo.jpg'>";
                                        else{
                                            $dat = $applications[0]->preentryexamresult;
                                            $arr = explode('.',$dat);
                                            $type= end($arr);
                                            if($type=='pdf' || $type=='PDF')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->preentryexamresult .'"><img alt="image" class="feed-photo others" src="./uploads/pdf-icon.png"></a>';
                                            elseif($type=='docx' || $type=='doc')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->preentryexamresult .'"><img alt="image" class="feed-photo others" src="./uploads/doc.png"></a>';
                                            else
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->preentryexamresult .'"><img alt="image" class="feed-photo others" src="'.$directory_name.$applications[0]->preentryexamresult .'"></a>';

                                            
                                        }
                                        ?>
                                    </div>
                                    <div class="photos col-lg-4">
                                        <p>Emirates ID</p>
                                        <?php
                                        echo "<p>".$applications[0]->emiratesid."</p>";
                                        if($applications[0]->emiratesid=='')
                                            echo "<img alt='image' class='feed-photo others' src='./uploads/no-photo.jpg'>";
                                        else{
                                            $dat = $applications[0]->emiratesid;
                                            $arr = explode('.',$dat);
                                            $type= end($arr);
                                            if($type=='pdf' || $type=='PDF')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->emiratesid .'"><img alt="image" class="feed-photo others" src="./uploads/pdf-icon.png"></a>';
                                            elseif($type=='docx' || $type=='doc')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->emiratesid .'"><img alt="image" class="feed-photo others" src="./uploads/doc.png"></a>';
                                            else
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->emiratesid .'"><img alt="image" class="feed-photo others" src="'.$directory_name.$applications[0]->emiratesid .'"></a>';

                                            
                                        }
                                        ?>
                                    </div>
                                    <div class="photos col-lg-4">
                                        <p>Passport ID</p>
                                        <?php
                                        echo "<p>".$applications[0]->passportid."</p>";
                                        if($applications[0]->passportid=='')
                                            echo "<img alt='image' class='feed-photo others' src='./uploads/no-photo.jpg'>";
                                        else{
                                            $dat = $applications[0]->passportid;
                                            $arr = explode('.',$dat);
                                            $type= end($arr);
                                            if($type=='pdf' || $type=='PDF')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->passportid .'"><img alt="image" class="feed-photo others" src="./uploads/pdf-icon.png"></a>';
                                            elseif($type=='docx' || $type=='doc')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->passportid .'"><img alt="image" class="feed-photo others" src="./uploads/doc.png"></a>';
                                            else
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->passportid .'"><img alt="image" class="feed-photo others" src="'.$directory_name.$applications[0]->passportid .'"></a>';

                                            
                                        }
                                        ?>
                                    </div>
                                    <div class="photos col-lg-4">
                                        <p>Deans Letter</p>
                                        <?php
                                        echo "<p>".$applications[0]->deansletter."</p>";
                                        if($applications[0]->deansletter=='')
                                            echo "<img alt='image' class='feed-photo others' src='./uploads/no-photo.jpg'>";
                                        else{
                                            $dat = $applications[0]->deansletter;
                                            $arr = explode('.',$dat);
                                            $type= end($arr);
                                            if($type=='pdf' || $type=='PDF')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->deansletter .'"><img alt="image" class="feed-photo others" src="./uploads/pdf-icon.png"></a>';
                                            elseif($type=='docx' || $type=='doc')
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->deansletter .'"><img alt="image" class="feed-photo others" src="./uploads/doc.png"></a>';
                                            else
                                                echo '<a target="_blank" href="'.$directory_name.$applications[0]->deansletter .'"><img alt="image" class="feed-photo others" src="'.$directory_name.$applications[0]->deansletter .'"></a>';

                                            
                                        }
                                        ?>
                                    </div>
                                    </div>
                                </div>
                                <div id="menu3" class="tab-pane fade">
                                    <h3>&nbsp;</h3>
                                    <div class="row">
                                       <div class="form-group">
                                           <textarea class="form-control" id="reminder">

                                           </textarea>
                                           <p id="commnts_error" hidden style="color: red">Please Fill</p>
                                           <input type="button" style="margin-top:10px" onclick="comments(<?php echo $id ?>)" class="btn btn-primary" value="Add Note">
                                       </div>
                                        <div id="comm">
                                            <?php
                                            foreach ($comments as $row) {
                                                $user_id=$row->user_id;
                                                $d=$this->users_model->get_single_users($user_id);

                                                ?>
                                                <div class="feed-element">
                                                    <div class="media-body ">

                                                        <strong><?php echo $d[0]->firstname; ?></strong><br>
                                                        <small class="text-muted"><?php echo $row->date; ?></small>
                                                        <div class="well">
                                                            <?php echo $row->decription; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>


                                    </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


        <?php $this->load->view('footer'); ?>

    </div>
</div>



<!-- Mainly scripts -->
<script src="<?php $base_url; ?>assets/js/jquery-3.1.1.min.js"></script>
<script src="<?php $base_url; ?>assets/js/bootstrap.min.js"></script>
<script src="<?php $base_url; ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php $base_url; ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script>
    $(document).ready(function(){

    });
    function change_status(vid,txt) {
        $.ajax({type: "POST",url: "<?php $base_url ?>change_status",data:{vid:vid,txt:txt}, success: function(result){
                console.log(result);

            }
        });
    }
    function comments(vid) {
        console.log(vid);
        var reminder=$('#reminder').val();
        console.log(reminder);
        if(reminder!=''){
            $('#commnts_error').hide();
            $('#comm').empty();
            $.ajax({
                type: "POST",
                url: "<?php $base_url ?>add_comment",
                async: false,
                data: {vid:vid,reminder:reminder},
                success: function (response) {
                    //alert(response);
                    $('#comm').append(response);
console.log(response);
                    $('#reminder').val('');
                }
            });
        }else{
            $('#commnts_error').show();
        }
    }
</script>
<!-- Custom and plugin javascript -->
<script src="<?php $base_url; ?>assets/js/inspinia.js"></script>
<script src="<?php $base_url; ?>assets/js/plugins/pace/pace.min.js"></script>

<!-- Steps -->
<script src="<?php $base_url; ?>assets/js/plugins/steps/jquery.steps.min.js"></script>

<!-- Jquery Validate -->
<script src="<?php $base_url; ?>assets/js/plugins/validate/jquery.validate.min.js"></script>




</body>

</html>
