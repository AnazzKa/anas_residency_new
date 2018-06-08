<?php
session_start();
include('session-handle.php');
include('ChkLogout.php');
include './connect.php';
$invalid='';
$log_id=$_SESSION['userid'];
$CV = '';
$Medical = '';
$MedicaldegreeCertificate = '';
$PersonalStatement = '';
$PersonalPhoto = '';
$EnglishLangugaeTestScore = '';
$PreentryexamResult = '';
$EmiratesID = '';
$PassportId='';
$DeansLetter='';
$re=mysqli_query($con,"SELECT * FROM `al_registration` WHERE `log_id`='$log_id'");
if(mysqli_num_rows($re)>0)
{
    $result=mysqli_fetch_object($re);
    $email=$result->email;
    $first_name=$result->first_name;
    $CV = $result->cv;
    $Medical = $result->medical;
    $MedicaldegreeCertificate = $result->medicaldegreecertificate;
    $PersonalStatement = $result->personalstatement;
    $PersonalPhoto = $result->personalphoto;
    $EnglishLangugaeTestScore = $result->englishlangugaetestscore;
    $PreentryexamResult = $result->preentryexamresult;
    $EmiratesID = $result->emiratesid;
    $PassportId=$result->passportid;
    $DeansLetter=$result->deansletter;
    $otherdegree=$result->otherdegree;
}


$re=mysqli_query($con,"SELECT * FROM `al_registration` WHERE `log_id`='$log_id' AND status=1");
if(mysqli_num_rows($re)>0)
{
    header('Location: profile_view.php?s');
    echo "<script>location='profile_view.php?s'</script>";
}

?>
<!DOCTYPE html>
<html lang="en-US">

<!-- Heady -->
<?php include 'head.php'; ?>
<!-- /.Heady -->

<!-- Body -->
<body class="subpage">

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
                <li class="active"><a href="application_form.php">Application Form</a></li>
            </ul>
        </div>
    </div>
    <!-- /.Banner -->

</header>
<!-- /.Header -->



