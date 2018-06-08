<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Application_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function get_all($status, $sts,$f_date)
    {
        if ($status == 0) {
            if($sts!=''){
            $a=array('admin_status' => $sts);
            $this->db->select('*');
        $this->db->from('al_registration');
        $this->db->where($a);
        $this->db->order_by('date_submission', 'ASC');
        $query = $this->db->get();
            //$query = $this->db->get_where('al_registration',array('admin_status' => $sts));
            }
            else{
            $a=array('status' => $status);
            $this->db->select('*');
        $this->db->from('al_registration');
        $this->db->where($a);
        $this->db->order_by('date_submission', 'ASC');
        $query = $this->db->get();
            //$query = $this->db->get('al_registration');
            }
        }
        else if ($status == 1){
            if($sts!=''){
            $a=array('status' => $status,'admin_status'=>$sts);
            $this->db->select('*');
        $this->db->from('al_registration');
        $this->db->where($a);
        $this->db->order_by('date_submission', 'ASC');
        $query = $this->db->get();
//            $query = $this->db->get_where('al_registration', array('status' => $status,'admin_status'=>$sts));
            }
            else{
            $a=array('status' => $status);
            $this->db->select('*');
        $this->db->from('al_registration');
        $this->db->where($a);
        $this->db->order_by('date_submission', 'ASC');
        $query = $this->db->get();
            //$query = $this->db->get_where('al_registration', array('status' => $status));
            }
        }else if($status == 2)
        {
          $a=array('status' => $status);
            $this->db->select('*');
        $this->db->from('al_registration');
        $this->db->where($a);
        $this->db->order_by('date_submission', 'ASC');
        $query = $this->db->get();  
        }
        return $query->result();
    }

    public function get_single($id)
    {
        $query = $this->db->get_where('al_registration', array('reg_id' => $id));
        return $query->result();
    }

    public function update_profile_status($qry, $vid)
    {
        $this->db->where('reg_id', $vid);
        $this->db->update('al_registration', $qry);
    }
}