<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Auth extends CI_Controller
{
	public $data = [];

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(['ion_auth', 'form_validation']);
		$this->load->helper(['url', 'language']);
		$this->load->model('User_model');
		$this->load->model('Society_model');
		$this->load->model('Member_model');
		$this->load->model('Role_model');
		$this->load->model('CityState_model');
		$this->load->model('ion_auth_model');//add model sachhidanand
		
		$this->load->model('Utility_service_provider_model');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}

	/**
	 * Redirect if needed, otherwise display the user list
	 */
	/***
	 Author- Sachhidanand
	 Date -07-02-2022
	 Requirement - resolve issue for when user broswer close and next time open role base dashboard open 
	 */
	public function index()
	{

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
		else
		{
			$this->data['title'] = $this->lang->line('index_heading');
			
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
           
			if ($this->ion_auth->is_admin())
			{
				redirect('dashboard', 'refresh');
			}else{
				
				$user_id=$this->session->userdata('user_id');
				$user_role = $this->User_model->get_user_role_by_user_id($user_id);
				
				if($user_role[0]['role_id'] == UserRoles::operator):
					$this->session->set_userdata('role', 'operator');
					redirect('societies', 'refresh');

				elseif($user_role[0]['role_id'] == UserRoles::channel_partner):
					$this->session->set_userdata('role', 'channel_partner');
					redirect('societies', 'refresh');	

				elseif($user_role[0]['role_id'] == UserRoles::CA):
					$this->session->set_userdata('role', 'CA');				
					redirect('societies', 'refresh');

				elseif($user_role[0]['role_id'] == UserRoles::master_channel_partner):
					$this->session->set_userdata('role', 'master_channel_partner');	
					redirect('societies/master_cp', 'refresh');

				elseif($user_role[0]['role_id'] == UserRoles::utility_service_provider):
					$this->session->set_userdata('role', 'utility_service_provider');
					redirect('utility_service_provider', 'refresh');

				elseif($user_role[0]['role_id'] == UserRoles::committee_member):
					$this->session->set_userdata('role', 'committee_member');
					$member = $this->Society_access_model->get_all_society_accesses_by_user($user_id);
					if(empty($member)){
						$members = $this->Member_model->get_member_by_user_id($user_id);
						$society_ids=$members[0]->society_id;						
					}else{
						$society_ids=$member[0]['society_id'];
					}
					redirect('societies/details/'.$society_ids, 'refresh');

				elseif($user_role[0]['role_id'] == UserRoles::members):
					$this->session->set_userdata('role', 'members');						
					$member = $this->Member_model->get_member_by_user_id($user_id);
					redirect('member/view/'.$member[0]->id.'/'.$member[0]->society_id, 'refresh');
				else:
					redirect('auth/login', 'refresh');
				endif;


			}
		}
	}
	public function index_bak()
	{

		if (!$this->ion_auth->logged_in())
		{
			// redirect them to the login page
			redirect('auth/login', 'refresh');
		}
		
		else
		{
			$this->data['title'] = $this->lang->line('index_heading');
			
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
           
			//list the users
			$this->data['users'] = $this->ion_auth->users()->result();//comment on  this bcoz of needed society id-sachhidanand 27-12-2021
			$users= $this->ion_auth->users()->result();
			foreach($users as $key => $value){
				$society_id=$this->Society_model->get_society_access($value->user_id);
				if($society_id!=0 && $society_id!='')
				$users[$key]->society_id=$society_id;
				else
				$users[$key]->society_id=0;
			}
			$this->data['users']=$users;
		
			$this->data['users_exec'] = $this->User_model->get_all_society_exec();
			//USAGE NOTE - you can do more complicated queries like this
			//$this->data['users'] = $this->ion_auth->where('field', 'value')->users()->result();
			$this->data['all_societies'] = $this->Society_model->get_all_societies();
			$this->data['all_utility_providers'] = $this->User_model->get_all_utility_providers();
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			}
			
			$this->_render_page('users' . DIRECTORY_SEPARATOR . 'view_users', $this->data);
		}
	}
	/***
	 Author- Sachhidanand
	 Date -07-02-2022
	 Requirement - add function for user list get and changes in routes file 
	 */
	public function user_list()
	{

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
		else
		{
			$this->data['title'] = $this->lang->line('index_heading');
			
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			
			// $this->data['users'] = $this->ion_auth->users()->result();
			
			// foreach ($this->data['users'] as $k => $user)
			// {
			// 	$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			// }

			//$this->data['all_roles'] = $this->Role_model->get_all_roles();

			//$this->data['users_exec'] = $this->User_model->get_all_society_exec();
			//USAGE NOTE - you can do more complicated queries like this
			//$this->data['users'] = $this->ion_auth->where('field', 'value')->users()->result();
			//$this->data['all_societies'] = $this->Society_model->get_all_societies();
			//$this->data['all_utility_providers'] = $this->User_model->get_all_utility_providers();
			$user_role_id=array(5,13,16);			
			$this->data['users'] = $this->User_model->get_all_user_role_data($user_role_id);
			foreach ($this->data['users'] as $k => $user)
			{
				$this->data['users'][$k]['groups'] = $this->ion_auth->get_users_groups($user['id'])->result();
			}

			$this->_render_page('users' . DIRECTORY_SEPARATOR . 'view_users', $this->data);
		}
	}
	/***
	 Author- Sachhidanand
	 Date -07-02-2022
	 Requirement - add function for society access user list 
	 */
	public function society_user_list($society_id=0)
	{
		$this->data = array(
			'title' => "User"
		);
		
		$this->data['users_list'] = $this->User_model->get_user_by_society_id($society_id,array(3));
		foreach ($this->data['users_list'] as $k => $user)
		{
			$this->data['users_list'][$k]['groups'] = $this->ion_auth->get_users_groups($user['id'])->result();
		}
		
		$this->data["society_id"]=$society_id;
		
		$this->_render_page('societies' . DIRECTORY_SEPARATOR . 'societyUser_list', $this->data);
		
	}

	/**
	 * Log the user in
	 */
	public function login($user = '')
	{
		$this->data['title'] = $this->lang->line('login_heading');

		// validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->input->post('remember');

			if ($data = $this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				$this->session->set_userdata('data', $data);
				//redirect them back to the home page
				if (!$this->ion_auth->logged_in())
				{
					// redirect them to the login page
					redirect('auth/login', 'refresh');
				}
				else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
				{
					$user_id = $data->id; /*echo $user_id;*/
					$user_role = $this->User_model->get_user_role_by_user_id($user_id);
					$member = $this->Member_model->get_member_by_user_id($user_id);//this is wrong way for find society_id-sachhidanadn 30-12-2021
					$user = $this->User_model->get_user($user_id);
					$this->session->set_userdata('name', $user['first_name']);
					// redirect them to the home page because they must be an administrator to view this
					if($user_role[0]['role_id'] == UserRoles::operator):
						$this->session->set_userdata('role', 'operator');
						$this->session->set_userdata('role_id', $user_role[0]['role_id']);
						redirect('societies', 'refresh');
					elseif($user_role[0]['role_id'] == UserRoles::channel_partner):
						$this->session->set_userdata('role', 'channel_partner');
						$this->session->set_userdata('role_id', $user_role[0]['role_id']);
						redirect('societies', 'refresh');
						//sachhidnand 14-01-2022
					elseif($user_role[0]['role_id'] == UserRoles::CA):
						$this->session->set_userdata('role', 'CA');
						$this->session->set_userdata('company', $user['company']);
						$this->session->set_userdata('role_id', $user_role[0]['role_id']);
						redirect('societies', 'refresh');
					elseif($user_role[0]['role_id'] == UserRoles::master_channel_partner):
						$this->session->set_userdata('role', 'master_channel_partner');
						$this->session->set_userdata('company', $user['company']);
						$this->session->set_userdata('role_id', $user_role[0]['role_id']);
						redirect('societies/master_cp', 'refresh');
					elseif($user_role[0]['role_id'] == UserRoles::utility_service_provider):
						$this->session->set_userdata('role', 'utility_service_provider');
						redirect('utility_service_provider', 'refresh');
					elseif($user_role[0]['role_id'] == UserRoles::committee_member):
						$this->session->set_userdata('role', 'committee_member');
						$member = $this->Society_access_model->get_all_society_accesses_by_user($user_id);
						if(empty($member)){
							$members = $this->Member_model->get_member_by_user_id($user_id);
						 
							$society_ids=$members[0]->society_id;
							
						}else{
							$society_ids=$member[0]['society_id'];
						}
							
						
						redirect('societies/details/'.$society_ids, 'refresh');
					// elseif($user_role[0]['role_id'] == UserRoles::members):
					// 	$this->session->set_userdata('role', 'members');						
					// 	$member = $this->Member_model->get_member_by_user_id($user_id);
					// 	redirect('member/view/'.$member[0]->id.'/'.$member[0]->society_id, 'refresh');
					else:
						redirect('auth/login', 'refresh');
					endif;

				}
				else
				{
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->session->set_flashdata('success', 1);
				redirect('dashboard', 'refresh');
				}
			}
			else
			{
				// if the login was un-successful
				// redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				$this->session->set_flashdata('success', 0);
				redirect('auth/login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['enroll'] =$this->session->flashdata('enroll');
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['success'] = ($this->session->flashdata('success') !== NULL )? $this->session->flashdata('success') : NULL;		 
			$this->data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('identity'),
			];

			$this->data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'class' => 'form-control',
			];
			
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'login', $this->data);
		}
	}

	/**
	 * Log the user out
	 */
	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$this->ion_auth->logout();

		// redirect them to the login page
		redirect('auth/login', 'refresh');
	}

	/**
	 * Change password
	 */
	public function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}

		$user = $this->ion_auth->user()->row();

		if ($this->form_validation->run() === FALSE)
		{
			// display the form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
			$this->data['old_password'] = [
				'name' => 'old',
				'id' => 'old',
				'type' => 'password',
			];
			$this->data['new_password'] = [
				'name' => 'new',
				'id' => 'new',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			];
			$this->data['new_password_confirm'] = [
				'name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
				'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
			];
			$this->data['user_id'] = [
				'name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
				'value' => $user->id,
			];

			// render
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata('identity');

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{
				//if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	/**
	 * Forgot password
	 */
	public function forgot_password()
	{
		$this->data['title'] = $this->lang->line('forgot_password_heading');
		
		// setting validation rules by checking whether identity is username or email
		if ($this->config->item('identity', 'ion_auth') != 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		}
		else
		{
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}


		if ($this->form_validation->run() === FALSE)
		{
			$this->data['type'] = $this->config->item('identity', 'ion_auth');
			// setup the input
			$this->data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'class' => 'form-control'
			];

			if ($this->config->item('identity', 'ion_auth') != 'email')
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			}
			else
			{
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['success'] = ($this->session->flashdata('success') !== NULL )? $this->session->flashdata('success') : NULL;
			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'forgot_password', $this->data);
		}
		else
		{
			$identity_column = $this->config->item('identity', 'ion_auth');
			$identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();

			if (empty($identity))
			{

				if ($this->config->item('identity', 'ion_auth') != 'email')
				{
					$this->ion_auth->set_error('forgot_password_identity_not_found');
				}
				else
				{
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}

				$this->session->set_flashdata('message', $this->ion_auth->errors());
				$this->session->set_flashdata('success', 0);
				redirect("auth/forgot_password", 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->session->set_flashdata('success', 1);
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				$this->session->set_flashdata('success', 0);
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

	/**
	 * Reset password - final step for forgotten password
	 *
	 * @param string|null $code The reset code
	 */
	public function reset_password($code = NULL)
	{
		if (!$code)
		{
			show_404();
		}

		$this->data['title'] = $this->lang->line('reset_password_heading');
		
		$user = $this->ion_auth->forgotten_password_check($code);

		if ($user)
		{
			// if the code is valid then display the password reset form

			$this->form_validation->set_rules('new', $this->lang->line('reset_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
			$this->form_validation->set_rules('new_confirm', $this->lang->line('reset_password_validation_new_password_confirm_label'), 'required');

			if ($this->form_validation->run() === FALSE)
			{
				// display the form

				// set the flash data error message if there is one
				$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

				$this->data['min_password_length'] = $this->config->item('min_password_length', 'ion_auth');
				$this->data['new_password'] = [
					'name' => 'new',
					'id' => 'new',
					'class' => 'form-control',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				];
				$this->data['new_password_confirm'] = [
					'name' => 'new_confirm',
					'id' => 'new_confirm',
					'class' => 'form-control',
					'type' => 'password',
					'pattern' => '^.{' . $this->data['min_password_length'] . '}.*$',
				];
				$this->data['user_id'] = [
					'name' => 'user_id',
					'id' => 'user_id',
					'type' => 'hidden',
					'value' => $user->id,
				];
				$this->data['csrf'] = $this->_get_csrf_nonce();
				$this->data['code'] = $code;

				// render
				$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'reset_password', $this->data);
			}
			else
			{
				$identity = $user->{$this->config->item('identity', 'ion_auth')};

				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $user->id != $this->input->post('user_id'))
				{

					// something fishy might be up
					$this->ion_auth->clear_forgotten_password_code($identity);

					show_error($this->lang->line('error_csrf'));

				}
				else
				{
					// finally change the password
					$change = $this->ion_auth->reset_password($identity, $this->input->post('new'));

					if ($change)
					{
						// if the password was successfully changed
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						redirect("auth/login", 'refresh');
					}
					else
					{
						$this->session->set_flashdata('message', $this->ion_auth->errors());
						redirect('auth/reset_password/' . $code, 'refresh');
					}
				}
			}
		}
		else
		{
			// if the code is invalid then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect("auth/forgot_password", 'refresh');
		}
	}

	/**
	 * Activate the user
	 *
	 * @param int         $id   The user ID
	 * @param string|bool $code The activation code
	 */

	/**
	 * changes pass society id  for  redirection -sachhidanand 04-03-2022
	*/
	
	public function activate($society_id=0,$user_id=0, $code = FALSE)
	{
		$activation = FALSE;

		if ($code !== FALSE)
		{
			$activation = $this->ion_auth->activate($user_id, $code);
		}
		else if ($this->ion_auth->is_admin())
		{
			$activation = $this->ion_auth->activate($user_id);
		}

		if($activation){
			$message["status"]="Success";
			$message["text"]="User activate Successfully";
		}else{
			$message["status"]="Fail";
			$message["text"]="User activate Unsuccessfully";
		}
			
		$this->session->set_flashdata('message', $message);

		if ($society_id!=0)
		{			
			redirect('societies/society_users/'.$society_id, 'refresh');
		}
		else
		{
			redirect('users', 'refresh');
		}



		// if ($activation)
		// {
		// 	// redirect them to the auth page
		// 	$message["status"]="Success";
		// 	$message["text"]="User activate Successfully";
		// 	$this->session->set_flashdata('message', $message);
		// 	// redirect("auth", 'refresh');
		// 	redirect('users', 'refresh');
		// }
		// else
		// {
		// 	// redirect them to the forgot password page
		// 	$this->session->set_flashdata('message', $this->ion_auth->errors());
		// 	redirect("auth/forgot_password", 'refresh');
		// }
	}

	/**
	 * Deactivate the user
	 *
	 * @param int|string|null $id The user ID
	 */
	/**
	 * changes pass society id  for  redirection -sachhidanand 04-03-2022
	*/
	public function deactivate($society_id=0,$user_id = 0)
	{
		if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
		{
			$this->ion_auth->deactivate($user_id);
		}
		$message["status"]="Success";
		$message["text"]="User Deactivate Successfully";
		$this->session->set_flashdata('message', $message);
		
		if($society_id !=0 ){
			redirect('societies/society_users/'.$society_id, 'refresh');
		}else{
			redirect('users', 'refresh');
		}
				
	}

	public function deactivate_bak($id = NULL)
	{
		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			// redirect them to the home page because they must be an administrator to view this
			show_error('You must be an administrator to view this page.');
		}

		$id = (int)$id;

		$this->load->library('form_validation');
		$this->form_validation->set_rules('confirm', $this->lang->line('deactivate_validation_confirm_label'), 'required');
		$this->form_validation->set_rules('id', $this->lang->line('deactivate_validation_user_id_label'), 'required|alpha_numeric');

		if ($this->form_validation->run() === FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->user($id)->row();

			$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_error($this->lang->line('error_csrf'));
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			// redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	/**
	 * Create a new user
	 */
	public function create_user()
	{
		$this->data['title'] = $this->lang->line('create_user_heading');

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth', 'refresh');
		}

		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim|required|exact_length[10]|is_unique[' . $tables['users'] . '.phone]');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = [
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone'),
			];
		}
		$groups = array();
		if($this->session->userdata('role') == 'master_channel_partner')
		{
			$groups = $this->input->post('groups');
		}
		//add condition for role groups -sachhidana 
		else{
			if(!empty($this->input->post('groups')))
				$groups = $this->input->post('groups');
		}
		if ($this->form_validation->run() === TRUE && $this->ion_auth->register($identity, $password, $email, $additional_data,$groups))
		{
		
			// check to see if we are creating the user
			// redirect them back to the admin page
			$message["status"]="Success";
			$message["text"]="User Create Successfully";
			
			$this->session->set_flashdata('message',$message );
			if($this->session->userdata('role') == 'master_channel_partner')
			{
				redirect("societies/master_cp", 'refresh');	
			}
			elseif($this->ion_auth->is_admin())
			{

				redirect("users", 'refresh');
			}
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = [
				'name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'class' => 'form-control input_name',
				'required' => '',
				// 'pattern'=>"[a-zA-Z ]+",
				'value' => $this->form_validation->set_value('first_name'),
			];
			$this->data['last_name'] = [
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'class' => 'form-control input_name',
				'required' => '',
				// 'pattern'=>"[a-zA-Z ]+",
				'value' => $this->form_validation->set_value('last_name'),
			];
			$this->data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('identity'),
			];
			$this->data['email'] = [
				'name' => 'email',
				'id' => 'email',
				'type' => 'email',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('email'),
			];
			$this->data['company'] = [
				'name' => 'company',
				'id' => 'company',
				'type' => 'text',
				'required' => '',
				'class' => 'form-control input_name',
				// 'pattern'=>"[a-zA-Z.& ]+",
				// 'oninvalid'=>"setCustomValidity('Please enter correct company name.')",
				'value' => $this->session->userdata('role') == 'master_channel_partner' ? $this->session->userdata('company') : $this->form_validation->set_value('company'),
			];
			$this->data['phone'] = [
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				'required' => '',
				'pattern' => '[0-9]{10}',
				'class' => 'form-control',
				'oninvalid'=>"this.setCustomValidity('Please enter 10 digit phone no.')" ,'onchange'=>"try{setCustomValidity('')}catch(e){}",
				'oninput'=>"setCustomValidity(' ')",
				'value' => $this->form_validation->set_value('phone'),
			];
			$this->data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'required' => '',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('password'),
			];
			$this->data['password_confirm'] = [
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'required' => '',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('password_confirm'),
			];
      		$this->data["role_list"] = $this->Role_model->get_main_roles(array(1,5,16));
		
			$this->_render_page('users' . DIRECTORY_SEPARATOR . 'add_users', $this->data);
		}
	}
	/**
	* Redirect a user checking if is admin
	*/
	public function redirectUser(){
		if ($this->ion_auth->is_admin()){
			
			redirect('auth/user_list', 'refresh');
		}
		redirect('/', 'refresh');
	}
	
	public function register(){
		$this->data['title'] = $this->lang->line('create_user_heading');
		
		$this->_render_page('auth' . DIRECTORY_SEPARATOR . 'register', $this->data);
	}

	/**
	 * Edit a user
	 *
	 * @param int|string $id
	 */
	public function edit_user($user_id='')
	{
		
		$this->data['title'] = $this->lang->line('edit_user_heading');

		// if (!$this->ion_auth->logged_in() || (!$this->ion_auth->is_admin() && !($this->ion_auth->user()->row()->id == $id)))
		if (!$this->ion_auth->logged_in() && !($this->ion_auth->user()->row()->id == $user_id))
		{
			redirect('auth', 'refresh');
		}
		$user = $this->ion_auth->user($user_id)->row();
		
		// $groups = $this->ion_auth->groups()->result_array();
		$groups = $this->Role_model->get_main_roles(array(1,5,16,13));
		
		$currentGroups = $this->ion_auth->get_users_groups($user_id)->result();
		
		//USAGE NOTE - you can do more complicated queries like this
		//$groups = $this->ion_auth->where(['field' => 'value'])->groups()->result_array();
	

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'trim');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim|required|numeric|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_rules('email', $this->lang->line('edit_user_validation_email_label'), 'trim|required|valid_email');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				
				if(!empty($this->input->post('email'))){
					$data = [
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'email' => $this->input->post('email'),
						'phone' => $this->input->post('phone'),
					];
				}else{
					$data = [
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'phone' => $this->input->post('phone'),
					];
				}
				

				$params = array(
					'name' => $this->input->post('first_name'),
					'phone' => $this->input->post('phone'),
                );

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}
				
				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					
					// Update the groups user belongs to
					$this->ion_auth->remove_from_group('', $user_id);
					
					$groupData = $this->input->post('groups');
					if (isset($groupData) && !empty($groupData))
					{
						foreach ($groupData as $grp)
						{

							$this->ion_auth->add_to_group($grp, $user_id);
							$group = $this->ion_auth->group($grp)->row();
							if($group->name=="CA"){
								
								$wauser=$this->ledger->get_wzuser($this->input->post('email')); 
							   	if($wauser==0){
								   $full_name=$this->input->post('first_name')." ".$this->input->post('last_name');
									$this->ledger->create_wzuser($this->input->post('email'),$this->input->post('password'),$full_name,$this->input->post('email'));  
								
							   }
							}
						}

					}
				}
			
				// check to see if we are updating the user
				if ($this->ion_auth->update($user->id, $data)/*  && $this->Member_model->update_member_by_user_id($id,$params) */)
				{
					
					// if($this->input->post('society_id'))
					// {
					// 	$society_id = $this->input->post('society_id');
					// }

					// $member = $this->Member_model->get_member_by_user_id($id);
					//error occur in society access table- sachhidanand 14-12-2022
					if(!empty($this->input->post('society_id')) &&  $this->input->post('society_id')!=0){
						$this->User_model->update_society_acceses($user_id, $groupData,$this->input->post('society_id'));
					}
						
					
					if($this->input->post('for_security') == 1){
						$message['text'] = "Security Guard Updated successfully!!";
						$message['status'] = "Success";
						$this->session->set_flashdata('message', $message);
						$society_id = $this->input->post('society_id');
		            	redirect('societies/details/'.$society_id);
					}
					else{
						if ($this->ion_auth->is_admin())
						{	
							// redirect them back to the admin page if admin, or to the base url if non admin
							
							// $this->session->set_flashdata('message', $this->ion_auth->messages());

							$message['text'] = "User Details Updated successfully!!";
							$message['status'] = "Success";
							$this->session->set_flashdata('message', $message);
							$this->redirectUser();
						}
						else{							
							$society_id = $this->input->post('society_id');
							$message['text'] = "User Details Updated successfully!!";
							$message['status'] = "Success";
							$this->session->set_flashdata('message', $message);
							redirect('users/view_members/'.$society_id);
						}
					}

				}
				else
				{
					
					// redirect them back to the admin page if admin, or to the base url if non admin
					if ($this->ion_auth->is_admin())
					{
						// redirect them back to the admin page if admin, or to the base url if non admin
						$this->session->set_flashdata('message', $this->ion_auth->messages());
						$this->redirectUser();
					}
					else{
						$society_id = $this->input->post('society_id');
						$message['text'] = "Phone Number or Email already exists!!";
						$message['status'] = "Fail";
						$this->session->set_flashdata('message', $message);
						redirect('users/view_members/'.$society_id);
					}

				}

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		// $this->data['society_id'] = $id = $this->uri->segment(3);
		$this->data['user_id'] = $user_id = $this->uri->segment(3);
		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = [
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'class' => 'form-control',
			// 'pattern'=>"[a-zA-Z ]+",	
			'value' => $this->form_validation->set_value('first_name', $user->first_name)
		];
		$this->data['last_name'] = [
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'class' => 'form-control',	
			// 'pattern'=>"[a-zA-Z ]+",
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		];
		$this->data['email'] = [
			'name'  => 'email',
			'id'    => 'email',
			'type'  => 'text',
			'class' => 'form-control',	
			'value' => $this->form_validation->set_value('email', $user->email),
		];
		$this->data['phone'] = [
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'class' => 'form-control',
			'pattern'=>"[1-9]{1}[0-9]{9}",
			'oninvalid'=>"this.setCustomValidity('Please enter 10 digit phone no.')"	,
			'value' => $this->form_validation->set_value('phone', $user->phone),
		];
		$this->data['password'] = [
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password',
			'class' => 'form-control',	
		];
		$this->data['password_confirm'] = [
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password',
			'class' => 'form-control',	
		];
		
		$this->_render_page('users/edit_user', $this->data);
	}

	public function society_edit_user($society_id='',$user_id='')
	{
		
		$this->data['title'] = $this->lang->line('edit_user_heading');

		
		if (!$this->ion_auth->logged_in() && !($this->ion_auth->user()->row()->id == $user_id))
		{
			redirect('auth', 'refresh');
		}
		$user = $this->ion_auth->user($user_id)->row();		
		
		if($this->ion_auth->is_admin()){
			if(($this->uri->segment(1) != "roles"  && $this->uri->segment(1) != "cityState"  && $this->uri->segment(1) !="expense_categories"  && $this->uri->segment(1) !="society_access" && $this->uri->segment(1) !="bill_head_master" && $this->uri->segment(1) !="auth" ) && !empty($this->uri->segment(3))){ 
				$groups = $this->Role_model->get_main_roles(array(2,8));
			}else{
				$groups = $this->Role_model->get_main_roles(array(3));
			}
			
		}
		else{
			$groups = $this->Role_model->get_main_roles(array(2,8));
		}
		

		$currentGroups = $this->ion_auth->get_users_groups($user_id)->result();
		
		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'trim');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim|required|numeric|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_rules('email', $this->lang->line('edit_user_validation_email_label'), 'trim|required|valid_email');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				if(!empty($this->input->post('email'))){
					$data = [
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'email' => $this->input->post('email'),
						'phone' => $this->input->post('phone'),
					];
				}else{
					$data = [
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'phone' => $this->input->post('phone'),
					];
				}
				

				$params = array(
					'name' => $this->input->post('first_name'),
					'phone' => $this->input->post('phone'),
                );

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

				// Only allow updating groups if user is admin
				if ($this->ion_auth->is_admin())
				{
					
					// Update the groups user belongs to
					$this->ion_auth->remove_from_group('', $user_id);
					
					$groupData = $this->input->post('groups');
					if (isset($groupData) && !empty($groupData))
					{
						foreach ($groupData as $grp)
						{

							$this->ion_auth->add_to_group($grp, $user_id);
							$group = $this->ion_auth->group($grp)->row();
							
						}

					}
				}

				// check to see if we are updating the user
				if ($this->ion_auth->update($user->id, $data))
				{
					$society_id = $this->input->post('society_id');
					$message['text'] = "Details Updated successfully!!";
					$message['status'] = "Success";
					$this->session->set_flashdata('message', $message);
					redirect('users/view_members/'.$society_id);

				}else{
					$society_id = $this->input->post('society_id');
					$message['text'] = "Phone Number or Email already exists!!";
					$message['status'] = "Fail";
					$this->session->set_flashdata('message', $message);
					redirect('users/view_members/'.$society_id);
				}

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		
		$this->data['user_id'] = $user_id = $this->uri->segment(4);
		$this->data['society_id'] = $society_id = $this->uri->segment(3);
		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;
		
		$this->data['first_name'] = [
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'class' => 'form-control',	
			'value' => $this->form_validation->set_value('first_name', $user->first_name)
		];
		$this->data['last_name'] = [
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'class' => 'form-control',	
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		];
		$this->data['email'] = [
			'name'  => 'email',
			'id'    => 'email',
			'type'  => 'text',
			'class' => 'form-control',	
			'value' => $this->form_validation->set_value('email', $user->email),
		];
		$this->data['phone'] = [
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'class' => 'form-control',	
			'value' => $this->form_validation->set_value('phone', $user->phone),
		];
		$this->data['password'] = [
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password',
			'class' => 'form-control',	
		];
		$this->data['password_confirm'] = [
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password',
			'class' => 'form-control',	
		];
		
		$this->_render_page('users/edit_user', $this->data);
	}

	public function society_access_create_user($society_id='')
	{
		$this->data['title'] = $this->lang->line('create_user_heading');	

		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('create_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('create_user_validation_lname_label'), 'trim|required');
		if ($identity_column !== 'email')
		{
			$this->form_validation->set_rules('identity', $this->lang->line('create_user_validation_identity_label'), 'trim|required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email');
		}
		else
		{
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'trim|required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('phone', $this->lang->line('create_user_validation_phone_label'), 'trim|required|is_unique[' . $tables['users'] . '.phone]');
		$this->form_validation->set_rules('company', $this->lang->line('create_user_validation_company_label'), 'trim');
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

		
		if ($this->form_validation->run() === TRUE )
		{
			
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');

			$additional_data = [
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'company' => $this->input->post('company'),
				'phone' => $this->input->post('phone'),
			];
			$groups = $this->input->post('groups');
			
			if($user_id=$this->ion_auth->register($identity, $password, $email, $additional_data,$groups))
			{
				$this->User_model->update_society_acceses($user_id, $groups,$society_id);
				$message['text'] = "User Insert successfully!!";
				$message['status'] = "Success";
				$this->session->set_flashdata('message', $message);
				redirect('societies/society_users/'.$society_id);

			}else{
				$message['text'] = "User Insert unsuccessfully!!";
				$message['status'] = "Fail";
				$this->session->set_flashdata('message', $message);
				redirect('societies/society_users/'.$society_id);
			}
			
		}
		else
		{
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = [
				'name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'class' => 'form-control',
				// 'pattern'=>"[a-zA-Z ]+",
				'oninvalid'=>"this.setCustomValidity('Only alphabet allowed')",
      			'onchange'=>"try{setCustomValidity('')}catch(e){}",
      			'oninput'=>"setCustomValidity(' ')",
				'value' => $this->form_validation->set_value('first_name'),
			];
			
			$this->data['last_name'] = [
				'name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'class' => 'form-control',
				// 'pattern'=>"[a-zA-Z ]+",
				'value' => $this->form_validation->set_value('last_name'),
			];
			$this->data['identity'] = [
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('identity'),
			];
			$this->data['email'] = [
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('email'),
			];
			$this->data['company'] = [
				'name' => 'company',
				'id' => 'company',
				'type' => 'text',
				'class' => 'form-control',
				// 'pattern'=>"[a-zA-Z ]+",
				'value' => $this->session->userdata('role') == 'master_channel_partner' ? $this->session->userdata('company') : $this->form_validation->set_value('company'),
			];
			$this->data['phone'] = [
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
				// 'pattern' => '[7-9]{1}[0-9]{9}',
				'pattern' => '[0-9]{10}',
				'oninvalid'=>"this.setCustomValidity('Only 10 digit allowed')",
      			'onchange'=>"try{setCustomValidity('')}catch(e){}",
      			'oninput'=>"setCustomValidity(' ')",
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('phone'),
			];
			$this->data['password'] = [
				'name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'class' => 'form-control',
				'required'=> '',
				'value' => $this->form_validation->set_value('password'),
			];
			$this->data['password_confirm'] = [
				'name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'required'=> '',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('password_confirm'),
				
			];
			if($this->ion_auth->is_admin()||$this->session->userdata('role')=="channel_partner"||$this->session->userdata('role')=="CA"||$this->session->userdata('role')=="operator"){
				$this->data["role_list"] = $this->Role_model->get_main_roles(array(3));
			}
			else{
				$this->data["role_list"] = $this->Role_model->get_main_roles(array(8));	
			}
			$this->data["society_id"]=  $society_id;
			$this->_render_page('users' . DIRECTORY_SEPARATOR . 'society_add_users', $this->data);
		}
	}

	public function society_access_user_edit($society_id='',$user_id='')
	{
		
		$this->data['title'] = $this->lang->line('edit_user_heading');

		
		if (!$this->ion_auth->logged_in() && !($this->ion_auth->user()->row()->id == $user_id))
		{
			redirect('auth', 'refresh');
		}
		$user = $this->ion_auth->user($user_id)->row();
		
		// $groups = $this->ion_auth->groups()->result_array();

		if($this->ion_auth->is_admin()||$this->session->userdata('role')=="channel_partner"||$this->session->userdata('role')=="CA"){
			$groups = $this->Role_model->get_main_roles(array(3));
		}
		else{
			$groups = $this->Role_model->get_main_roles(array(2));	
		}
		$currentGroups = $this->ion_auth->get_users_groups($user_id)->result();
		
		//USAGE NOTE - you can do more complicated queries like this
		//$groups = $this->ion_auth->where(['field' => 'value'])->groups()->result_array();
	

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'trim');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim|required|numeric|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_rules('email', $this->lang->line('edit_user_validation_email_label'), 'trim|required|valid_email');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim');

		if (isset($_POST) && !empty($_POST))
		{
			
			if ($this->form_validation->run() === TRUE)
			{
				if(!empty($this->input->post('email'))){
					$data = [
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'email' => $this->input->post('email'),
						'phone' => $this->input->post('phone'),
					];
				}else{
					$data = [
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'phone' => $this->input->post('phone'),
					];
				}
				

				$params = array(
					'name' => $this->input->post('first_name'),
					'phone' => $this->input->post('phone'),
                );

				// update the password if it was posted
				if ($this->input->post('password'))
				{
					$data['password'] = $this->input->post('password');
				}

				// check to see if we are updating the user
				if ($this->ion_auth->update($user->id, $data)/*  && $this->Member_model->update_member_by_user_id($id,$params) */)
				{
					$society_id = $this->input->post('society_id');
					$message['text'] = "Details Updated successfully!!";
					$message['status'] = "Success";
					$this->session->set_flashdata('message', $message);
					redirect('societies/society_users/'.$society_id);

				}else{
					$society_id = $this->input->post('society_id');
					$message['text'] = "Phone Number or Email already exists!!";
					$message['status'] = "Fail";
					$this->session->set_flashdata('message', $message);
					redirect('societies/society_users/'.$society_id);
				}

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();
		
		$this->data['user_id'] = $user_id = $this->uri->segment(4);
		$this->data['society_id'] = $society_id = $this->uri->segment(3);
		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['user'] = $user;
		$this->data['groups'] = $groups;
		$this->data['currentGroups'] = $currentGroups;

		$this->data['first_name'] = [
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'class' => 'form-control',
			// 'pattern'=>"[a-zA-Z ]+",	
			'value' => $this->form_validation->set_value('first_name', $user->first_name)
		];
		$this->data['last_name'] = [
			'name'  => 'last_name',
			'id'    => 'last_name',
			'type'  => 'text',
			'class' => 'form-control',
			// 'pattern'=>"[a-zA-Z ]+",	
			'value' => $this->form_validation->set_value('last_name', $user->last_name),
		];
		$this->data['email'] = [
			'name'  => 'email',
			'id'    => 'email',
			'type'  => 'text',
			'class' => 'form-control',	
			'value' => $this->form_validation->set_value('email', $user->email),
		];
		$this->data['phone'] = [
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'class' => 'form-control',
			'pattern'=>"[0-9]{10}",	
			'oninvalid'=>"this.setCustomValidity('Only 10 digit allowed')",
      		'onchange'=>"try{setCustomValidity('')}catch(e){}",
      		'oninput'=>"setCustomValidity(' ')",
			'value' => $this->form_validation->set_value('phone', $user->phone),
		];
		$this->data['password'] = [
			'name' => 'password',
			'id'   => 'password',
			'type' => 'password',
			'class' => 'form-control',	
		];
		$this->data['password_confirm'] = [
			'name' => 'password_confirm',
			'id'   => 'password_confirm',
			'type' => 'password',
			'class' => 'form-control',	
		];
		
		$this->_render_page('users/edit_user', $this->data);
	}

	/**
	 * Create a new group
	 */
	public function create_group()
	{
		$this->data['title'] = $this->lang->line('create_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('roles', 'refresh');
		}

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('create_group_validation_name_label'), 'trim|required|alpha_dash');

		if ($this->form_validation->run() === TRUE)
		{
			$new_group_id = $this->ion_auth->create_group($this->input->post('group_name'), $this->input->post('description'));
			if ($new_group_id)
			{
				// check to see if we are creating the group
				// redirect them back to the admin page
				$message['status'] = 'Success';
  				$message['text'] = $this->ion_auth->messages();
				$this->session->set_flashdata('message',$message);
				redirect("roles", 'refresh');
			}
		}
		else
		{
			// display the create group form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['group_name'] = [
				'name'  => 'group_name',
				'id'    => 'group_name',
				'type'  => 'text',
				'class' => 'form-control',
				'pattern'=>"[a-zA-Z ]+",
				'value' => $this->form_validation->set_value('group_name'),
			];
			$this->data['description'] = [
				'name'  => 'description',
				'id'    => 'description',
				'type'  => 'text',
				'class' => 'form-control',
				'value' => $this->form_validation->set_value('description'),
			];

			$this->_render_page('roles/add_roles', $this->data);
		}
	}

	/**
	 * Edit a group
	 *
	 * @param int|string $id
	 */
	public function edit_group($id)
	{
		// bail if no group id given
		if (!$id || empty($id))
		{
			redirect('roles', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('roles', 'refresh');
		}

		$group = $this->ion_auth->group($id)->row();

		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'trim|required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
				$group_update = $this->ion_auth->update_group($id, $_POST['group_name'], array(
					'description' => $_POST['group_description']
				));

				if ($group_update)
				{
					$message['status'] = 'Success';
  					$message['text'] = $this->ion_auth->messages(); 
					$this->session->set_flashdata('message', $message);

				}
				else
				{
					$message['status'] = 'Fail';
  					$message['text'] = $this->ion_auth->errors();
					$this->session->set_flashdata('message',$message );
				}
				redirect("roles", 'refresh');
			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['group'] = $group;

		$this->data['group_name'] = [
			'name'    => 'group_name',
			'id'      => 'group_name',
			'type'    => 'text',
			'class' => 'form-control',
			'value'   => $this->form_validation->set_value('group_name', $group->slug),
		];
		if ($this->config->item('admin_group', 'ion_auth') === $group->slug) {
			$this->data['group_name']['readonly'] = 'readonly';
		}
		
		$this->data['group_description'] = [
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('group_description', $group->name),
		];

		$this->_render_page('roles' . DIRECTORY_SEPARATOR . 'edit_roles', $this->data);
	}
    //11-10-2021 sachhidanand use this function direction  of user dashboard
	public function edit_user_group($society,$id,$groups_id)
	{
		
		// bail if no group id given
		if (!$groups_id || empty($groups_id))
		{
			redirect('users', 'refresh');
		}

		$this->data['title'] = $this->lang->line('edit_group_title');

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('users', 'refresh');
		}

		// $group = $this->ion_auth->group($id)->row();// error this line is pass role id but pass user id
		$group = $this->ion_auth->group($groups_id)->row();
		// validate form input
		$this->form_validation->set_rules('group_name', $this->lang->line('edit_group_validation_name_label'), 'trim|required|alpha_dash');

		if (isset($_POST) && !empty($_POST))
		{
			if ($this->form_validation->run() === TRUE)
			{
			
				// $group_update = $this->ion_auth->update_group($id, $_POST['group_name'], array(
				// 	'description' => $_POST['group_description']
				// ));  // there pass group id not user id -sachhidanand -28-11-2021
				$group_update = $this->ion_auth->update_group($groups_id, $_POST['group_name'], array(
					'description' => $_POST['group_description']
				));
			
				if ($group_update)
				{
					$this->session->set_flashdata('message', $this->lang->line('edit_group_saved'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->ion_auth->errors());
				}
				redirect("users", 'refresh');
			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['group'] = $group;

		$this->data['group_name'] = [
			'name'    => 'group_name',
			'id'      => 'group_name',
			'type'    => 'text',
			'class' => 'form-control',
			'value'   => $this->form_validation->set_value('group_name', $group->slug),
		];
		if ($this->config->item('admin_group', 'ion_auth') === $group->slug) {
			$this->data['group_name']['readonly'] = 'readonly';
		}
		
		$this->data['group_description'] = [
			'name'  => 'group_description',
			'id'    => 'group_description',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('group_description', $group->name),
		];

		$this->_render_page('users' . DIRECTORY_SEPARATOR . 'edit_user_roles', $this->data);
	}

	/**
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return [$key => $value];
	}

	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce(){
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
			return FALSE;
	}

	/**
	 * @param string     $view
	 * @param array|null $data
	 * @param bool       $returnhtml
	 *
	 * @return mixed
	 */
	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{

		$viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}

	public function enroll($account=0) {
		$data = array(
            'title' => "Enroll Society"
        );

		if($this->input->post('account')==1){
			$account=1;
		}
		
        $this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');		
		$this->form_validation->set_rules('phone','Phone','required|exact_length[10]');
		// $this->form_validation->set_rules('society_name','Society Name','required');
		$this->form_validation->set_rules('pincode','Pincode','required');		
		$this->form_validation->set_rules('city','City','required');
		$this->form_validation->set_rules('state','State','required');
		$this->form_validation->set_rules('country','Country','required');
		if($this->form_validation->run()) {		
			
            $params = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'role' => $this->input->post('role'),
				// 'society_name' => $this->input->post('society_name'),
				// 'society_address' => $this->input->post('society_address'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'country' => $this->input->post('country'),
				'pincode' => $this->input->post('pincode'),
				'reference' => $this->input->post('source'),
				'span' => $this->input->post('connect_time'),
				'no_of_units' => $this->input->post('units'),
            );

			if(!empty($this->input->post('ca_firm_name'))){
				$params["ca_firm_name"]=$this->input->post('ca_firm_name');
				$params["ca_member_number"]=$this->input->post('ca_member_number');
			}else{
				$params["society_name"]=$this->input->post('society_name');
				$params["society_address"]=$this->input->post('society_address');
			}		

            $society_name=$this->input->post('society_name');		
			
			// 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
            if($this->db->insert('society_enrollment_requests', $params)): 
			

				
				if($this->input->post('role')=="Member"){
					$role_data=$this->Role_model->get_role_by_name("Society Member");					
					$role_id=$role_data['id'];
				}else if($this->input->post('role')=="Committee Member"){
					$role_data=$this->Role_model->get_role_by_name("Committee Member");
					$role_id=$role_data['id'];			
				}
				else if($this->input->post('role')=="Accountant"){
					$role_data=$this->Role_model->get_role_by_name("CA");
					$role_id=$role_data['id'];
				}
				
				$email = strtolower($this->input->post('email'));
				$identity = $email;
				
				$password = substr(str_shuffle("123456789abcdefghjkmnopqrstvwxyzABCDEFGHJKLMNPQRSTUVWXYZ"), 0, 6);

				$additional_data = [
					'first_name' =>  $this->input->post('name'),
					'last_name' => $this->input->post('last_name'),
					// 'company' => $this->input->post('company'),
					'phone' => $this->input->post('phone'),
				];

				$role_ids = array($role_id);

				$id = $this->ion_auth_model->register($identity, $password, $email, $additional_data, $role_ids);


				$user_email_data=array(
					"sender" => array(
						"email" => "minas.s@paynet.co.in",
						"name" => "Minaz"         
					),
					"to" => array(
						array(
							"email" => $email,
							// "email" => "sachin.gupta@paynet.co.in",
							"name" => "Operation"
						)
				
					),
				);

				$user_email_data["htmlContent"]='<html><head></head><body>
					<p>Dear User, </p>					
					<p>Your Email Id : '.strtolower($this->input->post('email')).'</p>	
					<p>Password : '.$password .'</p>
					</body></html>';

				$ch = curl_init();	
				curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($user_email_data));	
				$headers = array();
				$headers[] = 'Accept: application/json';
				$headers[] = 'Api-Key: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';
				$headers[] = 'Content-Type: application/json';
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
				$result = curl_exec($ch);
				
				curl_close($ch);
	

				
				
				$data = array(
					"sender" => array(
						"email" => "minas.s@paynet.co.in",
						"name" => "Minaz"         
					),
					"to" => array(
						array(
							"email" => "merchant.ops@paynet.co.in",
							// "email" => "sachin.gupta@paynet.co.in",
							"name" => "Operation"
						)
				
					),
					"subject" => "Enrollment ",
					//"htmlContent" => '<html><head></head><body><p>'.$society_name.' is onBoarding</p></body></html>',			
				);
				
				if(!empty($this->input->post('ca_firm_name'))){
					$data["htmlContent"]='<html><head></head><body>
					<p>Dear Team, </p>
					<p>Please find  the following details of CA Enrollment :</p>
					<p>Name: '.$this->input->post('name').'</p>
					<p>CA Firm Name : '.$this->input->post('ca_firm_name').'</p>';
					if(!empty($this->input->post('ca_member_number')))
					$data["htmlContent"].='<p>CA Membership Number : '.$this->input->post('ca_member_number').'</p>';					
					$data["htmlContent"].='<p>Phone Number : '.$this->input->post('phone').'</p>
					<p>Email : '.$this->input->post('email').'</p>
					<p>No of Units : '.$this->input->post('units').'</p></body></html>';
					
				}else{
					$data["htmlContent"]='<html><head></head><body>
					<p>Dear Team, </p>
					<p>Please find  the following details of society Enrollment :</p>
					<p>Name : '.$this->input->post('name').'</p>	
					<p>Society Name : '.$society_name.'</p>	
					<p>Phone Number : '.$this->input->post('phone').'</p>
					<p>Email : '.$this->input->post('email').'</p>
					<p>No of Units : '.$this->input->post('units').'</p>
					</body></html>';
					
				}
				
				// $ch = curl_init();	
				// curl_setopt($ch, CURLOPT_URL, 'https://api.sendinblue.com/v3/smtp/email');
				// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				// curl_setopt($ch, CURLOPT_POST, 1);
				// curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));	
				// $headers = array();
				// $headers[] = 'Accept: application/json';
				// $headers[] = 'Api-Key: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';
				// $headers[] = 'Content-Type: application/json';
				// curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
				// $result = curl_exec($ch);
				
				// curl_close($ch);

				if(!empty($this->input->post('ca_firm_name'))){
					$message['text'] = "CA Enrollment Successfully!!";
				}else{
					$message['text'] = "Society Enrollment Successfully!!";
				}
				
				$message['status'] = "Success";		
				
            else:
				if(!empty($this->input->post('ca_firm_name'))){
					$message['text'] = "CA Enrollment Unsuccessfully!!";
				}else{
					$message['text'] = "Society Enrollment Unsuccessfully!!";
				}
				
				$message['status'] = "Fail";				
            endif;
			$this->session->set_flashdata('enroll',$message);
			
			redirect('auth/login');	
        }else{
			
			$data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');	
			$data['account'] = $account;		
			$data['cities'] = $this->CityState_model->get_all_city();
			$data['states'] = $this->CityState_model->get_all_state();
			$data['_view'] = 'auth/view_enroll_society';			
			$this->load->view('auth/view_enroll_society', $data);

		}	
		
        // else
        // {   
		// 	// $message['text'] = "Please Check Your Input!!";
		// 	// $message['status'] = "Fail";
		// 	$this->session->set_flashdata('message','');
		// 	$data['cities'] = $this->CityState_model->get_all_city();
		// 	$data['states'] = $this->CityState_model->get_all_state();
        //     $data['_view'] = 'auth/view_enroll_society';
        //     $this->load->view('auth/view_enroll_society', $data);
        // }
	}


	
	public function channel_partner() {
		$data = array(
            'title' => "Channel Partner Signup"
        );
        $this->load->library('form_validation');

		$this->form_validation->set_rules('name','Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('phone','Phone','required');
		// $this->form_validation->set_rules('society_name','Society Name','required');
		$this->form_validation->set_rules('pincode','Pincode','required');
		if($this->form_validation->run())     
        {   
  
            $params = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'society_address' => $this->input->post('address'),
				'city' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'pincode' => $this->input->post('pincode'),
				'span' => $this->input->post('connect_time'),
				'no_of_units' => $this->input->post('units'),
				// 'created_at' => time(),
            );
            
            if($this->db->insert('society_enrollment_requests', $params)):
            	$tables = $this->config->item('tables', 'ion_auth');
                $identity_column = $this->config->item('identity', 'ion_auth');
                $this->data['identity_column'] = $identity_column;
                $email = strtolower($this->input->post('email'));
                $identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
                $password = 'partner@mSoc1';

                $additional_data = [
                    'first_name' => $this->input->post('name'),
                    'last_name' => '',
                    'company' => '',
                    'phone' => $this->input->post('phone'),
                ];
                $group = array('3');
                if($this->ion_auth->register($identity, $password, $email, $additional_data,$group)):
                	$getInvitationMsg = "You have been registered as Channel Partner on ManageMod mSociety. Your login credentials are, Username: ".$identity."and Password: ".$password.". Our team will contact you soon.";
                	$authKey = 'P@$$word@4321';
	                $mobileNumber = $this->input->post('phone');
	                $senderId = 'PAYNET';
	                $message = $getInvitationMsg;
	                echo $mobileNumber; echo"<br>"; echo $message;
	                $route = "4";
	                $postData = array(
	                    'authkey' => $authKey,
	                    'mobiles' => $mobileNumber,
	                    'message' => $message,
	                    'sender' => $senderId,
	                    'route' => $route
	                );

	                $url="http://bhashsms.com/api/sendmsg.php?user=Carnelian&pass=".$authKey."&sender=".$senderId."&phone=".$mobileNumber."&text=".urlencode($message)."&priority=ndnd&smstype=normal";
	                $ch = curl_init();
	                curl_setopt_array($ch, array(
	                    CURLOPT_URL => $url,
	                    CURLOPT_RETURNTRANSFER => true,
	                ));
	                //Ignore SSL certificate verification
	                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	                //get response
	                $output = curl_exec($ch);
	                curl_close($ch);
	                // die;
                endif;
                $message['text'] = "Channel Partner added successfully!!";
                $message['status'] = "Success";
                $this->session->set_flashdata('message', $message);
                redirect('auth/login');
            else:
                $message['text'] = "Please Check Your Input!!";
                $message['status'] = "Fail";
                $this->session->set_flashdata('message', $message);
                redirect('auth/enroll');
            endif;
        }
        else
        {   
            $data['_view'] = 'auth/channel_partner';
            $this->load->view('auth/channel_partner', $data);
        }
	}

	public function tnc()
	{
		$data = array(
            'title' => "Terms & Conditions"
        );
		$data['_view'] = 'auth/tnc';
        $this->load->view('auth/tnc', $data);
	}

	public function society_member_user($society_id='',$member_id='')
	{
		
		$this->data['title'] = $this->lang->line('edit_user_heading');	
				
		$groups = $this->Role_model->get_main_roles(array(2,8));
		
		

		$member = $this->Member_model->get_member($member_id);
		if($society_id=='')
		$society_id=$member["society_id"];
		
		//USAGE NOTE - you can do more complicated queries like this
		//$groups = $this->ion_auth->where(['field' => 'value'])->groups()->result_array();
	

		// validate form input
		$this->form_validation->set_rules('first_name', $this->lang->line('edit_user_validation_fname_label'), 'trim|required');
		$this->form_validation->set_rules('last_name', $this->lang->line('edit_user_validation_lname_label'), 'trim');
		$this->form_validation->set_rules('phone', $this->lang->line('edit_user_validation_phone_label'), 'trim|required|numeric|regex_match[/^[0-9,]+$/]');
		$this->form_validation->set_rules('email', $this->lang->line('edit_user_validation_email_label'), 'trim|required|valid_email');
		$this->form_validation->set_rules('company', $this->lang->line('edit_user_validation_company_label'), 'trim');

		if (isset($_POST) && !empty($_POST))
		{
			
			if ($this->form_validation->run() === TRUE)
			{

				$member_id= $this->input->post('id');
				$groups=implode(",",$this->input->post('groups'));
				
				$update_array = [
							'name' => $this->input->post('first_name'),
							'email_id' => $this->input->post('email'),
							'phone' => $this->input->post('phone'),
							'member_role'=>$groups,
							'updated_at'=>date("Y-m-d H:i:s")
						];
				

				// check to see if we are updating the user
				if ($this->Member_model->update_member($member_id,$update_array))
				{
					
					$message['text'] = "Details Updated successfully!!";
					$message['status'] = "Success";
					$this->session->set_flashdata('message', $message);
					redirect('users/view_members/'.$society_id);

				}else{
					
					$message['text'] = "Phone Number or Email already exists!!";
					$message['status'] = "Fail";
					$this->session->set_flashdata('message', $message);
					redirect('users/view_members/'.$society_id);
				}

			}
		}

		// display the edit user form
		$this->data['csrf'] = $this->_get_csrf_nonce();	
		
		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		// pass the user to the view
		$this->data['member'] = $member;
		$this->data['groups'] = $groups;
		$this->data['society_id'] = $society_id ;
		$this->data['first_name'] = [
			'name'  => 'first_name',
			'id'    => 'first_name',
			'type'  => 'text',
			'class' => 'form-control',	
			'value' => $this->form_validation->set_value('first_name', $member['name'])
		];
		
		$this->data['email'] = [
			'name'  => 'email',
			'id'    => 'email',
			'type'  => 'text',
			'class' => 'form-control',	
			'value' => $this->form_validation->set_value('email', $member['email_id']),
		];
		$this->data['phone'] = [
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
			'class' => 'form-control',	
			'value' => $this->form_validation->set_value('phone',$member['phone']),
		];
		
		
		$this->_render_page('users/society_edit_user', $this->data);
	}


}