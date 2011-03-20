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
 * Home Controller Class
 *
 * @package     UCCSC
 * @subpackage	Controllers
 * @author	Team 5
 * @todo If we don't want a contact form we can have contact page served from here.
 */
class Home extends SC_Controller {

    /**
     * Default function of Home Controller
     *
     * @access public
     */
    function index()
    {
        $this->template_data['page_title'] = 'Welcome';
        $this->template_data['choice']     = 'Home';
		$this->template_data['content']     = 'static/home';
        $this->load->view('template', $this->template_data);
    }
}