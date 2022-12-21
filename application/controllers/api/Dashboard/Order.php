<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Order extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/OrderModel');
    }

    public function loadorderlist_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/order/order_list', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load order list successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load order list"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadorderdata_post()
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
            $brand_code_data = $this->UserModel->get_brandcode_of_user($user_data->id);

            if ($brand_code_data[0]->brand_code == "ALL") {
                $return_data = $this->OrderModel->get_order_by_brandcode($data["brand_code"]);
            } else {
                if ($brand_code_data[0]->brand_code == $data["brand_code"]) {
                    $return_data = $this->OrderModel->get_order_by_brandcode($data["brand_code"]);
                } else {
                    $return_data = [];
                }
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
}
