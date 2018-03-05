<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminOrdersController extends CI_Controller {
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
        $this->load->model('OrdersModel');

    }

    /**
     * Display the list of resource.
     */
	public function index()
	{
       $data['records'] = $this->OrdersModel->order_by('created_at','desc')->get_all();

       $this->load->templateAdmin('admin/orders/list',$data);
	}

    /**
     * Show the order.
     *
     * @param $id
     */
    public function show($id)
    {



        $record = $this->OrdersModel->get($id);
        $data['record'] = $record;


        $this->load->templateAdmin('admin/orders/show',$data);
    }

    public function delete($id)
    {
        if($this->input->server('REQUEST_METHOD')=='POST')
        {
            $status = $this->OrdersModel->delete($id);
            if($status){
                $this->session->set_flashdata('info', 'Order deleted successfully.');
            }
            else{
                $this->session->set_flashdata('error', 'Failed to delete Order.');
            }

            redirect(redirect($_SERVER['HTTP_REFERER']));
        }

    }
}
