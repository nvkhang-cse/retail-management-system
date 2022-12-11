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

    public function loadproductlist_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/product/product_list', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load product page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function loadproducttrash_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/product/product_trash', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product trash page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load trash product page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadproducttrashdata_post()
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

            $trash = "1";
            if ($brand_code_data[0]->brand_code == "ALL") {
                $return_data = $this->ProductModel->get_trash_product($trash);
            } else {
                $return_data = $this->ProductModel->get_trash_product_by_user($brand_code_data[0]->brand_code, $trash);
            }
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product data successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load product data"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadproductadd_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/product/product_add', '', true);
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product add page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load product add page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadproductdata_post()
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

            $trash = "0";
            $published =  "1";
            if ($brand_code_data[0]->brand_code == "ALL") {
                $return_data = $this->ProductModel->get_product($trash, $published);
            } else {
                $return_data = $this->ProductModel->get_product_by_user($brand_code_data[0]->brand_code, $trash, $published);
            }
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product data successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load product data"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadproductwarehouse_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/product/product_warehouse', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product warehouse successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load product warehouse"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadproductwarehousedata_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $data = $this->security->xss_clean($this->post());
            $trash = "0";

            $return_data = $this->ProductModel->get_warehouse_product_by_user($data['warehouse_code'], $trash);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product data successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load product data"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function storenewproduct_post()
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
            $this->form_validation->set_rules('product_name', 'Tên sản phẩm', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $message = array(
                    'status'    =>  false,
                    'error'     =>  $this->form_validation->error_array(),
                    'message'   =>  validation_errors()
                );
                $this->response($message, RestController::HTTP_NOT_FOUND);
            } else {
                $product_data = [
                    'title'                 => $data['product_name'],
                    'product_code'          => $data['product_code'],
                    'brand'                 => $data['product_brand'],
                    'origin'                => $data['product_origin'],
                    'barcode'               => $data['product_barcode'],
                    'quantity_warehouse'    => $data['product_quantity_warehouse'],
                    'quantity_sale'         => $data['product_quantity_sale'],
                    'capacity'              => $data['product_capacity'],
                    'unit'                  => $data['product_unit'],
                    'expired_date'          => $data['product_expired_date'],
                    'published'             => $data['product_published'],
                    'goods_cost'            => $data['product_cost'],
                    'retail_price'          => $data['product_retail'],
                    'wholesale_price'       => $data['product_wholesale'],
                    'description'           => $data['product_description'],
                    'ingredient'            => $data['product_ingred'],
                    'category'              => $data['product_category'],
                    'warehouse'             => $data['product_warehouse']
                ];
                $config['upload_path']          = 'assets/upload_img/product/';
                $config['allowed_types']        = 'gif|jpg|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('product_file')) {
                    $product_data['image'] = $this->upload->data('file_name');
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
            $message = [
                'status' => false,
                'message' => "Can't save new product"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
