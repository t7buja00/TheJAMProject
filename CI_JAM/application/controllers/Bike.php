<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bike extends CI_Controller {

  function __construct()
	{
		parent::__construct();
		$this->load->model('Bike_model');
	}

   public function index(){
      $data['page']='bike/index';
      $this->load->view('menu/ content',$data);
    }
 
    public function show_all_bikes(){
      $this->load->model('bike_model');
      $data['bike']=$this->bike_model->get_all_bikes();
      $data['page']='bike/show_all_bikes';
      $this->load->view('menu/content',$data);
    }

    public function customer_rental(){
      $data['page']='bike/customer_rental';
      $this->load->view('menu/content',$data);
    }

    public function show_mens_bikes(){
      $this->load->model('bike_model');
      $data['bike']=$this->bike_model->get_mens_bikes();
      $data['page']='bike/show_mens_bikes';
      $this->load->view('menu/content',$data);
    }


    public function customer_mens_all(){
      $this->load->model('bike_model');
      $data['bike']=$this->bike_model->get_mens_customer();
      $data['page']='bike/customer_mens';
      $this->load->view('menu/onlycontent',$data);      
    }

    public function show_womens_bikes(){
      $this->load->model('bike_model');
      $data['bike']=$this->bike_model->get_womens_bikes();
      $data['page']='bike/show_womens_bikes';
      $this->load->view('menu/content',$data);
    }

   
    public function customer_womens_all(){
      $this->load->model('bike_model');
      $data['bike']=$this->bike_model->get_womens_customer();
      $data['page']='bike/customer_womens';
      $this->load->view('menu/onlycontent',$data);      
    }

    public function show_kids_bikes(){
      $this->load->model('bike_model');
      $data['bike']=$this->bike_model->get_kids_bikes();
      $data['page']='bike/show_kids_bikes';
      $this->load->view('menu/content',$data);
    }


    public function customer_kids_all(){
      $this->load->model('bike_model');
      $data['bike']=$this->bike_model->get_kids_customer();
      $data['page']='bike/customer_kids';
      $this->load->view('menu/onlycontent',$data);      
    }

    public function edit_selected($edit_id){
      $this->load->model('bike_model');
      $data['bike_id']=$edit_id;
      $data['selected_bike']=$this->bike_model->get_selected_bike($edit_id);
      $data['page']='bike/edit_selected';
      $this->load->view('menu/content',$data);
    }

    public function view_selected($edit_id){
      $this->load->model('bike_model');
      $data['bike_id']=$edit_id;
      $data['selected_bike']=$this->bike_model->get_selected_bike($edit_id);
      $data['page']='bike/view_selected';
      $this->load->view('menu/onlycontent',$data);
    }

    public function view_selected_kids($edit_id){
      $this->load->model('bike_model');
      $data['bike_id']=$edit_id;
      $data['selected_bike']=$this->bike_model->get_selected_bike($edit_id);
      $data['page']='bike/view_selected_kids';
      $this->load->view('menu/onlycontent',$data);
    }
  
  public function save_edited(){
    $this->load->model('bike_model');
    $update_id=$this->input->post('bike_id');
    $data_update=array(
      'bike_id'=>$this->input->post('bike_id'),
      'brand'=>$this->input->post('brand'),
      'model'=>$this->input->post('model'),
      'size'=>$this->input->post('size'),
      'email'=>$this->input->post('email'),
      'rent_price'=>$this->input->post('rent_price'),
      'availability'=>$this->input->post('availability'),
      'maintenance'=>$this->input->post('maintenance'),
      'distance'=>$this->input->post('distance'),
      'gender'=>$this->input->post('gender'),
      'last_rental'=>$this->input->post('last_rental'),
      'date_bought'=>$this->input->post('date_bought'),
      'purchase_price'=>$this->input->post('purchase_price'),
      'sale_price'=>$this->input->post('sale_price')
    );
    $success=$this->bike_model->save_edited($update_id,$data_update);
    if($success){
      $data['message']='You have updated bike: '.$this->input->post('bike_id');
    }
    else {
      $data['message']='Something went wrong'.$this->input->post('bike_id');
    }
    $data['page']='bike/add_bike_to_db';
    $this->load->view('menu/content',$data);
  }

  public function reserve($edit_id){
    $this->load->model('bike_model');
    $data['bike_id']=$edit_id;
    $data['selected_bike']=$this->bike_model->reserve($edit_id);
    $data['page']='bike/reserve';
    $this->load->view('menu/content',$data);
  }

  public function add_rental(){
    $add_data=array(	
      'rented_price'=>$this->input->post('rented_price'),
      'distance_out'=>$this->input->post('distance_out'),
      'distance_back'=>$this->input->post('distance_back'),
      'date_booked'=>$this->input->post('date_booked'),
      'date_rented'=>$this->input->post('date_rented'),
      'date_returned'=>$this->input->post('date_returned'),
      'customer_id'=>$this->input->post('customer_id'),
      'bike_id'=>$this->input->post('bike_id'),
      'total_rent_price'=>$this->input->post('total_rent_price')
    );
    $success=$this->Bike_model->add_rental($add_data);
    if($success){
      $data['message']='You have completed your rental';
    }
    else {
      $data['message']='Something went wrong';
    }
    $data['page']='bike/complete';
    $this->load->view('menu/content',$data);
  }


  
 
  }









