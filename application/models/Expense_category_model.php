<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Expense_category_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get expense_category by id
     */
    function get_expense_category($id)
    {
        return $this->db->get_where('expense_categories',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all expense_categories
     */
    function get_all_expense_categories()
    {
        $this->db->order_by('name', 'asc');
        return $this->db->get('expense_categories')->result_array();
    }
        
    /*
     * function to add new expense_category
     */
    function add_expense_category($params)
    {
        $this->db->insert('expense_categories',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update expense_category
     */
    function update_expense_category($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('expense_categories',$params);
    }
    
    /*
     * function to delete expense_category
     */
    function delete_expense_category($id)
    {
        return $this->db->delete('expense_categories',array('id'=>$id));
    }

    /*
     * function to delete expense_category
     */
    function check_expense_name($expense_name)
    {
        // $this->db->where('name',$expense_name);
        $this->db->like('name', $expense_name);
        return $this->db->get('expense_categories')->row_array();
    }

    function expense_cat_update()
    {       
        $sql = "UPDATE expense_categories SET name = TRIM(name)"; 
        return $this->db->query($sql);
    }
}
