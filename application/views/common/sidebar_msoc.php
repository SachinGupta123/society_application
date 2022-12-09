      <!-- role wise dashboard shown -->      
      <?php
        //  role = admin,CA,Channel Partner
        if ($this->ion_auth->is_admin()) :
          include dirname(__FILE__)."/admin_sidebar.php"; 
        elseif($this->session->userdata('role') == 'operator'): 
            include dirname(__FILE__)."/operator_sidebar.php"; 
          // role = admin  close 
          // role = channle_patner 
        elseif($this->session->userdata('role') == 'CA'): 
          include dirname(__FILE__)."/ca_sidebar.php"; 

        elseif($this->session->userdata('role') == 'channel_partner' && (!$this->ion_auth->is_admin()) ) :        
          include dirname(__FILE__)."/cp_sidebar.php";    
          // role = channle_patner close 

          // role = committee_member
        elseif($this->session->userdata('role') == 'committee_member' && (!$this->ion_auth->is_admin()) ) :  
           
          include dirname(__FILE__)."/cm_sidebar.php"; 
        
        elseif($this->session->userdata('role') == 'master_chanel_partner' && (!$this->ion_auth->is_admin()) ) : 
          echo "master chanel partner";
          
        else :
          
        endif;
           
         
         ?>
      <!-- role = committee_member clsoe -->




     


      
