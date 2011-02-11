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
class Provider extends CI_Controller {
    
    /**
     * Constructor
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
     * Default Provider page
     *
     * @access public
     */
    function index()
    {
        
        $this->template_data['page_title']   = 'Provider';
        $this->template_data['content']      = 'settings/provider';
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
        
        $this->template_data['page_title']   = 'Provider';
        $this->template_data['content']      = 'settings/provider';
        $this->template_data['content_data'] = $data;
        $this->load->view('template', $this->template_data);
    }
}