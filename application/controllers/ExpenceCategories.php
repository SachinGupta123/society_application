<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExpenceCategories extends CI_Controller
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
        $this->load->model('Expense_category_model');
    }
	
	public function view_expense_categories() {
		$data = array(
			'title' => "Expense Categories"
		);
		// $this->load->view('expense_categories/view_expense_categories', $data);

		$data['expense_categories'] = $this->Expense_category_model->get_all_expense_categories();
        
        // $data['_view'] = 'expense_category/index';
        $this->load->view('expense_categories/view_expense_categories',$data);
	}

	public function add_expense_categories() {
		$data = array(
			'title' => "Expense Categories"
		);
		$this->load->library('form_validation');

		$this->form_validation->set_rules('expense_category_name','Name','required');
		
		if($this->form_validation->run())     
        {   
            $expense_name = $this->Expense_category_model->check_expense_name($this->input->post('expense_category_name'));
            
            if(!empty($expense_name)){
                $message['status'] = 'Fail';
                $message['text'] = 'Already Available Expense Category!!';
                $this->session->set_flashdata('message', $message);  
                redirect('expense_categories');
            }else{
                $params = array(
                    'name' => trim($this->input->post('expense_category_name')),
                    'created_at' => date('Y-m-d H:i:s'),
                );
                
                $expense_category_id = $this->Expense_category_model->add_expense_category($params);
                $message['status'] = 'Success';
                $message['text'] = 'Expense added successfully!!';
                $this->session->set_flashdata('message', $message);  
                redirect('expense_categories');
            }
           
        }
        else
        {            
            $data['_view'] = 'expense_category/add';
            $this->load->view('expense_categories/add_expense_categories',$data);
        }
		// $this->load->view('expense_categories/add_expense_categories', $data);
	}

	public function edit_expense_categories($id = '') {

		if($id == ''){
			$id = $this->input->post('expense_category_id');
		}
		$data = array(
			'title' => "Expense Categories"
		);
		// $this->load->view('expense_categories/edit_expense_categories', $data);
		$data['expense_category'] = $this->Expense_category_model->get_expense_category($id);

		// check if the expense_category exists before trying to edit it
        
        if(isset($data['expense_category']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('expense_category_name','Name','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'name' => $this->input->post('expense_category_name'),
					'updated_at' => date('Y-m-d H:i:s'),
                );

                $this->Expense_category_model->update_expense_category($id,$params);
                $message['status'] = 'Success';
                $message['text'] = 'Expense Update successfully!!';
                $this->session->set_flashdata('message', $message);            
                redirect('expense_categories');
            }
            else
            {
                $data['_view'] = 'expense_category/edit';
                $this->load->view('expense_categories/edit_expense_categories',$data);
            }
        }
        else
            show_error('The expense_category you are trying to edit does not exist.');
	}

	function remove($id)
    {
        $expense_category = $this->Expense_category_model->get_expense_category($id);

        // check if the user exists before trying to delete it
        if(isset($expense_category['id']))
        {
            $this->Expense_category_model->delete_expense_category($id);
            redirect('expense_categories');
        }
        else
            show_error('The user you are trying to delete does not exist.');
    }


	public function expense_update()
    {
       
        $expense_category = $this->Expense_category_model->expense_cat_update();
        die( $expense_category);
        
    }

}
?>