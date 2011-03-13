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
        // SELECT * FROM courses WHERE cid = $cid;
        $this->db->where('cid', $cid);
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
     * get_by_provider
     *
     * Retrieves info about a all Courses in a category
     *
     * @access public
     * @param integer $count Number of records to return
     * @param integer $offset Offset of first record
     * @return array
     *
     */
    function get_by_provider($pid, $count=ROWS_PER_PAGE, $offset=0)
    {
        // SELECT * FROM courses WHERE area = '$area' LIMIT $count OFFSET $offset;
        $this->db->where('pid', $pid);
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
     * @param integer $cid User ID of user to have info updated
     * @param array $course_info Array filled with changed info
     * @return boolean
     */
    function update($cid, $course_info) {
        $this->db->where('cid', $cid);
        return $this->db->update('courses', $course_info);
    }
    
    /**
     * delete
     * 
     * Delete a user to courses table
     *
     * @access public
     * @param integer $cid User ID of user to be removed from courses table
     * @return boolean
     */
    function delete($cid) {
        $this->db->where('cid', $cid);
        return $this->db->delete('courses');
    }

    /**
     * increment_enrolled_count
     *
     * @access public
     * @param integer $cid
     * @return boolean
     *
     */
    function increment_enrolled_count($cid)
    {
        $course = $this->get($cid);
        $data = array('enrolled_count' => $course->enrolled_count + 1);
        $this->db->where('cid', $cid);
        return $this->db->update('courses', $data);
    }

    /**
     * deincrement_enrolled_count
     *
     * @access public
     * @param integer $cid
     * @return boolean
     *
     */
    function deincrement_enrolled_count($cid)
    {
        $course = $this->get($cid);
        $data = array('enrolled_count' => $course->enrolled_count - 1);
        $this->db->where('cid', $cid);
        return $this->db->update('courses', $data);
    }
}