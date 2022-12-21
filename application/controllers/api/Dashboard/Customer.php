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
        $this->load->library('Authorization_Token');
    }

    public function loadcustomerlist_post()
    {
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

    public function loadcustomerdata_post()
    {
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

    public function loadcustomeradd_post()
    {
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

    public function storenewcustomer_post()
    {
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $data = $this->security->xss_clean($this->post());

            $user_data = $this->authorization_token->userData();

            // Form Validation
            $this->form_validation->set_data($data);
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('customer_name', 'Tên khách hàng', 'trim|required|max_length[100]');
            $this->form_validation->set_rules('customer_code', 'Mã khách hàng', 'trim|required|max_length[20]|alpha_numeric');
            $this->form_validation->set_rules('customer_group', 'Mã nhóm khách hàng', 'trim|max_length[5]|alpha_numeric');
            $this->form_validation->set_rules('customer_phone', 'Số điện thoại', 'trim|required|max_length[20]|numeric');
            $this->form_validation->set_rules('customer_email', 'Email', 'trim|max_length[100]|valid_email');
            $this->form_validation->set_rules('customer_city', 'Khu vực', 'trim|max_length[50]');
            $this->form_validation->set_rules('customer_district', 'Quận huyện', 'trim|max_length[50]');
            $this->form_validation->set_rules('customer_address', 'Địa chỉ cụ thể', 'trim|max_length[250]');

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
                    'city'              => $data['customer_city'],
                    'district'          => $data['customer_district'],
                    'address'           => $data['customer_address'],
                    'created_by'        => $user_data->id
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

    public function searchcustomer_post()
    {
        /**
         * User Token Validation
         */
        $data = $this->security->xss_clean($this->post());

        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $result = $this->CustomerModel->search_customer($data['query']);
            $message = [
                'status' => true,
                'data' => $result,
                'message' => "Load customer successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load customer"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function getCustomerInfo_post()
    {
        /**
         * User Token Validation
         */
        $data = $this->security->xss_clean($this->post());

        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $result = $this->CustomerModel->search_customer_by_code($data['code']);
            $message = [
                'status' => true,
                'data' => $result,
                'message' => "Load customer successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load customer"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function getCustomerDiscount_post()
    {
        $data = $this->security->xss_clean($this->post());

        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $this->load->model('cms/CustomerGroupModel');

            $result = $this->CustomerGroupModel->getCusGroupDiscount($data['group_code']);
            $message = [
                'status' => true,
                'data' => $result,
                'message' => "Load customer discount successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load customer discount"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
