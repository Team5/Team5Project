<?php
/**
 * UCC Summer Courses
 *
 * A summer course advertisment and enrollment site.
 *
 * @package		UCCSC
 * @author		Team 5
 * @copyright           Copyright (c) 2011
 * @since		Version 0.1
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Contact Controller Class
 *
 * @package     UCCSC
 * @subpackage	Controllers
 * @author	Team 5
 * @todo Do we want this at all? Contact details may be enough
 */
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

    function send()
    {
        $config = array(
            'protocol'   => 'smtp',
            'smtp_host'  => 'ssl://smtp.googleemail.com',
            'smtp_port'  => 465,
            'smtp_email' => 'blah@gmail.com',
            'smtp_pass'  => 'asdsdsd',
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from('blah@gmail.com', 'Dr. Blah McMleh');
        $this->email->to('blah@gmail.com');
        $this->email->subject('This is an email test.');
        $this->email->message("It's working");

        // 'server_root' is set in config.php with $config['server_root'] = $_SERVER['DOCUMENT_ROOT']
        $path = $this->config->item('server_root') ;
        $file = $path . '/ci_day3/attachments/yourInfo.txt' ;

        $this->email->attach($file) ;

        if($this->email->send()) {
            echo "EMAIL SENT!" ;
        } else {
            show_error($this->email->print_debugger()) ;
        }
    }
}