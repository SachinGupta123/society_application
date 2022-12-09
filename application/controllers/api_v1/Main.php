<?php
class Main extends CI_Controller
{
	function __construct()
    {
        parent::__construct();
        header('Content-type: application/json');
        // use CI_Controller;
        // require APPPATH . 'libraries/Format.php';
        // $this->load->model('merchants');
        // $this->load->model('transaction');
        // $this->load->model('apis');
        // $this->config->load("config");
        // $this->config->set_item('csrf_protection', FALSE);
        $this->load->model('User_model');
        // $this->load->library('REST_Controller');
        // require APPPATH . '/libraries/REST_Controller.php';
        // $this->load->model('Bank_transaction_model');
        $this->cors_set_access_control_headers();
    }

    function set_access_control_headers()
    {
        // Convert the config items into strings

        $allowed_headers = implode(', ', $this->config->item('allowed_cors_headers'));

        $allowed_methods = implode(', ', $this->config->item('allowed_cors_methods'));



        // If we want to allow any domain to access the API

        if ($this->config->item('allow_any_cors_domain') === TRUE)

        {

            header('Access-Control-Allow-Origin: *');

            header('Access-Control-Allow-Headers:*');

            header('Access-Control-Allow-Methods:*');

        }

        else

        {

            // We're going to allow only certain domains access

            // Store the HTTP Origin header

            $origin = $this->input->server('HTTP_ORIGIN');

            if ($origin === NULL)

            {

                $origin = '';

            }



            // If the origin domain is in the allowed_cors_origins list, then add the Access Control headers

            if (in_array($origin, $this->config->item('allowed_cors_origins')))

            {

                // header('Access-Control-Allow-Origin: '.$origin);
                header('Access-Control-Allow-Origin: *');

                header('Access-Control-Allow-Headers:*');

                header('Access-Control-Allow-Methods:*');

            }
        }
    }

    function cors_set_access_control_headers()
    {
        header('Access-Control-Allow-Origin : *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age : 1728000');
    }

    function cors_preflight_check()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS')
        {
             // return only the headers and not the content
            // only allow CORS if we're doing a GET - i.e. no saving for now.
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']) && $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD'] == 'GET' && isset($_SERVER['HTTP_ORIGIN']) && is_approved($_SERVER['HTTP_ORIGIN']))
            {
                $allowedOrigin = $_SERVER['HTTP_ORIGIN'];
                $allowedHeaders = get_allowed_headers($allowedOrigin);
                header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); //...
                // header('Access-Control-Allow-Origin: ' . $allowedOrigin);
                header('Access-Control-Allow-Origin: *');
                header('Access-Control-Allow-Headers:*');
                header('Access-Control-Max-Age: 3600');
                header('Content-type: application/json');
            }
            exit;
        }
    }

    function authen_user()
    {
        $url = parse_url($_SERVER['REQUEST_URI']);
        // parse_str($url['query'], $params);
        // $user_id = $params['user_id'];
        // echo $user_id;

        $username = $this->input->post('identity');
        $password = $this->input->post('password');
        // echo $username; echo "</br>";
        // echo $password;die;
        if ($data = $this->ion_auth->login($this->input->post('identity'), $this->input->post('password'))):
            $this->session->set_userdata('data', $data);
            $this->session->set_userdata('login', true);
            if (!$this->ion_auth->logged_in()):
                echo json_encode('You are not logged in!');
            elseif(!$this->ion_auth->is_admin()):
                echo json_encode('You are logged in but not admin!');
            else:
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                $this->session->set_flashdata('success', 1);
                $this->session->set_userdata('login', true);
                echo json_encode('Welcome admin!');
            endif;
        else:
            $this->session->set_flashdata('message', $this->ion_auth->errors());
            $this->session->set_flashdata('success', 0);
            echo json_encode('You are not supposed to be here!');
            exit;
        endif;
    }
}
?>