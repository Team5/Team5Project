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
class Home extends SC_Controller {

    /**
     * Default function of Home Controller
     *
     * @access public
     */
    function index()
    {
        $this->template_data['page_title'] = 'Welcome';
        $this->template_data['choice']     = 'Home';
        $this->load->view('template', $this->template_data);
    }
    
    /**
     * About page
     *
     * @access public
     */
    function about()
    {
        $this->template_data['page_title'] = 'About Us';
        $this->template_data['choice']     = 'About';
        $this->load->view('template', $this->template_data);
    }

    /**
     * Help page
     *
     * @access public
     */    
    function help()
    {
        $this->template_data['page_title'] = 'Help';
        $this->template_data['choice']     = 'Help';
        $this->load->view('template', $this->template_data);
    }

    /**
     * Contact page
     *
     * @access public
     */
    function contact()
    {
        $this->template_data['page_title'] = 'Contact Us';
        $this->template_data['choice']     = 'Contact';
        $this->load->view('template', $this->template_data);
    }
}