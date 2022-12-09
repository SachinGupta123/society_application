<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_create_base extends CI_Migration {

	public function up() {

		## Create Table activity_logs
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`user_id` varchar(255) NULL ");
		$this->dbforge->add_field("`browser` varchar(255) NULL ");
		$this->dbforge->add_field("`ip_address` varchar(255) NULL ");
		$this->dbforge->add_field("`controller` varchar(255) NULL ");
		$this->dbforge->add_field("`action` varchar(255) NULL ");
		$this->dbforge->add_field("`params` varchar(255) NULL ");
		$this->dbforge->add_field("`note` varchar(255) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NULL ");
		$this->dbforge->add_field("`user_name` varchar(255) NULL ");
		$this->dbforge->create_table("activity_logs", TRUE);
		$this->db->query('ALTER TABLE  `activity_logs` ENGINE = MyISAM');
		## Create Table bank_transactions
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`date` timestamp NULL ");
		$this->dbforge->add_field("`narration` varchar(255) NULL ");
		$this->dbforge->add_field("`credit` decimal(20,2) NULL ");
		$this->dbforge->add_field("`debit` decimal(20,2) NULL ");
		$this->dbforge->add_field("`balance` decimal(20,2) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`bank_id` int(11) NULL ");
		$this->dbforge->add_field("`society_id` int(11) NULL ");
		$this->dbforge->add_field("`expense_id` int(11) NULL ");
		$this->dbforge->add_field("`is_cash` tinyint(1) NULL ");
		$this->dbforge->add_field("`is_arrears` tinyint(1) NULL ");
		$this->dbforge->create_table("bank_transactions", TRUE);
		$this->db->query('ALTER TABLE  `bank_transactions` ENGINE = MyISAM');
		## Create Table banks
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`bank_name` varchar(255) NULL ");
		$this->dbforge->add_field("`address` varchar(255) NULL ");
		$this->dbforge->add_field("`branch` varchar(255) NULL ");
		$this->dbforge->add_field("`ifsc` varchar(255) NULL ");
		$this->dbforge->add_field("`micr` varchar(255) NULL ");
		$this->dbforge->add_field("`ac_no` bigint(20) NULL ");
		$this->dbforge->add_field("`from_dt` date NULL ");
		$this->dbforge->add_field("`exp_dt` date NULL ");
		$this->dbforge->add_field("`phone` bigint(20) NULL ");
		$this->dbforge->add_field("`email` varchar(255) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL");
		$this->dbforge->add_field("`society_id` int(11) NULL ");
		$this->dbforge->add_field("`opening_balance` decimal(15,2) NULL ");
		$this->dbforge->add_field("`current_balance` decimal(15,2) NULL ");
		$this->dbforge->create_table("banks", TRUE);
		$this->db->query('ALTER TABLE  `banks` ENGINE = MyISAM');
		## Create Table bill_details
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`payment_id` int(11) NULL ");
		$this->dbforge->add_field("`bill_amount` decimal(15,2) NULL ");
		$this->dbforge->add_field("`previous_member_balance` decimal(15,2) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`details` text NULL ");
		$this->dbforge->add_field("`member_id` int(11) NULL ");
		$this->dbforge->add_field("`society_id` int(11) NULL ");
		$this->dbforge->add_field("`bill_date` date NULL ");
		$this->dbforge->add_field("`due_date` date NULL ");
		$this->dbforge->add_field("`bill_month` date NULL ");
		$this->dbforge->add_field("`paid` int(11) NULL ");
		$this->dbforge->add_field("`interest` decimal(15,2) NULL ");
		$this->dbforge->add_field("`principal_arrears` decimal(15,2) NULL ");
		$this->dbforge->add_field("`interest_arrears` decimal(15,2) NULL DEFAULT '0.00' ");
		$this->dbforge->add_field("`total_due` decimal(15,2) NULL DEFAULT '0.00' ");
		$this->dbforge->add_field("`late_payment_charges` decimal(15,2) NULL DEFAULT '0.00' ");
		$this->dbforge->add_field("`bill_payment_date` date NULL ");
		$this->dbforge->add_field("`bill_payment_id` int(11) NULL ");
		$this->dbforge->add_field("`bill_no` int(11) NULL ");
		$this->dbforge->add_field("`total_arrears` decimal(15,2) NULL ");
		$this->dbforge->add_field("`total_interest_arrears` decimal(15,2) NULL ");
		$this->dbforge->add_field("`bill_status` varchar(255) NULL ");
		$this->dbforge->add_field("`bill_summary` varchar(255) NULL ");
		$this->dbforge->create_table("bill_details", TRUE);
		$this->db->query('ALTER TABLE  `bill_details` ENGINE = MyISAM');
		## Create Table billing_heads
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`name` varchar(255) NULL ");
		$this->dbforge->add_field("`amount` double NULL ");
		$this->dbforge->add_field("`society_id` int(11) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL");
		$this->dbforge->add_field("`is_unit_value` tinyint(1) NULL ");
		$this->dbforge->add_field("`flat_type_id` int(11) NULL ");
		$this->dbforge->create_table("billing_heads", TRUE);
		$this->db->query('ALTER TABLE  `billing_heads` ENGINE = MyISAM');
		## Create Table cowork_master
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`created_at` datetime NOT NULL ");
		$this->dbforge->create_table("cowork_master", TRUE);
		$this->db->query('ALTER TABLE  `cowork_master` ENGINE = InnoDB');
		## Create Table expense_categories
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`name` varchar(255) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL");
		$this->dbforge->create_table("expense_categories", TRUE);
		$this->db->query('ALTER TABLE  `expense_categories` ENGINE = MyISAM');
		## Create Table expenses
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`date` timestamp NULL ");
		$this->dbforge->add_field("`payee` varchar(255) NULL ");
		$this->dbforge->add_field("`amount` decimal(15,2) NULL ");
		$this->dbforge->add_field("`description` varchar(255) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`expense_category_id` int(11) NULL ");
		$this->dbforge->add_field("`society_id` int(11) NULL ");
		$this->dbforge->add_field("`service_provider_id` int(11) NULL ");
		$this->dbforge->add_field("`bank_id` int(11) NULL ");
		$this->dbforge->create_table("expenses", TRUE);
		$this->db->query('ALTER TABLE  `expenses` ENGINE = MyISAM');
		## Create Table flat_sub_types
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`name` varchar(255) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL");
		$this->dbforge->add_field("`flat_type_id` int(11) NULL ");
		$this->dbforge->create_table("flat_sub_types", TRUE);
		$this->db->query('ALTER TABLE  `flat_sub_types` ENGINE = MyISAM');
		## Create Table flat_types
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`name` varchar(255) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`society_id` int(11) NULL ");
		$this->dbforge->create_table("flat_types", TRUE);
		$this->db->query('ALTER TABLE  `flat_types` ENGINE = MyISAM');
		## Create Table member_plans
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`member_id` int(11) NULL ");
		$this->dbforge->add_field("`plan_id` int(11) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL ");
		$this->dbforge->create_table("member_plans", TRUE);
		$this->db->query('ALTER TABLE  `member_plans` ENGINE = MyISAM');
		## Create Table members
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`flat_no` int(11) NULL ");
		$this->dbforge->add_field("`tenant` tinyint(1) NULL ");
		$this->dbforge->add_field("`phone` bigint(20) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`society_id` int(11) NULL ");
		$this->dbforge->add_field("`member_balance` decimal(15,2) NULL DEFAULT '0.00' ");
		$this->dbforge->add_field("`flat_area` int(11) NULL ");
		$this->dbforge->add_field("`principal_arrears` decimal(15,2) NULL DEFAULT '0.00' ");
		$this->dbforge->add_field("`two_wheelers` int(11) NULL ");
		$this->dbforge->add_field("`four_wheelers` int(11) NULL ");
		$this->dbforge->add_field("`user_id` int(11) NULL ");
		$this->dbforge->add_field("`name` varchar(255) NULL ");
		$this->dbforge->add_field("`email_id` varchar(255) NULL ");
		$this->dbforge->add_field("`interest_arrears` decimal(15,2) NULL DEFAULT '0.00' ");
		$this->dbforge->add_field("`flat_type_id` int(11) NULL ");
		$this->dbforge->add_field("`flat_sub_type_id` int(11) NULL ");
		$this->dbforge->add_field("`wing` varchar(255) NULL ");
		$this->dbforge->create_table("members", TRUE);
		$this->db->query('ALTER TABLE  `members` ENGINE = MyISAM');
		## Create Table migrations
		$this->dbforge->add_field("`version` bigint(20) NOT NULL ");
		$this->dbforge->create_table("migrations", TRUE);
		$this->db->query('ALTER TABLE  `migrations` ENGINE = InnoDB');
		## Create Table parking_charges
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`member_two_wheeler` decimal(10,2) NULL ");
		$this->dbforge->add_field("`tenant_two_wheeler` decimal(10,2) NULL ");
		$this->dbforge->add_field("`member_four_wheeler` decimal(10,2) NULL ");
		$this->dbforge->add_field("`tenant_four_wheeler` decimal(10,2) NULL ");
		$this->dbforge->add_field("`society_id` int(11) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL ");
		$this->dbforge->create_table("parking_charges", TRUE);
		$this->db->query('ALTER TABLE  `parking_charges` ENGINE = MyISAM');
		## Create Table payments
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`payment_date` timestamp NULL ");
		$this->dbforge->add_field("`due_date` date NULL ");
		$this->dbforge->add_field("`narration` varchar(255) NULL ");
		$this->dbforge->add_field("`credit` decimal(15,2) NULL ");
		$this->dbforge->add_field("`debit` decimal(15,2) NULL ");
		$this->dbforge->add_field("`balance` decimal(15,2) NULL ");
		$this->dbforge->add_field("`paid_by` varchar(255) NULL ");
		$this->dbforge->add_field("`details` varchar(255) NULL ");
		$this->dbforge->add_field("`status` varchar(255) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`member_id` int(11) NULL ");
		$this->dbforge->add_field("`society_id` int(11) NULL ");
		$this->dbforge->add_field("`arrears` decimal(15,2) NULL DEFAULT '0.00' ");
		$this->dbforge->add_field("`bill_id` int(11) NULL ");
		$this->dbforge->add_field("`bank_id` int(11) NULL ");
		$this->dbforge->add_field("`cheque_no` bigint(20) NULL ");
		$this->dbforge->add_field("`is_cash` tinyint(1) NULL ");
		$this->dbforge->add_field("`is_arrears` tinyint(1) NULL ");
		$this->dbforge->add_field("`is_credit_note` tinyint(1) NULL ");
		$this->dbforge->add_field("`is_debit_note` tinyint(1) NULL ");
		$this->dbforge->add_field("`is_reversal` tinyint(1) NULL ");
		$this->dbforge->add_field("`depositor_bank` varchar(255) NULL ");
		$this->dbforge->add_field("`receipt_id` int(11) NULL ");
		$this->dbforge->create_table("payments", TRUE);
		$this->db->query('ALTER TABLE  `payments` ENGINE = MyISAM');
		## Create Table roles
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`role_name` varchar(255) NULL ");
		$this->dbforge->create_table("roles", TRUE);
		$this->db->query('ALTER TABLE  `roles` ENGINE = MyISAM');
		## Create Table service_providers
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`name` varchar(255) NULL ");
		$this->dbforge->add_field("`address` varchar(255) NULL ");
		$this->dbforge->add_field("`contact_no` varchar(255) NULL ");
		$this->dbforge->add_field("`sp_type` varchar(255) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`email` varchar(255) NULL ");
		$this->dbforge->add_field("`society_id` int(11) NULL ");
		$this->dbforge->create_table("service_providers", TRUE);
		$this->db->query('ALTER TABLE  `service_providers` ENGINE = MyISAM');
		## Create Table societies
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`name` varchar(255) NULL ");
		$this->dbforge->add_field("`address` varchar(255) NULL ");
		$this->dbforge->add_field("`registration_no` varchar(255) NULL ");
		$this->dbforge->add_field("`no_of_flats` varchar(255) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`opening_balance` bigint(20) NULL ");
		$this->dbforge->add_field("`billing_head_id` int(11) NULL ");
		$this->dbforge->add_field("`image_file_name` varchar(255) NULL ");
		$this->dbforge->add_field("`image_content_type` varchar(255) NULL ");
		$this->dbforge->add_field("`image_file_size` int(11) NULL ");
		$this->dbforge->add_field("`image_updated_at` timestamp NULL ");
		$this->dbforge->add_field("`interest_type` varchar(255) NULL ");
		$this->dbforge->add_field("`interest_span` varchar(255) NULL ");
		$this->dbforge->add_field("`interest_rate` double NULL ");
		$this->dbforge->add_field("`bill_day` int(11) NULL ");
		$this->dbforge->add_field("`due_day` int(11) NULL ");
		$this->dbforge->add_field("`auto_create_bill` tinyint(1) NULL ");
		$this->dbforge->add_field("`noc_charge` decimal(8,2) NULL ");
		$this->dbforge->add_field("`noc_unit_value` tinyint(1) NULL ");
		$this->dbforge->add_field("`garden_charge` double NULL ");
		$this->dbforge->add_field("`garden_unit_value` tinyint(1) NULL ");
		$this->dbforge->add_field("`terrace_charge` double NULL ");
		$this->dbforge->add_field("`terrace_unit_value` tinyint(1) NULL ");
		$this->dbforge->add_field("`villa_charge` double NULL ");
		$this->dbforge->add_field("`villa_unit_value` tinyint(1) NULL ");
		$this->dbforge->add_field("`duplex_charge` double NULL ");
		$this->dbforge->add_field("`duplex_unit_value` tinyint(1) NULL ");
		$this->dbforge->add_field("`commercial_charge` double NULL ");
		$this->dbforge->add_field("`commercial_unit_value` tinyint(1) NULL ");
		$this->dbforge->add_field("`garage_charge` double NULL ");
		$this->dbforge->add_field("`warehouse_charge` double NULL ");
		$this->dbforge->add_field("`warehouse_unit_value` tinyint(1) NULL ");
		$this->dbforge->add_field("`garage_unit_value` tinyint(1) NULL ");
		$this->dbforge->add_field("`created_by_utility` tinyint(1) NULL ");
		$this->dbforge->create_table("societies", TRUE);
		$this->db->query('ALTER TABLE  `societies` ENGINE = MyISAM');
		## Create Table society_accesses
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`user_id` int(11) NULL ");
		$this->dbforge->add_field("`role_id` int(11) NULL ");
		$this->dbforge->add_field("`society_id` int(11) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL");
		$this->dbforge->create_table("society_accesses", TRUE);
		$this->db->query('ALTER TABLE  `society_accesses` ENGINE = MyISAM');
		## Create Table society_enrollment_requests
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`name` varchar(255) NULL ");
		$this->dbforge->add_field("`email` varchar(255) NULL ");
		$this->dbforge->add_field("`phone` bigint(20) NULL ");
		$this->dbforge->add_field("`role` varchar(255) NULL ");
		$this->dbforge->add_field("`society_name` varchar(255) NULL ");
		$this->dbforge->add_field("`society_address` varchar(255) NULL ");
		$this->dbforge->add_field("`city` varchar(255) NULL ");
		$this->dbforge->add_field("`state` varchar(255) NULL ");
		$this->dbforge->add_field("`country` varchar(255) NULL ");
		$this->dbforge->add_field("`pincode` varchar(255) NULL ");
		$this->dbforge->add_field("`reference` varchar(255) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL");
		$this->dbforge->add_field("`span` varchar(255) NULL ");
		$this->dbforge->create_table("society_enrollment_requests", TRUE);
		$this->db->query('ALTER TABLE  `society_enrollment_requests` ENGINE = MyISAM');
		## Create Table society_service_providers
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`society_id` int(11) NULL ");
		$this->dbforge->add_field("`service_provider_id` int(11) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL");
		$this->dbforge->create_table("society_service_providers", TRUE);
		$this->db->query('ALTER TABLE  `society_service_providers` ENGINE = MyISAM');
		## Create Table up_bill_details
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`bill_date` date NULL ");
		$this->dbforge->add_field("`due_date` date NULL ");
		$this->dbforge->add_field("`bill_amount` double NULL ");
		$this->dbforge->add_field("`service_charge` double NULL ");
		$this->dbforge->add_field("`service_tax` double NULL ");
		$this->dbforge->add_field("`total_due` double NULL ");
		$this->dbforge->add_field("`member_id` int(11) NULL ");
		$this->dbforge->add_field("`utility_service_provider_id` int(11) NULL ");
		$this->dbforge->add_field("`payment_id` int(11) NULL ");
		$this->dbforge->add_field("`bill_status` varchar(255) NULL ");
		$this->dbforge->add_field("`total_arrears` double NULL ");
		$this->dbforge->add_field("`previous_member_balance` double NULL ");
		$this->dbforge->add_field("`bill_summary` varchar(255) NULL ");
		$this->dbforge->add_field("`bill_no` int(11) NULL ");
		$this->dbforge->add_field("`bill_month` date NULL ");
		$this->dbforge->add_field("`previous_outstanding` double NULL ");
		$this->dbforge->create_table("up_bill_details", TRUE);
		$this->db->query('ALTER TABLE  `up_bill_details` ENGINE = MyISAM');
		## Create Table up_billing_heads
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`name` varchar(255) NULL ");
		$this->dbforge->add_field("`is_unit_value` tinyint(1) NULL ");
		$this->dbforge->add_field("`amount` double NULL ");
		$this->dbforge->add_field("`utility_service_provider_id` int(11) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL");
		$this->dbforge->add_field("`utility_plan_id` int(11) NULL ");
		$this->dbforge->create_table("up_billing_heads", TRUE);
		$this->db->query('ALTER TABLE  `up_billing_heads` ENGINE = MyISAM');
		## Create Table up_payments
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`payment_date` timestamp NULL ");
		$this->dbforge->add_field("`due_date` date NULL ");
		$this->dbforge->add_field("`narration` varchar(255) NULL ");
		$this->dbforge->add_field("`credit` decimal(15,2) NULL ");
		$this->dbforge->add_field("`debit` decimal(15,2) NULL ");
		$this->dbforge->add_field("`balance` decimal(15,2) NULL ");
		$this->dbforge->add_field("`paid_by` varchar(255) NULL ");
		$this->dbforge->add_field("`details` varchar(255) NULL ");
		$this->dbforge->add_field("`status` varchar(255) NULL ");
		$this->dbforge->add_field("`member_id` int(11) NULL ");
		$this->dbforge->add_field("`utility_service_provider_id` int(11) NULL ");
		$this->dbforge->add_field("`receipt_id` int(11) NULL ");
		$this->dbforge->add_field("`cheque_no` int(11) NULL ");
		$this->dbforge->add_field("`depositor_bank` varchar(255) NULL ");
		$this->dbforge->add_field("`bank_id` int(11) NULL ");
		$this->dbforge->add_field("`bill_id` int(11) NULL ");
		$this->dbforge->add_field("`is_cash` tinyint(1) NULL ");
		$this->dbforge->create_table("up_payments", TRUE);
		$this->db->query('ALTER TABLE  `up_payments` ENGINE = MyISAM');
		## Create Table users
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`encrypted_password` varchar(255) NULL ");
		$this->dbforge->add_field("`reset_password_token` varchar(255) NULL ");
		$this->dbforge->add_field("`reset_password_sent_at` timestamp NULL ");
		$this->dbforge->add_field("`remember_created_at` timestamp NULL ");
		$this->dbforge->add_field("`sign_in_count` int(11) NULL ");
		$this->dbforge->add_field("`current_sign_in_at` timestamp NULL ");
		$this->dbforge->add_field("`last_sign_in_at` timestamp NULL ");
		$this->dbforge->add_field("`current_sign_in_ip` int(10) unsigned NULL ");
		$this->dbforge->add_field("`last_sign_in_ip` int(10) unsigned NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL");
		$this->dbforge->add_field("`role_id` int(11) NULL ");
		$this->dbforge->add_field("`member_id` int(11) NULL ");
		$this->dbforge->add_field("`username` varchar(255) NULL ");
		$this->dbforge->add_field("`society_id` int(11) NULL ");
		$this->dbforge->create_table("users", TRUE);
		$this->db->query('ALTER TABLE  `users` ENGINE = MyISAM');
		## Create Table utility_bills
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`bill_date` date NULL ");
		$this->dbforge->add_field("`due_date` date NULL ");
		$this->dbforge->add_field("`bill_amount` double NULL ");
		$this->dbforge->add_field("`member_id` int(11) NULL ");
		$this->dbforge->add_field("`plan_id` int(11) NULL ");
		$this->dbforge->add_field("`service_charges` double NULL ");
		$this->dbforge->add_field("`service_tax` double NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL");
		$this->dbforge->create_table("utility_bills", TRUE);
		$this->db->query('ALTER TABLE  `utility_bills` ENGINE = MyISAM');
		## Create Table utility_plans
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`plan_name` varchar(255) NULL ");
		$this->dbforge->add_field("`amount` double NULL ");
		$this->dbforge->add_field("`utility_service_provider_id` int(11) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL");
		$this->dbforge->create_table("utility_plans", TRUE);
		$this->db->query('ALTER TABLE  `utility_plans` ENGINE = MyISAM');
		## Create Table utility_service_provider_members
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`utility_service_provider_id` int(11) NULL ");
		$this->dbforge->add_field("`member_id` int(11) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL");
		$this->dbforge->add_field("`utility_plan_id` int(11) NULL ");
		$this->dbforge->add_field("`member_balance` double NULL ");
		$this->dbforge->add_field("`initial_outstanding` double NULL ");
		$this->dbforge->create_table("utility_service_provider_members", TRUE);
		$this->db->query('ALTER TABLE  `utility_service_provider_members` ENGINE = MyISAM');
		## Create Table utility_service_providers
		$this->dbforge->add_field(array(
			'id'=>array(
				'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
			)
		));
		$this->dbforge->add_key("id",true);
		$this->dbforge->add_field("`business_name` varchar(255) NULL ");
		$this->dbforge->add_field("`address` varchar(255) NULL ");
		$this->dbforge->add_field("`license_no` varchar(255) NULL ");
		$this->dbforge->add_field("`owner_name` varchar(255) NULL ");
		$this->dbforge->add_field("`email_id` varchar(255) NULL ");
		$this->dbforge->add_field("`service_tax_unit` double NULL ");
		$this->dbforge->add_field("`provider_type` varchar(255) NULL ");
		$this->dbforge->add_field("`phone_no` bigint(20) NULL ");
		$this->dbforge->add_field("`created_at` timestamp NOT NULL ");
		$this->dbforge->add_field("`updated_at` timestamp NOT NULL");
		$this->dbforge->create_table("utility_service_providers", TRUE);
		$this->db->query('ALTER TABLE  `utility_service_providers` ENGINE = MyISAM');
	 }

	public function down()	{
		### Drop table activity_logs ##
		$this->dbforge->drop_table("activity_logs", TRUE);
		### Drop table bank_transactions ##
		$this->dbforge->drop_table("bank_transactions", TRUE);
		### Drop table banks ##
		$this->dbforge->drop_table("banks", TRUE);
		### Drop table bill_details ##
		$this->dbforge->drop_table("bill_details", TRUE);
		### Drop table billing_heads ##
		$this->dbforge->drop_table("billing_heads", TRUE);
		### Drop table cowork_master ##
		$this->dbforge->drop_table("cowork_master", TRUE);
		### Drop table expense_categories ##
		$this->dbforge->drop_table("expense_categories", TRUE);
		### Drop table expenses ##
		$this->dbforge->drop_table("expenses", TRUE);
		### Drop table flat_sub_types ##
		$this->dbforge->drop_table("flat_sub_types", TRUE);
		### Drop table flat_types ##
		$this->dbforge->drop_table("flat_types", TRUE);
		### Drop table member_plans ##
		$this->dbforge->drop_table("member_plans", TRUE);
		### Drop table members ##
		$this->dbforge->drop_table("members", TRUE);
		### Drop table migrations ##
		$this->dbforge->drop_table("migrations", TRUE);
		### Drop table parking_charges ##
		$this->dbforge->drop_table("parking_charges", TRUE);
		### Drop table payments ##
		$this->dbforge->drop_table("payments", TRUE);
		### Drop table roles ##
		$this->dbforge->drop_table("roles", TRUE);
		### Drop table service_providers ##
		$this->dbforge->drop_table("service_providers", TRUE);
		### Drop table societies ##
		$this->dbforge->drop_table("societies", TRUE);
		### Drop table society_accesses ##
		$this->dbforge->drop_table("society_accesses", TRUE);
		### Drop table society_enrollment_requests ##
		$this->dbforge->drop_table("society_enrollment_requests", TRUE);
		### Drop table society_service_providers ##
		$this->dbforge->drop_table("society_service_providers", TRUE);
		### Drop table up_bill_details ##
		$this->dbforge->drop_table("up_bill_details", TRUE);
		### Drop table up_billing_heads ##
		$this->dbforge->drop_table("up_billing_heads", TRUE);
		### Drop table up_payments ##
		$this->dbforge->drop_table("up_payments", TRUE);
		### Drop table users ##
		$this->dbforge->drop_table("users", TRUE);
		### Drop table utility_bills ##
		$this->dbforge->drop_table("utility_bills", TRUE);
		### Drop table utility_plans ##
		$this->dbforge->drop_table("utility_plans", TRUE);
		### Drop table utility_service_provider_members ##
		$this->dbforge->drop_table("utility_service_provider_members", TRUE);
		### Drop table utility_service_providers ##
		$this->dbforge->drop_table("utility_service_providers", TRUE);

	}
}