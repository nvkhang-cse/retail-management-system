<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;

class Product extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/ProductModel');

    }
    
    public function loadProductList_post()
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

			$return_data = $this->load->view('cms/dashboard/product/product_list', '', true);
            
            
            // $return_data = site_url('cms/layout/main.php');
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
		}
		else
		{
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load product page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function loadProductTrash_post()
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

			$return_data = $this->load->view('cms/dashboard/product/product_trash', '', true);
            
            
            // $return_data = site_url('cms/layout/main.php');
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product trash page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
		}
		else
		{
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load trash product page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }


    public function loadProductAdd_post()
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

			$return_data = $this->load->view('cms/dashboard/product/product_add', '', true);
            
            
            // $return_data = site_url('cms/layout/main.php');
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load product add page successful"
            ];
            $this->response($message, RestController::HTTP_OK);
		}
		else
		{
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load add product page"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
    }
    public function loadTableData_post()
    {
        $this->load->library('Authorization_Token');
        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
		// var_dump($is_valid_token);
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE)
        {
            $return_data = $this->ProductModel->get_product();
            $message = [
                'status' => true,
                'data' => $return_data,
                'message' => "Load table data successful"
            ];
            $this->response($message, RestController::HTTP_OK);


        }
		else
		{
            // Login Error
            $message = [
                'status' => FALSE,
                'message' => "Can't load table data"
            ];
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }

    }




}
?>