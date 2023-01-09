<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Sale extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/SaleModel');
        $this->load->model('cms/UserModel');
    }

    public function loadsalepage_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/sale', '', true);

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

    public function addToCart_post()
    {
        $this->load->library('Authorization_Token');
        $this->load->library('cart');
        $this->load->model('cms/ProductModel');

        /**
         * User Token Validation
         */
        $data = $this->security->xss_clean($this->post());

        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $product = $this->ProductModel->search_product_by_code($data['product_code']);
            $data = array(
                'id'            => $product[0]['id'],
                'qty'           => 1,
                'price'         => $product[0]['retail_price'],
                'name'          => $product[0]['title'],
                'image'         => $product[0]['image'],
                'capacity'      => $product[0]['capacity'],
                'product_code'  => $product[0]['product_code'],
                'percentage'    => $product[0]['percentage'],
                'unit'          => $product[0]['unit'],
                'currency'      => $product[0]['currency'],
                'barcode'       => $product[0]['barcode'],
                'product_name'  => $product[0]['title']
            );
            $this->cart->insert($data);

            $cart = array();
            foreach ($this->cart->contents() as $items) {
                $cart[] = $items;
            }

            $message = [
                'status' => true,
                'data' => $cart,
                'message' => "Add product to cart successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't add product to cart"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function removeCartItem_post()
    {
        $this->load->library('Authorization_Token');
        $this->load->library('cart');
        /**
         * User Token Validation
         */
        $data = $this->security->xss_clean($this->post());

        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $this->cart->remove($data['rowid']);
            $message = [
                'status' => true,
                'message' => "Delete product from cart successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't delete product from cart"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function removeAllItem_post()
    {
        $this->load->library('Authorization_Token');
        $this->load->library('cart');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $this->cart->destroy();
            $message = [
                'status' => true,
                'message' => "Delete products from cart successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't delete products from cart"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function updateItemQty_post()
    {
        $this->load->library('Authorization_Token');
        $this->load->library('cart');
        /**
         * User Token Validation
         */
        $data = $this->security->xss_clean($this->post());

        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            // Get cart item info
            $rowid = $data['rowid'];
            $qty = $data['qty'];

            // Update item in the cart
            if (!empty($rowid) && !empty($qty)) {
                $update_data = array(
                    'rowid' => $rowid,
                    'qty'   => $qty
                );
                $this->cart->update($update_data);
            }
            // Return response
            $message = [
                'status' => true,
                'message' => "Update products quantity successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't update products quantity"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function getCartItems_post()
    {
        $this->load->library('Authorization_Token');
        $this->load->library('cart');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $cart = array();
            foreach ($this->cart->contents() as $items) {
                $cart[] = $items;
            }
            // Return response
            $message = [
                'status' => true,
                'data' => $cart,
                'message' => "Get cart items successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't get cart items "
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }


    public function createOrder_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */

        $data = $this->security->xss_clean($this->post());

        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $user_data = $this->authorization_token->userData();
            $order_info = $data['order_info'];
            $order_detail = $data['order_detail'];

            $ord_code = strtoupper(uniqid('ORD' . $user_data->id . '_'));
            $order_info['order_code'] = $ord_code;
            $order_info['staff'] = $user_data->id;
            $order_info['status'] = 1;

            foreach ($order_detail as $key => $val) {
                $order_detail[$key]['order_code'] = $ord_code;
            }

            $this->load->model('cms/ProductModel');
            $update_product_quantity = [];
            foreach ($order_detail as $key => $val) {
                $code = $order_detail[$key]['product_code'];
                $product_data = $this->ProductModel->search_product_by_code($code);
                $quantity = $order_detail[$key]['quantity'];
                if ($product_data[0]["quantity_sale"] - $quantity >= 0) {
                    $item = array(
                        'product_code'          => $code,
                        'quantity_warehouse'    => $product_data[0]["quantity_warehouse"] - $quantity,
                        'quantity_sale'         => $product_data[0]["quantity_sale"] - $quantity
                    );
                    array_push($update_product_quantity, $item);
                } else {
                    $message = [
                        'status' => false,
                        'message' => "Số lượng sản phẩm " . ($key + 1) . " không đủ!"
                    ];
                    $this->response($message, RestController::HTTP_INTERNAL_ERROR);
                }
            }
            $this->ProductModel->update_product_quantity($update_product_quantity);

            if ($order_info['customer'] != 0) {
                $this->load->model('cms/CustomerModel');
                $customer_data = $this->CustomerModel->search_customer_by_code($order_info['customer']);
                $spend = $customer_data[0]->spend + $order_info['final_payment'];

                $this->CustomerModel->update_customer_spend($order_info['customer'], $spend);
            }

            $this->SaleModel->insert_order($order_info, $order_detail);

            $receipt_data = array(
                'code'                      => strtoupper(uniqid('CBI' . '_')),
                'customer_code'             => $order_info['customer'],
                'value'                     => $order_info['final_payment'],
                'branch'                    => $order_info['branch_code'],
                'created_by'                => $user_data->full_name,
                'type'                      => 1,
            );

            $this->load->model('cms/CashBookModel');
            $this->CashBookModel->insert_receipt($receipt_data);
            $message = [
                'status'  => true,
                'message' => "Tạo đơn thành công!"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Yêu cầu đăng nhập!"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function createOrderOnline_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */

        $data = $this->security->xss_clean($this->post());

        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $user_data = $this->authorization_token->userData();
            $order_info = $data['order_info'];
            $order_detail = $data['order_detail'];

            $ord_code = strtoupper(uniqid('ORD' . $user_data->id . '_'));
            $order_info['order_code'] = $ord_code;
            $order_info['staff'] = $user_data->id;
            $order_info['status'] = 2;

            foreach ($order_detail as $key => $val) {
                $order_detail[$key]['order_code'] = $ord_code;
            }

            $this->load->model('cms/ProductModel');
            $update_product_quantity = [];
            foreach ($order_detail as $key => $val) {
                $code = $order_detail[$key]['product_code'];
                $product_data = $this->ProductModel->search_product_by_code($code);
                $quantity = $order_detail[$key]['quantity'];
                if ($product_data[0]["quantity_sale"] - $quantity >= 0) {
                    $item = array(
                        'product_code'          => $code,
                        'quantity_warehouse'    => $product_data[0]["quantity_warehouse"] - $quantity,
                        'quantity_sale'         => $product_data[0]["quantity_sale"] - $quantity
                    );
                    array_push($update_product_quantity, $item);
                } else {
                    $message = [
                        'status' => false,
                        'message' => "Số lượng sản phẩm " . ($key + 1) . " không đủ!"
                    ];
                    $this->response($message, RestController::HTTP_INTERNAL_ERROR);
                }
            }
            $this->ProductModel->update_product_quantity($update_product_quantity);

            if ($order_info['customer'] != 0) {
                $this->load->model('cms/CustomerModel');
                $customer_data = $this->CustomerModel->search_customer_by_code($order_info['customer']);
                $spend = $customer_data[0]->spend + $order_info['final_payment'];

                $this->CustomerModel->update_customer_spend($order_info['customer'], $spend);
            }

            $this->SaleModel->insert_order($order_info, $order_detail);
            $message = [
                'status'  => true,
                'message' => "Tạo đơn thành công!"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Yêu cầu đăng nhập!"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
