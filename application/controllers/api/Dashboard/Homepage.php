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
            $brand_code_data = $this->UserModel->get_brandcode_of_user($user_data->id);

            if ($brand_code_data[0]->brand_code == "ALL") {
                $success_order_data = $this->SaleModel->get_new_order_by_day($data["brand_code"], date('Y-m-d'), 1);
                $return_order_data = $this->SaleModel->get_return_order_by_day($data["brand_code"], date('Y-m-d'), 0);
            } else {
                if ($brand_code_data[0]->brand_code == $data["brand_code"]) {
                    $success_order_data = $this->SaleModel->get_new_order_by_day($data["brand_code"], date('Y-m-d'), 1);
                    $return_order_data = $this->SaleModel->get_return_order_by_day($data["brand_code"], date('Y-m-d'), 0);
                } else {
                    $success_order_data = [];
                    $return_order_data = [];
                }
            }

            $total_new_order = count($success_order_data);
            $total_return_order = count($return_order_data);
            $total_sales = 0;
            if ($success_order_data != []) {
                foreach ($success_order_data as $key => $val) {
                    $total_sales += $success_order_data[$key]->final_payment;
                }
            }
            $response_data = array('new_order' => $total_new_order, 'total_sales' => $total_sales, 'return_order' => $total_return_order);

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
