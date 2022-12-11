<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Employee extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/UserModel');
    }

    public function loademployeelist_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/employee/employee_list', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load employee page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load employee page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loademployeeadd_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/employee/employee_add', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load employee add page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load employee add page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loademployeedata_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $this->load->model('cms/UserModel');

            $data = $this->authorization_token->userData();
            $permission_data = $this->UserModel->get_permission_of_user($data->id);

            if ($permission_data[0]->permission == "1") {
                $return_data = $this->UserModel->get_user_list_by_admin();
            } else if ($permission_data[0]->permission == 2) {
                $return_data = $this->UserModel->get_user_list_by_manager();
            }

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

    public function storenewemployee_post()
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
            $this->form_validation->set_rules('employee_name', 'Tên nhân viên', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $message = array(
                    'status'    =>  false,
                    'error'     =>  $this->form_validation->error_array(),
                    'message'   =>  validation_errors()
                );
                $this->response($message, RestController::HTTP_NOT_FOUND);
            } else {
                $employee_data = [
                    'fullname'             => $data['employee_name'],
                    'username'             => $data['employee_username'],
                    'pwd'                  => $data['employee_password'],
                    'phone'                => $data['employee_phone'],
                    'birthday'             => $data['employee_birthday'],
                    'address'              => $data['employee_address'],
                    'city'                 => $data['employee_city'],
                    'district'             => $data['employee_district'],
                    'brand_code'           => $data['employee_brand'],
                    'permission'           => $data['employee_permission'],
                ];

                $this->UserModel->insert_user($employee_data);
                $message = [
                    'status' => true,
                    'data' => 'success',
                    'message' => "Save employee successful"
                ];
                $this->response($message, RestController::HTTP_OK);
            }
        } else {
            $message = [
                'status' => false,
                'message' => "Can't save employee"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
