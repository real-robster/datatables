<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
 class Crud extends CI_Controller {
      //functions
      public function index(){
           $data["title"] = "Codeigniter Ajax CRUD with Data Tables and Bootstrap Modals";
           $this->load->view('crud_view', $data);
      }
      public function fetch_devices(){
           $this->load->model("crud_model");
           $fetch_data = $this->crud_model->make_datatables();
           $data = array();
           foreach($fetch_data as $row)
           {
                $sub_array = array();
                $sub_array[] = $row->deviceid;
                $sub_array[] = $row->status;
                $sub_array[] = $row->softwareversion;
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs">Update</button>';
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs">Delete</button>';
                $data[] = $sub_array;
           }
           $output = array(
                "draw"                    =>     intval($_POST["draw"]),
                "recordsTotal"          =>      $this->crud_model->get_all_data(),
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data(),
                "data"                    =>     $data
           );
           echo json_encode($output);
      }
 }