<!-- Content Area -->
<div class="content-area sub-content application-form">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="login-form full-width">
                    <h4>Application Form</h4>
                    <h6>2.ATTACHMENTS</h6>


                        <div class="row">

                            <div class="form-group col-md-6">
                                <form action="uploadnew.php" id="from_CV" method="post" enctype="multipart/form-data" class="form-wrapper">
                                <label class="title">CV <?php if($CV==''){ ?> <span id="CV_star" style="color: red">*</span><?php } ?></label>
                                        <div class="progress" id="progress_CV">
                                            <div class="bar" id="bar_CV"></div >
                                            <div class="percent" id="percent_CV">0%</div >
                                        </div>
                                        <div id="status" id="status_CV"></div>
                                    <div class="image-uploader">
                                    <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                  Browse<input required accept=".gif,.png,.jpg,.jpeg,.pdf" onchange="file_upload('CV')" type="file" name="CV" id="imgInp" value="<?php echo $CV; ?>">
                              </span>
                          </span>
                                        <input type="text" class="form-control" readonly  value="<?php echo $CV; ?>">
                                    </div>
                                </div>
                                    <input type="submit"  name="submit" style="display: none;">
                                </form>
                            </div>

                            <div class="form-group col-md-6">
                                <form action="uploadnew.php" id="from_Medical" method="post" enctype="multipart/form-data" class="form-wrapper">
                                <label class="title">Academic Transcript <?php if($Medical==''){ ?> <span id="Medical_star" style="color: red">*</span><?php } ?></label>
                                    <div class="progress" id="progress_Medical">
                                        <div class="bar" id="bar_Medical"></div >
                                        <div class="percent" id="percent_Medical">0%</div >
                                    </div>
                                    <div id="status" id="status_CV"></div>
                                    <div class="image-uploader">
                                    <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                  Browse<input required accept=".gif,.png,.jpg,.jpeg,.pdf" onchange="file_upload('Medical')" type="file" name="Medical" id="imgInp" value="<?php echo $Medical; ?>">
                              </span>
                          </span>
                                        <input type="text" class="form-control" readonly  value="<?php echo $Medical; ?>">
                                    </div>
                                </div>
                                    <input type="submit"  name="submit" style="display: none;">
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <form action="uploadnew.php" id="from_MedicaldegreeCertificate" method="post" enctype="multipart/form-data" class="form-wrapper">
                                <label class="title">Degree Completion Certificate <?php if($MedicaldegreeCertificate==''){ ?> <span id="MedicaldegreeCertificate_star" style="color: red">*</span><?php } ?> <span class="sub-text">(e.g. Diploma, Bachelor’s, etc…)</span></label>
                                    <div class="progress" id="progress_MedicaldegreeCertificate">
                                        <div class="bar" id="bar_MedicaldegreeCertificate"></div >
                                        <div class="percent" id="percent_MedicaldegreeCertificate">0%</div >
                                    </div>
                                    <div id="status" id="status_MedicaldegreeCertificate"></div>
                                    <div class="image-uploader">
                                    <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                  Browse<input type="file" accept=".gif,.png,.jpg,.jpeg,.pdf" onchange="file_upload('MedicaldegreeCertificate')" required name="MedicaldegreeCertificate" id="imgInp"  value="<?php echo $MedicaldegreeCertificate; ?>">
                              </span>
                          </span>
                                        <input type="text" class="form-control" readonly  value="<?php echo $MedicaldegreeCertificate; ?>">
                                    </div>
                                </div>
                                    <input type="submit"  name="submit" style="display: none;">
                                </form>
                            </div>
                            <div class="form-group col-md-6">
                                <form action="uploadnew.php" id="from_OtherDegree" method="post" enctype="multipart/form-data" class="form-wrapper">
                                <label class="title">Other Degree <span class="sub-text">(if applicable)</span> <span class="new-icons" onclick="hide_remove();" hidden></span></label>
                                    <div class="progress" id="progress_OtherDegree">
                                        <div class="bar" id="bar_OtherDegree"></div >
                                        <div class="percent" id="percent_OtherDegree">0%</div >
                                    </div>
                                    <div id="status" id="status_OtherDegree"></div>
                                    <div class="image-uploader">
                                    <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file" onclick="show_error();">
                                  Browse<input type="file" accept=".gif,.png,.jpg,.jpeg,.pdf" onchange="file_upload('OtherDegree')" name="OtherDegree" id="imgInp" value="<?php echo $otherdegree; ?>">
                              </span>
                          </span>
                                        <input type="text" id="Othertxt" class="form-control" readonly  value="<?php echo $otherdegree; ?>">

                                    </div>
                                </div>
                                    <input type="submit"  name="submit" style="display: none;">
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <form action="uploadnew.php" id="from_PersonalStatement" method="post" enctype="multipart/form-data" class="form-wrapper">
                                <label class="title">Personal Statement <?php if($PersonalStatement==''){ ?> <span id="PersonalStatement_star" style="color: red">*</span><?php } ?></label>
                                    <div class="progress" id="progress_PersonalStatement">
                                        <div class="bar" id="bar_PersonalStatement"></div >
                                        <div class="percent" id="percent_PersonalStatement">0%</div >
                                    </div>
                                    <div id="status" id="status_PersonalStatement"></div>
                                    <div class="image-uploader">
                                    <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                  Browse<input  required accept=".gif,.png,.jpg,.jpeg,.pdf" type="file" onchange="file_upload('PersonalStatement')" name="PersonalStatement" type="file" id="imgInp" value="<?php echo $PersonalStatement; ?>">
                              </span>
                          </span>
                                        <input type="text" class="form-control" readonly  value="<?php echo $PersonalStatement; ?>">
                                    </div>
                                </div>
                                    <input type="submit"  name="submit" style="display: none;">
                                </form>
                            </div>
                            <div class="form-group col-md-6">
                                <form action="uploadnew.php" id="from_PersonalPhoto" method="post" enctype="multipart/form-data" class="form-wrapper">
                                <label class="title">Personal Photo <?php if($PersonalPhoto==''){ ?> <span id="PersonalPhoto_star" style="color: red">*</span><?php } ?></label>
                                    <div class="progress" id="progress_PersonalPhoto">
                                        <div class="bar" id="bar_PersonalPhoto"></div >
                                        <div class="percent" id="percent_PersonalPhoto">0%</div >
                                    </div>
                                    <div id="status" id="status_PersonalPhoto"></div>
                                    <div class="image-uploader">
                                    <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                  Browse<input required accept=".gif,.png,.jpg,.jpeg,.pdf" type="file" onchange="file_upload('PersonalPhoto')" name="PersonalPhoto" id="imgInp" value="<?php echo $PersonalPhoto; ?>">
                              </span>
                          </span>
                                        <input type="text" class="form-control" readonly  value="<?php echo $PersonalPhoto; ?>">
                                    </div>
                                </div>
                                    <input type="submit"  name="submit" style="display: none;">
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <form action="uploadnew.php" id="from_EnglishLangugaeTestScore" method="post" enctype="multipart/form-data" class="form-wrapper">
                                <label class="title">Evidence Of English Language Proficiency Result <?php if($EnglishLangugaeTestScore==''){ ?> <span id="EnglishLangugaeTestScore_star" style="color: red">*</span><?php } ?> <span class="sub-text">(e.g. IELTS, TOFEL, etc..)</span></label>
                                    <div class="progress" id="progress_EnglishLangugaeTestScore">
                                        <div class="bar" id="bar_EnglishLangugaeTestScore"></div >
                                        <div class="percent" id="percent_EnglishLangugaeTestScore">0%</div >
                                    </div>
                                    <div id="status" id="status_EnglishLangugaeTestScore"></div>
                                    <div class="image-uploader">
                                    <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                  Browse<input required accept=".gif,.png,.jpg,.jpeg,.pdf" onchange="file_upload('EnglishLangugaeTestScore')" type="file" name="EnglishLangugaeTestScore" id="imgInp" value="<?php echo $EnglishLangugaeTestScore; ?>">
                              </span>
                          </span>
                                        <input type="text" class="form-control" readonly  value="<?php echo $EnglishLangugaeTestScore; ?>">
                                    </div>
                                </div>
                                    <input type="submit"  name="submit" style="display: none;">
                                </form>
                            </div>
                            <div class="form-group col-md-6">
                                <form action="uploadnew.php" id="from_PreentryexamResult" method="post" enctype="multipart/form-data" class="form-wrapper">
                                <label class="title">Residency Entrance Exam Result  <?php if($PreentryexamResult==''){ ?> <span id="PreentryexamResult_star" style="color: red">*</span><?php } ?><span class="sub-text">(e.g. EMSTREX,SMLE,etc..)</span></label>
                                    <div class="progress" id="progress_PreentryexamResult">
                                        <div class="bar" id="bar_PreentryexamResult"></div >
                                        <div class="percent" id="percent_PreentryexamResult">0%</div >
                                    </div>
                                    <div id="status" id="status_PreentryexamResult"></div>
                                    <div class="image-uploader">
                                    <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                  Browse<input  type="file" accept=".gif,.png,.jpg,.jpeg,.pdf" onchange="file_upload('PreentryexamResult')" required name="PreentryexamResult" id="imgInp" value="<?php echo $PreentryexamResult; ?>">
                              </span>
                          </span>
                                        <input type="text" class="form-control" readonly  value="<?php echo $PreentryexamResult; ?>">
                                    </div>
                                </div>
                                    <input type="submit"  name="submit" style="display: none;">
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <form action="uploadnew.php" id="from_EmiratesID" method="post" enctype="multipart/form-data" class="form-wrapper">
                                <label class="title">National Identification Card <?php if($EmiratesID==''){ ?> <span id="EmiratesID_star" style="color: red">*</span><?php } ?></label>
                                    <div class="progress" id="progress_EmiratesID">
                                        <div class="bar" id="bar_EmiratesID"></div >
                                        <div class="percent" id="percent_EmiratesID">0%</div >
                                    </div>
                                    <div id="status" id="status_EmiratesID"></div>
                                    <div class="image-uploader">
                                    <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                  Browse<input required accept=".gif,.png,.jpg,.jpeg,.pdf" type="file" onchange="file_upload('EmiratesID')" name="EmiratesID" id="imgInp" value="<?php echo $EmiratesID; ?>">
                              </span>
                          </span>
                                        <input type="text" class="form-control" readonly  value="<?php echo $EmiratesID; ?>">
                                    </div>
                                </div>
                                    <input type="submit"  name="submit" style="display: none;">
                                </form>
                            </div>
                            <div class="form-group col-md-6">
                                <form action="uploadnew.php" id="from_PassportId" method="post" enctype="multipart/form-data" class="form-wrapper">
                                <label class="title">Passport/Travel Document  <?php if($PassportId==''){ ?> <span id="PassportId_star" style="color: red">*</span><?php } ?></label>
                                    <div class="progress" id="progress_PassportId">
                                        <div class="bar" id="bar_PassportId"></div >
                                        <div class="percent" id="percent_PassportId">0%</div >
                                    </div>
                                    <div id="status" id="status_PassportId"></div>
                                    <div class="image-uploader">
                                    <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                  Browse<input required accept=".gif,.png,.jpg,.jpeg,.pdf" type="file" onchange="file_upload('PassportId')" name="PassportId" id="imgInp" value="<?php echo $PassportId; ?>">
                              </span>
                          </span>
                                        <input type="text" class="form-control" readonly value="<?php echo $PassportId; ?>">
                                    </div>
                                </div>
                                    <input type="submit"  name="submit" style="display: none;">
                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <form action="uploadnew.php" id="from_DeansLetter" method="post" enctype="multipart/form-data" class="form-wrapper">
                                <label class="title">Dean’s Letter <?php if($DeansLetter==''){ ?> <span id="DeansLetter_star" style="color: red">*</span><?php } ?></label>
                                    <div class="progress" id="progress_DeansLetter">
                                        <div class="bar" id="bar_DeansLetter"></div >
                                        <div class="percent" id="percent_DeansLetter">0%</div >
                                    </div>
                                    <div id="status" id="status_DeansLetter"></div>
                                    <div class="image-uploader">
                                    <div class="input-group">
                          <span class="input-group-btn">
                              <span class="btn btn-default btn-file">
                                  Browse<input  required accept=".gif,.png,.jpg,.jpeg,.pdf" type="file" onchange="file_upload('DeansLetter')" name="DeansLetter" id="imgInp" value="<?php echo $DeansLetter; ?>">
                              </span>
                          </span>
                                        <input type="text" class="form-control" readonly value="<?php echo $DeansLetter; ?>">
                                    </div>
                                </div>
                                    <input type="submit"  name="submit" style="display: none;">
                                </form>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="title">(only.pdf and .doc formats are accepted with a limit of 2MB each)</label>
                            </div>
                        </div>

                        <div class="btn-row">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="step-pager">
                                        <ul>
                                            <li class="active"><a href="application_form.php">1</a></li>
                                            <li class="active"><a href="#">2</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <form action="submit_mail.php" method="post">
                                    <a href="application_form.php" class="btn btn-submit">Back</a>
                                    <input type="button"  name="submit" value="SUBMIT" onclick="btn_click()" id="btn_submit1" class="btn btn-submit" >
                                    </form>
                                </div>
                            </div>
                        </div>



                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.Content Area -->

