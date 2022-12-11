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

    public function loadcustomerlist_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/customer/customer_list', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load customer page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load customer page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function loadcustomeradd_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/customer/customer_add', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load customer add page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load add customer page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function loadcustomerdata_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $return_data = $this->CustomerModel->get_customer();
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load data successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load data"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function storenewcustomer_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $data = $this->security->xss_clean($this->post());

            // Form Validation
            $this->form_validation->set_data($data);
            $this->form_validation->set_rules('customer_name', 'Tên khách hàng', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $message = array(
                    'status'    =>  false,
                    'error'     =>  $this->form_validation->error_array(),
                    'message'   =>  validation_errors()
                );
                $this->response($message, RestController::HTTP_NOT_FOUND);
            } else {
                $customer_data = [
                    'name'              => $data['customer_name'],
                    'customer_code'     => $data['customer_code'],
                    'group_code'        => $data['customer_group'],
                    'phone'             => $data['customer_phone'],
                    'email'             => $data['customer_email'],
                    'birthday'          => $data['customer_birthday'],
                    'city'              => $data['customer_city'],
                    'district'          => $data['customer_district'],
                    'address'           => $data['customer_address']
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
            $message = [
                'status' => false,
                'message' => "Can't save new customer"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
