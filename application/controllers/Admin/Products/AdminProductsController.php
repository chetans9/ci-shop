<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProductsController extends CI_Controller {

    protected $uploaded_images = array();

    /**
     * AdminProductsController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('ProductsModel');
        $this->load->model('ProductImagesModel');
        $this->load->model('CategoriesModel');
        $this->load->helper('file');
    }

    /**
     * Display the list of resource.
     */
	public function index()
	{
       $data['records'] = $this->ProductsModel->get_all();

       $this->load->templateAdmin('admin/products/list',$data);
	}

    /**
     * Get Image/File Upload configuration.
     *
     * @return mixed
     */
    public function getUploadConfig()
    {
        $config = array();
        $config['upload_path']          = 'uploads/images';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000000;

        return $config;
    }


    /**
     * Uploads as well as validates Product Images.
     *
     * @return bool
     */
    public function checkAndUploadFiles(){

        $allowed_mime_types = array("image/jpeg","image/png","image/jpg");

        $files = $_FILES;
        $files_count = count($_FILES['images']['name']);

        $upload_config = $this->getUploadConfig();
        $this->load->library('upload', $upload_config);

        for($i=0; $i<$files_count; $i++)
        {
            $_FILES['images']['name']= $files['images']['name'][$i];
            $_FILES['images']['type']= $files['images']['type'][$i];
            $_FILES['images']['tmp_name']= $files['images']['tmp_name'][$i];
            $_FILES['images']['error']= $files['images']['error'][$i];
            $_FILES['images']['size']= $files['images']['size'][$i];

            //Dont upload images. Just check
            if ($_FILES['images']['size'] > $upload_config['max_size'])
            {
                //Show validation error
                $this->form_validation->set_message('checkAndUploadFiles', 'File size should not be greater than '.$upload_config['max_size'].' Bytes');
                return false;
            }

            $current_mime_type = get_mime_by_extension($_FILES['images']['name']);
            if(!in_array($current_mime_type,$allowed_mime_types))
            {
                $this->form_validation->set_message('checkAndUploadFiles', 'File Type is not allowed ');
                return false;
            }

            $this->upload->do_upload('images');
            array_push($this->uploaded_images,$this->upload->data());
        }
        return true;
    }

    /**
     * Create New Resource
     */
	public function create()
    {
        $data = array();

        //If POST method Create New Record
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $inputs = $this->input->post();
            //print_r($inputs);
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('description','Description','trim|required');
            $this->form_validation->set_rules('category_id','category','trim|required');
            $this->form_validation->set_rules('price','Description','trim|required|max_length[11]');
            $this->form_validation->set_rules('images[]', 'Images', 'callback_checkAndUploadFiles');

            if ($this->form_validation->run())
            {
                //Form validation success. Insert Record into database
                $last_id = $this->ProductsModel->insert($inputs);

                $images_path = array();


                foreach ($this->uploaded_images as $uploaded_image)
                {
                    $images_path['path'] = 'uploads/images/'.$uploaded_image['file_name'];
                    $images_path['product_id'] = $last_id;
                    $this->ProductImagesModel->insert($images_path);
                }
                $this->session->set_flashdata('success', 'Product Created successfully');

                redirect(base_url('index.php/admin/products'));
                exit;

            }
        }

        $data['categories'] = $this->CategoriesModel->getCategoriesDropdown();
        $this->load->templateAdmin('admin/products/create',$data);
    }

    /**
     * Show Edit Form. If POST request, Update the resource.
     *
     * @param $id
     */
    public function edit($id)
    {

        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('description','Description','trim|required|max_length[128]');
            $this->form_validation->set_rules('price','Description','trim|required|max_length[128]');

            if ($this->form_validation->run())
            {
                //Form validation success. Update Record
                $inputs = $this->input->post();
                $this->ProductsModel->update($id, $inputs);
                $this->session->set_flashdata('success', 'Product Updated successfully');

                redirect(base_url('index.php/admin/products'));
                exit;
            }
        }
        $record = $this->ProductsModel->get($id);

        $data['record'] = $record;
        $data['categories'] = $this->CategoriesModel->getCategoriesDropdown();

        $this->load->templateAdmin('admin/products/edit',$data);
    }

    /**
     * Delete Resource
     *
     * @param $id
     */
    public function delete($id)
    {
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $this->ProductsModel->delete($id);
            $this->session->set_flashdata('info', 'Product deleted successfully.');
            redirect(base_url('index.php/admin/products'));
            exit;
        }

    }
}
