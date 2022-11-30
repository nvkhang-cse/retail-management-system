<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class ProductCategory extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/ProductCategoryModel');
    }

    public function loadProductCategory_post()
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

            $return_data = $this->load->view('cms/dashboard/product/product_category_list', '', true);


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

    public function loadProductCategoryAdd_post()
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

            $return_data = $this->load->view('cms/dashboard/product/product_category_add', '', true);


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

    public function loadProductCategoryData_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        // var_dump($is_valid_token);
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $return_data = $this->ProductCategoryModel->get_product_category();
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

    public function storeNewProductCategory_post()
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
            $this->form_validation->set_rules('category_name', 'Tên loại sản phẩm', 'trim|required');
            $this->form_validation->set_rules('category_code', 'Mã loại', 'trim|required');


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
                    'title'             => $data['category_name'],
                    'code'             => $data['category_code'],
                    'description'      => $data['category_description'],
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
