<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogoutController extends CI_Controller {
    /**
     * LogoutController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->logged_in){
            redirect(base_url('index.php/admin'));
        }
    }

    /**
     * Destroy user session
     *
     * @param $user
     */
    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('logged_in');
        redirect(base_url('index.php/login'));
    }
}
