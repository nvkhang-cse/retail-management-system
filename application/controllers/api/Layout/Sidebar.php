<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;

class Sidebar extends RestController
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('cms/UserModel');

    }
    
    public function loadleftsidebar_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
		// var_dump($is_valid_token);
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE)
        {
			// $this->data["headerview"]="cms/layout/main";
			// $this->data["subview"]="cms/layout/main";

			// $this->load->view('cms/layout/main');
            $return_data = $this->load->view('cms/layout/leftside_bar', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load left side bar successful"
            ];
            $this->response($message, RestController::HTTP_OK);
		}
		else
		{
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load left side bar"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }

    public function loadrightsidebar_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
		// var_dump($is_valid_token);
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE)
        {
			// $this->data["headerview"]="cms/layout/main";
			// $this->data["subview"]="cms/layout/main";

			// $this->load->view('cms/layout/main');
            $return_data = $this->load->view('cms/layout/rightside_bar', '', true);

            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load right side bar successful"
            ];
            $this->response($message, RestController::HTTP_OK);
		}
		else
		{
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load right side bar"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }






}
?>