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
 * Admin Controller Class
 *
 * @package     UCCSC
 * @subpackage	Controllers
 * @author	Team 5
 */
class Admin extends CI_Controller {
    
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
        $this->template_data['header_data']  = array(
            'page_title' => 'ADMIN',
            'choice'     => 'Home',
            'name'       => $this->name,
            'logged_in'  => $this->logged_in
        );
    }
    
    /**
     * Admin page
     *
     * Provides admin utilities to the admin user(only)
     */
    function index()
    {
        // If logged_in and admin user
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            // Set the view to be used in the content section of the page
            $this->template_data['content'] = 'settings/admin';
            $this->load->view('template',$this->template_data);
        }
        else
        {
            // Go home
            redirect('home');
        }
    }
    
    /**
     * users
     *
     * Provides list of users and details about them
     */
    function users()
    {
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            $data['users'] = $this->users_model->get_all();

            $this->template_data['content'] = 'collection/users';
            $this->template_data['content_data'] = $data;
            $this->load->view('template', $this->template_data);
        }
        else
        {
            redirect('home');
        }
    }
    
    function courses()
    {
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            $data['courses'] = array(
                'All' => $this->courses_model->get_all()
            );

            $this->template_data['content'] = 'collection/courses';
            $this->template_data['content_data'] = $data;
            $this->load->view('template', $this->template_data);
        }
        else
        {
            redirect('home');
        }
    }
    
    function rooms()
    {
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            $data['rooms'] = $this->rooms_model->get_all();

            $this->template_data['content'] = 'collection/rooms';
            $this->template_data['content_data'] = $data;
            $this->load->view('template', $this->template_data);
        }
        else
        {
            redirect('home');
        }
    }
}