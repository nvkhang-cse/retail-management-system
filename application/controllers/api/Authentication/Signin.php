<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';
use chriskacerguis\RestServer\RestController;

class Signin extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/UserModel');

    }
    
    public function login_post()
    {
        $data = $this->security->xss_clean($this->post());
        //Form validation
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
        // $this->form_validation->set_rules('fullname', 'Full name', 'trim|required|max_length[50]');
        // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[80]|is_unique[user.email]',
        // array('is_unique' => 'This %s already exists please enter another email address.'));

        if($this->form_validation->run() == FALSE)
        {
            //Form validation error
            $message = array(
                'status'    =>  false,
                'error'     =>  $this->form_validation->error_array(),
                'message'   =>  validation_errors()
            );
            $this->response($message, RestController::HTTP_NOT_FOUND);
        }
        else
        {
            $output = $this->UserModel->user_login($this->post('email'), $this->post('password'));
            if (!empty($output) && $output != FALSE)
            {
                // Load Authorization Token Library
                $this->load->library('Authorization_Token');

                // Generate Token
                $token_data['id'] = $output->id;
                $token_data['full_name'] = $output->fullname;
                $token_data['username'] = $output->username;
                $token_data['email'] = $output->email;
                $token_data['created_at'] = $output->created_at;
                $token_data['updated_at'] = $output->updated_at;
                $token_data['time'] = time();

                $user_token = $this->authorization_token->generateToken($token_data);

                $return_data = [
                    'user_id' => $output->id,
                    'full_name' => $output->fullname,
                    'email' => $output->email,
                    'created_at' => $output->created_at,
                    'token' => $user_token,
                ];

                // Login Success
                $message = [
                    'status' => true,
                    'data' => $return_data,
                    'message' => "User login successful"
                ];
                $this->response($message, RestController::HTTP_OK);
            } 
            else
            {
                // Login Error
                $message = [
                    'status' => FALSE,
                    'message' => "Invalid Username or Password"
                ];
                $this->response($message, RestController::HTTP_NOT_FOUND);
            }
        }
    }






}
?>