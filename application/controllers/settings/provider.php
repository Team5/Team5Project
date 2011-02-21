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
        $this->load->view('template', $this->template_data);
    }
    
    /**
     * get_enrolled
     *
     * Page listing all users enrolled in project $cid
     *
     * @access public
     * @param integer $cid Course ID
     */
    function get_enrolled($cid)
    {
        $uids = $this->courses_model->get_enrolled($cid) ;
        foreach($uids as $uid)
        {
            $data['users'][] = $this->users_model->get($uid);
        }
        
        $this->template_data['page_title'] = 'Provider';
        $this->template_data['choice']     = 'Home';
        $this->template_data['content']      = 'settings/provider';
        $this->template_data['content_data'] = $data;
        $this->load->view('template', $this->template_data);
    }
}