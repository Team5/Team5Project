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
 * Interations with user information from the database
 *
 * @package     UCCSC
 * @subpackage	Models
 * @author	Team 5
 */
class Users_model extends CI_Model {

    /**
     * Retrieves info about a specific user
     *
     * @access public
     * @param integer $uid User ID of required User
     * @return array
     *
     */
    function get($uid, $select="*")
    {
        $this->db->select($select);
        $this->db->where('uid', $uid);
        $q = $this->db->get('users');
        if($q->num_rows() > 0)
        {
            $user_array = $q->result();
            return $user_array[0];
        }
        else
        {
            return NULL;
        }
    }

    /**
     * Retrieves info about all users
     *
     * @access public
     * @param integer $uid User ID of required User
     * @param integer $count Number of users to return
     * @param integer $offset Start at "offset"
     * @return array
     *
     */
    function get_all($count=ROWS_PER_PAGE, $offset=0)
    {
        $q = $this->db->get('users', $count, $offset);
        if($q->num_rows() > 0)
        {
            return $q->result();
        }
        else
        {
            return NULL;
        }
    }
    
    /**
     * apply_for_course
     *
     * Update user information for applying for a course
     *
     * @access public
     * @param integer $uid User ID
     * @param integer $cid Course ID
     * @return boolean Success?
     */
    function apply_for_course($uid, $cid)
    {
        $this->db->select('applied');
        $this->db->where('uid', $uid);
        $q = $this->db->get('users');
        if($q->num_rows() > 0)
        {
            $tmp = $q->result();
            $tmp = $tmp[0];
            $cids = explode(',', $tmp->applied);
            $cids[] = $cid;
            sort($cids);
            
            $data = array(
                'applied' => implode(',',$cids)
            );
            
            $this->db->where('uid', $uid);
            $this->db->update('users', $data);
        }
        else
        {
            return FALSE;
        }
    }
    
    /**
     * Add new user to users table
     *
     * @access public
     * @param string|array $name  User Name OR array containing details
     * @param string $email Email address
     * @param string $pass  Password
     * @param string $type  Type of user 'admin', 'provider', 'user'
     * @param string $area  Area of user 'general'(user), 'languages', 'science'....
     * @param string $dob   Date of birth
     * @return boolean      Whether or not it was accepted into the database
     */
    function add($fname, $sname='', $email='', $pass='', $type='', $area='', $dob='')
    {
        if(is_array($fname))
        {
            $user_info = $name ;
        }
        else
        {
            $user_info = array(
                'fname'         => $fname,
                'sname'         => $sname,
                'email'         => $email,
                'type'          => $type,
                'area'          => $area,
                'date_of_birth' => $dob,
                'password'      => md5($pass)
            );
        }
        print_r($user_info);
        return $this->db->insert('users', $user_info);
    }
    
    /**
     * Update a user's information
     *
     * @access public
     * @param integer $uid User ID of user to have info updated
     * @param array $user_info Array filled with changed info
     * @return boolean
     */
    function update($uid, $user_info)
    {
        if(is_array($user_info))
        {
            $this->db->where('uid', $uid);
            return $this->db->update('users', $user_info);
        }
        else
        {
            return FALSE;
        }
    }
    
    /**
     * Delete a user to users table
     *
     * @access public
     * @param integer $uid User ID of user to be removed from users table
     * @return boolean
     */
    function delete($uid)
    {
        $this->db->where('uid', $uid);
        return $this->db->delete('users');
    }
    
    /**
     * validate()
     * 
     * Checks the legitimacy of login credencials
     *
     * @access public
     * @param string email Email address passed in
     * @param string pass  Password passed in
     * @return user object from database or NULL
     */
    function validate($email, $pass)
    {
        $this->db->where('email',    $email);
        $this->db->where('password', md5($pass));
        $q = $this->db->get('users');
        if($q->num_rows == 1)
        {
            return $q->result();
        }
        else
        {
            return FALSE;
        }
    }
}