<?php
class Api extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Device_master_model');
        $this->load->model('Device_door_model');
        $this->load->model('Door_master_model');
        $this->load->model('User_door_access_model');
    } 

    /*
     * Listing of device_master
     */
    function index()
    {
        $data['device_master'] = $this->Device_master_model->get_all_device_master();
        
        $data['_view'] = 'device_master/index';
        $this->load->view('layouts/main',$data);
    }
	
	public function appRequest(){
		$data = $this->input->post();
		
		$user = $this->db->where(array('username'=>$data['username'],'password'=>$data['password']))->get('user_master');
		if($user->num_rows() > 0){
			$userdata = $user->result_array();
			if($this->Door_master_model->validate_door_qr($data['qr'])){
				$access_data = json_decode(base64_decode($data['qr']),true);
				$device_id = $this->User_door_access_model->get_device_id_by_door_id($access_data['door_id'],$userdata[0]['id']);
				if($this->requestHandler($access_data['door_id'],$device_id,$userdata[0]['id']))
					echo json_encode(array('status'=>'success','message'=>'Opening Door - '.$access_data['door_id']));
				else
					echo json_encode(array('status'=>'error','message'=>'Username / Password Incorrect'));
			}
		} else {
			echo json_encode(array('status'=>'error','message'=>'Username / Password Incorrect'));
		}
	}
	
	public function iotRequest(){
		$data = $this->input->get();
		
		$deviceid = $data['deviceid'];
		
		$device_id = $this->Device_master_model->get_id_by_deviceid($deviceid);
		
		if($device_id){
			if($this->requestProcessor($device_id)){
				echo json_encode(array('light'=>'on'));
			} else {
				echo json_encode(array('light'=>'off'));				
			}
		} else {
			echo json_encode(array('light'=>'off'));
		}
		
	}
	
	function requestHandler($door_id,$device_id,$user_id){
		$this->db->insert('request',array('user_id'=>$user_id,'device_id'=>$device_id,'door_id'=>$door_id,'status'=>'ON','transferred'=>0,'dnt_in'=>time()));
		return true;
	}
	
	function requestProcessor($device_id){
		$current_request = $this->User_door_access_model->get_transfer_status_by_device_id($device_id);
		if($current_request){
			if($current_request['device_id'] == $device_id){
				$this->db->where('id',$current_request['id'])->update('request',array('transferred'=>1));
				return true;
			} else {
				return false;
			}		
		} else {
			return false;
		}
	}
    
}