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

    public function loadproductdata_post()
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
            $branch_code_data = $this->UserModel->get_branchcode_of_user($user_data->id);

            $trash = "0";
            $published =  "1";
            if ($branch_code_data[0]->branch_code == "ALL") {
                $return_data = $this->ProductModel->get_product_by_branchcode($data["branch_code"], $trash, $published);
            } else {
                if ($branch_code_data[0]->branch_code == $data["branch_code"]) {
                    $return_data = $this->ProductModel->get_product_by_branchcode($data["branch_code"], $trash, $published);
                } else {
                    $return_data = [];
                }
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
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1" || $permission_data[0]->permission == "2") {
                $return_data = $this->load->view('cms/dashboard/product/product_warehouse', '', true);
            } else {
                $return_data = [];
            }

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
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $branch_code_data = $this->UserModel->get_branchcode_of_user($user_data->id);
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1" || $permission_data[0]->permission == "2") {
                $trash = "0";
                if ($branch_code_data[0]->branch_code == "ALL") {
                    $return_data = $this->ProductModel->get_warehouse_product_by_branchcode($data["branch_code"], $trash);
                } else {
                    if ($branch_code_data[0]->branch_code == $data["branch_code"]) {
                        $return_data = $this->ProductModel->get_warehouse_product_by_branchcode($data["branch_code"], $trash);
                    } else {
                        $return_data = [];
                    }
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
                    'message' => "Not allowed!"
                ];
                $this->response($message, RestController::HTTP_METHOD_NOT_ALLOWED);
            }
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load product data"
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
            $data = $this->security->xss_clean($this->post());
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $branch_code_data = $this->UserModel->get_branchcode_of_user($user_data->id);

            $trash = "1";
            if ($branch_code_data[0]->branch_code == "ALL") {
                $return_data = $this->ProductModel->get_trash_product_by_branchcode($data["branch_code"], $trash);
            } else {
                if ($branch_code_data[0]->branch_code == $data["branch_code"]) {
                    $return_data = $this->ProductModel->get_trash_product_by_branchcode($data["branch_code"], $trash);
                } else {
                    $return_data = [];
                }
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
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1" || $permission_data[0]->permission == "2") {
                $return_data = $this->load->view('cms/dashboard/product/product_add', '', true);
            } else {
                $return_data = [];
            }

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

    public function storenewproduct_post()
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
            $branch_code_data = $this->UserModel->get_branchcode_of_user($user_data->id);
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1" || $permission_data[0]->permission == "2") {

                // Form Validation
                $this->form_validation->set_data($data);
                $this->form_validation->set_error_delimiters('', '');
                $this->form_validation->set_rules('product_name', 'Tên sản phẩm', 'trim|required|max_length[250]');
                $this->form_validation->set_rules('product_code', 'Mã sản phẩm', 'trim|required|max_length[20]|alpha_numeric');
                $this->form_validation->set_rules('product_brand', 'Thương hiệu', 'trim|max_length[30]');
                $this->form_validation->set_rules('product_origin', 'Xuất sứ', 'trim|max_length[30]');
                $this->form_validation->set_rules('product_barcode', 'Barcode', 'trim|max_length[30]|alpha_numeric');
                $this->form_validation->set_rules('product_quantity_warehouse', 'Số lượng trong kho', 'trim|required|integer|greater_than_equal_to[0]');
                $this->form_validation->set_rules('product_quantity_sale', 'Số lượng được bán', 'trim|required|integer|greater_than_equal_to[0]');
                $this->form_validation->set_rules('product_capacity', 'Dung tích', 'trim|integer|greater_than_equal_to[0]');
                $this->form_validation->set_rules('product_unit', 'Đơn vị', 'trim|max_length[10]');
                $this->form_validation->set_rules('product_expired_date', 'Ngày hết hạn', 'trim|max_length[10]|alpha_dash|regex_match[/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/]');
                $this->form_validation->set_rules('product_published', 'Trạng thái', 'trim|required|in_list[0,1]');
                $this->form_validation->set_rules('product_cost', 'Giá nhập', 'trim|required|integer|greater_than_equal_to[0]');
                $this->form_validation->set_rules('product_retail', 'Giá bán lẻ', 'trim|required|integer|greater_than_equal_to[0]');
                $this->form_validation->set_rules('product_wholesale', 'Giá bán buôn', 'trim|required|integer|greater_than_equal_to[0]');
                $this->form_validation->set_rules('product_description', 'Mô tả sản phẩm', 'trim');
                $this->form_validation->set_rules('product_ingred', 'Thành phần', 'trim');
                $this->form_validation->set_rules('product_category', 'Loại sản phẩm', 'trim|max_length[10]|alpha_numeric');
                $this->form_validation->set_rules('product_warehouse', 'Chi nhánh', 'trim|required|max_length[5]|alpha_numeric');

                if ($this->form_validation->run() == FALSE) {
                    $message = array(
                        'status'    =>  false,
                        'error'     =>  $this->form_validation->error_array(),
                        'message'   =>  validation_errors()
                    );
                    $this->response($message, RestController::HTTP_NOT_FOUND);
                } else {
                    if ($branch_code_data[0]->branch_code == "ALL" || $branch_code_data[0]->branch_code == $data['product_warehouse']) {
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
                            'warehouse'             => $data['product_warehouse'],
                            'created_by'            => $user_data->id
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
                'message' => "Can't save new product"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function searchproduct_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $data = $this->security->xss_clean($this->post());

        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $result = $this->ProductModel->search_product($data['query']);
            $message = [
                'status' => true,
                'data' => $result,
                'message' => ""
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => ""
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function searchproductbycode_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $data = $this->security->xss_clean($this->post());

        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $result = $this->ProductModel->search_product_by_code($data['product_code']);
            $message = [
                'status' => true,
                'data' => $result,
                'message' => "Search product by code successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't search product by code"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function updateproductinfobycode_post()
    {
        $this->load->library('Authorization_Token');
        $data = $this->security->xss_clean($this->post());
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $update_info = array(
                'title'                 => $data['product-new-name'],
                'brand'                 => $data['product-new-brand'],
                'goods_cost'            => $data['product-new-goodscost'],
                'retail_price'          => $data['product-new-retailprice'],
                'quantity_warehouse'    => $data['product-new-qty'],
                'capacity'              => $data['product-new-capacity'],
                'unit'                  => $data['product-new-unit'],
                'published'             => $data['product-new-status'],
                'ingredient'            => $data['product-new-ingred'],
                'description'           => $data['product-new-description'],
            );

            $this->ProductModel->update_productInfobyCode($data['product-code'], $update_info);

            $message = [
                'status' => true,
                'data' => $update_info,
                'message' => "Update product data successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't update product data"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function deleteproducttemp_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $data = $this->security->xss_clean($this->post());

        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $result = $this->ProductModel->delete_product_temp($data['product_code']);
            $message = [
                'status' => true,
                'data' => $result,
                'message' => "Search product by code successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't search product by code"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function restoreproductitem_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $data = $this->security->xss_clean($this->post());

        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $result = $this->ProductModel->restore_product_item($data['product_code']);
            $message = [
                'status' => true,
                'data' => $result,
                'message' => "Search product by code successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't search product by code"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
