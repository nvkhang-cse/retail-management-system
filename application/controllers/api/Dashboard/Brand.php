<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Brand extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/BrandModel');
    }

    public function loadbrandlist_post()
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
                $return_data = $this->load->view('cms/dashboard/brand/brand_list', '', true);
            } else {
                $return_data = [];
            }

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load brand list successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load brand list"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadbrandadd_post()
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
                $return_data = $this->load->view('cms/dashboard/brand/brand_add', '', true);
            } else {
                $return_data  = [];
            }
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load brand add page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load brand add page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadbranddata_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $brand_code_data = $this->UserModel->get_brandcode_of_user($user_data->id);

            if ($brand_code_data[0]->brand_code == "ALL") {
                $return_data = $this->BrandModel->get_all_brand();
            } else {
                $return_data = $this->BrandModel->get_brand_by_brandcode($brand_code_data[0]->brand_code);
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

    public function storenewbrand_post()
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
                $this->form_validation->set_rules('brand_name', 'Tên chi nhánh', 'trim|required|max_length[50]');
                $this->form_validation->set_rules('brand_code', 'Mã chi nhánh', 'trim|required|max_length[5]|alpha_numeric');
                $this->form_validation->set_rules('brand_address', 'Địa chỉ', 'trim|max_length[250]');
                $this->form_validation->set_rules('brand_city', 'Khu vực', 'trim|max_length[50]');
                $this->form_validation->set_rules('brand_district', 'Quận huyện', 'trim|max_length[50]');
                $this->form_validation->set_rules('brand_phone', 'Số điện thoại', 'trim|max_length[20]|numeric');
                $this->form_validation->set_rules('brand_central', 'Trung tâm', 'trim|required|in_list[1,2]');

                if ($this->form_validation->run() == FALSE) {
                    $message = array(
                        'status'    =>  false,
                        'error'     =>  $this->form_validation->error_array(),
                        'message'   =>  validation_errors()
                    );
                    $this->response($message, RestController::HTTP_NOT_FOUND);
                } else {
                    $brand_data = [
                        'name'             => $data['brand_name'],
                        'code'             => $data['brand_code'],
                        'address'          => $data['brand_address'],
                        'city'             => $data['brand_city'],
                        'district'         => $data['brand_district'],
                        'phone'            => $data['brand_phone'],
                        'central'          => $data['brand_central'],
                        'created_by'       => $user_data->id
                    ];

                    $this->BrandModel->insert_brand($brand_data);
                    $message = [
                        'status' => true,
                        'data' => 'success',
                        'message' => "Save brand successful"
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
                'message' => "Can't save new brand"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
