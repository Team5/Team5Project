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
     * by_area
     *
     * List courses from a specific area
     * 
     * @access public
     * @param string $area The area to
     * @deprecated This may be redundant due to the new layout of the default courses page
     * @todo decide whether to completely get rid of this
     */
    function by_area($area="all")
    {
        if($area == 'arts')
        {
            $data['courses'][$area] = array('Arts, Celtic Studies and Social Sciences');
        } elseif($area == 'business') {
            $data['courses'][$area] = array('Business and Law');
        } elseif($area == 'medicine') {
            $data['courses'][$area] = array('Medicine and Health');
        } elseif($area == 'science') {
            $data['courses'][$area] = array('Science, Engineering and Food Science');
        } else {
            redirect('courses');
        }
        $data['courses'][$area][1] = $this->courses_model->get_by_area($area);
        $this->template_data['page_title'] = 'Courses in area: '.$area;
        $this->template_data['content']       = 'collection/courses';
        $this->template_data['content_data']  = $data;

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

    function apply()
    {
        if($this->input->post('Submit'))
        {
            foreach($this->input->post('selected_courses') as $cid)
            {
                if($this->courses_model->get($cid))
                {
                    $this->enrollment_model->apply($this->uid, $cid);
                }
            }
        } else {
            redirect('home');
        }
    }
}