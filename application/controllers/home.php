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
 * Home Controller Class
 *
 * @package     UCCSC
 * @subpackage	Controllers
 * @author	Team 5
 */
class Home extends CI_Controller {
    
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
        $this->template_data['header_data']  = array(
            'page_title' => 'Welcome',
            'choice'     => 'Home',
            'name'       => $this->name,
            'logged_in'  => $this->logged_in
        );
    }

    /**
     * Default function of Home Controller
     *
     * @access public
     */
    function index()
    {
        $this->load->view('template', $this->template_data);
    }
    
    /**
     * About page
     *
     * @access public
     */
    function about()
    {
        $this->template_data['header_data']['page_title'] = 'About Us';
        $this->template_data['header_data']['choice']     = 'About';
        $this->load->view('template', $this->template_data);
    }

    /**
     * Help page
     *
     * @access public
     */    
    function help()
    {
        $this->template_data['header_data']['page_title'] = 'Help';
        $this->template_data['header_data']['choice']     = 'Help';
        $this->load->view('template', $this->template_data);
    }
}