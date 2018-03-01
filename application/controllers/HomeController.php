<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ProductsModel');


    }

    /**
     * Display the list of resource.
     *
     *
     */
	public function index()
	{

       $this->load->template('home');
	}


}
