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
 * Courses Controller Class
 *
 * @package     UCCSC
 * @subpackage	Controllers
 * @author	Team 5
 */
class Courses extends CI_Controller {
    
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
            'page_title' => 'Courses',
            'choice'     => 'Courses',
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
        $data['courses'] = array(
            'Science'   => $this->courses_model->get_by_area('science'),
            'Languages' => $this->courses_model->get_by_area('languages'),
        );
        
        // Set view for content section of template
        $this->template_data['content'] = 'collection/courses';
        // Set data for view for content section of template
        $this->template_data['content_data'] = $data;
        $this->load->view('template', $this->template_data);
    }
    
    /**
     * by_area
     *
     * List courses from a specific area
     * 
     * @access public
     * @param string $area The area to
     * @deprecated This may be redundant due to the new layout of the default courses page
     */
    function by_area($area="all")
    {
        // Spit user back to 'courses' page if no $area selected
        if($area=="all")
        {
            redirect('courses');
        }
        
        $data['courses'][$area] = $this->courses_model->get_by_area($area);
        
        $this->template_data['page_title'] = 'Courses in area: '.$area;
        $this->template_data['content']       = 'collection/courses';
        $this->template_data['content_data']  = $data;

        $this->load->view('template', $this->template_data);
    }
    
    /**
     * by_id
     * 
     * Provides information about $course_id
     *
     * @access public
     * param integer $course_id the ID number of the requested course
     */
    function by_id($course_id)
    {
        // Get the course details from the model
        $course = $this->courses_model->get($course_id);
        // If something of use was returned set up header_data and content_data
        if($course != NULL)
        {
            $this->template_data['page_title'] = 'Course: '.$course->title;
            $this->template_data['content_data']['course'] = $course;
        }
        $this->template_data['content'] = 'item/course';
        $this->load->view('template', $this->template_data);
    }
}