
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ledger {

    var $CI;
    public function __construct($params = array())
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->config->item('base_url');
        $this->CI->load->database();
        $this->CI->load->model('Society_model');
    }

    /***
    Author- Sachhidanand
    date - 10-03-2022
    requirement - Society Account create in account db
    */
    function account($society_id,$params){
        
        $api_ur = account_url."account/create";       
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $api_ur,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>$params
        ));

        $response = curl_exec($curl);					
        curl_close($curl);
        $account_array = json_decode($response);   
        $return=0;
        if($account_array->response->status=="success"){
            
            $account_data=[
                "society_id"=>$society_id ,
                "account_id"=>$account_array->response->data->account_id,
                "db_prefix"=>$account_array->response->data->db_prefix,
                'fy_start' => $params['fy_start'],
                'fy_end' => $params['fy_end'],
                'created_by'=>$this->CI->session->userdata('user_id'),
            ];           

            $this->CI->Society_model->accounting_details_insert($account_data);
            $return=1;

        }else{
          $return=0;
        }
        
        return $return;

    }

    /***
    Author- Sachhidanand
    date - 10-03-2022
    requirement - Account Delete 
    */

    public function account_delete($society_id){
        $accounting_db_details=$this->CI->Society_model->get_society_accounting_details($society_id);
        if(!empty($accounting_db_details)){
            $api_ur = account_url."account/delete";  
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => $api_ur,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_POSTFIELDS =>json_encode(array('account_id'=>$accounting_db_details->account_id, 'db_prefix' => $accounting_db_details->db_prefix
            )),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);
            $account_array = json_decode($response);
            if($account_array->response->status=="success"){
                return "1";
            }else{
                return "0";
            }

        } 
       
    }

    
    /***
    Author- Sachhidanand
    date - 10-03-2022
    requirement - get every bill head and flat with cash related ledger get in mssociety db table 
    */
    function get_ledger($name,$type,$society_id,$table_name,$id=0) {
       
        if (in_array($type,array("NOC Charge","NOC Charges","Cash Book","Parking Charge","Parking Charges","Interest","Tax"))){
            if($type=="NOC Charge"||$type=="NOC Charges")
                $this->CI->db->where(array('noc_ledger_id !='=>0,'society_id'=> $society_id));
            if($type=="Cash Book")
                $this->CI->db->where(array('cash_ledger_id !='=>0,'society_id'=> $society_id));  
            if($type=="Parking Charge"||$type=="Parking Charges")
                $this->CI->db->where(array('parking_ledger_id !='=>0,'society_id'=> $society_id)); 
            
            if($type=="Interest")
                $this->CI->db->where(array('interest_ledger_id !='=>0,'society_id'=> $society_id)); 

            if($type=="Tax")
                $this->CI->db->where(array('tax_ledger_id !='=>0,'society_id'=> $society_id)); 
        }else if($type=="Bill Head"){ 
            $bill_id=$this->get_bill_id($name);  
                   
            $this->CI->db->where(array('ledger_id !='=>0,'society_id'=> $society_id,"bill_head_id"=>$bill_id));         
           
        }else if($type=="flat"){
            $this->CI->db->where(array('ledger_id !='=>0,'society_id'=> $society_id,"flat_id"=>$id));
            
        }else if($type=="bank"){
            
            if($id!=0)
                $this->CI->db->where(array('ledger_id !='=>0,'society_id'=> $society_id,"bank_id"=>$id));
            else
                $this->CI->db->where(array('ledger_id !='=>0,'society_id'=> $society_id));
            
        }
        else if($type=="vendor"){
            
                $this->CI->db->where(array('ledger_id !='=>0,'society_id'=> $society_id,"vendor_id"=>$id));

        }
        else if($type=="expense_category"){
            $this->CI->db->where(array('ledger_id !='=>0,'society_id'=> $society_id,"expense_category_name"=>$name));
        }

        $result= $this->CI->db->get($table_name)->row(); 
        
        if(!empty($result)){
            if (in_array($type,array("NOC Charge","NOC Charges","Cash Book","Parking Charge","Parking Charges","Interest","Tax"))){
                if($type=="NOC Charge"||$type=="NOC Charges")
                    $ledger_id=$result->noc_ledger_id;
                if($type=="Cash Book")
                    $ledger_id=$result->cash_ledger_id;
                if($type=="Parking Charge"||$type=="Parking Charges")
                    $ledger_id=$result->parking_ledger_id;

                if($type=="Interest")
                    $ledger_id=$result->interest_ledger_id;
    
                if($type=="Tax")
                    $ledger_id=$result->tax_ledger_id;


            }else{
                 $ledger_id=$result->ledger_id;
            }           

        }else{
            $ledger_id=0;
        }

        return $ledger_id;

    }

    /***
    Author- Sachhidanand
    date - 10-03-2022
    requirement - create every module ledger create in accounting db and get to store in mssociety db 
    */
    function create_ledger($ledger_name,$type,$society_id,$table_name,$opening_balance,$group_id,$dc_type,$id=0){       
        $accounting_db_details=$this->CI->Society_model->get_society_accounting_details($society_id);      

        $ledger_api_ur = account_url."ledgers/create";             

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $ledger_api_ur,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>[
            'account_id' =>$accounting_db_details->account_id, 'db_prefix' => $accounting_db_details->db_prefix,'name' =>$ledger_name, 'group_id' =>$group_id, 'op_balance' => $opening_balance,'op_balance_dc' =>$dc_type,'type' =>1,'reconciliation'=>1
        ]
        
        ));

        $response = curl_exec($curl);					
        curl_close($curl);
        $ledger_array = json_decode($response);
     
        if($ledger_array->response->status=="success"){           
            
            if(in_array($type,array("NOC Charge","Cash Book","Parking Charge","Tax","Interest"))){
                if($type=="NOC Charge"){
                    $params=[
                        "noc_ledger_id"=>$ledger_array->response->ledger_id
                    ];
                }else if($type=="Cash Book"){
                    $params=[
                        "cash_ledger_id"=>$ledger_array->response->ledger_id
                    ];
                }elseif($type=="Parking Charge"){
                    $params=[
                        "parking_ledger_id"=>$ledger_array->response->ledger_id
                    ];
                }
                elseif($type=="Tax"){
                    $params=[
                        "tax_ledger_id"=>$ledger_array->response->ledger_id
                    ];
                }
                elseif($type=="Interest"){
                    $params=[
                        "interest_ledger_id"=>$ledger_array->response->ledger_id
                    ];
                }
                $params["updated_by"]=$this->CI->session->userdata('user_id');
                $params["updated_at"]=date("Y-m-d H:i:s");
                $this->CI->Society_model->update_society_accounting($society_id,$params);
               
            }
            else
            {
                $params=[
                    "society_id"=>$society_id,
                    'created_by'=>$this->CI->session->userdata('user_id')
                ];
                if($type=="Bill Head"){
                    $bill_id=$this->get_bill_id($ledger_name);
                    $params["bill_head_id"]=$bill_id; 
                }
                else if($type=="flat"){
                    $params["flat_id"]=$id; 
                }else if($type=="bank"){
                    $params["bank_id"]=$id;  
                }else if($type=="vendor"){
                    $params["vendor_id"]=$id;  
                }else if($type=="expense_category"){
                    $params["expense_category_name"]=$ledger_name;  
                }
                $params["ledger_id"]=$ledger_array->response->ledger_id;
              
                $this->CI->db->insert($table_name,$params);
            }            
            return $ledger_array->response->ledger_id;
           
        }else{
            return "0";
        }       
        
    }

     /***
    Author- Sachhidanand
    date - 08-02-2021
    requirement -check in accounting ledger entry or not if yes not eligible for delete
    */
    function ledger_delete($society_id,$ledger_id){

        $accounting_db_details=$this->CI->Society_model->get_society_accounting_details($society_id);   
        
        $ledger_api_ur = account_url."ledgers/delete";             
      
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $ledger_api_ur,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'DELETE',
          CURLOPT_POSTFIELDS =>json_encode(array(
            "account_id"=>$accounting_db_details->account_id,
            "db_prefix"=>$accounting_db_details->db_prefix,
            "ledger_id"=> $ledger_id,
            
        )),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);        
        curl_close($curl);       
        $ledger_array = json_decode($response);
        
        $return_id="0";       
        if($ledger_array->response->status=="success"){ 
            $return_id="0";
        }
        
        else{
            $return_id="1";  
        } 
        
        return $return_id;
            
    }

    /***
        Author- Sachhidanand
        date - 21-02-2021
        requirement - get ledger group id for store in mscoety db for store
    */
    function get_accounting_ledger_group_id($society_id,$ledger_id)
    {
        $accounting_db_details=$this->CI->Society_model->get_society_accounting_details($society_id);      
       
        $api_ur = account_url."ledgers/getSingleLedger";
       
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $api_ur,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>[
                'account_id' =>$accounting_db_details->account_id, 'db_prefix' => $accounting_db_details->db_prefix,'ledger_id' =>$ledger_id
            ]
        ));

        $response = curl_exec($curl);					
        curl_close($curl);
        $account_array = json_decode($response);
        if($account_array->response->status=="success"){           
         
           return $account_array->response->data[0];

        }else{
            return array();
        }
    }

    /***
        Author- Sachhidanand
        date - 08-02-2021
        requirement - update ledger balance in accounting
    */
    function accounting_ledger_update($society_id,$ledger_id,$group_id,$ledger_name,$dc_type,$opening_balance)
    {   
        $accounting_db_details=$this->CI->Society_model->get_society_accounting_details($society_id);  
       
        $api_ur = account_url."ledgers/update";          
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $api_ur,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'PUT',
          CURLOPT_POSTFIELDS =>json_encode(array('account_id' =>$accounting_db_details->account_id, 'db_prefix' => $accounting_db_details->db_prefix,"ledger_id"=>$ledger_id,'name' =>$ledger_name, 'group_id' =>$group_id, 'op_balance' => $opening_balance,'op_balance_dc' =>$dc_type,'type' =>1,'reconciliation'=>1
        )),
        
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));        
        $response = curl_exec($curl);        
        curl_close($curl);       
        $account_array = json_decode($response);
        if($account_array->response->status=="success"){
           return 1;
        }else{
            return 0;
        }
        
    }

    /***
    Author- Sachhidanand
    date - 23-02-2021
    requirement - get transaction details for ledger for display 
    */
    function ledger_transaction($society_id,$ledger_id){

        $accounting_db_details=$this->CI->Society_model->get_society_accounting_details($society_id); 
       
        $curl = curl_init();
        $api_ur = account_url."ledgers/ledger_transaction";  
        curl_setopt_array($curl, array(
        CURLOPT_URL => $api_ur,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>json_encode(array('account_id' =>$accounting_db_details->account_id, 'db_prefix' => $accounting_db_details->db_prefix,"ledger_id"=>$ledger_id
        )),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));        
        $response = curl_exec($curl);        
        curl_close($curl);       
        $account_array = json_decode($response);
        if($account_array->response->status=="success"){
           return $account_array->response->data;
        }else{
            return [];
        }
    }
    
    
    /***
        Author- Sachhidanand
        date - 08-02-2021
        requirement - use table update for parking noc and cash =0
    */
    function msociety_ledger_id_update($society_id,$params,$table)
    {
        $this->CI->db->where('society_id',$society_id);
        return $this->CI->db->update($table,$params);
    }

    //create double entry in accounting db
    function accounting_double_entry($society_id,$entry_type,$date,$narration,$amount,$debit_ledger_id,$credit_ledger_id){
        
        $accounting_db_details=$this->CI->Society_model->get_society_accounting_details($society_id);  
        $api_ur = account_url."entries/create";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_ur,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode(array(
                "account_id"=>$accounting_db_details->account_id,
                "db_prefix"=>$accounting_db_details->db_prefix,
                "entry_type_id"=> $entry_type,
                "date"=> $date,
                "narration"=> $narration,
                "tag_id"=> "",
                "entries"=> [
                    array("dc"=>"D","dr_amount"=>$amount, "ledger_id"=>$debit_ledger_id),
                    array( "dc"=>"C","cr_amount"=> $amount,"ledger_id"=>$credit_ledger_id)
                ]
            )),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);        
        $ledger_array = json_decode($response);       
        if($ledger_array->response->status=="success"){ 
            // return "1";
            return $ledger_array->response->entry_id;
        }else{
            return "0";
        }

    }

    /***
        Author- Sachhidanand
        date - 08-02-2021
        requirement - create bill dual entry in accounting
    */
    function accounting_bill_double_entry($society_id,$entry_type,$date,$narration,
    $main_entry,$flat_bill_table='',$flat_id=0,$bill_no=0){        
        $accounting_db_details=$this->CI->Society_model->get_society_accounting_details($society_id);
        $api_ur = account_url."entries/create";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_ur,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode(array(
                "account_id"=>$accounting_db_details->account_id,
                "db_prefix"=>$accounting_db_details->db_prefix,
                "entry_type_id"=> $entry_type,
                "date"=> $date,
                "narration"=> $narration,
                "tag_id"=> "",
                "entries"=> $main_entry
            )),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);        
        $ledger_array = json_decode($response);      
        if($ledger_array->response->status=="success"){ 
            if($flat_bill_table!=''){
                $params=[
                    "accounting_entry_id"=>$ledger_array->response->entry_id,
                    "flat_id"=>$flat_id,
                    "society_id"=>$society_id,
                    "bill_no"=>$bill_no,
                    "payment_status"=>"Unpaid",
                    "created_at"=>date("Y-m-d")
                ];                
                $this->CI->db->insert($flat_bill_table,$params);
                return $ledger_array->response->entry_id;
            }else{
                return $ledger_array->response->entry_id;
            }
            
        }else{
            return "0";
        }

    }

     /***
        Author- Sachhidanand
        date - 31-03-2022
        requirement - update bill dual entry in accounting
    */
    function accounting_bill_double_entry_update($society_id,$entry_type,$date,$narration,
    $main_entry,$entry_id){        
        $accounting_db_details=$this->CI->Society_model->get_society_accounting_details($society_id);
        $api_ur = account_url."entries/update";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_ur,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>json_encode(array(
                "account_id"=>$accounting_db_details->account_id,
                "db_prefix"=>$accounting_db_details->db_prefix,
                "entry_type_id"=> $entry_type,
                "date"=> $date,
                "entry_id"=>$entry_id,
                "narration"=> $narration,
                "tag_id"=> "",
                "entries"=> $main_entry
            )),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);        
        $ledger_array = json_decode($response);      
        if($ledger_array->response->status=="success"){ 
            return "1";
           
        }else{
            return "0";
        }

    }
      

    function get_bill_id($name){
        $this->CI->db->select('bill_head_id');
        $this->CI->db->where(array('bill_head_name'=> $name)); 
        $bill_id= $this->CI->db->get('sc_bill_heads')->row();
        return $bill_id->bill_head_id;
    }

    /***
    Author- Sachhidanand
    date - 08-02-2021
    requirement -get bill ledger id
    */
    function get_bill_details($society_id,$bill_head_id,$bill_name){
        $bill_id=$this->get_bill_id($bill_name);      
        $this->CI->db->where(['bill_head_id'=> $bill_id,'society_id'=> $society_id]); 
        $bill_details= $this->CI->db->get('sc_bill_head_accounting_details')->row();
       
        return $bill_details;
    }  
    

    /***
    Author- Sachhidanand
    date - 08-02-2021
    requirement -get group id for bill head ledger
    */
    function get_group_id($group_name){
        $this->CI->db->select('bill_head_category_id');
        $this->CI->db->where(array('bill_head_category_name'=> $group_name)); 
        $group= $this->CI->db->get('sc_bill_head_category')->row(); 

        return $group->bill_head_category_id;
    }  

    
    /***
    Author- Sachhidanand
    date - 08-02-2021
    requirement - check user email  exit in accounting login
    */
    
    function get_wzuser($email){      
       
        $ledger_api_ur = account_url."get_wzuser";
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $ledger_api_ur,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>['email' =>$email]
        
        ));

        $response = curl_exec($curl);					
        curl_close($curl);
        $ledger_array = json_decode($response);
        
        if($ledger_array->response->status=="success"){           
            
            return "1";
        }else{
            return "0";
        }       
        
    }

    function create_wzuser($username,$password,$full_name,$email){       
       
        $ledger_api_ur = account_url."CreatewzUSer";              

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => $ledger_api_ur,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>["username"=>$username,"password"=>$password,"fullname"=>$full_name,"email"=>$email]
        
        ));

        $response = curl_exec($curl);					
        curl_close($curl);
        $ledger_array = json_decode($response);       
        if($ledger_array->response->status=="success"){           
            
            return "1";
        }else{
            return "0";
        }       
        
    }


     /***
    Author- Sachhidanand
    date - 08-02-2021
    requirement -check in accounting ledger entry or not if yes not eligible for delete
    */
    function bill_entry_delete($society_id,$bill_ledger_id){

        $accounting_db_details=$this->CI->Society_model->get_society_accounting_details($society_id);   
        
        $ledger_api_ur = account_url."entries/delete";             
      
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => $ledger_api_ur,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'DELETE',
          CURLOPT_POSTFIELDS =>json_encode(array(
            "account_id"=>$accounting_db_details->account_id,
            "db_prefix"=>$accounting_db_details->db_prefix,
            "ledger_id"=> $bill_ledger_id,
            
        )),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));
        
        $response = curl_exec($curl);        
        curl_close($curl);       
        $ledger_array = json_decode($response);
      
        $return_id="0";       
        if($ledger_array->response->status=="success"){ 
            $return_id="0";
        }
        
        else{
            $return_id="1";  
        } 
        
        return $return_id;
            
    }






 
}

?>