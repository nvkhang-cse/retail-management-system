<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;

class Sales extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/ProductModel');
        $this->load->model('cms/UserModel');

    }
    
    public function loadsalepage_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE)
        {

			$return_data = $this->load->view('cms/dashboard/salepage', '', true);
            
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load dashboard successful"
            ];
            $this->response($message, RestController::HTTP_OK);
		}
		else
		{
            $message = [
                'status' => FALSE,
                'message' => "Can't load dashboard"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
}
