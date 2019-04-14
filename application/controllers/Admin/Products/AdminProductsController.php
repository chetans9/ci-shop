<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProductsController extends MY_Controller
{

	protected $uploaded_images = array();
	protected $cover_image;

	/**
	 * AdminProductsController constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->logged_in) {
			redirect(base_url('index.php/login'));
			exit;
		}
		$this->load->model('ProductsModel');
		$this->load->model('ProductImagesModel');
		$this->load->model('CategoriesModel');
		$this->load->helper('file');
		//load custom helper
		$this->load->helper('admin');
	}


	/**
	 * Display the list of resource.
	 */
	public function index()
	{
		$this->load->library('pagination');
		//Call user defined helper
		$pagination_config = getAdminPaginationConfig($this->ProductsModel->count_all(), 10);
		$this->pagination->initialize($pagination_config);
		$data['records'] = $this->ProductsModel->order_by('created_at', 'desc')->limit($pagination_config['per_page'], $this->input->get('per_page'))->get_all();
		$this->load->templateAdmin('admin/products/list', $data);
	}

	/**
	 * Set common validation rules for products form.
	 */
	protected function setValidationRules($type = 'add')
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('category_id', 'category', 'trim|required');
		$this->form_validation->set_rules('price', 'Description', 'trim|required|max_length[11]');
		if (empty($_FILES['cover_image']['name']) && $type == 'add') {
			$this->form_validation->set_rules('cover_image', 'cover image', 'required');
		}
	}

	/**
	 * Get Image/File Upload configuration.
	 *
	 * @return mixed
	 */
	public function getUploadConfig()
	{
		$config = array();
		$config['upload_path'] = 'images/products';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 10000000;

		return $config;
	}


	/**
	 * Create new resource.
	 */
	public function create()
	{
		$data = array();

		//If POST method Create New Record. Otherwise just show the form.
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$inputs = $this->input->post();
			$this->setValidationRules();
			//Set one additional rule
			$this->form_validation->set_rules('images[]', 'Images', 'callback_validateAndUploadFiles');

			if ($this->form_validation->run()) {
				//Form validation success. Insert Record into database
				$inputs['created_at'] = date('Y-m-d H:i:s');

				//Upload single file. i.e Product Cover image.
				$cover_image = $this->uploadFile('cover_image', $this->getUploadConfig());
				//Create Product thumbnail
				$this->createThumb($cover_image);
				//Save uploaded file name in column.
				$inputs['cover_image'] = $cover_image['file_name'];


//				$images_path = array();
//				$allowed_mime_types = array("image/jpeg", "image/png", "image/jpg");
//
//				print_r($_FILES); die();
//				$this->upload->do_upload('images');

				//Insert form data into database
				$last_id = $this->ProductsModel->insert($inputs);



//
//				if(!$this->upload->do_upload('images')){
//					//$this->form_validation->set_message('uploadFiles', $this->upload->display_errors());
//					return false;
//				}

				var_dump($this->uploaded_images); die();
				foreach ($this->uploaded_images as $uploaded_image) {
					$images_path['path'] =  $uploaded_image['file_name'];
					$images_path['product_id'] = $last_id;
					$this->ProductImagesModel->insert($images_path);
				}
				$this->session->set_flashdata('success', 'Product Created successfully');

				redirect(base_url('index.php/admin/products'));
				exit;

			}
		}

		$data['categories'] = $this->CategoriesModel->getCategoriesDropdown();
		$this->load->templateAdmin('admin/products/create', $data);
	}

	/**
	 * Show Edit Form. If POST request, Update the resource.
	 *
	 * @param $id
	 */
	public function edit($id)
	{

		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->setValidationRules('edit');
			//Set one additional rule for files in edit section
			if (!empty($_FILES['images']['name']) && $_FILES['images']['name'][0] != null) {
				$this->form_validation->set_rules('images[]', 'Images', 'callback_validateAndUploadFiles');
			}

			if ($this->form_validation->run()) {
				//Form validation success. Update Record
				$inputs = $this->input->post();
				$inputs['updated_at'] = date('Y-m-d H:i:s');
				$this->ProductsModel->update($id, $inputs);
				$this->session->set_flashdata('success', 'Product Updated successfully');
				$upload_dir = 'images/products';


				foreach ($this->uploaded_images as $uploaded_image) {
					$images_path['path'] = $uploaded_image['file_name'];
					$images_path['product_id'] = $id;
					$this->ProductImagesModel->insert($images_path);
				}

				redirect(base_url('index.php/admin/products'));
				exit;
			}
		}
		$record = $this->ProductsModel->get($id);

		$data['record'] = $record;
		$data['categories'] = $this->CategoriesModel->getCategoriesDropdown();

		$this->load->templateAdmin('admin/products/edit', $data);
	}

	/**
	 * Deletes a Resource
	 *
	 * @param $id
	 */
	public function delete($id)
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST') {
			$this->ProductsModel->delete($id);
			$this->session->set_flashdata('info', 'Product deleted successfully.');
			redirect(base_url('index.php/admin/products'));
			exit;
		}

	}

	/**
	 * Uploads as well as validates Product Images.
	 *
	 * @return bool
	 */
	public function validateAndUploadFiles()
	{

		$files = $_FILES;
		$files_count = count($_FILES['images']['name']);
		//If edit and no files selected, OK.
		if ($this->uri->segment(3) == 'edit' && $files_count == 0) {
			return true;
		}


		$allowed_mime_types = array("image/jpeg", "image/png", "image/jpg");

		$upload_config = $this->getUploadConfig();
		$this->load->library('upload', $upload_config);

		for ($i = 0; $i < $files_count; $i++) {
			$_FILES['images']['name'] = $files['images']['name'][$i];
			$_FILES['images']['type'] = $files['images']['type'][$i];
			$_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
			$_FILES['images']['error'] = $files['images']['error'][$i];
			$_FILES['images']['size'] = $files['images']['size'][$i];

			//Don't upload images. Just check
			if ($_FILES['images']['size'] > $upload_config['max_size']) {
				//Show validation error
				$this->form_validation->set_message('validateAndUploadFiles', 'File size should not be greater than ' . $upload_config['max_size'] . ' Bytes');
				return false;
			}

			$current_mime_type = get_mime_by_extension($_FILES['images']['name']);
			if (!in_array($current_mime_type, $allowed_mime_types)) {
				$this->form_validation->set_message('validateAndUploadFiles', 'File Type is not allowed ');
				return false;
			}

			//Upload current file :
			if (!$this->upload->do_upload('images')) {
				$this->form_validation->set_message('validateAndUploadFiles', $this->upload->display_errors());
				return false;
			}
		}

		$upload_data_arr = array();
		array_push($this->uploaded_images,$this->upload->data());

		foreach ($this->uploaded_images as $upload_data){
			$this->createThumb($upload_data);
		}
		return true;
	}

}
