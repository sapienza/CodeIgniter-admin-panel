<?php
class Admin_products extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
    }
 
    public function index()
    {
        
        //load libraries and helpers
        $this->load->library('pagination');
        $this->load->helper('form');

        //all the posts sent by the view
        $manufacture_id = $this->input->post('manufacture_id');        
        $search_string = $this->input->post('search_string');        
        $order = $this->input->post('order'); 
        $order_type = $this->input->post('order_type'); 

        //pagination settings
        $config['per_page'] = 4;
        $config['base_url'] = 'http://dev.cisample.com.br/admin/products';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';


        if($order_type){
            $filter_session_data['order_type'] = $order_type;
        }
        else{
            if($this->session->userdata('order_type')){
                $order_type = $this->session->userdata('order_type');    
            }else{
                $order_type = 'Asc';    
            }
        }
        $data['order_type_selected'] = $order_type;        


        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it's the first time we load the content
        //in this case we clean the session filter data
        //if any filter post was sent but we are in some page, we must load the session data

        //filtered && || paginated
        if($manufacture_id !== false && $search_string !== false && $order !== false || $this->uri->segment(3) == true){ 
            //order_type
            //if post is not null, we store it in session data array
            //if is null, we use the session data already stored
            //we save order into the the var to load the view with the param already selected       
            if($manufacture_id !== 0){
                $filter_session_data['manufacture_selected'] = $manufacture_id;
            }else{
                $manufacture_id = $this->session->userdata('manufacture_selected');
            }
            $data['manufacture_selected'] = $manufacture_id;

            if($search_string){
                $filter_session_data['search_string_selected'] = $search_string;
            }else{
                $search_string = $this->session->userdata('search_string_selected');
            }
            $data['search_string_selected'] = $search_string;

            if($order){
                $filter_session_data['order'] = $order;
            }
            else{
                $order = $this->session->userdata('order');
            }
            $data['order'] = $order;

            //save session data into the session
            $this->session->set_userdata($filter_session_data);

            //fetch sql data into arrays
            $data['manufactures'] = $this->products_model->get_manufacturers();
            $data['count_products']= $this->products_model->count_products($manufacture_id, $search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if($search_string){
                if($order){
                    $data['products'] = $this->products_model->get_products($manufacture_id, $search_string, $order, $order_type, $config['per_page'],$this->uri->segment(3));        
                }else{
                    $data['products'] = $this->products_model->get_products($manufacture_id, $search_string, '', $order_type, $config['per_page'],$this->uri->segment(3));           
                }
            }else{
                if($order){
                    $data['products'] = $this->products_model->get_products($manufacture_id, '', $order, $order_type, $config['per_page'],$this->uri->segment(3));        
                }else{
                    $data['products'] = $this->products_model->get_products($manufacture_id, '', '', $order_type, $config['per_page'],$this->uri->segment(3) );        
                }
            }

        }else{

            //clean filter data inside section
            $filter_session_data['manufacture_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['manufacture_selected'] = 0;
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['manufactures'] = $this->products_model->get_manufacturers();
            $data['count_products']= $this->products_model->count_products();
            $data['products'] = $this->products_model->get_products('', '', '', $order_type, $config['per_page'],$this->uri->segment(3) );        
            $config['total_rows'] = $data['count_products'];

        }//!isset($manufacture_id) && !isset($search_string) && !isset($order)

        if (empty($data['products']))
        {
            show_404();
        }

        $this->pagination->initialize($config);        
        $this->load->view('admin/list', $data);            

    }//index

 

    public function view($id)
    {
        $data['product_detail'] = 'Details from product: '.$id;
        $this->load->view('products/view', $data);
    }

}