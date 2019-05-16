<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUsController extends CI_Controller {
    /**
     * ContactUsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show Contact us form
     */
    public function index()
    {

    	$this->load->model('ContactUsModel');

    	if($this->input->server('REQUEST_METHOD') == 'POST'){

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('phone', 'Phone');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('message', 'message', 'required');

			if($this->form_validation->run()){
				$inputs = $this->input->post();

				$this->ContactUsModel->insert($inputs);
				$this->session->set_flashdata('success','Your request has been recorded!');
				redirect($_SERVER['HTTP_REFERER']);

			}

		}

        $this->load->template('contact_us/contact_us');
    }


}
