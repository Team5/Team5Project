<?php
/**
 * UCC Summer Courses
 *
 * A summer course advertisment and enrollment site.
 *
 * @package        UCCSC
 * @author        Team 5
 * @copyright           Copyright (c) 2011
 * @since        Version 0.1
 * @filesource
 */
// ------------------------------------------------------------------------
/**
 * Interations with enrollment table from the database
 *
 * @package     UCCSC
 * @subpackage    Models
 * @author    Team 5
 */
class Enrollment_model extends CI_Model {
    /**
     * apply
     *
     * Apply user user $uid to course $cid
     *
     * @param int $uid ID of user
     * @param int $cid ID of course
     */
    function apply($uid, $cid)
    {
        // insert uid=$uid, cid=$cid, enrolled=False
        // Build associative array(map) that has field names as keys and values as values..
        $data = array(
            'uid' => $uid,
            'cid' => $cid,
            'enrolled' => FALSE
        );
        // enrollment is the name of the table, $data is the information we are adding to the table
        $this->db->insert('enrollment', $data);
    }

    /**
     * enroll
     *
     * Accept a user user $uid to course $cid by setting Enrolled to True
     *
     * @param int $uid ID of user
     * @param int $cid ID of course
     */
    function enroll($uid, $cid)
    {
        // update where uid=$uid cid=$cid, set enrolled = True
        $data = array ( 'enrolled' => TRUE);
        $this->db->where('uid' , $uid)->where('cid' , $cid);
        // Might let us know whether the entry exists or not
        return $this->db->update('enrollment' , $data);
    }

    /**
     * delete
     *
     * Remove an application
     *
     * @param int $uid ID of user
     * @param int $cid ID of course
     */
    function delete($uid, $cid)
    {
        // delete entry where uid=$uid cid=$cid
        $data = array(
            'uid' => $uid,
            'cid' => $cid,
            );
        $this->db->delete('enrollment' , $data);
    }

    /**
     * get_enrolled_users($cid)
     *
     * Get list of uids of users enrolled in course $cid
     *
     * @param int $cid ID of course
     * @return array $uids List of user ids of users enrolled in this course
     */
    function get_enrolled_users($cid)
    {
        $uids = array();
        $this->db->select('uid');
        // select uid where enrolled = TRUE and cid = $cid;
        $query = $this->db->get_where('enrollment' , array('enrolled' => TRUE, 'cid'  => $cid));
        if($query->num_rows > 0)
        {
            foreach($query->result() as $row)
            {
                $uids[] = $row->uid;
            }
        }
        return $uids;
    }

    /**
     * get_enrolled_courses($uid)
     *
     * Get list of cids of courses user $uid is enrolled in
     *
     * @param int $uid ID of user
     * @return array $cids List of course ids of courses this user is enrolled in
     */
    function get_enrolled_courses($uid)
    {
        $cids = array();
        $this->db->select('cid');
        //select uid where enrolled = TRUE and uid = $uid;
        $query = $this->db->get_where('enrollment' , array('enrolled' => TRUE, 'uid'  => $uid));
        if($query->num_rows > 0)
        {
            foreach($query->result() as $row)
            {
                $cids[] = $row->cid;
            }
        }
        return $cids;
    }

    /**
     * get_applied_users($cid)
     *
     * Get list of uids of users applied for course $cid
     *
     * @param int $cid ID of course
     * @return array $uids List of user ids applied for this course
     */
    function get_applied_users($cid)
    {
        $uids = array();
        $this->db->select('uid');
        //select uid where enrolled = TRUE and cid = $cid;
        $query = $this->db->get_where('enrollment' , array('enrolled' => FALSE, 'cid'  => $cid));
        if($query->num_rows > 0)
        {
            foreach($query->result() as $row)
            {
                $uids[] = $row->uid;
            }
        }
        return $uids;
    }

    /**
     * get_applied_courses($uid)
     *
     * Get list of cids of courses user $uid is enrolled in
     *
     * @param int $uid ID of user
     * @return array $cids List of course ids of courses this user has applied for
     */
    function get_applied_courses($uid)
    {
        $cids = array();
        $this->db->select('cid');
        // select uid where enrolled = TRUE and uid = $uid;
        $query = $this->db->get_where('enrollment' , array('enrolled' => FALSE, 'uid'  => $uid));
        if($query->num_rows > 0)
        {
            foreach($query->result() as $row)
            {
                $uids[] = $row->cid;
            }
        }
        return $cids;
    }
}

