<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Applications extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('users_model');
        $this->load->model('application_model');
        $this->load->model('dashboard_model');
        $this->load->model('privilege_model');
        $this->check_isvalidated();
    }
    private function check_isvalidated() {       
       $this->session->userdata('validated');
       if ($this->session->userdata('validated') == '') {
        header('Location:Login');
    }
}
public function index() {
    $data['title'] = "Dashboard";
    $data['msg'] = '';
    $this->load->view('dashboard', $data);
}
public function applications_view() {
    $data['msg'] = '';
    $data['status'] = 0;
    $data['title'] = 'Volunteer';

    $data['s_gender'] = '';
    $data['s_nationality'] = '';
    $data['s_superpower'] = '';
    $data['s_name_phone'] = '';
    $data['s_sort'] = 'ASC';
    $data['f_date'] = '';
    $data['t_date'] = '';
    $data['status'] = 0;

    $data['volunteer'] =array();;
    $data['nationality'] = $this->users_model->get_nationality();       
    $this->load->view('applications_view', $data);
}
public function get_all_applications()
{     
    if(isset($_POST['type']))
        $status=$_POST['type'];
    if(isset($_POST['sts']))
        $sts=$_POST['sts'];
    else
        $sts='';
    if(isset($_POST['f_date']))
        $f_date=$_POST['f_date'];
    else
        $f_date='';

    $full_arr= array();
    $cnt = 0;
    $application = $this->application_model->get_all($status,$sts,$f_date);

    foreach ($application as $key) {
        $cnt++;
        $action='<a href="profile?id=';
        $action.=$key->reg_id;
        $action.='"><i class="fa fa-address-book fa-2x"></i></a>';
            // $arr1[]=array(
        array_push($full_arr,array(
            $cnt,
            $key->first_name,
            $key->gender,
            $key->nationality,
            $key->mobile_no,
            $key->email,
            $action
        )
    );
    }
    
    echo json_encode($full_arr);

}
public function profile()
{
    $data['msg'] = '';        
    $data['title'] = 'Volunteer';
    $id =$_REQUEST['id'];
    $data['id']=$id;
    $data['applications']= $this->application_model->get_single($id);
    $data['comments'] = $this->users_model->get_comments($id);
    $this->load->view('profile_new', $data);
}
public function completed_applications()
{
    $data['msg'] = '';
    $data['status'] = 0;
    $data['title'] = 'Volunteer';

    $data['s_gender'] = '';
    $data['s_nationality'] = '';
    $data['s_superpower'] = '';
    $data['s_name_phone'] = '';
    $data['s_sort'] = 'ASC';
    $data['f_date'] = '';
    $data['t_date'] = '';
    $data['status'] = 1;

    $data['volunteer'] =array();;
    $data['nationality'] = $this->users_model->get_nationality();       
    $this->load->view('applications_view', $data);  
}
public function status_change_applications()
{
    $data['msg'] = '';
    $data['status'] = 2;
    $data['title'] = 'Volunteer';

    $data['s_gender'] = '';
    $data['s_nationality'] = '';
    $data['s_superpower'] = '';
    $data['s_name_phone'] = '';
    $data['s_sort'] = 'ASC';
    $data['f_date'] = '';
    $data['t_date'] = '';
    $data['status'] = 2;

    $data['volunteer'] =array();;
    $data['nationality'] = $this->users_model->get_nationality();       
    $this->load->view('applications_view', $data);  
}
public function change_status()
{
    if(isset($_POST['vid'])&& isset($_POST['txt']))
    {
        $vid=$_POST['vid'];
        $txt=$_POST['txt'];
        $query = array(
            'admin_status' => $txt
        );
        $result = $this->application_model->update_profile_status($query,$vid);
        if (!$result)
            echo 'Done';
        else
            echo 'Insertion Error';

    }
}
public function add_comment()
{
    if (isset($_POST['vid']) && isset($_POST['reminder'])) {
        $profile_id = $_POST['vid'];
        $reminder = $_POST['reminder'];
        $query = array(
            'profile_id' => $profile_id,
            'user_id' => $this->session->userdata('userid'),
            'decription' => $reminder,
            'date' => date('Y-m-d')
        );

        $result = $this->users_model->insert_comments($query);
        $data['comments'] = $this->users_model->get_comments($profile_id);
        $arr = "";
        foreach ($data['comments'] as $row) {
            $user_id = $row->user_id;
            $d['usr'] = $this->users_model->get_single_users($user_id);


            $arr .= "<div class='feed-element'<div class='media-body'> <strong>";
            $arr .= $d['usr'][0]->firstname;
            $arr .= "</strong><br><small class='text-muted'>";
            $arr .= $row->date;
            $arr .= "</small><div class='well'>";
            $arr .= $row->decription;
            $arr .= "</div> </div> </div>";
        }
        echo $arr;
    }
}
public function action_permission($module_id)
{
    $user_id= $this->session->userdata('userid');
    $sql="SELECT * FROM al_permission p INNER JOIN al_module m ON m.module_id=p.module_id WHERE m.parent_module_id='$module_id' AND p.user_id='$user_id' AND m.sort_order!=1 AND m.sort_order!=2 ORDER BY m.sort_order ASC ";
    $reslut[] = $this->privilege_model->get_result($sql);
    echo "<pre>";
    print_r($reslut);
}
public function zip_download()
{
    $this->load->helper('file');
    $id=$_REQUEST['f'];
    $data['applications']= $this->application_model->get_single($id);
    $Date_Of_Submission=$data['applications'][0]->date_submission;
    $reference_no=$data['applications'][0]->reference_no;
    $filename= $data['applications'][0]->directory_name;
    $full_name=$data['applications'][0]->first_name." ".$data['applications'][0]->middle_name." ".$data['applications'][0]->last_name;
    $Phone=$data['applications'][0]->mobile_no;
    $Email=$data['applications'][0]->email;
    $Gender=$data['applications'][0]->gender;
    $d = $data['applications'][0]->date_of_birth;
    $Age= date_diff(date_create($d), date_create('today'))->y;
    $Marital_Status=$data['applications'][0]->marital_status;
    $Nationality=$data['applications'][0]->nationality;
    $Place_of_Birth=$data['applications'][0]->place_of_birth;
    $date_of_birth=$data['applications'][0]->date_of_birth;
    $National_Residency=$data['applications'][0]->passport_no;
    $Academic_Institution=$data['applications'][0]->university_name;
    $final_grade=$data['applications'][0]->final_grade;
    $enter_mark=$data['applications'][0]->enter_mark;
    $graduation_year=$data['applications'][0]->graduation_year;
    $medical_degree=$data['applications'][0]->medical_degree;
    $other_degree=$data['applications'][0]->other_degree;
    $pre_entry_exam=$data['applications'][0]->pre_entry_exam;
    $pre_exam_name=$data['applications'][0]->pre_exam_name;
    $enter_score=$data['applications'][0]->enter_score;
    $english_langauge_proficiency=$data['applications'][0]->english_langauge_proficiency;
    $exam_name=$data['applications'][0]->exam_name;
    $enter_marks=$data['applications'][0]->enter_marks;

$cv=$data['applications'][0]->cv;
$medical=$data['applications'][0]->medical;
$medicaldegreecertificate=$data['applications'][0]->medicaldegreecertificate;
$otherdegree=$data['applications'][0]->otherdegree;
$personalstatement=$data['applications'][0]->personalstatement;
$personalphoto=$data['applications'][0]->personalphoto;
$englishlangugaetestscore=$data['applications'][0]->englishlangugaetestscore;
$preentryexamresult=$data['applications'][0]->preentryexamresult;
$emiratesid=$data['applications'][0]->emiratesid;
$passportid=$data['applications'][0]->passportid;
$deansletter=$data['applications'][0]->deansletter;

    $data ="Date Of Submission : ".$Date_Of_Submission;
    $data .="\r\n";
    $data .="Ref NO : ".$reference_no;
    $data .="\r\n";
    $data .= "Full Name :".$full_name;
    $data .="\r\n";
    $data .= "Phone :".$Phone;
    $data .="\r\n";
    $data .= "Email :".$Email;
    $data .="\r\n";
    $data .= "Gender :".$Gender;
    $data .="\r\n";
    $data .= "Age :".$Age;
    $data .="\r\n";
    $data .= "Marital Status :".$Marital_Status;
    $data .="\r\n";
    $data .= "Nationality :".$Nationality;
    $data .="\r\n";
    $data .= "Place of Birth :".$Place_of_Birth;
    $data .="\r\n";
    $data .= "Date of Birth :".$date_of_birth;
    $data .="\r\n";
    $data .= "National/Residency(ID) :".$National_Residency;
    $data .="\r\n";
    $data .= "Academic Details";
    $data .="\r\n";
    $data .= "Academic Institution :".$Academic_Institution;
    $data .="\r\n";
    $data .= "Final Grade :".$final_grade." ".$enter_mark;
    $data .="\r\n";
    $data .= "Graduation Year :".$graduation_year;
    $data .="\r\n";
    $data .= "Medical Degree :".$medical_degree;
    $data .="\r\n";
    $data .= "Other Degree :".$other_degree;
    $data .="\r\n";
    $data .= "Type of Residency Entrance Exam :".$pre_entry_exam;
    if($pre_exam_name!=''){
      $data .="\r\n";
      $data .= "Exam Name :".$pre_exam_name;
  }
  $data .="\r\n";
  $data .= "Score  :".$enter_score;
  $data .="\r\n";
  $data .= "English Language Proficiency  :".$english_langauge_proficiency;
  if($exam_name!=''){
    $data .="\r\n";
    $data .= "Test Name  :".$exam_name;
}
$data .="\r\n";
$data .= "Score :".$enter_marks;

if ( ! write_file('../'.$filename.'/info.txt', $data))
{
    echo 'Unable to write the file';
}
else
{

delete_files('../Attachments/'); 

if($cv!='')
copy('../'.$filename.'/'.$cv, '../Attachments/'.$cv);
if($medical!='')
copy('../'.$filename.'/'.$medical, '../Attachments/'.$medical);
if($medicaldegreecertificate!='')
copy('../'.$filename.'/'.$medicaldegreecertificate, '../Attachments/'.$medicaldegreecertificate);
if($otherdegree!='')
copy('../'.$filename.'/'.$otherdegree, '../Attachments/'.$otherdegree);
if($personalstatement!='')
copy('../'.$filename.'/'.$personalstatement, '../Attachments/'.$personalstatement);
if($personalphoto!='')
copy('../'.$filename.'/'.$personalphoto, '../Attachments/'.$personalphoto);
if($englishlangugaetestscore!='')
copy('../'.$filename.'/'.$englishlangugaetestscore, '../Attachments/'.$englishlangugaetestscore);
if($preentryexamresult!='')
copy('../'.$filename.'/'.$preentryexamresult, '../Attachments/'.$preentryexamresult);
if($emiratesid!='')
copy('../'.$filename.'/'.$emiratesid, '../Attachments/'.$emiratesid);
if($passportid!='')
copy('../'.$filename.'/'.$passportid, '../Attachments/'.$passportid);
if($deansletter!='')
copy('../'.$filename.'/'.$deansletter, '../Attachments/'.$deansletter);

copy('../'.$filename.'/info.txt', '../Attachments/info.txt');



if($filename!=''){
    $f=explode("uploads/", $filename);
    $zipname= $f[1];
    $this->load->library('zip');

    $path = '../Attachments/';

    $this->zip->read_dir($path);

    $this->zip->download($zipname.'.zip'); 
}else{
    redirect($_SERVER['HTTP_REFERER']);
} 
    //$this->file_created();
}



}
public function file_created()
{
  $id=$_REQUEST['f'];
  $data['applications']= $this->application_model->get_single($id);
  $filename= $data['applications'][0]->directory_name;

  if($filename!=''){
    $f=explode("uploads/", $filename);
    $zipname= $f[1];
    $this->load->library('zip');

    $path = '../'.$filename."/";

    $this->zip->read_dir($path);

    $this->zip->download($zipname.'.zip'); 
}else{
    redirect($_SERVER['HTTP_REFERER']);
} 
}
// public function get_all _profile()
// {
//  $data['application'] = $this->application_model->get_all_attachment_profile();  
// }

