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
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1" || $permission_data[0]->permission == "2") {

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
                    'message' => "Not allowed!"
                ];
                $this->response($message, RestController::HTTP_METHOD_NOT_ALLOWED);
            }
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
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1" || $permission_data[0]->permission == "2") {

                $return_data = $this->load->view('cms/dashboard/employee/employee_add', '', true);
            } else {
                $return_data = [];
            }

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
            $data = $this->security->xss_clean($this->post());
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);
            $brand_code_data = $this->UserModel->get_brandcode_of_user($user_data->id);

            if ($permission_data[0]->permission == "1") {
                $return_data = $this->UserModel->get_user_list_by_admin($data["brand_code"]);
            } else if ($permission_data[0]->permission == 2) {
                if ($brand_code_data[0]->brand_code == $data["brand_code"]) {
                    $return_data = $this->UserModel->get_user_list_by_manager($data["brand_code"]);
                } else {
                    $return_data = [];
                }
            } else {
                $return_data = [];
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
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $brand_code_data = $this->UserModel->get_brandcode_of_user($user_data->id);
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);


            if ($permission_data[0]->permission == 1 || $permission_data[0]->permission == 2) {
                // Form Validation
                $this->form_validation->set_data($data);
                $this->form_validation->set_error_delimiters('', '');
                $this->form_validation->set_rules('employee_name', 'Tên nhân viên', 'trim|required|max_length[250]');
                $this->form_validation->set_rules('employee_email', 'Email', 'trim|required|max_length[100]|valid_email');
                $this->form_validation->set_rules('employee_password', 'Mật khẩu', 'trim|required|min_length[6]|max_length[150]|alpha_numeric');
                $this->form_validation->set_rules('employee_confirm', 'Nhập lại mật khẩu', 'trim|required|min_length[6]|max_length[150]|alpha_numeric|matches[employee_password]');
                $this->form_validation->set_rules('employee_phone', 'Số điện thoại', 'trim|max_length[20]|numeric');
                $this->form_validation->set_rules('employee_birthday', 'Sinh nhật', 'trim|max_length[15]|regex_match[/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/]');
                $this->form_validation->set_rules('employee_address', 'Địa chỉ', 'trim|max_length[250]');
                $this->form_validation->set_rules('employee_city', 'Khu vực', 'trim|max_length[50]');
                $this->form_validation->set_rules('employee_district', 'Quận huyện', 'trim|max_length[50]');
                $this->form_validation->set_rules('employee_brand', 'Chi nhánh', 'trim|required|max_length[5]|alpha_numeric');

                if ($permission_data[0]->permission == 1) {
                    $this->form_validation->set_rules('employee_permission', 'Phân quyền', 'trim|required|max_length[50]|in_list[2,3]');
                } else if ($permission_data[0]->permission == 2) {
                    $this->form_validation->set_rules('employee_permission', 'Phân quyền', 'trim|required|max_length[50]|in_list[3]');
                }

                if ($this->form_validation->run() == FALSE) {
                    $message = array(
                        'status'    =>  false,
                        'error'     =>  $this->form_validation->error_array(),
                        'message'   =>  validation_errors()
                    );
                    $this->response($message, RestController::HTTP_NOT_FOUND);
                } else {
                    if ($brand_code_data[0]->brand_code == "ALL" || $brand_code_data[0]->brand_code == $data['employee_brand']) {
                        $employee_data = [
                            'fullname'             => $data['employee_name'],
                            'email'                => $data['employee_email'],
                            'pwd'                  => $data['employee_password'],
                            'phone'                => $data['employee_phone'],
                            'birthday'             => $data['employee_birthday'],
                            'address'              => $data['employee_address'],
                            'city'                 => $data['employee_city'],
                            'district'             => $data['employee_district'],
                            'brand_code'           => $data['employee_brand'],
                            'permission'           => $data['employee_permission'],
                            'state'                => 1,
                            'created_by'           => $user_data->id
                        ];

                        $this->UserModel->insert_user($employee_data);
                        $message = [
                            'status' => true,
                            'data' => 'success',
                            'message' => "Save employee successful"
                        ];
                        $this->response($message, RestController::HTTP_OK);
                    } else {
                        $message = [
                            'status' => false,
                            'message' => "Not allowed!"
                        ];
                        $this->response($message, RestController::HTTP_METHOD_NOT_ALLOWED);
                    }
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
                'message' => "Can't save employee"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
