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
 * Interations with enrollment table from the database
 *
 * @package     UCCSC
 * @subpackage	Models
 * @author	Team 5
 */
class Enrollment_model extends CI_Model {

    /**
     * apply
     * 
     * Apply user user $uid to course $cid
     *
     * @todo fill this in
     * @param int $uid ID of user
     * @param int $cid ID of course
     */
    function apply($uid, $cid)
    {
        // insert uid=$uid, cid=$cid, enrolled=False
    }

    /**
     * enroll
     *
     * Accept a user user $uid to course $cid by setting Enrolled to True
     *
     * @todo fill this in
     * @param int $uid ID of user
     * @param int $cid ID of course
     */
    function enroll($uid, $cid)
    {
        // update where uid=$uid cid=$cid, set enrolled = True
    }

    /**
     * delete
     *
     * Remove an application
     *
     * @todo fill this in
     * @param int $uid ID of user
     * @param int $cid ID of course
     */
    function delete($uid, $cid)
    {
        // delete entry where uid=$uid cid=$cid
    }

}