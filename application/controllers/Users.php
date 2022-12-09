<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        if (!$this->ion_auth->logged_in())
        {
            // redirect them to the login page
            redirect('auth/login', 'refresh');
        }
        // else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		// {
		// 	// redirect them to the home page because they must be an administrator to view this
		// 	show_error('You must be an administrator to view this page.');
			
		// }
        $this->load->model('User_model');
        $this->load->model('Society_model');
        $this->load->model('Member_model');
        $this->load->model('Utility_service_provider_model');
        $this->load->model('Role_model');//add this model-sachhidanad
    } 
	
	public function view_users() {
		$data = array(
			'title' => "Users"
		);
		$data['users'] = $this->User_model->get_all_users();
		$data['all_societies'] = $this->Society_model->get_all_societies();
		$data['all_utility_providers'] = $this->User_model->get_all_utility_providers();
		$this->load->view('users/view_users', $data);
	}

	public function add_users() { 

		$data = array(
			'title' => "Users"
		);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Encrypted Password','required');
		
		if($this->form_validation->run())     
        {  

        		
            $params = array(
				'username' => $this->input->post('username'),
				'encrypted_password' => md5($this->input->post('password')),
				'role_id' => $this->input->post('role'),
				'member_id' => $this->input->post('member_id'),
				'society_id' => $this->input->post('society_id'),
				'reset_password_token' => $this->input->post('reset_password_token'),
				'reset_password_sent_at' => $this->input->post('reset_password_sent_at'),
				'remember_created_at' => $this->input->post('remember_created_at'),
				'sign_in_count' => $this->input->post('sign_in_count'),
				'current_sign_in_at' => $this->input->post('current_sign_in_at'),
				'last_sign_in_at' => $this->input->post('last_sign_in_at'),
				'current_sign_in_ip' => $this->input->post('current_sign_in_ip'),
				'last_sign_in_ip' => $this->input->post('last_sign_in_ip'),
				'created_at' => $this->input->post('created_at'),
				'updated_at' => $this->input->post('updated_at'),
            );
            
            $user_id = $this->User_model->add_user($params);
            redirect('users');
        }
        else
        {
			
			$data['all_roles'] = $this->Role_model->get_all_roles();			
			$data['all_utility_providers'] = $this->Utility_service_provider_model->get_all_utility_service_providers();
			$data['all_societies'] = $this->Society_model->get_all_societies();
            
            $data['_view'] = 'user/add';
            $this->load->view('users/add_users',$data);
        }
		// $data = array(
		// 	'title' => "Users"
		// );
		// $this->load->view('users/add_users', $data);
	}

	public function edit_user($id = '') {

		if($id == ''){
			$id = $this->input->post('user_id');
		}

		$data = array(
			'title' => "Users"
		);
		// check if the user exists before trying to edit it
		$data['user'] = $this->User_model->get_user($id);
		
		if(isset($data['user']['id']))
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Encrypted Password','required');
		
			if($this->form_validation->run())     
      		{   
					$params = array(
						'username' => $this->input->post('username'),
						'role_id' => $this->input->post('role'),
						'encrypted_password' => md5($this->input->post('password')),
						'updated_at' => date('Y-m-d H:m:s')
					);			
					$this->User_model->update_user($id,$params);   
				       
					redirect('users');
			}	
			else
			{
				
				$data['all_roles'] = $this->Role_model->get_all_roles();
				// $data['all_members'] = $this->Member_model->get_all_members();				
				$data['all_societies'] = $this->Society_model->get_all_societies();

                $data['_view'] = 'user/edit';
                $this->load->view('users/edit_user',$data);
			}
		}
		else
			show_error('The user you are trying to edit does not exist.');
		
	}
    //add this function for change role for auth controller function to redirection - sachhidanand
	public function edit_user_roles($id = '') {

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
                redirect('users');
            }
            else
            {
                // $data['_view'] = 'role/edit';
                $this->load->view('users/edit_user_roles',$data);
            }
        }
        else
            show_error('The role you are trying to edit does not exist.');
	}

	function remove($id)
    {
    	// var_dump($id);
        $user = $this->User_model->get_user($id);

        // check if the user exists before trying to delete it
        if(isset($user['id']))
        {
            $this->User_model->delete_user($id);
            $this->Member_model->delete_members_by_user_id($id);
            echo 'Deleted successfully.';
            //redirect('users');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }

	public function assign_societies($user_id=0) {
		$data = array(
            'title' => "Assign Society"
        );
        $this->load->library('form_validation');

		$this->form_validation->set_rules('society_id','Society Id','required');
		
		if($this->form_validation->run())     
        {
			
			$society_access = $this->Society_access_model->check_existing_access($this->input->post('user_id'), 3,$this->input->post('society_id'));

			if(count($society_access) > 0)
			{
				redirect('users');
			}
			else{

				$user_id=$this->input->post('user_id');

				$user_role_data = $this->User_model->get_user_role_by_user_id($user_id);			

				$par = array(
					'user_id' => $this->input->post('user_id'),
					// 'role_id' => 3,
					'society_id' => $this->input->post('society_id'),
					'created_at' => date('Y-m-d H:i:s'),
				);

				if(!empty($user_role_data)){
					$par['role_id']=$user_role_data[0]["role_id"];
				}else{
					$par['role_id']=3;
				}
	
				$society_access_id = $this->Society_access_model->add_society_access($par);
				$message['text'] = "Society Access Successfully!!";
                $message['status'] = "Success";
                $this->session->set_flashdata('message', $message);
				redirect('users');
			}
        }
        else
        {		
			
			
			$data['all_societies'] = $this->Society_model->get_available_society_access($user_id);           
            $this->load->view('users/assign_societies', $data);
        }
		
	}

	//society member list for assign role
	public function view_members()
	{
		$data = array(
            'title' => "Manage Member"
        );
		$id = $this->uri->segment(3);
		$data['society_id'] = $id;
		// $data['members'] = $this->Member_model->get_members_by_society($id);
		
		//as discuss harsh sir change in add new function for get member list for assign committy

		$data['members'] = $this->Member_model->get_all_members($id);

		foreach($data['members'] as $x => $val) {
			$mem=$this->Member_model->get_member_single($val["id"]);
			if(!empty($mem)){
				
				$data['members'][$x]["user_id"]=$mem[0]->user_id;
				$data['members'][$x]["user_phone"]=$mem[0]->phone;
				$data['members'][$x]["first_name"]=$mem[0]->first_name;
				$data['members'][$x]["last_name"]=$mem[0]->last_name;
			}else{
				$data['members'][$x]["user_id"]=0;
				$data['members'][$x]["user_phone"]='';
				$data['members'][$x]["first_name"]='';
				$data['members'][$x]["last_name"]='';
			}
		}
		
		$this->load->view('users/view_society_members', $data);
	}
}
?>