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
 * Admin Controller Class
 *
 * @package     UCCSC
 * @subpackage	Controllers
 * @author	Team 5
 */
class Admin extends CI_Controller {
    
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
            'page_title' => 'ADMIN',
            'choice'     => 'Home',
            'type'       => $this->type,
            'name'       => $this->name,
            'email'      => $this->email,
            'logged_in'  => $this->logged_in
        );
    }
    
    /**
     * Admin page
     *
     * Provides admin utilities to the admin user(only)
     */
    function index()
    {
        // If logged_in and admin user
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            // Set the view to be used in the content section of the page
            $this->template_data['content'] = 'settings/admin';
            $this->load->view('template',$this->template_data);
        }
        else
        {
            // Go home
            redirect('home');
        }
    }


    /*-----------------------------------------------------------------------
     *
     * Pages for listing Information
     *
     *-----------------------------------------------------------------------*/

    /**
     * users
     *
     * Provides list of users and details about them
     */
    function users()
    {
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            $data['users'] = $this->users_model->get_all();

            $this->template_data['content'] = 'collection/users';
            $this->template_data['content_data'] = $data;
            $this->load->view('template', $this->template_data);
        }
        else
        {
            redirect('home');
        }
    }


    /**
     * courses
     *
     * Provides list of all courses
     */
    function courses()
    {
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            $data['courses'] = array(
                'All' => $this->courses_model->get_all()
            );

            $this->template_data['content'] = 'collection/courses';
            $this->template_data['content_data'] = $data;
            $this->load->view('template', $this->template_data);
        }
        else
        {
            redirect('home');
        }
    }

    /**
     * Provides list of all rooms
     */
    function rooms()
    {
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            $data['rooms'] = $this->rooms_model->get_all();

            $this->template_data['content'] = 'collection/rooms';
            $this->template_data['content_data'] = $data;
            $this->load->view('template', $this->template_data);
        }
        else
        {
            redirect('home');
        }
    }

    /*-----------------------------------------------------------------------
     *
     * Pages for changing information
     *
     *-----------------------------------------------------------------------*/

    /*-----------------------------------------------------------------------
     *
     * Pages for changing information
     *
     *-----------------------------------------------------------------------*/

    /**
     * user
     *
     * User options, add, delete, update
     */
    function user()
    {
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            if($this->input->post('submit') == 'fire')
            {
                $tasks = array('add', 'update', 'delete');
                $types = array('user', 'provider');
                $areas = array('general', 'science', 'languages');
                $user = array(
                    'name'     => $this->input->post('name'),
                    'email'    => $this->input->post('email'),
                    'password' => md5($this->input->post('pass')),
                    'type'     => $types[$this->input->post('type')],
                    'area'     => $areas[$this->input->post('area')]
                );
                if($this->input->post('uid') != NULL)
                {
                    $user['uid'] = $this->input->post('uid');
                }
                $task = $tasks[$this->input->post('task')];

                if($task == 'add')
                {
                    echo $this->users_model->add($user);
                }
                else if($task == 'update')
                {
                    echo $this->users_model->update($user['uid'], $user);
                }
                else if($task == 'delete')
                {
                    echo $this->users_model->delete($user['uid']);
                }
            }
        }
        else
        {
            redirect('settings/admin');
        }
    }

    /**
     * course
     *
     * User options, add, delete, update
     */
    function course()
    {
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            if($this->input->post('submit') == 'fire')
            {
                $tasks = array('add', 'update', 'delete');
                $areas = array('general', 'science', 'languages');
                $course = array(
                    'title'       => $this->input->post('title'),
                    'short_title'  => $this->input->post('short_title'),
                    'provider_id' => $this->input->post('provider_id'),
                    'area'        => $areas[$this->input->post('area')],
                    'description' => $this->input->post('description')
                );
                print_r($course);
                if($this->input->post('course_id') != NULL)
                {
                    $course['course_id'] = $this->input->post('course_id');
                }
                $task = $tasks[$this->input->post('task')];

                if($task == 'add')
                {
                    echo $this->courses_model->add($course) ? 'SUCCESS': 'FAIL';
                }
                else if($task == 'update')
                {
                    echo $this->courses_model->update($course['course_id'], $course);
                }
                else if($task == 'delete')
                {
                    echo $this->courses_model->delete($course['course_id']);
                }
            }
        }
        else
        {
            redirect('settings/admin');
        }
    }
}