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
            $this->form_validation->set_rules('customer_group', 'Mã nhóm khách hàng', 'trim|max_length[30]|alpha_dash');
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
                    'customer_code'     => strtoupper(uniqid('CS' . '_')),
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

    public function getcustomerinfo_post()
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

    public function getcustomerdiscount_post()
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

    public function updatecustomer_post()
    {
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $data = $this->security->xss_clean($this->post());

            // Form Validation
            $this->form_validation->set_data($data);
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('customer_name', 'Tên khách hàng', 'trim|required|max_length[100]');
            $this->form_validation->set_rules('customer_group', 'Mã nhóm khách hàng', 'trim|max_length[30]|alpha_dash');
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
                    'group_code'        => $data['customer_group'],
                    'phone'             => $data['customer_phone'],
                    'email'             => $data['customer_email'],
                    'city'              => $data['customer_city'],
                    'district'          => $data['customer_district'],
                    'address'           => $data['customer_address'],
                ];
                $this->CustomerModel->update_customer($data['customer_code'], $customer_data);
                $message = [
                    'status' => true,
                    'data' => 'success',
                    'message' => "Update customer successful"
                ];
                $this->response($message, RestController::HTTP_OK);
            }
        } else {
            $message = [
                'status' => false,
                'message' => "Can't update customer"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function deletecustomerbycode_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $data = $this->security->xss_clean($this->post());
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1") {
                $this->CustomerModel->delete_customer_by_code($data["customer_code"]);

                $message = [
                    'status' => true,
                    'data' => 'success',
                    'message' => "Delete customer successful"
                ];
                $this->response($message, RestController::HTTP_OK);
            } else {
                $message = [
                    'status' => false,
                    'message' => "Not allowed!"
                ];
                $this->response($message, RestController::HTTP_METHOD_NOT_ALLOWED);
            }
        } else {
            $message = [
                'status' => false,
                'message' => "Can't delete customer"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function gettotalcustomerofgroup_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $data = $this->security->xss_clean($this->post());
            $this->load->model('cms/CustomerGroupModel');
            $customer_group_data = $this->CustomerGroupModel->get_customer_group();

            $response_data = array();
            if ($customer_group_data != []) {
                foreach ($customer_group_data as $key => $val) {
                    $customer_group_code = $customer_group_data[$key]->code;
                    $number_customer = count($this->CustomerModel->get_customer_by_group_code($customer_group_code));
                    array_push($response_data, array('code' => $customer_group_code, 'total' => $number_customer));
                }
            }

            $message = [
                'status' => true,
                'data' => $response_data,
                'message' => "Load product data successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load product data"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
