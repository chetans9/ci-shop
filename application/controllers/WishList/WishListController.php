<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WishListController extends CI_Controller {
    /**
     * WishListController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('UserWishListModel');
        if(!$this->session->userdata('logged_in')){
            header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
            exit("Please Log in to add Item to wishlist");
        }
    }

    /**
     * Add product to user's wishlist
     */
	public function addToWishList()
	{
        header('Content-Type: application/json');

	    $response = array();

	    $user = $this->session->userdata('user');

	    //Check Product already added to wish list
        $check = $this->UserWishListModel->checkWishListAlreadyExist($user->id,$this->input->post('product_id'));
        if($check == true){

            header( ' Item Already exist', true, 403);
            exit("Item Already exist in your wishlist");
        }


	    $wish_list_data = array(
	        'product_id' =>$this->input->post('product_id'),
	        'user_id'=>$user->id
        );

	    $last_id = $this->UserWishListModel->insert($wish_list_data);
        if($last_id){
            $response["status"] = 1;
        }
        else {
            $response["status"] = 0;
        }
        echo json_encode( $response );

	}
}
