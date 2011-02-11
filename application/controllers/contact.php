<?php

class Contact extends CI_Controller {
    /**
     * Constructor
     */
    function __construct()
    {
        // Call CI_Controller::__construct() so $this is still a CI_Controller
        parent::__construct();
        $this->email = $this->session->userdata('email');
        $this->name = $this->session->userdata('name');
        $this->logged_in = $this->session->userdata('logged_in');
        
        // Setup $header_data for the view header.php that 'template.php' calls
        $this->template_data['header_data'] = array(
            'page_title' => 'Contact Us',
            'choice'     => 'Contact',
            'name'       => $this->name,
            'logged_in'  => $this->logged_in
        );
    }
    
    /**
     *
     */
    function index()
    {
        $this->template_data['content'] = 'form/contact';
        $this->load->view('template', $this->template_data);
    }
    
    function submit()
    {
        $name  = $this->input->post('name');
        $email = $this->input->post('email');
        $message = $this->input->post('message');
        
        $is_ajax = $this->input->post('ajax');
        
        if($is_ajax)
        {
            echo "Thank You! {$name}, {$email}, {$message}";
        }
        else
        {
            $this->template_data['content'] = 'form/contact';
            $this->load->view('template', $this->template_data);
        }
    }
}