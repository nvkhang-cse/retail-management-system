<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Homepage extends RestController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function loadhomepage_post()
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
                $return_data = $this->load->view('cms/dashboard/homepage', '', true);
            } else {
                $return_data = [];
            }

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load dashboard successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => FALSE,
                'message' => "Can't load dashboard"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadsalesreportinday_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $data = $this->security->xss_clean($this->post());
            $this->load->model('cms/UserModel');
            $this->load->model('cms/SaleModel');

            $user_data = $this->authorization_token->userData();
            $branch_code_data = $this->UserModel->get_branchcode_of_user($user_data->id);

            if ($branch_code_data[0]->branch_code == "ALL") {
                $success_order_data = $this->SaleModel->get_new_order_by_day($data["branch_code"], date('Y-m-d'), [1]);
                $online_order_data = $this->SaleModel->get_new_order_by_day($data["branch_code"], date('Y-m-d'), [2]);
                $cancel_order_data = $this->SaleModel->get_new_order_by_day($data["branch_code"], date('Y-m-d'), [3]);
            } else {
                if ($branch_code_data[0]->branch_code == $data["branch_code"]) {
                    $success_order_data = $this->SaleModel->get_new_order_by_day($data["branch_code"], date('Y-m-d'), [1]);
                    $online_order_data = $this->SaleModel->get_new_order_by_day($data["branch_code"], date('Y-m-d'), [2]);
                    $cancel_order_data = $this->SaleModel->get_new_order_by_day($data["branch_code"], date('Y-m-d'), [3]);
                } else {
                    $success_order_data = [];
                    $online_order_data = [];
                    $cancel_order_data = [];
                }
            }

            $total_success_order = count($success_order_data);
            $total_online_order = count($online_order_data);
            $total_cancel_order = count($cancel_order_data);
            $total_sales = 0;
            if ($success_order_data != []) {
                foreach ($success_order_data as $key => $val) {
                    $total_sales += $success_order_data[$key]->final_payment;
                }
            }
            if ($online_order_data != []) {
                foreach ($online_order_data as $key => $val) {
                    $total_sales += $online_order_data[$key]->final_payment;
                }
            }
            $response_data = array('total_sales' => $total_sales, 'success_order' => $total_success_order, 'cancel_order' => $total_cancel_order, 'online_order' => $total_online_order);

            $message = [
                'status' => true,
                'data' => $response_data,
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

    public function loadwarehousereport_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $data = $this->security->xss_clean($this->post());
            $this->load->model('cms/UserModel');
            $this->load->model('cms/ProductModel');

            $user_data = $this->authorization_token->userData();
            $branch_code_data = $this->UserModel->get_branchcode_of_user($user_data->id);

            if ($branch_code_data[0]->branch_code == "ALL") {
                $product_data = $this->ProductModel->get_product_by_branchcode($data["branch_code"], '0', '1');
            } else {
                if ($branch_code_data[0]->branch_code == $data["branch_code"]) {
                    $product_data = $this->ProductModel->get_product_by_branchcode($data["branch_code"], '0', '1');
                } else {
                    $product_data = [];
                }
            }

            $total_product = 0;
            $total_value = 0;
            if ($product_data != []) {
                foreach ($product_data as $key => $val) {
                    $total_product += $product_data[$key]->quantity_sale;
                    $total_value += $product_data[$key]->quantity_sale * $product_data[$key]->retail_price;
                }
            }
            $response_data = array('total_product' => $total_product, 'total_value' => $total_value);

            $message = [
                'status' => true,
                'data' => $response_data,
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
}
