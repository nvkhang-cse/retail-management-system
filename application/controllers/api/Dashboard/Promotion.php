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
                $this->form_validation->set_rules('promotion_type', 'Loại khuyến mãi', 'trim|required|in_list[1]');
                $this->form_validation->set_rules('promotion_start_date', 'Ngày bắt đầu', 'trim|required|max_length[10]|alpha_dash|regex_match[/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/]');
                $this->form_validation->set_rules('promotion_end_date', 'Ngày kết thúc', 'trim|required|max_length[10]|alpha_dash|regex_match[/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/]');
                $this->form_validation->set_rules('promotion_branch', 'Chi nhánh áp dụng', 'trim|required|max_length[30]|alpha_dash');
                $this->form_validation->set_rules('promotion_total_bill_from', 'Hóa đơn từ', 'integer|greater_than_equal_to[0]');
                $this->form_validation->set_rules('promotion_total_bill_to', 'Hóa đơn đến', 'integer|greater_than_equal_to[0]|greater_than[' . $this->input->post('promotion_total_bill_from') . ']');
                $this->form_validation->set_rules('promotion_discount_type', 'Hình thức giảm', 'trim|in_list[1,2]');
                $this->form_validation->set_rules('promotion_discount_value', 'Giảm giá hóa đơn', 'trim|integer|greater_than_equal_to[0]');

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
                            'code'              => strtoupper(uniqid('PR' . '_')),
                            'type'              => $data['promotion_type'],
                            'start_date'        => $data['promotion_start_date'],
                            'end_date'          => $data['promotion_end_date'],
                            'branch'            => $data['promotion_branch'],
                            'bill_from'         => $data['promotion_total_bill_from'],
                            'bill_to'           => $data['promotion_total_bill_to'],
                            'bill_type'         => $data['promotion_discount_type'],
                            'bill_value'        => $data['promotion_discount_value'],
                            'created_by'        => $user_data->id,
                        ];


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

    public function getpromotioninfobycode_post()
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
                    $return_data = $this->PromotionModel->get_promotion_by_promotioncode($data["branch_code"], $data["promotion_code"]);
                } else {
                    if ($branch_code_data[0]->branch_code == $data["branch_code"]) {
                        $return_data = $this->PromotionModel->get_promotion_by_promotioncode($data["branch_code"], $data["promotion_code"]);
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

    public function updatepromotioninfobycode_post()
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
                $this->form_validation->set_rules('promotion_type', 'Loại khuyến mãi', 'trim|required|in_list[1]');
                $this->form_validation->set_rules('promotion_start_date', 'Ngày bắt đầu', 'trim|required|max_length[10]|alpha_dash|regex_match[/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/]');
                $this->form_validation->set_rules('promotion_end_date', 'Ngày kết thúc', 'trim|required|max_length[10]|alpha_dash|regex_match[/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/]');
                $this->form_validation->set_rules('promotion_branch', 'Chi nhánh áp dụng', 'trim|required|max_length[30]|alpha_dash');
                $this->form_validation->set_rules('promotion_total_bill_from', 'Hóa đơn từ', 'integer|greater_than_equal_to[0]');
                $this->form_validation->set_rules('promotion_total_bill_to', 'Hóa đơn đến', 'integer|greater_than_equal_to[0]|greater_than[' . $this->input->post('promotion_total_bill_from') . ']');
                $this->form_validation->set_rules('promotion_discount_type', 'Hình thức giảm', 'trim|in_list[1,2]');
                $this->form_validation->set_rules('promotion_discount_value', 'Giảm giá hóa đơn', 'trim|integer|greater_than_equal_to[0]');

                if ($this->form_validation->run() == FALSE) {
                    $message = array(
                        'status'    =>  false,
                        'error'     =>  $this->form_validation->error_array(),
                        'message'   =>  validation_errors()
                    );
                    $this->response($message, RestController::HTTP_NOT_FOUND);
                } else {
                    if ($branch_code_data[0]->branch_code == "ALL" || $branch_code_data[0]->branch_code == $data['promotion_branch']) {
                        $update_info = array(
                            'name'              => $data['promotion_name'],
                            'type'              => $data['promotion_type'],
                            'start_date'        => $data['promotion_start_date'],
                            'end_date'          => $data['promotion_end_date'],
                            'branch'            => $data['promotion_branch'],
                            'bill_from'         => $data['promotion_total_bill_from'],
                            'bill_to'           => $data['promotion_total_bill_to'],
                            'bill_type'         => $data['promotion_discount_type'],
                            'bill_value'        => $data['promotion_discount_value'],
                        );

                        $this->PromotionModel->update_promotion_info($data['promotion_code'], $update_info);

                        $message = [
                            'status' => true,
                            'message' => "Update successful"
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
                'message' => "Can't update promotion"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function deletepromotion_post()
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
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1" || $permission_data[0]->permission == "2") {
                $this->PromotionModel->delete_promotion_by_code($data["promotion_code"]);

                $message = [
                    'status' => true,
                    'data' => 'success',
                    'message' => "Delete promotion successful"
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
                'message' => "Can't delete promotion"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function searchpromotion_post()
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
                $return_data = $this->PromotionModel->get_promotion_by_date($data["branch_code"], $data["date_to_search"]);
            } else {
                if ($branch_code_data[0]->branch_code == $data["branch_code"]) {
                    $return_data = $this->PromotionModel->get_promotion_by_date($data["branch_code"], $data["date_to_search"]);
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
