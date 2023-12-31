<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

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
		$this->data["index"] = 2;
		$this->data["index2"] = 1;
		$this->load->view('cms/layout/main_error', $this->data);
	}

	public function loadproductwarehouse()
	{
		$this->data["index"] = 2;
		$this->data["index2"] = 2;
		$this->load->view('cms/layout/main_error', $this->data);
	}

	public function loadproductadd()
	{
		$this->data["index"] = 2;
		$this->data["index2"] = 3;
		$this->load->view('cms/layout/main_error', $this->data);
	}

	public function loadproducttrash()
	{
		$this->data["index"] = 2;
		$this->data["index2"] = 4;
		$this->load->view('cms/layout/main_error', $this->data);
	}

	public function loadproductcategory()
	{
		$this->data["index"] = 2;
		$this->data["index2"] = 5;
		$this->load->view('cms/layout/main_error', $this->data);
	}
	public function loadproductcategoryadd()
	{
		$this->data["index"] = 2;
		$this->data["index2"] = 6;
		$this->load->view('cms/layout/main_error', $this->data);
	}
}
