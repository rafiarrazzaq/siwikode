<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('text');
	}

	private function load($title = '')
	{
		$page = array(
			"header" => $this->load->view('layouts/header', array("title" => $title), true),
			"css" => $this->load->view('layouts/css', false, true),
			"js" => $this->load->view('layouts/js', false, true),
			"footer" => $this->load->view('layouts/footer', false, true),
		);
		return $page;
	}

	public function index()
	{
		$data = array(
			"page" => $this->load("Siwikode"),
			"content" => $this->load->view('index', true)
		);
		$this->load->view('layouts/layout', $data);
	}
}
