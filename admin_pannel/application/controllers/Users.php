<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Users extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('encription');
        $this->load->model('users_model');
        $this->load->model('privilege_model');
        $this->check_isvalidated();
    }
    private function check_isvalidated() {
        if (!$this->session->userdata('validated')) {
            header('Location:Login');
        }
    }
    public function index() {
        $data['msg'] = '';
        $data['title'] = 'Users';
        if (isset($_POST['save'])) {
           
            $password = $this->input->post('password');
            $encr_password = md5($password);            
                $query = array(
                    'time' => date('Y-m-d H:i:s'),
                    'firstname' => $this->input->post('F_Name'),                    
                    'email' => $this->input->post('email'),                    
                    'password' => $encr_password,                    
                    'designation_id' => 0,
                    'activated' => 1,
                    'creatd_user_id' => $this->session->userdata('userid')
                );
                $result = $this->users_model->add($query);
                if (!$result) {
                    $data['msg'] = 'Data Saved Sucessfully';
                } else {
                    $data['msg'] = 'Insertion Error';
                }
            } 
        
        $data['nationality'] = $this->users_model->get_nationality();
        $this->load->view('user_add', $data);
    }
    private function set_upload_options() {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png|PNG';
        $config['max_size'] = '45058';
        $config['overwrite'] = FALSE;
        return $config;
    }
    public function view() {

        $data['msg'] = '';
        $data['title'] = 'Users';
        $data['users'] = $this->users_model->get_users();
        $this->load->view('user_view', $data);
    }
    
    public function previlage() {
        $data['msg'] = '';
        $data['title'] = 'Volunteer';
        $str = $_REQUEST['id'];
        $id = my_simple_crypt($str, 'd');
        $data['user_id'] = $id;
        if (isset($_POST['submit'])) {
            $cpt = count($_POST['chk']);
            for ($i = 0; $i < $cpt; $i++) {
                $arr[] = array(
                    'user_id' => $_POST['userid'],
                    'module_id' => $_POST['chk'][$i]
                );
            }
            $result = $this->users_model->insert_privilage($arr, $_POST['userid']);
            if (!$result) {
                $data['msg'] = 'Privilage Modification Sucessfully Done';
            } else {
                $data['msg'] = 'Insertion Error';
            }
        }
        $this->load->view('previlage', $data);
    }
    public function menus() {
        $data['msg'] = '';
        $data['title'] = 'Module Creation';
        if (isset($_POST['save'])) {
            $query = array(
                'module_name' => $_POST['module_name'],
                'parent_module_id' => $_POST['parent_module'],
                'sort_order' => $_POST['sort_order'],
                'module_head' => $_POST['module_head'],
                'module_link' => $_POST['module_link'],
                'module_icone' => $_POST['icone']
            );
            $result = $this->privilege_model->insert_modules($query);
            if (!$result) {
                $data['msg'] = 'Module added';
            } else {
                $data['msg'] = 'Insertion Error';
            }
        }
        $data['modules'] = $this->privilege_model->get_module(0);
        $data['parent_module'] = $this->privilege_model->get_parent_modules();
        $this->load->view('module_creation', $data);
    }
    public function delete() {

        $str = $_REQUEST['id'];
        $id = my_simple_crypt($str, 'd');
        $this->users_model->delete_users($id);
    }
    
}
