<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class User_door_acces extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_door_acces_model');
    } 

    /*
     * Listing of user_door_access
     */
    function index()
    {
        $data['user_door_access'] = $this->User_door_acces_model->get_all_user_door_access();
        
        $data['_view'] = 'user_door_acces/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new user_door_acces
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'id' => $this->input->post('id'),
				'user_id' => $this->input->post('user_id'),
				'door_id' => $this->input->post('door_id'),
            );
            
            $user_door_acces_id = $this->User_door_acces_model->add_user_door_acces($params);
            redirect('user_door_acces/index');
        }
        else
        {            
            $data['_view'] = 'user_door_acces/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a user_door_acces
     */
    function edit($id)
    {   
        // check if the user_door_acces exists before trying to edit it
        $data['user_door_acces'] = $this->User_door_acces_model->get_user_door_acces($id);
        
        if(isset($data['user_door_acces']['']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'id' => $this->input->post('id'),
					'user_id' => $this->input->post('user_id'),
					'door_id' => $this->input->post('door_id'),
                );

                $this->User_door_acces_model->update_user_door_acces($id,$params);            
                redirect('user_door_acces/index');
            }
            else
            {
                $data['_view'] = 'user_door_acces/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The user_door_acces you are trying to edit does not exist.');
    } 

    /*
     * Deleting user_door_acces
     */
    function remove($id)
    {
        $user_door_acces = $this->User_door_acces_model->get_user_door_acces($id);

        // check if the user_door_acces exists before trying to delete it
        if(isset($user_door_acces['']))
        {
            $this->User_door_acces_model->delete_user_door_acces($id);
            redirect('user_door_acces/index');
        }
        else
            show_error('The user_door_acces you are trying to delete does not exist.');
    }
    
}
