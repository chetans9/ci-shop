<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {
    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if($this->session->logged_in){
            redirect(base_url('index.php/admin'));
        }
        $this->load->model('UsersModel');
    }

    /**
     * Set validation rule for Login form
     */
    public function setValidationRules()
    {
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('password','Password','trim|required');
    }

    /**
     * Show Login form. Attempt Login if POST request.
     */
    public function showLoginForm()
    {
        if($this->input->server('REQUEST_METHOD') == 'POST'){
            $this->setValidationRules();
            if($this->form_validation->run())
            {
                $email = $this->input->post('email');

                //Encrypt password using MD5
                $password = md5($this->input->post('password'));
                $user = $this->UsersModel->attemptLogin($email,$password);
                if($user){

                    $this->setUserSession($user);
                    redirect(base_url('index.php/admin'));
                }
                else{
                    $this->session->set_flashdata('error', 'Email or password incorrect');
                    redirect($_SERVER['HTTP_REFERER']);
                    exit;
                }
            }
        }
        $this->load->view("auth/login");
    }

    /**
     * Set Users Login session
     *
     * @param $user
     */
    private function setUserSession($user)
    {

        $logged_in = array(
            'user'  => $user,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($logged_in);
    }
}
