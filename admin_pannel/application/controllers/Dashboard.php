<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Dashboard extends CI_Controller {
    function __construct() {
        parent::__construct();
        
        $this->load->helper('url');
        $this->load->helper('file');
        //$this->load->helper('download');
        //$this->load->library('zip');
        $this->load->helper('form');
        $this->load->database();
        $this->load->model('users_model');
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
        $signup = "SELECT COUNT(*) as 'count' FROM `al_login`";
        $appling = "SELECT COUNT(*) as 'count' FROM `al_registration` where status!=1";
        $complted = "SELECT COUNT(*) as 'count' FROM `al_registration` where status=1";
        $data['signup'] = $this->users_model->get_count($signup);
        $data['appling'] = $this->users_model->get_count($appling);
        $data['complted'] = $this->users_model->get_count($complted);        
        $this->load->view('dashboard', $data);
    }
    public function db_back_up()
    {
     $this->load->dbutil();
        $prefs = array(     
                'format'      => 'zip',             
                'filename'    => 'my_db_backup.sql'
              );
        $backup = $this->dbutil->backup($prefs); 
        $db_name = 'backup-on-'. date("Y-m-d-H-i-s") .'.zip';
        $save = 'assets/db_backup/'.$db_name;
        if(write_file($save, $backup)){
            echo "<script>alert('Done');window.location.href ='../dashboard';</script>";
                }
        //force_download($db_name, $backup); 

    }
    
}
