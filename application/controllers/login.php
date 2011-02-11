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
 * Login Controller Class
 *
 * @package     UCCSC
 * @subpackage	Controllers
 * @author	Team 5
 */
class Login extends CI_Controller {

    /**
     * Construct
     */
    function __construct()
    {
        // Call CI_Controller::__construct() so $this is still a CI_Controller
        parent::__construct();
        $this->email = $this->session->userdata('email');
        $this->name = $this->session->userdata('name');
        $this->logged_in = $this->session->userdata('logged_in');
        
        // Setup $header_data for the view header.php that 'template.php' calls
        $this->template_data['header_data']   = array(
                'page_title' => 'Welcome',
                'choice'     => 'Home',
                'logged_in'  => $this->logged_in,
                'name'       => $this->name
        );
    }
    
    /**
     * Controller for login
     *
     * @access public
     * 
     */
    function index()
    {
        redirect('home');
    }
    
    /**
     * validate_credentials
     *
     * logs the user into the system and sets up the cookie
     */
    function validate_credentials()
    {
        // If we can find this user we get user data, if not we get FALSE
        if($user = $this->users_model->validate($this->input->post('email'),
                                                $this->input->post('pass')))
        {
            $data = array(
                'email' => $user[0]->email,
                'name'  => $user[0]->name,
                'logged_in' => TRUE
            );
            // adds email, name and logged_in to the user cookie
            $this->session->set_userdata($data);
        }
        redirect('home');
    }
    
    /**
     * register
     *
     * Open up the regitration page
     */
    function register()
    {
        $this->template_data['header_data'] = array('page_title' => 'Welcome', 'choice' => 'Home');
        $this->template_data['content'] = 'form/register';
        $this->load->view('template', $this->template_data);
    }
    
    /**
     * create_user
     * 
     * validates _POST[] data and if valid adds user to database
     */
    function create_user()
    {
        $this->load->library('form_validation');
        // Set rules for different form settings
        $this->form_validation->set_rules('name', 'Full Name',
                                          'trim|required');
        $this->form_validation->set_rules('email', 'Email Address',
                                          'trim|required|valid_email');
        
        $this->form_validation->set_rules('pass', 'Password',
                                          'alpha_numeric|trim|required|min_length[6]|max_length[32]');
        $this->form_validation->set_rules('pass2', 'Password Confirmation',
                                          'alpha_numeric|trim|required|matches[pass]');
        
        // If all settings are valid AND (then)the user has been added go home
        // $this->input->post() sanitises(injection and XSS filtering) _POST[] data
        if($this->form_validation->run() &&
           $this->users_model->add($this->input->post('name'),
                                   $this->input->post('email'),
                                   $this->input->post('pass'),
                                   $this->input->post('type'),
                                   $this->input->post('area'),
                                   $this->input->post('dob')))
        {
            redirect('home');
        }
        else
        {
            // Spit invalid user back to register page, $this->form_validation
            // has been updated and so validation_errors() can give feedback
            $this->template_data['content'] = 'form/register';
            $this->load->view('template', $this->template_data);
        }
    }
    
    /**
     * logout
     *
     * Log the user out of the system and send them back to home page
     *
     * @access public
     */
    function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}