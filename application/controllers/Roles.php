<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {
            // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
            
        }
        $this->load->model('Role_model');
    }

	public function view_roles() {
		$data = array(
			'title' => "Roles"
		);
		// $this->load->view('roles/view_roles', $data);

		$data['roles'] = $this->Role_model->get_all_roles();
        
        $data['_view'] = 'role/index';
        $this->load->view('roles/view_roles',$data);
	}

	public function add_roles() {
		$data = array(
			'title' => "Roles"
		);
		// $this->load->view('roles/add_roles', $data);

		$this->load->library('form_validation');

		$this->form_validation->set_rules('role_name','Role Name','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'role_name' => $this->input->post('role_name'),
            );
            
            $role_id = $this->Role_model->add_role($params);
            redirect('roles');
        }
        else
        {            
            $data['_view'] = 'role/add';
            $this->load->view('roles/add_roles',$data);
        }
	}

	public function edit_roles($id = '') {

		if($id == ''){
			$id = $this->input->post('role_id');
		}
		$data = array(
			'title' => "Roles"
		);
		// $this->load->view('roles/edit_roles', $data);

		// check if the role exists before trying to edit it
        $data['role'] = $this->Role_model->get_role($id);
        
        if(isset($data['role']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('role_name','Role Name','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'role_name' => $this->input->post('role_name'),
                );

                $this->Role_model->update_role($id,$params); 
                $message['text'] = "Member Updated successfully!!"; 
                $message['status'] = "Success";
                $this->session->set_flashdata('message', $message);          
                redirect('roles');
            }
            else
            {
                $data['_view'] = 'role/edit';
                $this->load->view('roles/edit_roles',$data);
            }
        }
        else
            show_error('The role you are trying to edit does not exist.');
	}

	function remove($id)
    {
        $role = $this->Role_model->get_role($id);

        // check if the user exists before trying to delete it
        if(isset($role['id']))
        {
            $this->Role_model->delete_role($id);
            redirect('roles');
        }
        else
            show_error('The role you are trying to delete does not exist.');
    }

	public function assign_societies() {
		$data = array(
			'title' => "Users"
		);
		$this->load->view('users/assign_societies', $data);
	}
	
}
?>