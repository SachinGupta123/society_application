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
        $this->load->model('Ion_auth_model');
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
        if(isset($request['user']['username']) && is_numeric($request['user']['username']))
        {
            $phone = $request['user']['username']; 
        }
        elseif(isset($request['user']['username']) && preg_match('/@.+\./', $request['user']['username']))
        {
            $username = $request['user']['username'];
        }
        
        $password = $request['user']['password'];
        // 
        // var_dump($username);die();
        // return;
        if((!empty($username) || !empty($phone)) && !empty($password))
        {
            if(isset($phone)){
                // $mobile_data = $this->ion_auth->login($phone, $password,'','phone');
                // $mobile_number = $this->input->post('phone');
                $check_mobile_number = $this->User_model->get_user_phone($phone);
                $db_phone = $check_mobile_number['phone'];
                
                if(!empty($db_phone))
                {
                    if($check_mobile_number['last_login'] === NULL)
                    {
                        $send_otp = $this->User_model->get_otp($db_phone);
                        // print_r($db_phone);die;
                        if(!empty($send_otp))
                        {
                            echo json_encode(array('responseCode' => '200', 'message' => 'OTP Generated!!'));
                            return;
                        }
                        else
                        {
                            echo json_encode(array('responseCode' => '401', 'message' => 'Cannot Generate OTP!!'));
                            return;
                        }
                    }
                    else{
                        $data = $this->ion_auth->login($phone, $password,'','phone');
                    }
                }
                else{
                    echo json_encode(array('ResponseCode'=>'402','message'=>'No record found for this mobile number!!!'));
                    return;
                }
            } else {
                // echo $username;
                // echo $password; return;
                $data = $this->ion_auth->login($username, $password);
                // print_r($data);return;
            }

            if(!empty($data))
            {
                $this->session->set_userdata('data', $data);
                $this->session->set_userdata('login', true);
                $user_id = $data->id; /*echo $user_id;*/
                $user_role = $this->User_model->get_user_role_by_user_id($user_id);
                    
                $user = $this->User_model->get_user($user_id);
                $member = $this->Member_model->get_all_members($user_id);

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
                    "username"=>$data->username,
                );
                if($user['society_id'] != 0){
                    $resp["reception_id"] = $user['society_id'];
                }
                echo json_encode($resp); return;
            } 
            else
            {
                echo json_encode(array('ResponseCode'=>'403','message'=>'Invalid Credentials!!!'));
                return;
            }        
        
        }
    }



    public function  get_all_society_by_member_id()
    {

        $user_id = $this->input->post('user_id');
       
      
        if($user_id == "")
        {

            echo json_encode(array('responseCode' => 1002, 'message' => 'Error user cannot be Blank',));

        }
        else
        {
            $society_by_member['society_by_member'] = $this->Member_model->get_society_name_by_member_id_api($user_id);
            if (!empty($society_by_member)) :
                echo json_encode($society_by_member);
                return;
            else :
                $resp = array(
                    'response_code'=>'1001',
                    'message'=>'Member Does not Exist',
                    'society_by_member'=>'',
                );
                echo json_encode($resp);
            endif;

        }
    
    }

    public function sign_out()
    {
    	$url = parse_url($_SERVER['REQUEST_URI']);
    	$this->ion_auth->logout();
    }

    public function changePassword()
    {
    	$user_id = $this->input->post('user_id');
        $current_password = $this->input->post('current_password');
        // print_r($current_password);
        $new_password = $this->input->post('new_password');
        $confirm_new_password = $this->input->post('confirm_new_password');
        if($current_password == "" || $new_password == ""){
            echo json_encode(array('responseCode' => 1002, 'message' => 'Error! Current Password and New Password cannot be blank!!!',));
        }
        else
        {
            $passwd = $this->User_model->getCurrPassword($user_id);
            // print_r($passwd);die;
            if(password_verify($current_password,$passwd['password']) == $current_password){
                if($new_password == $confirm_new_password){
                    if($this->User_model->updatePassword($new_password, $user_id)){
                        echo json_encode('Password updated successfully');
                    }
                    else{
                        echo json_encode('Failed to update password');
                    }
                }
                else{
                    echo json_encode('New password & Confirm password is not matching');
                }
            }
            else{
                echo json_encode('Sorry! Current password is not matching');
            }
        }
    }

    public function forgot_password()
	{
        // print_r($this->input->post());die;return;
        // $user_id = $this->input->post('user_id');
        $email = $this->input->post('identity');
        $email_validation_check = filter_var($this->input->post('identity'), FILTER_VALIDATE_EMAIL);
        if($email == ""){
            echo json_encode(array('responseCode' => 1002, 'message' => 'Please enter a email address!!!',));
        }
        else{
            
            $identity_column = $this->config->item('identity', 'ion_auth');
            $identity = $this->ion_auth->where($identity_column,  $this->input->post('identity'))->users()->row();
            $forgot_password = $this->Ion_auth_model->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});
            // print_r($forgot_password);die;
            if($forgot_password)
			{
                echo json_encode(array('ResponseCode'=>'200','message'=>'Email Sent Successfully!!!'));
			}
			else
			{
				echo json_encode(array('ResponseCode'=>'401','message'=>'No record found for this email address!!!'));
			}
        }
    }

    // public function login_with_mobile_number()
	// {

    //     $mobile_number = $this->input->post('mobile_number');
    //     $check_mobile_number = $this->User_model->get_user_phone($mobile_number);
    //     $db_phone = $check_mobile_number['phone'];
    //     if(!empty($db_phone))
    //     {
    //         if($check_mobile_number['last_login'] === NULL)
    //         {
    //             $send_otp = $this->User_model->get_otp($mobile_number);
    //             if(!empty($send_otp))
    //             {
    //                 echo json_encode(array('responseCode' => '200', 'message' => 'OTP Generated!!'));
    //                 return;
    //             }
    //             else
    //             {
    //                 echo json_encode(array('responseCode' => '401', 'message' => 'Cannot Generate OTP!!'));
    //                 return;
    //             }
    //         }
    //     }
    //     else{
    //         echo json_encode(array('ResponseCode'=>'402','message'=>'No record found for this mobile number!!!'));
    //     }
    // }   

    public function get_otp_verify()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('otp_field', 'OTP', 'required|regex_match[/^[0-9]/]');
        if ($this->form_validation->run() == true) {
            $otp = $this->input->post('otp_field');
            $phone = $this->input->post('phone');

            $resp =  $this->User_model->get_otp_verify($otp, $phone);
            if($resp)
            {
                $user = $this->User_model->get_user_phone($phone);
                $user_role = $this->User_model->get_user_role_by_user_id($user['id']);
                    
                $user = $this->User_model->get_user($user['id']);
                $member = $this->Member_model->get_all_members($user['id']);

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
                    "user_id"=>$user['id'],
                    "username"=>$user['username'],
                );
                $this->User_model->update_login_time($user['id']);
                if($user['society_id'] != 0){
                    $resp["reception_id"] = $user['society_id'];
                }
                echo json_encode(array('responseCode' => 0, 'message' => 'OTP Verified and User Logged In!!','data'=>$resp));
                return;
                // echo json_encode($resp); return;
            }
            // $data = $this->ion_auth->login($phone, $otp,'','phone');

            echo json_encode(array('responseCode' => 0, 'message' => 'OTP Verified!!'));
            return;
        } else {
            echo json_encode(array('responseCode' => 1003, 'message' => 'Cannot Verify OTP!!'));
            return;
        }
    }

    public function get_resend_otp()
    {
        $phone = $this->input->post('mobile');
        $resp = $this->User_model->get_resend_otp($phone);
        echo json_encode($resp);
        return;
    }
}
?>