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
 * Course News Controller Class
 *
 * @package     UCCSC
 * @subpackage	Controllers
 * @author	Team 5
 */
class News extends CI_Controller {

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
        $this->template_data = array(
            'page_title' => 'News',
            'choice'     => 'News',
            'type'       => $this->type,
            'name'       => $this->name,
            'email'      => $this->email,
            'logged_in'  => $this->logged_in
        );
    }

    /**
     * index
     * 
     * Provides news items about course availability
     * 
     * @access public
     */
    function index()
    {
        $this->load->library('pagination');
        $config['base_url']   = base_url().'/news/index';
        $config['total_rows'] = $this->db->get('news')->num_rows();
        $config['per_page']   = ROWS_PER_PAGE;
        
        $this->pagination->initialize($config);
        
        $data['news_articles'] = $this->news_model->get_all($config['per_page'], $this->uri->segment(3)) ;
        foreach($data['news_articles'] as $article)
        {
            $provider_id = $article->provider_id;
            $name = $this->users_model->get($provider_id,'name');
            $article->author = $name->name;
        }

        $this->template_data['content']      = 'collection/articles';
        $this->template_data['content_data'] = $data;

        $this->load->view('template', $this->template_data);
    }

    /**
     * by_user
     * 
     * Provides news items about course availability
     * 
     * @access public
     */
    function by_user($uid=0)
    {
        if($uid == 0)
        {
            redirect('news');
        }
        $this->load->library('pagination');
        $config['base_url']   = base_url().'/news/index/'.$uid;
        $config['total_rows'] = $this->db->get('news')->num_rows();
        $config['per_page']   = ROWS_PER_PAGE;
        
        $this->pagination->initialize($config);

        $data['news_articles'] = $this->news_model->get_by_user($uid, $config['per_page'], $this->uri->segment(4)) ;
        if(count($data['news_articles'])>0)
        {
            $provider_id = $data['news_articles'][0]->provider_id;
            $name = $this->users_model->get($provider_id, 'name');
            $name = $name->name;
            foreach($data['news_articles'] as $article)
            {
                $article->author = $name;
            }
        }
        $this->template_data['page_title']   = 'News by '.$name;
        $this->template_data['content']      = 'collection/articles';
        $this->template_data['content_data'] = $data;

        $this->load->view('template', $this->template_data);
    }
}