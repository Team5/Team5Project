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
 * Interations with news items from the database
 *
 * @package     UCCSC
 * @subpackage	Models
 * @author	Team 5
 */
class News_model extends CI_Model {
    
    /**
     * Retrieves specific article and associated info
     *
     * @access public
     * @param integer $aid Article ID
     * @return array
     *
     */
    function get($aid, $select="*") {
        $this->db->select($select);
        $this->db->where('aid', $aid);
        $q = $this->db->get('news');
        if($q->num_rows() > 0) {
            return $q->result();
        }
        else
        {
            return NULL;
        }
    }

    /**
     * Retrieves all articles
     *
     * @access public
     * @param integer $count Number of articles to return
     * @param integer $offset Start at article "offset"
     * @return array
     *
     */
    function get_all($count=ROWS_PER_PAGE, $offset=0)
    {
        $q = $this->db->get('news', $count, $offset);
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
     * Retrieves info about a all users enrolled in a specific course
     *
     * @access public
     * @param integer $uid User ID of author
     * @param integer $count Number of records to return
     * @param integer $offset Offset of first record to return
     * @return array
     *
     */
    function get_by_user($uid, $count=ROWS_PER_PAGE, $offset=0)
    {
        $this->db->where('pid', $uid);
        $q = $this->db->get('news', $count, $offset) ;
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
     * Add new news item to news table
     *
     * @access public
     * @param array $article_info Array filled with relevant info about article
     * @return boolean
     * 
     */
    function add($article_info)
    {
        return $this->db->insert('users', $article_info);
    }
    
    /**
     * Update an article
     *
     * @access public
     * @param integer $aid User ID of article to have info updated
     * @param array $article_info Array filled with changed info
     * @return boolean
     * 
     */
    function update($aid, $article_info)
    {
        $this->db->where('aid', $aid);
        return $this->db->update('news', $article_info);
    }
    
    /**
     * Delete an article from news table
     *
     * @access public
     * @param integer $aid ID of article to be deleted
     * @return boolean
     * 
     */
    function delete($aid)
    {
        $this->db->where('aid', $aid);
        return $this->db->delete('users');
    }
}