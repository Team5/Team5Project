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
 * Interations with course information from the database
 *
 * @package     UCCSC
 * @subpackage	Models
 * @author	Team 5
 *
 * @todo Get rid of enrollment related parts
 */
class Courses_model extends CI_Model {
    
    /**
     * get
     *
     * Retrieves info about a specific course
     *
     * @access public
     * @param integer $cid Course ID of required Course
     * @return array
     *
     */
    function get($cid)
    {
        // SELECT * FROM courses WHERE course_id = $cid;
        $this->db->where('course_id', $cid);
        $q = $this->db->get('courses');
        if($q->num_rows() > 0)
        {
            $course = $q->result();
            // since $q->result() returns an array and we only want 1 item we
            // return the first element in the array.
            return $course[0];
        }
    }

    /**
     * get_all
     *
     * Retrieves info about a all Courses
     *
     * @access public
     * @param integer $count Number of records to return
     * @param integer $offset Offset of first record
     * @return array
     *
     */
    function get_all($count=ROWS_PER_PAGE, $offset=0)
    {
        // SELECT * FROM courses LIMIT $count OFFSET $offset;
        $q = $this->db->get('courses', $count, $offset);
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
     * get_by_area
     *
     * Retrieves info about a all Courses in a category
     *
     * @access public
     * @param integer $count Number of records to return
     * @param integer $offset Offset of first record
     * @return array
     *
     */
    function get_by_area($area, $count=ROWS_PER_PAGE, $offset=0)
    {
        // SELECT * FROM courses WHERE area = '$area' LIMIT $count OFFSET $offset;
        $this->db->where('area', $area);
        $q = $this->db->get('courses',$count,$offset);
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
     * get_enrolled
     * 
     * Retrieves list of User IDs of users in course
     * 
     * @access public
     * @param integer $cid Course ID of course
     * @return array Array of user ids
     *
     */
    function get_enrolled($cid, $count=ROWS_PER_PAGE, $offset=0)
    {
        // SELECT enrolled_users FROM courses WHERE course_id=$cid;
        $this->db->where('course_id', $cid);
        $this->db->select('enrolled_users');
        $q = $this->db->get('courses', $count, $offset);
        if($q->num_rows() > 0)
        {
            $uids = $q->result();
            // There will only be one record returned. Hense $uids[0]
            // enrolled_users is a comma separated list of uids
            return explode(',', $uids[0]->enrolled_users);
        }
        else
        {
            return NULL;
        }
    }
    
    /**
     * apply_user
     *
     * Log a user as applied for a course and increment enrolled count(beat race conditions)
     *
     * @access public
     * @param integer $cid Course ID
     * @param integer $uid User ID
     * @return boolean Whether or not the user can apply
     */
    function apply_user($cid, $uid)
    {
        $this->db->select('applied,enrolled_count');
        $this->db->where('course_id', $cid);
        $q = $this->db->get('courses');
        
        if($q->num_rows() > 0)
        {
            $query = $q->result();
            $uids = explode(',',$query[0]->applied);
            $uids[] = $uid;
            sort($uids, SORT_NUMERIC);
            
            $enrolled_count = $query[0]->enrolled_count + 1;           
            
            $new_data = array(
                'applied'        => implode(',',$uids),
                'enrolled_count' => $enrolled_count
            );
            
            $this->db->where('course_id', $cid);
            $this->db->update('courses', $new_data);
        }
        else
        {
            return FALSE;
        }
    }
    
    /**
     * add
     *
     * Add new user to courses table
     *
     * @access public
     * @param array $course_info Array filled with relevant info about the new user
     * @return boolean
     */
    function add($course_info) {
        return $this->db->insert('courses', $course_info);
    }
     
    /**
     * update
     * 
     * Update a user's information
     *
     * @access public
     * @param integer $course_id User ID of user to have info updated
     * @param array $course_info Array filled with changed info
     * @return boolean
     */
    function update($course_id, $course_info) {
        $this->db->where('course_id', $course_id);
        return $this->db->update('courses', $course_info);
    }
    
    /**
     * delete
     * 
     * Delete a user to courses table
     *
     * @access public
     * @param integer $course_id User ID of user to be removed from courses table
     * @return boolean
     */
    function delete($course_id) {
        $this->db->where('course_id', $course_id);
        return $this->db->delete('courses');
    }
}