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

    public function loadproductcategory_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/product/product_category_list', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product category page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load product category page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadproductcategoryadd_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/product/product_category_add', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product category add page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load product category add page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadproductcategorydata_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->ProductCategoryModel->get_product_category();

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

    public function storenewproductcategory_post()
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
            $this->form_validation->set_rules('category_name', 'Tên loại sản phẩm', 'trim|required');


            if ($this->form_validation->run() == FALSE) {
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
                    'message' => "Save product category successful"
                ];
                $this->response($message, RestController::HTTP_OK);
            }
        } else {
            $message = [
                'status' => false,
                'message' => "Can't save new product"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
