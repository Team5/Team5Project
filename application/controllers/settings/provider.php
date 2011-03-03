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
 * Course Provider Controller Class
 *
 * @package     UCCSC
 * @subpackage	Controllers
 * @author	Team 5
 */
class Provider extends SC_Controller {
    
    /**
     * Default Provider page
     *
     * @access public
     */
    function index()
    {
        $this->template_data['page_title'] = 'Provider';
        $this->template_data['choice']     = 'Home';
        $this->template_data['content']    = 'settings/provider';

        $courses = $this->courses_model->get_by_provider($this->uid);
        foreach($courses as $course)
        {
            $applied_uids  = $this->enrollment_model->get_applied_users($course->cid);
            $enrolled_uids = $this->enrollment_model->get_enrolled_users($course->cid);
            $course->applied = array();
            $course->enrolled = array();
            foreach($applied_uids as $user)
            {
                $course->applied[] = $this->users_model->get($user);
            }
            foreach($enrolled_uids as $user)
            {
                $course->enrolled[] = $this->users_model->get($user);
            }
        }
        
        $this->template_data['courses'] = $courses ;

        $this->load->view('template', $this->template_data);
    }


    function enroll()
    {
        $enroll_users = $this->input->post('enroll_users');
        $is_ajax = $this->input->post('ajax');

        foreach($enroll_users as $en_user)
        {
            $user_prov = explode(',',$en_user);
            $this->enrollment_model->enroll($user_prov[0], $user_prov[1]);
        }

        if($is_ajax)
        {
            echo "Gibbrish1";
        }
        else
        {
            echo "Gibbrish2";
        }
    }
}