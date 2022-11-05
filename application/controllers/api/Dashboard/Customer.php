<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Customer extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/CustomerModel');
    }

    public function loadCustomerList_post()
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

            $return_data = $this->load->view('cms/dashboard/customer/customer_list', '', true);


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
    public function loadCustomerAdd_post()
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

            $return_data = $this->load->view('cms/dashboard/customer/customer_add', '', true);


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
    public function loadTableData_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        // var_dump($is_valid_token);
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $return_data = $this->CustomerModel->get_customer();
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

    public function storeNewCustomer_post()
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
            $this->form_validation->set_rules('customer_name', 'Tên khách hàng', 'trim|required');
            $this->form_validation->set_rules('customer_code', 'Mã khách hàng', 'trim|required');
            $this->form_validation->set_rules('customer_group', 'Mã nhóm khách hàng', 'trim|required');
            $this->form_validation->set_rules('customer_phone', 'Số điện thoại', 'trim');
            $this->form_validation->set_rules('customer_email', 'Email', 'trim');
            $this->form_validation->set_rules('customer_cities', 'Khu vực', 'trim');
            $this->form_validation->set_rules('customer_district', 'Quận huyện', 'trim');
            $this->form_validation->set_rules('customer_village', 'Phường xã', 'trim');
            $this->form_validation->set_rules('customer_address', 'Địa chỉ', 'trim');

            if ($this->form_validation->run() == FALSE) {
                //Form validation error
                $message = array(
                    'status'    =>  false,
                    'error'     =>  $this->form_validation->error_array(),
                    'message'   =>  validation_errors()
                );
                $this->response($message, RestController::HTTP_NOT_FOUND);
            } else {
                $customer_data = [
                    'name'              => $data['customer_name'],
                    'id'                => $data['customer_code'],
                    'group_id'          => $data['customer_group'],
                    'phone'             => $data['customer_phone'],
                    'email'             => $data['customer_email'],
                    'cities'            => $data['customer_cities'],
                    'districts'         => $data['customer_district'],
                    'village'           => $data['customer_village'],
                    'address'           => $data['customer_address'],
                ];
                $this->CustomerModel->insert_customer($customer_data);
                $message = [
                    'status' => true,
                    'data' => 'success',
                    'message' => "Save customer successful"
                ];
                $this->response($message, RestController::HTTP_OK);
            }
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't save new customer"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
