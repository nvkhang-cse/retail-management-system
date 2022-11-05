<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
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
			$this->data["subview"]="cms/layout/main";
			// $this->data["footerview"]="cms/layout/main";


			$this->load->view('cms/layout/main_page', $this->data);
			
			// redirect(site_url('msystem/login'));
			// echo json_encode(['message'=>'successfully']);

		}
		else
		{
			$this->data['before_head']='<title>Login | CMS</title>';
			$this->data['before_foot']='';
			$this->data['msg'] = 'Sign in to K&K systems management';
			// $this->data['subview']='cms/authentication/signin';
			$this->load->view('cms/authentication/signin', $this->data);
			// echo 'Fail login!';
			return;

		}

	}
}
?>