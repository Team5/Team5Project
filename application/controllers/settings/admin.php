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

class Admin extends SC_Controller {
    
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
            $this->template_data['page_title'] = 'ADMIN';
            $this->template_data['choice']     = 'Home';
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
    function list_users()
    {
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            $data['users'] = $this->users_model->get_all();

            $this->template_data['page_title'] = 'ADMIN';
            $this->template_data['choice']     = 'Home';
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
    function list_courses()
    {
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            $data['courses'] = array(
                'All' => $this->courses_model->get_all()
            );

            $this->template_data['page_title'] = 'ADMIN';
            $this->template_data['choice']     = 'Home';
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
    function list_rooms()
    {
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            $data['rooms'] = $this->rooms_model->get_all();

            $this->template_data['page_title'] = 'ADMIN';
            $this->template_data['choice']     = 'Home';
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
                $areas = array('arts', 'business', 'science', 'medicine');
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
     * Course options, add, delete, update
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
                    'pid'         => $this->input->post('pid'),
                    'rid'         => $this->input->post('rid'),
                    'area'        => $areas[$this->input->post('area')],
                    'description' => $this->input->post('description')
                );
                print_r($course);
                if($this->input->post('cid') != NULL)
                {
                    $course['cid'] = $this->input->post('cid');
                }
                $task = $tasks[$this->input->post('task')];

                if($task == 'add')
                {
                    echo $this->courses_model->add($course) ? 'SUCCESS': 'FAIL';
                }
                else if($task == 'update')
                {
                    echo $this->courses_model->update($course['cid'], $course);
                }
                else if($task == 'delete')
                {
                    echo $this->courses_model->delete($course['cid']);
                }
            }
        }
        else
        {
            redirect('settings/admin');
        }
    }

    /**
     * room
     *
     * room options, add, delete, update
     *
     * @todo add room modifications
     */
    function room()
    {
        if($this->logged_in && $this->email==ADMIN_EMAIL)
        {
            if($this->input->post('submit') == 'fire')
            {
                $tasks = array('add', 'update', 'delete');
                
                $room = array(
                );

                if($this->input->post('rid') != NULL)
                {
                    $course['rid'] = $this->input->post('rid');
                }
                $task = $tasks[$this->input->post('task')];

                if($task == 'add')
                {
                    echo $this->rooms_model->add($course) ? 'SUCCESS': 'FAIL';
                }
                else if($task == 'update')
                {
                    echo $this->rooms_model->update($course['cid'], $course);
                }
                else if($task == 'delete')
                {
                    echo $this->rooms_model->delete($course['cid']);
                }
            }
        }
        else
        {
            redirect('settings/admin');
        }
    }
}