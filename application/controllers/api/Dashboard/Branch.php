<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Branch extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/BranchModel');
    }

    public function loadbranchlist_post()
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

            if ($permission_data[0]->permission == "1") {
                $return_data = $this->load->view('cms/dashboard/branch/branch_list', '', true);
            } else {
                $return_data = [];
            }

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load branch list successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load branch list"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadbranchadd_post()
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

            if ($permission_data[0]->permission == "1") {
                $return_data = $this->load->view('cms/dashboard/branch/branch_add', '', true);
            } else {
                $return_data  = [];
            }
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load branch add page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load branch add page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadbranchdata_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $branch_code_data = $this->UserModel->get_branchcode_of_user($user_data->id);

            if ($branch_code_data[0]->branch_code == "ALL") {
                $return_data = $this->BranchModel->get_all_branch();
            } else {
                $return_data = $this->BranchModel->get_branch_by_branchcode($branch_code_data[0]->branch_code);
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

    public function storenewbranch_post()
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

                // Form Validation
                $this->form_validation->set_data($data);
                $this->form_validation->set_error_delimiters('', '');
                $this->form_validation->set_rules('branch_name', 'Tên chi nhánh', 'trim|required|max_length[50]');
                $this->form_validation->set_rules('branch_address', 'Địa chỉ', 'trim|max_length[250]');
                $this->form_validation->set_rules('branch_city', 'Khu vực', 'trim|max_length[50]');
                $this->form_validation->set_rules('branch_district', 'Quận huyện', 'trim|max_length[50]');
                $this->form_validation->set_rules('branch_phone', 'Số điện thoại', 'trim|max_length[20]|numeric');
                $this->form_validation->set_rules('branch_central', 'Trung tâm', 'trim|required|in_list[1,2]');

                if ($this->form_validation->run() == FALSE) {
                    $message = array(
                        'status'    =>  false,
                        'error'     =>  $this->form_validation->error_array(),
                        'message'   =>  validation_errors()
                    );
                    $this->response($message, RestController::HTTP_NOT_FOUND);
                } else {
                    $branch_data = [
                        'code'             => strtoupper(uniqid('BRANCH' . '_')),
                        'name'             => $data['branch_name'],
                        'address'          => $data['branch_address'],
                        'city'             => $data['branch_city'],
                        'district'         => $data['branch_district'],
                        'phone'            => $data['branch_phone'],
                        'central'          => $data['branch_central'],
                        'created_by'       => $user_data->id
                    ];

                    $this->BranchModel->insert_branch($branch_data);
                    $message = [
                        'status' => true,
                        'data' => 'success',
                        'message' => "Save branch successful"
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
                'message' => "Can't save new branch"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
