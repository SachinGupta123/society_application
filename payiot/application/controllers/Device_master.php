<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Device_master extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Device_master_model');
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

    /*
     * Adding a new device_master
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'device_id' => $this->input->post('device_id'),
				'premises_id' => $this->input->post('premises_id'),
            );
            
            $device_master_id = $this->Device_master_model->add_device_master($params);
            redirect('device_master/index');
        }
        else
        {            
            $data['_view'] = 'device_master/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a device_master
     */
    function edit($id)
    {   
        // check if the device_master exists before trying to edit it
        $data['device_master'] = $this->Device_master_model->get_device_master($id);
        
        if(isset($data['device_master']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'device_id' => $this->input->post('device_id'),
					'premises_id' => $this->input->post('premises_id'),
                );

                $this->Device_master_model->update_device_master($id,$params);            
                redirect('device_master/index');
            }
            else
            {
                $data['_view'] = 'device_master/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The device_master you are trying to edit does not exist.');
    } 

    /*
     * Deleting device_master
     */
    function remove($id)
    {
        $device_master = $this->Device_master_model->get_device_master($id);

        // check if the device_master exists before trying to delete it
        if(isset($device_master['id']))
        {
            $this->Device_master_model->delete_device_master($id);
            redirect('device_master/index');
        }
        else
            show_error('The device_master you are trying to delete does not exist.');
    }
    
}
