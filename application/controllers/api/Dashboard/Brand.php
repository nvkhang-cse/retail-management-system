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
        // var_dump($is_valid_token);
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            // $this->data["headerview"]="cms/layout/main";
            // $this->data["subview"]="cms/layout/main";

            $return_data = $this->load->view('cms/dashboard/brand/brand_list', '', true);


            // $return_data = site_url('cms/layout/main.php');
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load product page"
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
        // var_dump($is_valid_token);
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            // $this->data["headerview"]="cms/layout/main";
            // $this->data["subview"]="cms/layout/main";

            $return_data = $this->load->view('cms/dashboard/brand/brand_add', '', true);


            // $return_data = site_url('cms/layout/main.php');
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product category add page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load add product category page"
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
        // var_dump($is_valid_token);
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $return_data = $this->BrandModel->get_brand();
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

    public function storenewbrand_post()
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
            $this->form_validation->set_rules('brand_name', 'Tên chi nhánh', 'trim|required');
            $this->form_validation->set_rules('brand_code', 'Mã chi nhánh', 'trim|required');
            $this->form_validation->set_rules('brand_address', 'Địa chỉ', 'trim|required');
            $this->form_validation->set_rules('brand_city', 'Thành phố', 'trim|required');
            $this->form_validation->set_rules('brand_district', 'Quận huyện', 'trim|required');
            $this->form_validation->set_rules('brand_phone', 'Số điện thoại', 'trim|required');
            $this->form_validation->set_rules('brand_central', 'Vai trò', 'trim|required');


            if ($this->form_validation->run() == FALSE) {
                //Form validation error
                $message = array(
                    'status'    =>  false,
                    'error'     =>  $this->form_validation->error_array(),
                    'message'   =>  validation_errors()
                );
                $this->response($message, RestController::HTTP_NOT_FOUND);
            } else {
                $category_data = [
                    'name'             => $data['brand_name'],
                    'code'             => $data['brand_code'],
                    'address'          > $data['brand_address'],
                    'city'             => $data['brand_city'],
                    'district'         => $data['brand_district'],
                    'phone'            => $data['brand_phone'],
                    'central'          => $data['brand_central']
                ];

                $this->ProductCategoryModel->insert_product_category($category_data);
                $message = [
                    'status' => true,
                    'data' => 'success',
                    'message' => "Save product successful"
                ];
                $this->response($message, RestController::HTTP_OK);
            }
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't save new product"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
