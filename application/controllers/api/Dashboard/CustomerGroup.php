<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Customergroup extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/CustomerGroupModel');
    }

    public function loadcustomergrouplist_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        // var_dump($is_valid_token);
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            // $this->data["headerview"]="cms/layout/main";
            // $this->data["subview"]="cms/layout/main";

            $return_data = $this->load->view('cms/dashboard/customer_group/customer_group_list', '', true);


            // $return_data = site_url('cms/layout/main.php');
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load customer page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load customer page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function loadcustomergroupadd_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        // var_dump($is_valid_token);
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            // $this->data["headerview"]="cms/layout/main";
            // $this->data["subview"]="cms/layout/main";

            $return_data = $this->load->view('cms/dashboard/customer_group/customer_group_add', '', true);


            // $return_data = site_url('cms/layout/main.php');
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load customer add page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load add customer page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function loadtabledata_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        // var_dump($is_valid_token);
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $return_data = $this->CustomerGroupModel->get_customer_group();
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load table data successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load table data"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function storenewcustomergroup_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        // var_dump($is_valid_token);
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            // $this->data["headerview"]="cms/layout/main";
            // $this->data["subview"]="cms/layout/main";

            $data = $this->security->xss_clean($this->post());

            // Form validation
            $this->form_validation->set_data($data);
            $this->form_validation->set_rules('customer_group_name', 'Tên nhóm khách hàng', 'trim|required');
            $this->form_validation->set_rules('customer_group_code', 'Mã nhóm khách hàng', 'trim|required');
            $this->form_validation->set_rules('customer_group_description', 'Mô tả', 'trim');
            $this->form_validation->set_rules('customer_group_discount', 'Chiết khấu nhóm', 'trim');

            if ($this->form_validation->run() == FALSE) {
                //Form validation error
                $message = array(
                    'status'    =>  false,
                    'error'     =>  $this->form_validation->error_array(),
                    'message'   =>  validation_errors()
                );
                $this->response($message, RestController::HTTP_NOT_FOUND);
            } else {
                $customer_group_data = [
                    'name'              => $data['customer_group_name'],
                    'id'                => $data['customer_group_code'],
                    'description'       => $data['customer_group_description'],
                    'discount'          => $data['customer_group_discount'],
                ];
                $this->CustomerGroupModel->insert_customer_group($customer_group_data);
                $message = [
                    'status' => true,
                    'data' => 'success',
                    'message' => "Save customer group successful"
                ];
                $this->response($message, RestController::HTTP_OK);
            }
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't save new customer group"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
