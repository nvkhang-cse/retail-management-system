<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Cashbook extends RestController
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
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1" || $permission_data[0]->permission == "2") {

                $return_data = $this->load->view('cms/dashboard/cashbook/cashbook_list', '', true);
            } else {
                $return_data = [];
            }

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
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1" || $permission_data[0]->permission == "2") {
                $return_data = $this->load->view('cms/dashboard/cashbook/receiptincome_add', '', true);
            } else {
                $return_data = [];
            }

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
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1" || $permission_data[0]->permission == "2") {

                $return_data = $this->load->view('cms/dashboard/cashbook/receiptoutcome_add', '', true);
            } else {
                $return_data = [];
            }

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
            $data = $this->security->xss_clean($this->post());
            $this->load->model('cms/UserModel');

            $user_data = $this->authorization_token->userData();
            $branch_code_data = $this->UserModel->get_branchcode_of_user($user_data->id);
            $permission_data = $this->UserModel->get_permission_of_user($user_data->id);

            if ($permission_data[0]->permission == "1" || $permission_data[0]->permission == "2") {

                if ($branch_code_data[0]->branch_code == "ALL") {
                    $return_data = $this->CashBookModel->get_cashbook_by_branchcode($data["branch_code"]);
                } else {
                    if ($branch_code_data[0]->branch_code == $data["branch_code"]) {
                        $return_data = $this->CashBookModel->get_cashbook_by_branchcode($data["branch_code"]);
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

    public function storenewreceiptincome_post()
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
                $this->form_validation->set_rules('receipt_customer_code', 'Mã khách hàng', 'trim|required|max_length[30]|alpha_dash');
                $this->form_validation->set_rules('receipt_value', 'Giá trị ghi nhận', 'trim|required|integer|greater_than_equal_to[0]');
                $this->form_validation->set_rules('receipt_branch', 'Mã chi nhánh', 'trim|required|max_length[30]|alpha_dash');
                if ($this->form_validation->run() == FALSE) {
                    $message = array(
                        'status'    =>  false,
                        'error'     =>  $this->form_validation->error_array(),
                        'message'   =>  validation_errors()
                    );
                    $this->response($message, RestController::HTTP_NOT_FOUND);
                } else {
                    if ($branch_code_data[0]->branch_code == "ALL" || $branch_code_data[0]->branch_code == $data['receipt_branch']) {
                        $receipt_data = [
                            'code'                      => strtoupper(uniqid('CBI' . '_')),
                            'customer_code'             => $data['receipt_customer_code'],
                            'value'                     => $data['receipt_value'],
                            'branch'                    => $data['receipt_branch'],
                            'created_by'                => $user_data->full_name,
                            'type'                      => 1
                        ];
                        $this->CashBookModel->insert_receipt($receipt_data);
                        $message = [
                            'status' => true,
                            'data' => 'success',
                            'message' => "Save customer group successful"
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
                'message' => "Can't save new customer group"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function storenewreceiptoutcome_post()
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
                $this->form_validation->set_rules('receipt_customer_code', 'Mã khách hàng', 'trim|required|max_length[30]|alpha_dash');
                $this->form_validation->set_rules('receipt_value', 'Giá trị ghi nhận', 'trim|required|integer|greater_than_equal_to[0]');
                $this->form_validation->set_rules('receipt_branch', 'Mã chi nhánh', 'trim|required|max_length[30]|alpha_dash');
                if ($this->form_validation->run() == FALSE) {
                    $message = array(
                        'status'    =>  false,
                        'error'     =>  $this->form_validation->error_array(),
                        'message'   =>  validation_errors()
                    );
                    $this->response($message, RestController::HTTP_NOT_FOUND);
                } else {
                    if ($branch_code_data[0]->branch_code == "ALL" || $branch_code_data[0]->branch_code == $data['receipt_branch']) {
                        $receipt_data = [
                            'code'                      => strtoupper(uniqid('CBO' . '_')),
                            'customer_code'             => $data['receipt_customer_code'],
                            'value'                     => $data['receipt_value'],
                            'branch'                     => $data['receipt_branch'],
                            'created_by'                => $user_data->full_name,
                            'type'                      => 2
                        ];
                        $this->CashBookModel->insert_receipt($receipt_data);
                        $message = [
                            'status' => true,
                            'data' => 'success',
                            'message' => "Save customer group successful"
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
                'message' => "Can't save new customer group"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function getcashbookinfo_post()
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
                $return_data = $this->CashBookModel->get_receipt_by_code($data["code"]);

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

    public function updatecashbook_post()
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
                $this->form_validation->set_rules('receipt_customer_code', 'Mã khách hàng', 'trim|required|max_length[30]|alpha_dash');
                $this->form_validation->set_rules('receipt_value', 'Giá trị ghi nhận', 'trim|required|integer|greater_than_equal_to[0]');
                $this->form_validation->set_rules('receipt_branch', 'Mã chi nhánh', 'trim|required|max_length[30]|alpha_dash');
                if ($this->form_validation->run() == FALSE) {
                    $message = array(
                        'status'    =>  false,
                        'error'     =>  $this->form_validation->error_array(),
                        'message'   =>  validation_errors()
                    );
                    $this->response($message, RestController::HTTP_NOT_FOUND);
                } else {
                    if ($branch_code_data[0]->branch_code == "ALL" || $branch_code_data[0]->branch_code == $data['receipt_branch']) {
                        $receipt_data = [
                            'customer_code'             => $data['receipt_customer_code'],
                            'value'                     => $data['receipt_value'],
                            'branch'                    => $data['receipt_branch'],
                            'type'                      => $data['receipt_type']
                        ];
                        $this->CashBookModel->update_receipt($data['receipt_code'], $receipt_data);
                        $message = [
                            'status' => true,
                            'data' => 'success',
                            'message' => "Save customer group successful"
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
                'message' => "Can't save new customer group"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function deletecashbookbycode_post()
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
                $this->form_validation->set_rules('receipt_code', 'Mã', 'trim|required|max_length[30]|alpha_dash');
                if ($this->form_validation->run() == FALSE) {
                    $message = array(
                        'status'    =>  false,
                        'error'     =>  $this->form_validation->error_array(),
                        'message'   =>  validation_errors()
                    );
                    $this->response($message, RestController::HTTP_NOT_FOUND);
                } else {
                    $this->CashBookModel->delete_receipt($data['receipt_code']);
                    $message = [
                        'status' => true,
                        'data' => 'success',
                        'message' => "Save customer group successful"
                    ];
                    $this->response($message, RestController::HTTP_OK);
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
                'message' => "Can't save new customer group"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
