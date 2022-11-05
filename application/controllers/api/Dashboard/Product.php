<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Product extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/ProductModel');
    }

    public function loadProductList_post()
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

            $return_data = $this->load->view('cms/dashboard/product/product_list', '', true);


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
    public function loadProductTrash_post()
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

            $return_data = $this->load->view('cms/dashboard/product/product_trash', '', true);


            // $return_data = site_url('cms/layout/main.php');
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product trash page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load trash product page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }


    public function loadProductAdd_post()
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

            $return_data = $this->load->view('cms/dashboard/product/product_add', '', true);


            // $return_data = site_url('cms/layout/main.php');
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product add page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load add product page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function loadTableData_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        // var_dump($is_valid_token);
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $return_data = $this->ProductModel->get_product();
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

    public function loadProductWareHouse_post()
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

            $return_data = $this->load->view('cms/dashboard/product/warehouse', '', true);


            // $return_data = site_url('cms/layout/main.php');
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product warehouse successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load product warehouse"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function storeNewProduct_post()
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
            $this->form_validation->set_rules('product_name', 'Tên sản phẩm', 'trim|required');
            $this->form_validation->set_rules('product_code', 'Mã sản phẩm', 'trim|required');
            $this->form_validation->set_rules('product_brand', 'Thương hiệu', 'trim|required');
            $this->form_validation->set_rules('product_ori', 'Xuất xứ', 'trim|required');
            $this->form_validation->set_rules('product_barcode', 'Barcode', 'trim|required');
            $this->form_validation->set_rules('product_quantity', 'Số lượng', 'trim|required');
            $this->form_validation->set_rules('product_capacity', 'Dung tích', 'trim|required');
            $this->form_validation->set_rules('product_unit', 'Đơn vị', 'trim|required');
            $this->form_validation->set_rules('product_cost', 'Giá nhập', 'trim|required');
            $this->form_validation->set_rules('product_wholesale', 'Giá bán sỉ', 'trim|required');
            $this->form_validation->set_rules('product_retail', 'Giá bán lẻ', 'trim|required');
            $this->form_validation->set_rules('product_description', 'Mô tả sản phẩm', 'trim|required');
            $this->form_validation->set_rules('product_ingred', 'Bảng thành phần', 'trim|required');
            $this->form_validation->set_rules('product_file', 'Ảnh sản phẩm', 'trim');


            if ($this->form_validation->run() == FALSE) {
                //Form validation error
                $message = array(
                    'status'    =>  false,
                    'error'     =>  $this->form_validation->error_array(),
                    'message'   =>  validation_errors()
                );
                $this->response($message, RestController::HTTP_NOT_FOUND);
            } else {
                $product_data = [
                    'product_code'      => $data['product_code'],
                    'barcode'           => $data['product_barcode'],
                    'title'             => $data['product_name'],
                    'brand'             => $data['product_brand'],
                    'origin'            => $data['product_ori'],
                    'price'             => $data['product_retail'],
                    'goods_cost'        => $data['product_cost'],
                    'retail_price'      => $data['product_retail'],
                    'wholesale_price'   => $data['product_wholesale'],
                    'quantity'          => $data['product_quantity'],
                    'capacity'          => $data['product_capacity'],
                    'unit'              => $data['product_unit'],
                    'ingredient'        => $data['product_ingred'],
                    'description'       => $data['product_description'],

                ];
                $config['upload_path']          = 'assets/upload_img/product/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('product_file')) {
                    $product_data['image'] = $this->upload->data('full_path');
                }
                $this->ProductModel->insert_product($product_data);
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