public function application_excel()
{
    $s=$_REQUEST['ex'];
    $t='';
    $f='';
        // create file name
        $fileName = 'data-'.time().'.xlsx';  
        // load excel library
        $this->load->library('excel');
        $application = $this->application_model->get_all($s,$t,$f);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        // set Header
        $styleArray = array(
        'font'  => array(
        'bold'  => true
        // 'color' => array('rgb' => 'FF0000'),
        // 'size'  => 15,
        // 'name'  => 'Verdana'
    ));
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Slno');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Reference No');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Date of Submission');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'First Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Middle Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Last Name');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Nationality');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'National/Residency Identification Card (ID)');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Marital Status');       
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Email');       
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Gender');       
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Place of Birth');       
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'DOB');       
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Mobile');       
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Academic Institution');       
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Final Grade (as it appears on academic transcript)');       
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Score');       
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Graduation Year');       
        $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Medical Degree (MBBS,MD,etc…)');       
        $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Other Degree');       
        $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Type of Residency Entrance Exam');       
        $objPHPExcel->getActiveSheet()->SetCellValue('V1', '');       
        $objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Score');       
        $objPHPExcel->getActiveSheet()->SetCellValue('X1', 'English Language Proficiency');       
        $objPHPExcel->getActiveSheet()->SetCellValue('Y1', '');       
        $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Score');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'CV');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Academic Transcript');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'Degree Completion Certificate (e.g. Diploma, Bachelor’s, etc…)');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Other Degree (if applicable)');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'Personal Statement');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Personal Photo');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Evidence Of English Language Proficiency Result (e.g. IELTS, TOFEL, etc..)');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'Residency Entrance Exam Result (e.g. EMSTREX,SMLE,etc..)');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'National Identification Card');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'Passport/Travel Document');       
        $objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'Dean’s Letter');  

        // set Row
        $rowCount = 2;$cnt = 0;
        foreach ($application as $element) {
            $cnt++;
            $dat1 = $element->date_of_birth;
            $arr1=explode("-", $dat1);;
            $dob=$arr1[2] . "-" . $arr1[1] . "-" . $arr1[0];
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $cnt);            
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->reference_no);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element->date_submission);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element->first_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->middle_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->last_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->nationality);
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element->passport_no);
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element->marital_status);
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->email);
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element->gender);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element->place_of_birth);
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $dob);
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element->mobile_no);
            $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element->university_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element->final_grade);
            $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element->enter_mark);
            $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element->graduation_year);
            $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $element->medical_degree);
            $objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element->other_degree);
            $objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element->pre_entry_exam);
            $objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $element->pre_exam_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $element->enter_score);
            $objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element->english_langauge_proficiency);
            $objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element->exam_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element->enter_marks);
            $objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element->cv);
            $objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $element->medical);
            $objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, $element->medicaldegreecertificate);
            $objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, $element->otherdegree);
            $objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $element->personalstatement);
            $objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, $element->personalphoto);
            $objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, $element->englishlangugaetestscore);
            $objPHPExcel->getActiveSheet()->SetCellValue('AH' . $rowCount, $element->preentryexamresult);
            $objPHPExcel->getActiveSheet()->SetCellValue('AI' . $rowCount, $element->emiratesid);
            $objPHPExcel->getActiveSheet()->SetCellValue('AJ' . $rowCount, $element->passportid);
            $objPHPExcel->getActiveSheet()->SetCellValue('AK' . $rowCount, $element->deansletter);
    
            $rowCount++;
        }

        //Godaddy Server
        $object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="completed_applications.xls"');
        $object_writer->save('php://output');
}
public function folder_backup()
{
    $src = '160.153.140.74/www.aljalilachildrens.ae/demo';
    $dst = '198.15.109.149/demo.bwc.ae/anas/demo';
    beliefmedia_recurse_copy($src, $dst);
       
}



}
function beliefmedia_recurse_copy($src, $dst){
    $dir = @opendir($src);
 
  /* Make destination directory. False on failure */
  if (!file_exists($dst)) @mkdir($dst);
 $cnt=0;
  /* Recursively copy */
  while (false !== ($file = readdir($dir))) {
    echo "<br>". $cnt++;
 
      if (( $file != '.' ) && ( $file != '..' )) {
         if ( is_dir($src . '/' . $file) ) beliefmedia_recurse_copy($src . '/' . $file, $dst . '/' . $file); 
         else copy($src . '/' . $file, $dst . '/' . $file);
      }
 
  }
 closedir($dir);
}