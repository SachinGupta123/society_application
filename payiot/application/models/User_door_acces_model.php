<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class User_door_acces_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get user_door_acces by 
     */
    function get_user_door_acces($)
    {
        return $this->db->get_where('user_door_access',array(''=>$))->row_array();
    }
        
    /*
     * Get all user_door_access
     */
    function get_all_user_door_access()
    {
        $this->db->order_by('', 'desc');
        return $this->db->get('user_door_access')->result_array();
    }
        
    /*
     * function to add new user_door_acces
     */
    function add_user_door_acces($params)
    {
        $this->db->insert('user_door_access',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update user_door_acces
     */
    function update_user_door_acces($,$params)
    {
        $this->db->where('',$);
        return $this->db->update('user_door_access',$params);
    }
    
    /*
     * function to delete user_door_acces
     */
    function delete_user_door_acces($)
    {
        return $this->db->delete('user_door_access',array(''=>$));
    }
}
