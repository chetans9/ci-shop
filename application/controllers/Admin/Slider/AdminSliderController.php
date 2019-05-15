<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSliderController extends MY_Controller {
    /**
     * AdminCategoriesController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->logged_in){
            redirect(base_url('index.php/login'));
            exit;
        }
        $this->load->model('SliderImagesModel');
		$this->load->helper("security");

    }

    /**
     * Show the order.
     *
     * @param $id
     */
    public function index()
    {

        $slider_images = $this->SliderImagesModel->get_all();
        $data['slider_images'] = $slider_images;
        $this->load->templateAdmin('admin/slider/index',$data);
    }

    public function create()
	{
		if($this->input->server('REQUEST_METHOD') === 'POST'){
			$this->setValidationRules();

			if ($this->form_validation->run()) {

				$inputs = $this->input->post();
				$image_data = $this->uploadFile('image', $this->getUploadConfig());

				if(empty($image_data)){
					$this->session->set_flashdata('error',$this->upload->display_errors());
				}else{
					$inputs['path'] = $image_data['file_name'];
					$status = $this->SliderImagesModel->insert($inputs);
					redirect(base_url('index.php/admin/slider'));
				}
			}

		}

		$this->load->templateAdmin('admin/slider/create');

	}

    public function delete($id)
    {
    	die('awfaf');
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $status = $this->SliderImagesModel->delete($id);
            if($status){
                $this->session->set_flashdata('info', 'Order deleted successfully.');
            }
            else{
                $this->session->set_flashdata('error', 'Failed to delete Order.');
            }

            redirect(redirect($_SERVER['HTTP_REFERER']));
        }

    }

	protected function setValidationRules($type = 'add')
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('link', 'Link', 'required|trim');
		$this->form_validation->set_rules('sub_title', 'sub title', 'trim');
		if (empty($_FILES['image']['name']) && $type == 'add') {
			$this->form_validation->set_rules('image', 'image', 'required');
		}
	}


	/**
	 * Get Image/File Upload configuration.
	 *
	 * @return mixed
	 */
	private function getUploadConfig()
	{
		$config = array();
		$config['upload_path'] = 'images/slider';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 10000000;

		return $config;
	}
}
