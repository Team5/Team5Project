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
 * Rooms Controller Class
 *
 * @package     UCCSC
 * @subpackage	Controllers
 * @author	Team 5
 */
class Rooms extends CI_Controller {
    
    /**
     * Construct
     */
    function __construct()
    {
        // Call CI_Controller::__construct() so $this is still a CI_Controller
        parent::__construct();
        $this->email = $this->session->userdata('email');
        $this->name = $this->session->userdata('name');
        $this->type  = $this->session->userdata('type');
        $this->logged_in = $this->session->userdata('logged_in');
        
        // Setup $header_data for the view header.php that 'template.php' calls
        $this->template_data  = array(
            'page_title' => 'Rooms',
            'choice'     => 'Rooms',
            'type'       => $this->type,
            'name'       => $this->name,
            'email'      => $this->email,
            'logged_in'  => $this->logged_in
        );
    }


    /**
     * index
     * 
     * Courses default page: List courses ordered by area
     */
    function index()
    {
        // Map of areas mapped to arrays of courses in those areas
        $data['rooms'] = $this->rooms_model->get_all();
        
        // Set view for content section of template
        $this->template_data['content'] = 'collection/rooms';
        // Set data for view for content section of template
        $this->template_data['content_data'] = $data;
        $this->load->view('template', $this->template_data);
    }
}