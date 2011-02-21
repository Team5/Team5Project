<?php

class Contact extends SC_Controller {

    /**
     *
     */
    function index()
    {
        $this->template_data['page_title'] = 'Contact Us';
        $this->template_data['choice']     = 'Contact';
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
            $this->template_data['page_title'] = 'Contact Us';
            $this->template_data['choice']     = 'Contact';
            $this->template_data['content'] = 'form/contact';
            $this->load->view('template', $this->template_data);
        }
    }
}