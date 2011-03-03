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
 * Login Controller Class
 *
 * @package     UCCSC
 * @subpackage	Controllers
 * @author	Team 5
 */
class Login extends SC_Controller {

    /**
     * Controller for login
     *
     * @access public
     * 
     */
    function index()
    {
        redirect('home');
    }
    
    /**
     * validate_credentials
     *
     * logs the user into the system and sets up the cookie
     */
    function validate_credentials()
    {
        // If we can find this user we get user data, if not we get FALSE
        if($user = $this->users_model->validate($this->input->post('email'),
                                                $this->input->post('pass')))
        {
            $data = array(
                'uid'   => $user[0]->uid,
                'email' => $user[0]->email,
                'type'  => $user[0]->type,
                'name'  => $user[0]->fname . ' ' . $user[0]->sname,
                'logged_in' => TRUE
            );
            // adds email, name and logged_in to the user cookie
            $this->session->set_userdata($data);
        }
        redirect('home');
    }
    
    /**
     * register
     *
     * Open up the regitration page
     */
    function register()
    {
        $this->template_data['page_title'] = 'Welcome';
        $this->template_data['choice']     = 'Home';
        $this->template_data['content'] = 'form/register';
        $this->load->view('template', $this->template_data);
    }
    
    /**
     * create_user
     * 
     * validates _POST[] data and if valid adds user to database
     */
    function create_user()
    {
        $this->load->library('form_validation');
        // Set rules for different form settings
        $this->form_validation->set_rules('fname', 'First Name',
                                          'trim|required');
        $this->form_validation->set_rules('sname', 'Surname',
                                          'trim|required');
        $this->form_validation->set_rules('email', 'Email Address',
                                          'trim|required|valid_email');

        $this->form_validation->set_rules('dob_day', 'Day of Birth',
                                          'trim|required|integer');
        $this->form_validation->set_rules('dob_month', 'Month of Birth',
                                          'trim|required|integer');
        $this->form_validation->set_rules('dob_year', 'Year of Birth',
                                          'trim|required|integer');

        $this->form_validation->set_rules('type', "User Type",
                                          'trim|required|integer');
        $this->form_validation->set_rules('area', "User Area",
                                          'trim|required|integer');

        $this->form_validation->set_rules('pass', 'Password',
                                          'alpha_numeric|trim|required|min_length[6]|max_length[32]');
        $this->form_validation->set_rules('pass2', 'Password Confirmation',
                                          'alpha_numeric|trim|required|matches[pass]');
        
        // If all settings are valid AND (then)the user has been added go home
        // $this->input->post() sanitises(injection and XSS filtering) _POST[] data
        if($this->form_validation->run())
        {
            $date = getDate();

            $dob = ($date['year']-17) - $this->input->post('dob_year');
            $dob .= '-'.($this->input->post('dob_month')+1);
            $dob .= '-'.($this->input->post('dob_day')+1);

            $types = array('user', 'provider');
            $areas = array('general','science','languages');

            if($this->users_model->add($this->input->post('fname'),
                                       $this->input->post('sname'),
                                       $this->input->post('email'),
                                       $this->input->post('pass'),
                                       $types[$this->input->post('type')],
                                       $areas[$this->input->post('area')],
                                       $dob))
            {
                redirect('home');
            }
            else
            {
                $this->template_data['page_title'] = 'Welcome';
                $this->template_data['choice']     = 'Home';
                $this->template_data['content'] = 'form/register';
                $this->load->view('template', $this->template_data);
            }
        }
        else
        {
            // Spit invalid user back to register page, $this->form_validation
            // has been updated and so validation_errors() can give feedback
            $this->template_data['page_title'] = 'Welcome';
            $this->template_data['choice']     = 'Home';
            $this->template_data['content'] = 'form/register';
            $this->load->view('template', $this->template_data);
        }
    }
    
    /**
     * logout
     *
     * Log the user out of the system and send them back to home page
     *
     * @access public
     */
    function logout()
    {
        $this->session->sess_destroy();
        redirect('home');
    }
}