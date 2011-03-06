<?php
/**
 * UCC Summer rooms
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
 * Interations with room information from the database
 *
 * @package     UCCSC
 * @subpackage	Models
 * @author	Team 5
 */
class rooms_model extends CI_Model {
    
    /**
     * get
     *
     * Retrieves info about a specific room
     *
     * @access public
     * @param integer $rid Room ID of required Course
     * @return array
     *
     */
    function get($rid)
    {
        // SELECT * FROM rooms WHERE rid = $rid;
        $this->db->where('rid', $rid);
        $q = $this->db->get('rooms');
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
     * Retrieves info about a all rooms
     *
     * @access public
     * @param integer $count Number of records to return
     * @param integer $offset Offset of first record
     * @return array
     *
     */
    function get_all($count=ROWS_PER_PAGE, $offset=0)
    {
        // SELECT * FROM rooms LIMIT $count OFFSET $offset;
        $q = $this->db->get('rooms', $count, $offset);
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
     * Add new room to rooms table
     *
     * @access public
     * @param array $course_info Array filled with relevant info about the new user
     * @return boolean
     */
    function add($room_info) {
        return $this->db->insert('rooms', $room_info);
    }
     
    /**
     * update
     * 
     * Update a room's information
     *
     * @access public
     * @param integer $rid Room ID of user to have info updated
     * @param array $course_info Array filled with changed info
     * @return boolean
     */
    function update($rid, $room_info) {
        $this->db->where('rid', $rid);
        return $this->db->update('rooms', $room_info);
    }
    
    /**
     * delete
     * 
     * Delete a room from the rooms table
     *
     * @access public
     * @param integer $rid Room ID of room to be removed from rooms table
     * @return boolean
     */
    function delete($rid) {
        $this->db->where('rid', $rid);
        return $this->db->delete('rooms');
    }
}