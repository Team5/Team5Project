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
        if($this->logged_in == True && $this->type == "provider")
        {
            $enroll_users = $this->input->post('enroll_users');
            $is_ajax = $this->input->post('ajax');
    print_r($_POST);
            foreach($enroll_users as $en_user)
            {
                $user_prov = explode(',',$en_user);
                $this->enrollment_model->enroll($user_prov[0], $user_prov[1]);
            }

            if($is_ajax)
            {
                redirect('settings/provider');
            }
            else
            {
                redirect('settings/provider');
            }
        } else {
            // Possibly note unauthorised access
            redirect('home');
        }
    }

    function add_course()
    {
        if($this->logged_in == True && $this->type == "provider")
        {
            $date = getDate();
            $areas = array('arts', 'business', 'science', 'medicine');

            $sd = ($date['year']) - $this->input->post('start_year');
            $sd .= '-'.($this->input->post('start_month')+1);
            $sd .= '-'.($this->input->post('start_day')+1);

            $ed = ($date['year']) - $this->input->post('end_year');
            $ed .= '-'.($this->input->post('end_month')+1);
            $ed .= '-'.($this->input->post('end_day')+1);

            $course = array(
                'title'       => $this->input->post('title'),
                'pid'         => $this->uid,
                'rid'         => $this->input->post('rid'),
                'area'        => $areas[$this->input->post('area')],
                'start_date'  => $sd,
                'end_date'    => $ed,
                'description' => $this->input->post('description')
            );

            echo $this->courses_model->add($course) ? 'SUCCESS': 'FAIL';
        } else {
            redirect('home');
        }
    }
}