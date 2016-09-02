<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
    public function index(){
        $this->home();
    }
    
    #############HOME PAGE##############
    
    public function home(){
        $this->load->model("products_model");
        $data['results'] = $this->products_model->getData();
        
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_home", $data);
        $this->load->view("site_left");
        $this->load->view("site_right");
        $this->load->view("site_footer");
    }
    
    ##############CONTACT US###################
    
    public function contact(){
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_contact");
        $this->load->view("site_left");
        $this->load->view("site_right");
        $this->load->view("site_footer");
    }
    
    public function send_contact(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required|trim');        
        if($this->form_validation->run()){
            $this->load->model('contact_model');
            $this->contact_model->add_contact();
            $this->home();
        } else {
            $this->contact();
        }
    }
    
    public function about(){
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_about");
        $this->load->view("site_left");
        $this->load->view("site_right");
        $this->load->view("site_footer");
    }
    
    ###############PRODUCT PAGE#################
    
    public function product($id){
        $this->load->model("products_model");
        $data["results"] = $this->products_model->getOne($id);
        
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_product", $data);
        $this->load->view("site_left");
        $this->load->view("site_right");
        $this->load->view("site_footer");
    }
    
    ###############CATEGORY PAGE#################
    
    public function category($cat){
        $this->load->model("products_model");
        $data['results'] = $this->products_model->getDataCat($cat);
        
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_category", $data);
        $this->load->view("site_left");
        $this->load->view("site_right");
        $this->load->view("site_footer");
    }
    
    ###############LOGIN LOGOUT AND SIGNUP##################
    
    public function login(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|callback_validate_credentials');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if($this->form_validation->run()){
            $data = array (
                'email' => $this->input->post('email'),
                'is_logged_in' => 1
            );
            $this->session->set_userdata($data);
            redirect('main/home');
        }
        if($this->session->userdata('is_logged_in') || $this->session->userdata('is_admin_in')){
            redirect('main/home');
        }
        else {
            $this->load->view("site_header");
            $this->load->view("site_nav");
            $this->load->view("content_login");
            $this->load->view("site_left");
            $this->load->view("site_right");
            $this->load->view("site_footer");
        }
    }
    
    
    
    public function signup(){
        $this->load->view("site_header");
        $this->load->view("site_nav");
        if ($this->session->userdata('is_logged_in')){
            redirect('main/home');
        } else {
            $this->load->view('content_signup');
        }
        $this->load->view("site_left");
        $this->load->view("site_right");
        $this->load->view("site_footer");
    }
    
    public function signup_validation(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');
        $this->form_validation->set_message('is_unique','This email address is already in use.');
        
        if($this->form_validation->run()){
            $this->load->model('users_model');
            $this->users_model->add_user();
            $this->home();
        } else {
            $this->signup();
        }
    }
    
    public function validate_credentials(){
        $this->load->model('users_model');
        
        if ($this->users_model->can_log_in()){
            return true;
        } else {
            $this->form_validation->set_message('validate_credentials', 'Incorrect email/password');
            return false;
        }
        
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('main');
    }
    
    ###############ADMINISTRATION################
    
    public function admin(){

        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|callback_validate_credentials');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if($this->form_validation->run()){
            $data = array (
                'email' => $this->input->post('email'),
                'is_admin_in' => 1
            );
            $this->session->set_userdata($data);
            redirect('main/config');
        }
        if ($this->session->userdata('is_logged_in')){
            redirect('main');
        }
        if ($this->session->userdata('is_admin_in')){
            redirect('main/config');
        }
        else {
            $this->load->view("site_header");
            $this->load->view("site_nav");
            $this->load->view("content_admin");
            $this->load->view("site_left");
            $this->load->view("site_right");
            $this->load->view("site_footer");
        }
    }
    
    public function admin_validate_credentials(){
        $this->load->model('users_model');
        
        if ($this->users_model->admin_can_log_in()){
            return true;
        } else {
            $this->form_validation->set_message('validate_credentials', 'Incorrect email/password');
            return false;
        }
        
    }
    
    public function config(){
        if (! $this->session->userdata('is_admin_in'))
        {
            redirect('main/admin');
        }
        $this->load->model("products_model");
        $data['results'] = $this->products_model->getData();
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_config",$data);
        $this->load->view("site_left");
        $this->load->view("site_right");
        $this->load->view("site_footer");
    }
    
    public function submit_product(){
        $this->load->library('form_validation');
        
        $config['upload_path'] = 'images';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '2048';
        $config['max_height'] = '2048';
        $this->upload->initialize($config);
        
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'trim');
        
        if($this->form_validation->run()){
            $this->load->library('upload', $config);
            $this->upload->do_upload();
            $filename = $this->upload->data();
            $this->load->model('config_model');
            $this->config_model->add_product($filename);
            $this->home();
        } else {
            $this->admin();
        }
    }
    
    public function edit_product($id){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('price', 'Price', 'required|trim');
        if($this->form_validation->run()){
            $this->load->model("config_model");
            $this->config_model->edit($id);
        }
        redirect('main/config');
    }
    
    public function delete_product($id){
        $this->load->model("config_model");
        $this->config_model->delete($id);
        redirect('main/config');
    }
    
    public function view_messages(){
        if (! $this->session->userdata('is_admin_in'))
        {
            redirect('main');
        }
        $this->load->model('contact_model');
        $data['results'] = $this->contact_model->show();
        
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_messages",$data);
        $this->load->view("site_left");
        $this->load->view("site_right");
        $this->load->view("site_footer");
    }
    
    public function view_orders(){
        if (! $this->session->userdata('is_admin_in'))
        {
            redirect('main');
        }
        $this->load->model('deliveries_model');
        $data['results'] = $this->deliveries_model->show_deliveries();
        
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_deliveries",$data);
        $this->load->view("site_left");
        $this->load->view("site_right");
        $this->load->view("site_footer");
    }
        
    #################SHOPPING CART################
    
    public function add($id){
        $this->load->model("products_model");
        $row = $this->products_model->getDataId($id);
        $data = array(
            'id' => $row[0]['id'],
            'qty' => 1,
            'price' => $row[0]['price'],
            'name' => $row[0]['name']
        );
        $this->cart->insert($data);
        redirect('main/show');
    }
    
    public function show(){
        $this->load->view("site_header");
        $this->load->view("site_nav");
        $this->load->view("content_cart");
        $this->load->view("site_left");
        $this->load->view("site_right");
        $this->load->view("site_footer");
    }
    
    public function remove($id){
        $data = array(
            'rowid'   => $id,
            'qty'     => 0
        );

        $this->cart->update($data);
        redirect('main/show');
    }
    
    public function checkout(){
        if($this->cart->contents()){
            if($this->session->userdata('is_logged_in')){
                $this->load->model("users_model");
                $user = $this->users_model->get_user($this->session->userdata('email'));
                $data = array(
                    'email' => $user[0]['email'],
                    'address' => $user[0]['address'],
                    'cart' => serialize($this->cart->contents())
                );
                $this->load->model('deliveries_model');
                $order = $this->deliveries_model->add_delivery($data,$this->cart->total());
                if ($order == 1){
                    $this->cart->destroy();
                    $this->load->view("site_header");
                    $this->load->view("site_nav");
                    $this->load->view("content_checkout");
                    $this->load->view("site_left");
                    $this->load->view("site_right");
                    $this->load->view("site_footer");
                }
                else{
                    $this->load->view("site_header");
                    $this->load->view("site_nav");
                    $this->load->view("content_cart");
                    $this->load->view("site_left");
                    $this->load->view("site_right");
                    $this->load->view("site_footer");
                }
            } else{
                redirect('main/login');
            }
        } else {
            redirect('main');
        }
    }
}