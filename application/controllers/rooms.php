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

class Rooms extends SC_Controller {

    /**
     * index
     * 
     * Courses default page: List courses ordered by area
     */
    function index()
    {
        $this->template_data['page_title'] = 'Rooms';
        $this->template_data['choice']     = 'Rooms';
        // Map of areas mapped to arrays of courses in those areas
        $data['rooms'] = $this->rooms_model->get_all();
        
        // Set view for content section of template
        $this->template_data['content'] = 'collection/rooms';
        // Set data for view for content section of template
        $this->template_data['content_data'] = $data;
        $this->load->view('template', $this->template_data);
    }
}