<?php

// include_once (dirname(__FILE__). "/Main.php");

class Users extends CI_Controller
{
	function __construct()
    {
        // if($this->session->userdata('login') != true):
        //     $this->session->unset_userdata('data');
        //     $this->session->unset_userdata('login');
        //     echo json_encode('You are thrown out');
        //     exit;
        // endif;
        header('Content-type:application/json');
        header('Access-Control-Allow-Origin:*');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers:*');
        header('Access-Control-Allow-Credentials:true');
        header('Access-Control-Max-Age:1728000');
        parent::__construct();
        // $this->load->model('merchants');
        // $this->load->model('apis');
        // $this->config->load("config");
        $this->load->model('Member_model');
        $this->config->set_item('csrf_protection', TRUE);
        $this->load->model('User_model');
        // $this->load->library('REST_Controller');
		// use Restserver\Libraries\REST_Controller;
        // $this->load->model('Bank_transaction_model');
    }

    public function sign_in()
    {
    	$url = parse_url($_SERVER['REQUEST_URI']);
        // echo json_encode(file_get_contents("php://input")) ;return;exit;die; 
    	$request = json_decode(file_get_contents("php://input"),true);

        // var_dump($request);
    	
    	$username = $request['user']['username'];
        $password = $request['user']['password'];

        // var_dump($username);die();
        // return;
        $data = $this->ion_auth->login($username, $password);
        if(!empty($data)){
        $this->session->set_userdata('data', $data);
        $this->session->set_userdata('login', true);
        $user_id = $data->id; /*echo $user_id;*/
        $user_role = $this->User_model->get_user_role_by_user_id($user_id);
		$user = $this->User_model->get_user($user_id);
		$member = $this->Member_model->get_member_by_user_id($user_id);

		if($user_role[0]['group_id'] == UserRoles::operator):
			$role = 'Operator';
		elseif($user_role[0]['group_id'] == UserRoles::utility_service_provider):
			$role = 'Utility Service Provider';
		elseif($user_role[0]['group_id'] == UserRoles::committee_member):
			$role = 'Committee Member';
		elseif($user_role[0]['group_id'] == UserRoles::members):
			$role = 'Member';
        elseif($user_role[0]['group_id'] == UserRoles::security_guard):
            $role = 'Security Guard';
		else:
			$role = 'Admin';
		endif;
        	// print_r($role);die;
        $resp = array(
        	"message"=>'successfully logged in !!!',
            "role"=>$role,
        	"success"=>true,
        	"user_id"=>$data->id,
        	"username"=>$username,
        );
        if($user['society_id'] != 0){
            $resp["reception_id"] = $user['society_id'];
        }
        echo json_encode($resp); return;
        } else{
        	// echo json_encode(array(
         //        "status" => false,
         //        "error" => "Invalid Login",
         //        "error_code" => "500"
         //    ));
            echo "<div>Error</div>"; 
            return;
        }
    }

    public function sign_out()
    {
    	$url = parse_url($_SERVER['REQUEST_URI']);
    	$this->ion_auth->logout();
    }

    public function changePassword()
    {
    	$url = parse_url($_SERVER['REQUEST_URI']);
		parse_str($url['query'], $params);
    	$user_id = $params['id'];
    	// print_r($user_id);die;
    	$user_id = json_encode($params);
    	$identity = $this->session->userdata('identity');
    	$old = $this->input->post('old');
    	$new = $this->input->post('new');
    	$change = $this->ion_auth->change_password($identity, $old, $new);

    	if ($change)
		{
			//if the password was successfully changed
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			$this->logout();
			return;
		}
		else
		{
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('auth/change_password', 'refresh');
			return;
		}
    }
}
?>