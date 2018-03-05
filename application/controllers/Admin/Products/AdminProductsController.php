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
        if(!$this->session->logged_in){
            redirect(base_url('index.php/login'));
            exit;
        }

        $this->load->model('ProductsModel');
        $this->load->model('ProductImagesModel');
        $this->load->model('CategoriesModel');
        $this->load->helper('file');
    }

    /**
     * Set pagination config
     */
    protected function getPaginationConfig(){
        $config['base_url'] = base_url('index.php/'.uri_string());
        $config['total_rows'] = count($this->ProductsModel->get_all());
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['full_tag_open'] = '<ul class="pagination pagination-md pull-left">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</li></a>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        return $config;

    }
    /**
     * Display the list of resource.
     */
	public function index()
	{
	    $this->load->library('pagination');
	    $pagination_config = $this->getPaginationConfig();
        $this->pagination->initialize($pagination_config);

       $data['records'] = $this->ProductsModel->order_by('created_at','desc')->limit($pagination_config['per_page'],$this->input->get('per_page'))->get_all();

       $this->load->templateAdmin('admin/products/list',$data);
	}

	protected function setValidationRules()
    {
        $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('description','Description','trim|required');
        $this->form_validation->set_rules('category_id','category','trim|required');
        $this->form_validation->set_rules('price','Description','trim|required|max_length[11]');
        $this->form_validation->set_rules('images[]', 'Images', 'callback_checkAndUploadFiles');
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

        $files = $_FILES;
        $files_count = count($_FILES['images']['name']);
        //If edit and no files selected, OK.
        if($this->uri->segment(3) == 'edit' && $files_count ==0 ){
            return true;
        }


        $allowed_mime_types = array("image/jpeg","image/png","image/jpg");

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

            if(!$this->upload->do_upload('images')){
                $this->form_validation->set_message('checkAndUploadFiles', $this->upload->display_errors());
                return false;
            }
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
            $this->setValidationRules();

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
            $this->setValidationRules();

            if ($this->form_validation->run())
            {
                //Form validation success. Update Record
                $inputs = $this->input->post();
                $this->ProductsModel->update($id, $inputs);
                $this->session->set_flashdata('success', 'Product Updated successfully');

                foreach ($this->uploaded_images as $uploaded_image)
                {
                    $images_path['path'] = 'uploads/images/'.$uploaded_image['file_name'];
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
