<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Device_master_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get device_master by id
     */
    function get_device_master($id)
    {
        return $this->db->get_where('device_master',array('id'=>$id))->row_array();
    }
        
    /*
     * Get all device_master
     */
    function get_all_device_master()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('device_master')->result_array();
    }
        
    /*
     * function to add new device_master
     */
    function add_device_master($params)
    {
        $this->db->insert('device_master',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update device_master
     */
    function update_device_master($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('device_master',$params);
    }
    
    /*
     * function to delete device_master
     */
    function delete_device_master($id)
    {
        return $this->db->delete('device_master',array('id'=>$id));
    }
	
	function get_id_by_deviceid($deviceid){
		$res = $this->db->get_where('device_master',array('device_id'=>$deviceid));
		if($res->num_rows() > 0){
			$data = $res->result_array();
			return $data[0]['id'];
		} else {
			return false;
		}
	}
}
