<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;
		
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->_base_classes =& is_loaded();

		$this->load->_ci_autoloader();

		log_message('debug', "Controller Class Initialized");

	}

	public static function &get_instance()
	{
		return self::$instance;
	}
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */

class SC_Controller extends CI_Controller {
    function  __construct()
    {
        parent::__construct();

        $this->email = $this->session->userdata('email');
        $this->name = $this->session->userdata('name');
        $this->type  = $this->session->userdata('type');
        $this->uid  = $this->session->userdata('uid');
        $this->logged_in = $this->session->userdata('logged_in');

        // Setup $header_data for the view header.php that 'template.php' calls
        $this->template_data  = array(
            'page_title' => 'Welcome',
            'choice'     => 'Home',
            'type'       => $this->type,
            'name'       => $this->name,
            'email'      => $this->email,
            'logged_in'  => $this->logged_in
        );
    }
}