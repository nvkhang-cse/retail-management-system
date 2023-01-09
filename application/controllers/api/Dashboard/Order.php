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
        $this->load->model('cms/CashBookModel');
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
            $branch_code_data = $this->UserModel->get_branchcode_of_user($user_data->id);

            if ($branch_code_data[0]->branch_code == "ALL") {
                $return_data = $this->OrderModel->get_order_by_branchcode($data["branch_code"]);
            } else {
                if ($branch_code_data[0]->branch_code == $data["branch_code"]) {
                    $return_data = $this->OrderModel->get_order_by_branchcode($data["branch_code"]);
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

    public function getorderinfobycode_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $data = $this->security->xss_clean($this->post());

            $return_data = $this->OrderModel->get_order_info_by_code($data["order_code"]);

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

    public function getorderdetaillist_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $data = $this->security->xss_clean($this->post());

            $return_data = $this->OrderModel->get_order_detail_list_by_code($data["order_code"]);

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

    public function confirmorderonline_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $data = $this->security->xss_clean($this->post());


            $order_data = $this->OrderModel->get_order_info_by_code($data["order_code"]);
            $update_data =
                array('customer_money' => $order_data[0]->final_payment, 'customer_change' => 0, 'status' => 1);
            $this->OrderModel->update_order_online_by_code($data["order_code"], $update_data);

            $receipt_data = array(
                'code'                      => strtoupper(uniqid('CBI' . '_')),
                'customer_code'             => $order_data[0]->customer,
                'value'                     => $order_data[0]->final_payment,
                'branch'                    => $order_data[0]->branch_code,
                'created_by'                => $order_data[0]->staff,
                'type'                      => 1,
            );


            $this->CashBookModel->insert_receipt($receipt_data);

            $message = [
                'status' => true,
                'message' => "Confirm order successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't confirm order"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function cancelorderonline_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {
            $data = $this->security->xss_clean($this->post());
            $order_info = $this->OrderModel->get_order_info_by_code($data["order_code"]);
            $order_detail = $this->OrderModel->get_order_detail_list_by_code($data["order_code"]);

            $this->load->model('cms/ProductModel');
            $update_product_quantity = [];
            foreach ($order_detail as $key => $val) {
                $code = $order_detail[$key]->product_code;
                $product_data = $this->ProductModel->search_product_by_code($code);
                $quantity = $order_detail[$key]->quantity;

                $item = array(
                    'product_code'          => $code,
                    'quantity_warehouse'    => $product_data[0]["quantity_warehouse"] + $quantity,
                    'quantity_sale'         => $product_data[0]["quantity_sale"] + $quantity
                );
                array_push($update_product_quantity, $item);
            }
            $this->ProductModel->update_product_quantity($update_product_quantity);

            if ($order_info[0]->customer != 0) {
                $this->load->model('cms/CustomerModel');
                $customer_data = $this->CustomerModel->search_customer_by_code($order_info[0]->customer);
                $spend = $customer_data[0]->spend - $order_info[0]->final_payment;

                $this->CustomerModel->update_customer_spend($order_info[0]->customer, $spend);
            }

            $update_data = array(
                'status' => 3
            );
            $this->OrderModel->update_order_online_by_code($data["order_code"], $update_data);

            $message = [
                'status' => true,
                'message' => "Cancel order successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't cancel order"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
