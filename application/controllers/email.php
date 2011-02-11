<?php
class Email extends CI_Controller {
    function __construct() {
        parent::CI_Controller();
    }
    
    function index() {
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