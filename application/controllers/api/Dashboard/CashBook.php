<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class CashBook extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/CashBookModel');
    }

    public function loadcashbook_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/cashbook/cashbook_list', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load cashbook list page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load cashbook list page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadreceiptincomeadd_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/cashbook/receiptincome_add', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load add page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load add page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadreceiptoutcomeadd_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

            $return_data = $this->load->view('cms/dashboard/cashbook/receiptoutcome_add', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load add page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load add page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadcashbookdata_post()
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

            if ($brand_code_data[0]->brand_code == "ALL") {
                $return_data = $this->CashBookModel->get_cashbook();
            } else {
                $return_data = $this->CashBookModel->get_cashbook_by_user($brand_code_data[0]->brand_code);
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

    // public function storenewpromotion_post()
    // {
    //     $this->load->library('Authorization_Token');
    //     /**
    //      * User Token Validation
    //      */
    //     $is_valid_token = $this->authorization_token->validateToken();
    //     if (!empty($is_valid_token) and $is_valid_token['status'] === TRUE) {

    //         $data = $this->security->xss_clean($this->post());

    //         // Form Validation
    //         $this->form_validation->set_data($data);
    //         $this->form_validation->set_rules('promotion_name', 'Tên khuyến mãi', 'trim|required');


    //         if ($this->form_validation->run() == FALSE) {
    //             $message = array(
    //                 'status'    =>  false,
    //                 'error'     =>  $this->form_validation->error_array(),
    //                 'message'   =>  validation_errors()
    //             );
    //             $this->response($message, RestController::HTTP_NOT_FOUND);
    //         } else {
    //             $promotion_data = [
    //                 'name'              => $data['promotion_name'],
    //                 'code'              => $data['promotion_code'],
    //                 'type'              => $data['promotion_type'],
    //                 'start_date'        => $data['promotion_start_date'],
    //                 'end_date'          => $data['promotion_end_date'],
    //                 'brand'             => $data['promotion_brand']
    //             ];
    //             if ($data['promotion_type'] == 1) {
    //                 $promotion_data['bill_from']    = $data['promotion_total_bill_from'];
    //                 $promotion_data['bill_to']      = $data['promotion_total_bill_to'];
    //                 $promotion_data['bill_type']    = $data['promotion_discount_type'];
    //                 $promotion_data['bill_value']   = $data['promotion_discount_value'];
    //             } else if ($data['promotion_type'] == 2) {
    //                 $promotion_data['product_code']         = $data['promotion_product_code'];
    //                 $promotion_data['product_discount']    = $data['promotion_product_discount'];
    //             }
    //             $this->PromotionModel->insert_promotion($promotion_data);
    //             $message = [
    //                 'status' => true,
    //                 'data' => 'success',
    //                 'message' => "Save promotion successful"
    //             ];
    //             $this->response($message, RestController::HTTP_OK);
    //         }
    //     } else {
    //         $message = [
    //             'status' => false,
    //             'message' => "Can't save new promotion"
    //         ];
    //         $this->response($message, RestController::HTTP_NOT_FOUND);
    //     }
    // }
}