<?php include 'footer.php'; ?>
<!-- /.Footer -->

<!-- Java Script -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.js" type="text/javascript"></script>
<?php include 'script.php' ?>
<script type="text/javascript">
    var titles = [];
    $( document ).ready(function() {
        var cnt=0;
        $('.form-control').each(function () {
            var id = $(this).val();
            if(id!='')
                cnt=cnt+1;
        });
        console.log(cnt);
        if(cnt==11)
            $('#btn_submit1').prop("type", "submit");

    });
    function btn_click(){

        if($("input[name*='CV']" ).val()=='')
            $('#CV_star').html('filed is required');
        else
            $('#CV_star').html('');
        if($("input[name*='Medical']" ).val()=='')
            $('#Medical_star').html('filed is required');
        else
            $('#Medical_star').html('');
        if($("input[name*='MedicaldegreeCertificate']" ).val()=='')
            $('#MedicaldegreeCertificate_star').html('filed is required');
        else
            $('#MedicaldegreeCertificate_star').html('');
        if($("input[name*='PersonalStatement']" ).val()=='')
            $('#PersonalStatement_star').html('filed is required');
        else
            $('#PersonalStatement_star').html('');
        if($("input[name*='PersonalPhoto']" ).val()=='')
            $('#PersonalPhoto_star').html('filed is required');
        else
            $('#PersonalPhoto_star').html('');
        if($("input[name*='PreentryexamResult']" ).val()=='')
            $('#PreentryexamResult_star').html('filed is required');
        else
            $('#PreentryexamResult_star').html('');
        if($("input[name*='EmiratesID']" ).val()=='')
            $('#EmiratesID_star').html('filed is required');
        else
            $('#EmiratesID_star').html('');
        if($("input[name*='PassportId']" ).val()=='')
            $('#PassportId_star').html('filed is required');
        else
            $('#PassportId_star').html('');
        if($("input[name*='DeansLetter']" ).val()=='')
            $('#DeansLetter_star').html('filed is required');
        else
            $('#DeansLetter_star').html('');
        if($("input[name*='EnglishLangugaeTestScore']" ).val()=='')
            $('#EnglishLangugaeTestScore_star').html('filed is required');
        else
            $('#EnglishLangugaeTestScore_star').html('');

    }
    function file_upload(fld)
    {
        var cnt=0;
        if($("input[name*='"+fld+"']" ).val()!=''){
            $('#'+fld+'_star').html('');
            cnt=cnt+1;
            // console.log($("input[name*='"+fld+"']" ));
        }

        $('.form-control').each(function () {
            var id = $(this).val();
            console.log(id);
            if(id!='')
                cnt=cnt+1;
        });
        console.log(cnt);
        if(cnt>=11)
            $('#btn_submit1').prop("type", "submit");
        test(fld);
         $('#from_'+fld).submit();

    }

    function show_error()
    {
        $('.new-icons').show();
    }
    function hide_remove()
    {
        $( "input[name*='OtherDegree']" ).val('');
        $('#Othertxt').val('');
        $('.new-icons').hide();
    }
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
    var fld = "";
    function test(fld) {
        this.fld = fld;

        (function () {
            var bar = $('#bar_'+fld);
            var percent = $('#percent_'+fld);
            var status = $('#status');
            console.log(fld);
            $('#from_'+fld).ajaxForm({
                beforeSend: function () {
                    $('#progress_'+fld).show();
                    $('#lbl_'+fld).show();
                    status.empty();
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function (xhr) {
                    bar.width("100%");
                    percent.html("100%");
                    status.html(xhr.responseText);
                }
            });

        })();
    }
</script>
</body>
</html>