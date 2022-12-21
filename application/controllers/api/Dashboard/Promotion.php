<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Promotion extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/PromotionModel');
    }

    public function loadpromotionlist_post()
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

                $return_data = $this->load->view('cms/dashboard/promotion/promotion_list', '', true);

                $message = [
                    'status' => true,
                    'data' => $return_data,
                    'message' => "Load promotion list page successful"
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
                'message' => "Can't load promotion list page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadpromotionadd_post()
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

                $return_data = $this->load->view('cms/dashboard/promotion/promotion_add', '', true);

                $message = [
                    'status' => true,
                    'data' => $return_data,
                    'message' => "Load promotion add page successful"
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
                'message' => "Can't load promotion add page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadpromotiondata_post()
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

                if ($branch_code_data[0]->branch_code == "ALL") {
                    $return_data = $this->PromotionModel->get_promotion_by_branchcode($data["branch_code"]);
                } else {
                    if ($branch_code_data[0]->branch_code == $data["branch_code"]) {
                        $return_data = $this->PromotionModel->get_promotion_by_branchcode($data["branch_code"]);
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
                    'message' => "Not allowed!"
                ];
                $this->response($message, RestController::HTTP_METHOD_NOT_ALLOWED);
            }
        } else {
            $message = [
                'status' => false,
                'message' => "Can't load data"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function storenewpromotion_post()
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
                $this->form_validation->set_rules('promotion_name', 'Tên khuyến mãi', 'trim|required|max_length[250]');
                $this->form_validation->set_rules('promotion_code', 'Mã khuyến mãi', 'trim|required|max_length[10]|alpha_numeric');
                $this->form_validation->set_rules('promotion_type', 'Loại khuyến mãi', 'trim|required|in_list[1,2]');
                $this->form_validation->set_rules('promotion_start_date', 'Ngày bắt đầu', 'trim|required|max_length[10]|alpha_dash|regex_match[/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/]');
                $this->form_validation->set_rules('promotion_end_date', 'Ngày kết thúc', 'trim|required|max_length[10]|alpha_dash|regex_match[/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/]');
                $this->form_validation->set_rules('promotion_branch', 'Chi nhánh áp dụng', 'trim|required|max_length[5]|alpha_numeric');

                $this->form_validation->set_rules('promotion_total_bill_from', 'Hóa đơn từ', 'trim|integer|greater_than_equal_to[0]');
                $this->form_validation->set_rules('promotion_total_bill_to', 'Hóa đơn đến', 'trim|integer|greater_than_equal_to[0]|greater_than_equal_to[promotion_total_bill_from]');
                $this->form_validation->set_rules('promotion_discount_type', 'Hình thức giảm', 'trim|in_list[1,2]');
                $this->form_validation->set_rules('promotion_discount_value', 'Giảm giá hóa đơn', 'trim|integer|greater_than_equal_to[0]');

                $this->form_validation->set_rules('promotion_product_code', 'Mã sản phẩm giảm', 'trim|max_length[20]|alpha_numeric');
                $this->form_validation->set_rules('promotion_product_discount', 'Giảm giá sản phẩm', 'trim|integer|greater_than_equal_to[0]|less_than_equal_to[1000]');



                if ($this->form_validation->run() == FALSE) {
                    $message = array(
                        'status'    =>  false,
                        'error'     =>  $this->form_validation->error_array(),
                        'message'   =>  validation_errors()
                    );
                    $this->response($message, RestController::HTTP_NOT_FOUND);
                } else {
                    if ($branch_code_data[0]->branch_code == "ALL" || $branch_code_data[0]->branch_code == $data['promotion_branch']) {
                        $promotion_data = [
                            'name'              => $data['promotion_name'],
                            'code'              => $data['promotion_code'],
                            'type'              => $data['promotion_type'],
                            'start_date'        => $data['promotion_start_date'],
                            'end_date'          => $data['promotion_end_date'],
                            'branch'             => $data['promotion_branch'],
                            'created_by'        => $user_data->id
                        ];
                        if ($data['promotion_type'] == 1) {
                            $promotion_data['bill_from']    = $data['promotion_total_bill_from'];
                            $promotion_data['bill_to']      = $data['promotion_total_bill_to'];
                            $promotion_data['bill_type']    = $data['promotion_discount_type'];
                            $promotion_data['bill_value']   = $data['promotion_discount_value'];
                        } else if ($data['promotion_type'] == 2) {
                            $promotion_data['product_code']         = $data['promotion_product_code'];
                            $promotion_data['product_discount']    = $data['promotion_product_discount'];
                        }
                        $this->PromotionModel->insert_promotion($promotion_data);
                        $message = [
                            'status' => true,
                            'data' => 'success',
                            'message' => "Save promotion successful"
                        ];
                        $this->response($message, RestController::HTTP_OK);
                    } else {
                        $message = [
                            'status' => false,
                            'message' => "Not allowed!"
                        ];
                        $this->response($message, RestController::HTTP_METHOD_NOT_ALLOWED);
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
                'message' => "Can't save new promotion"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
