<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller
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
        $this->load->model('Services_model');
    }
	
	public function view_services() {
		$data = array(
			'title' => "Services Categories"
		);
		// $this->load->view('expense_categories/view_expense_categories', $data);

		$data['services_categories'] = $this->Services_model->get_all_services_categories();
        
        // $data['_view'] = 'expense_category/index';
        $this->load->view('services/view_service_category',$data);
	}

	public function add_services_categories() {
		$data = array(
			'title' => "Services Categories"
		);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('service_category_name','Name','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'service_name' => $this->input->post('service_category_name'),
				'created_at' => date('Y-m-d H:i:s'),
            );
            
            $expense_category_id = $this->Services_model->add_service_category($params);
            redirect('services-categories');
        }
        else
        {            
            $data['_view'] = 'services-categorie/add';
            $this->load->view('services/add_services_categories',$data);
        }
		// $this->load->view('expense_categories/add_expense_categories', $data);
	}

	public function edit_services_categories($id = '') {

		if($id == ''){
			$id = $this->input->post('services_category_id');
		}
		$data = array(
			'title' => "Services Categories"
		);
		// $this->load->view('expense_categories/edit_expense_categories', $data);
		$data['services_category'] = $this->Services_model->get_services_category($id);

		// check if the expense_category exists before trying to edit it
        
        if(isset($data['services_category']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('services_category_name','service Name','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'service_name' => $this->input->post('services_category_name'),
					'updated_at' => date('Y-m-d H:i:s'),
                );

                $this->Services_model->update_services_category($id,$params);            
                redirect('services-categories');
            }
            else
            {
                $data['_view'] = 'services-category/edit';
                $this->load->view('services/edit_services_category',$data);
            }
        }
        else
            show_error('The expense_category you are trying to edit does not exist.');
	}

	function remove($id)
    {
        $expense_category = $this->Services_model->get_services_category($id);

        // check if the user exists before trying to delete it
        if(isset($expense_category['id']))
        {
            $this->Services_model->delete_expense_category($id);
            redirect('services-categories');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }

}
?>