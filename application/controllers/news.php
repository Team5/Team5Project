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

class News extends SC_Controller {

    /**
     * index
     * 
     * Provides news items about course availability
     * 
     * @access public
     */
    function index()
    {
        $this->template_data['page_title'] = 'News';
        $this->template_data['choice']     = 'News';

        $this->load->library('pagination');
        $config['base_url']   = base_url().'/news/index';
        $config['total_rows'] = $this->db->get('news')->num_rows();
        $config['per_page']   = ROWS_PER_PAGE;
        
        $this->pagination->initialize($config);
        
        $data['news_articles'] = $this->news_model->get_all($config['per_page'], $this->uri->segment(3)) ;
        foreach($data['news_articles'] as $article)
        {
            $provider_id = $article->provider_id;
            $name = $this->users_model->get($provider_id, 'fname,sname');
            $article->author = $name->sname . ', '. $name->fname;;
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
            $name = $this->users_model->get($provider_id, 'fname,sname');
            $name = $name->sname . ', '. $name->fname;
            foreach($data['news_articles'] as $article)
            {
                $article->author = $name;
            }
        }
        $this->template_data['page_title']   = 'News by '.$name;
        $this->template_data['choice']       = 'News';
        $this->template_data['content']      = 'collection/articles';
        $this->template_data['content_data'] = $data;

        $this->load->view('template', $this->template_data);
    }
}