<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getAdminPaginationConfig'))
{
    /**
     * Set pagination config
     *
     * @param null $base_url
     * @return mixed
     */
    function getAdminPaginationConfig($total_rows,$per_page,$base_url=null){

        $config['base_url'] = ($base_url)? $base_url : base_url('index.php/'.uri_string());
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
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
}