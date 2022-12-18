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
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/customer_group/customer_group_list', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load customer group page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load customer group page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadcustomergroupdata_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->CustomerGroupModel->get_customer_group();

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

    public function loadcustomergroupadd_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1" || $permission_data[0]->permission == "2") {

                $return_data = $this->load->view('cms/dashboard/customer_group/customer_group_add', '', true);
            } else {
                $return_data = [];
            }

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load customer group add page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load customer group add page"
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
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $data = $this->security->xss_clean($this->post());

            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1" || $permission_data[0]->permission == "2") {

                // Form Validation
                $this->form_validation->set_data($data);
                $this->form_validation->set_error_delimiters('', '');
                $this->form_validation->set_rules('customer_group_name', 'Tên nhóm khách hàng', 'trim|required|max_length[50]');
                $this->form_validation->set_rules('customer_group_code', 'Mã nhóm khách hàng', 'trim|required|max_length[5]|alpha_numeric');
                $this->form_validation->set_rules('customer_group_description', 'Mô tả', 'trim');
                $this->form_validation->set_rules('customer_group_discount', 'Chiết khấu', 'trim|integer|greater_than_equal_to[0]|less_than_equal_to[1000]');
                $this->form_validation->set_rules('customer_spend_from', 'Tiêu dùng từ', 'trim|integer|greater_than_equal_to[0]');
                $this->form_validation->set_rules('customer_spend_to', 'Tiêu dùng đến', 'trim|integer|greater_than_equal_to[0]');

                if ($this->form_validation->run() == FALSE) {
                    $message = array(
                        'status'    =>  false,
                        'error'     =>  $this->form_validation->error_array(),
                        'message'   =>  validation_errors()
                    );
                    $this->response($message, RestController::HTTP_NOT_FOUND);
                } else {
                    $customer_group_data = [
                        'name'              => $data['customer_group_name'],
                        'code'              => $data['customer_group_code'],
                        'description'       => $data['customer_group_description'],
                        'discount'          => $data['customer_group_discount'],
                        'spend_from'        => $data['customer_spend_from'],
                        'spend_to'          => $data['customer_spend_to'],
                        'created_by'        => $user_data->id
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
                $message = [
                    'status' => false,
                    'message' => "Not allowed!"
                ];
                $this->response($message, RestController::HTTP_METHOD_NOT_ALLOWED);
            }
        } else {
            $message = [
                'status' => false,
                'message' => "Can't save new customer group"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
