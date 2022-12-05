<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Signup extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cms/UserModel');
    }

    public function insertuser_post()
    {
        //XSS filter
        $data = $this->security->xss_clean($this->post());
        //Form validation
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules(
            'username',
            'Username',
            'trim|required|alpha_numeric|is_unique[user.username]|max_length[30]',
            array('is_unique' => 'This %s already exists please enter another username.')
        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[100]');
        $this->form_validation->set_rules('fullname', 'Full name', 'trim|required|max_length[50]');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'trim|required|valid_email|max_length[80]|is_unique[user.email]',
            array('is_unique' => 'This %s already exists please enter another email address.')
        );

        if ($this->form_validation->run() == FALSE) {
            //Form validation error
            $message = array(
                'status'    =>  false,
                'error'     =>  $this->form_validation->error_array(),
                'message'   =>  validation_errors()
            );
            $this->response($message, RestController::HTTP_NOT_FOUND);
        } else {
            $insert_data = [
                'username'      => $this->post('username', TRUE),
                'pwd'           => md5($this->post('password', TRUE)),
                'fullname'      => $this->post('fullname', TRUE),
                'email'         => $this->post('email', TRUE),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ];
            $result = $this->UserModel->insert_user($insert_data);
            if ($result > 0 && !empty($result)) {
                $message = array(
                    'status'    =>  true,
                    'message'   =>  'User registration successful'
                );
                $this->response($message, RestController::HTTP_OK);
            } else {
                $message = array(
                    'status'    =>  false,
                    'message'   =>  'Not register your account'
                );
                $this->response($message, RestController::HTTP_NOT_FOUND);
            }
        }
    }
}
