<?php
class About extends SC_Controller {
	function __construct()
	{
            parent::__construct();

            $this->template_data['page_title'] = 'About';
            $this->template_data['choice']     = 'About';
            $this->template_data['left_side_info']	= 'static/about_left';
	}

	function index()
	{
            $this->template_data['content'] = 'static/about';
            $this->template_data['left_side_info_data']['left_choice'] = 'about';
            $this->load->view('template', $this->template_data);
	}
	
	function office()
	{
            $this->template_data['content'] = 'static/office';
            $this->template_data['left_side_info_data']['left_choice'] = 'about/office';
            $this->load->view('template', $this->template_data);
	}
	
	function facts()
	{
            $this->template_data['content'] = 'static/facts';
            $this->template_data['left_side_info_data']['left_choice'] = 'about/facts';
            $this->load->view('template', $this->template_data);
	}
	
	function maps()
	{
            $this->template_data['content'] = 'static/maps';
            $this->template_data['left_side_info_data']['left_choice'] = 'about/maps';
            $this->load->view('template', $this->template_data);
	}
	
}
