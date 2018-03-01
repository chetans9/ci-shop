<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProductsController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('ProductsModel');
        $this->load->model('ProductImagesModel');


    }

    /**
     * Display the list of resource.
     *
     *
     */
	public function index()
	{
       $data['records'] = $this->ProductsModel->get_all();

       $this->load->templateAdmin('admin/products/list',$data);
	}

    /**
     * Create New Resource
     */
	public function create()
    {
        $data = array();

        $upload_config = $this->getUploadConfig();

        $this->load->library('upload', $upload_config);



        //If POST method Create New Record
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $inputs = $this->input->post();
            //print_r($inputs);
            $this->form_validation->set_rules('name','Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('description','Description','trim|required|max_length[128]');
            $this->form_validation->set_rules('price','Description','trim|required|max_length[128]');
            //$this->form_validation->set_rules('images','Images','required');

            //Upload Files


            if ($this->form_validation->run())
            {
                $images_path = array();
                //Form validation success. Insert Record into database
                $last_id = $this->ProductsModel->insert($inputs);

                if ( ! $this->upload->do_upload('images'))
                {
                    echo $this->upload->display_errors(); exit();
                }
                else
                {
                    $images_path = array();

                    $upload_data = $this->upload->data();

                    $images_path['path'] = $upload_config['upload_path'].'/'.$upload_data['file_name'];
                    $images_path['product_id'] = $last_id;

                    $this->ProductImagesModel->insert($images_path);
                }
                $this->session->set_flashdata('success', 'Product Created successfully');

                redirect(base_url('index.php/admin/products'));
                exit;
            }
        }


        $this->load->templateAdmin('admin/products/create',$data);
    }

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

        $this->load->templateAdmin('admin/products/edit',$data);
    }

    public function delete($id)
    {
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $this->ProductsModel->delete($id);
        }

    }

    public function getUploadConfig()
    {
        $config['upload_path']          = 'uploads/images';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2000;

        return $config;
    }
}
