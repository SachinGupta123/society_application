<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Member_plan_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get member_plan by id
     */
    function get_member_plan($id)
    {
        return $this->db->get_where('member_plans',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all member_plans
     */
    function get_all_member_plans()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('member_plans')->result_array();
    }
        
    /*
     * function to add new member_plan
     */
    function add_member_plan($params)
    {
        $this->db->insert('member_plans',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update member_plan
     */
    function update_member_plan($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('member_plans',$params);
    }
    
    /*
     * function to delete member_plan
     */
    function delete_member_plan($id)
    {
        return $this->db->delete('member_plans',array('id'=>$id));
    }
}
