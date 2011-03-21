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
 * User Controller Class
 *
 * @package     UCCSC
 * @subpackage	Controllers
 * @author	Team 5
 */
class User extends SC_Controller {
    
    /**
     * Default User settings page
     *
     * @access public
     */
    function index()
    {
        $this->template_data['page_title'] = 'User Control';
        $this->template_data['choice']     = 'Home';
        $this->template_data['content']    = 'settings/user';

        $applied_cids   = $this->enrollment_model->get_applied_courses($this->uid);
        $enrolled_cids += $this->enrollment_model->get_enrolled_courses($this->uid);

        $applied_courses = array();
        foreach($applied_cids as $cid)
        {
            $applied_courses []= $this->courses_model->get($cid);
        }

        $enrolled_courses = array();
        foreach($enrolled_cids as $cid)
        {
            $enrolled_courses []= $this->courses_model->get($cid);
        }
        
        $this->template_data['courses'] = $courses ;

        $this->load->view('template', $this->template_data);
    }
}