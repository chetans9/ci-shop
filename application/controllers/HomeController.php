<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ProductsModel');
        $this->load->model('CategoriesModel');
		$this->load->model('SliderImagesModel');


    }

    /**
     * Display the list of resource.
     *
     *
     */
	public function index()
	{
		$data['categories'] = $this->CategoriesModel->get_all();
		$data['slider_images'] = $this->SliderImagesModel->get_all();

//		print_r($data['slider_images']); die();


		$this->load->template('home',$data);
	}


}
