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
class Courses extends SC_Controller {

    /**
     * index
     * 
     * Courses default page: List courses ordered by area
     */
    function index()
    {
        // Map of areas mapped to arrays of courses in those areas
        $data['courses'] = array(
            'arts'     => array('Arts, Celtic Studies and Social Sciences',
                                $this->courses_model->get_by_area('arts')),
            'business' => array('Business and Law',
                                $this->courses_model->get_by_area('business')),
            'medicine' => array('Medicine and Health',
                                $this->courses_model->get_by_area('medicine')),
            'science'  => array('Science, Engineering and Food Science',
                                $this->courses_model->get_by_area('science'))
        );
        $data['type'] = $this->type;

        $this->template_data['page_title'] = 'Courses';
        $this->template_data['choice'] = 'Courses';

        // Set view for content section of template
        $this->template_data['content'] = 'collection/courses';
        // Set data for view for content section of template
        $this->template_data['content_data'] = $data;
        $this->load->view('template', $this->template_data);
    }
    
    /**
     * by_id
     * 
     * Provides information about $cid
     *
     * @access public
     * param integer $cid the ID number of the requested course
     */
    function by_id($cid)
    {
        // Get the course details from the model
        $course = $this->courses_model->get($cid);
        // If something of use was returned set up header_data and content_data
        if($course != NULL)
        {
            $this->template_data['page_title'] = 'Course: '.$course->title;
            $this->template_data['content_data']['course'] = $course;
        }
        $this->template_data['content'] = 'item/course';
        $this->load->view('template', $this->template_data);
    }

    /**
     * apply
     *
     * Apply this user for list of courses $_POST['selected_courses']
     *
     * @access public
     */
    function apply()
    {
        if($this->type == 'user' && $this->input->post('Submit'))
        {
            foreach($this->input->post('selected_courses') as $cid)
            {
                if($this->courses_model->increment_enrollment_count($cid))
                {
                    $this->enrollment_model->apply($this->uid, $cid);
                }
            }
        } else {
            redirect('home');
        }
    }
}