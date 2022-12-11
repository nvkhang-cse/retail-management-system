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

            $return_data = $this->load->view('cms/dashboard/brand/brand_list', '', true);

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

            $return_data = $this->load->view('cms/dashboard/brand/brand_add', '', true);

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

            $data = $this->authorization_token->userData();
            $brand_code_data = $this->UserModel->get_brandcode_of_user($data->id);

            if ($brand_code_data[0]->brand_code == "ALL") {
                $return_data = $this->BrandModel->get_brand();
            } else {
                $return_data = $this->BrandModel->get_brand_by_user($brand_code_data[0]->brand_code);
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

            // Form Validation
            $this->form_validation->set_data($data);
            $this->form_validation->set_rules('brand_name', 'Tên chi nhánh', 'trim|required');

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
                    'central'          => $data['brand_central']
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
                'message' => "Can't save new brand"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
