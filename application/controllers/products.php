<?php
class Products extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
    }
 
    public function index()
    {
        
        //param sent via post
        $manufacture_id = $this->input->post('manufacture_id');        

        //send to view wich option will be loaded already selected
        //if no filter was select, the default is 0
        $data['manufacture_selected'] = 0;
        if($manufacture_id){
          $data['manufacture_selected'] = $manufacture_id;
        }

        //general filter variable
        $filter ='DESC';
         
        //store model's data, so we send to the view
        $data['manufactures'] = $this->products_model->get_manufacturers();
        $data['products'] = $this->products_model->get_products($manufacture_id, $filter);

        if (empty($data['products']))
        {
            show_404();
        }

        //load code igniter helpers and libs for the view
        $this->load->helper('form');    
        $this->load->view('products/index', $data);
    }


    public function view($id)
    {
        $data['product_detail'] = 'Details from product: '.$id;
        $this->load->view('products/view', $data);
    }

}