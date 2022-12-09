<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';

$route['mypdf'] = "dist/mypdf";

//dashboard routes
$route['dashboard'] = 'dashboard/dashboard_msoc';

//society routes
$route['societies'] = 'societies/view_society';
$route['societies/add'] = 'societies/add_society';
$route['societies/edit/(\d+)'] = 'societies/edit_society/$1';
$route['societies/delete/(\d+)'] = 'societies/remove/$1';
$route['societies/details/(\d+)'] = 'societies/society_details/$1';
$route['societies/new_cash_transfer'] = 'societies/new_cash_transfer';
$route['societies/monthly_bill/(\d+)'] = 'societies/view_monthly_bills/$1';
$route['societies/delete_all_members/(\d+)'] = 'societies/delete_members_by_society/$1';
$route['societies/note'] = 'societies/send_notification';
$route['societies/register/(\d+)/(:any)'] = 'societies/bill_register/$1/$2';
$route['societies/collection/(\d+)/(:any)'] = 'societies/collection_register/$1/$2';
$route['societies/export_collection/(\d+)/(:any)'] = 'societies/exportCollection/$1/$2';
$route['societies/bill/(\d+)/(:any)/(:any)'] = 'societies/download_bill/$1/$2/$3';
$route['societies/sms/(\d+)/(:any)'] = 'societies/sms_send_bill/$1/$2';
$route['societies/email/(\d+)/(:any)'] = 'societies/email_send_bill/$1/$2';
$route['payment/create'] = 'payment/create';
$route['society_access/society_list/(\d+)'] = 'societies/user_access_society_list/$1';

//bill genetation
$route['bill/generate/(\d+)'] = 'bill_detail/generate_bill/$1';


//members routes
$route['member/manage/(\d+)'] = 'member/manage_member/$1';
$route['member/add/(\d+)'] = 'member/add_new_member/$1';
$route['member/view/(\d+)/(\d+)'] = 'member/view_single_member/$1/$2';
$route['member/edit/(\d+)/(\d+)'] = 'member/edit_member/$1/$2';
$route['member/delete/(\d+)/(\d+)'] = 'member/remove/$1/$2';
$route['member/ledger/(\d+)/(\d+)'] = 'member/member_ledger/$1/$2';
$route['member/assign_flat/(\d+)'] = 'member/track_flat/$1';
$route['member/notification'] = 'member/send_notification';
$route['member/debit_note'] = 'member/debit_note';
$route['member/creidt_note'] = 'member/creidt_note';

//flat types routes
$route['flat_types/view/(\d+)'] = 'flat_type/view_flat_types/$1';
$route['flat_types/add/(\d+)'] = 'flat_type/add_flat_types/$1';
$route['flat_types/edit/(\d+)/(\d+)'] = 'flat_type/edit_flat_type/$1/$2';

//master billing head routes
$route['bill_head_master'] = 'billing_head/view_bill_head_master';
$route['bill_head_master/add'] = 'billing_head/add_edit_bill_head';
$route['bill_head_master/edit/(\d+)'] = 'billing_head/add_edit_bill_head/$1';

//flat category billheads
$route['billing_head/view/(\d+)/(\d+)'] = 'billing_head/view_billing_head/$1/$2';
$route['billing_head/add/(\d+)/(\d+)'] = 'billing_head/add_billing_head/$1/$2';
// $route['billing_head/edit/(\d+)/(\d+)/(\d+)'] = 'billing_head/edit_billing_head/$1/$2/$3';
$route['billing_head/edit/(\d+)/(\d+)/(\d+)'] = 'billing_head/edit_billing_head/$1/$2/$3';

//parking charges routes
$route['parking_charges/view/(\d+)'] = 'parking_charge/view_parking_charges/$1';
$route['parking_charges/add/(\d+)'] = 'parking_charge/add_parking_charges/$1';
$route['parking_charges/edit/(\d+)/(\d+)'] = 'parking_charge/edit_parking_charges/$1/$2';
$route['parking_charges/delete/(\d+)/(\d+)'] = 'parking_charge/remove/$1/$2';

//service provider routes
$route['service_providers/view/(\d+)'] = 'service_provider/view_service_provider/$1';
$route['service_providers/add/(\d+)'] = 'service_provider/add_service_provider/$1';
$route['service_providers/edit/(\d+)/(\d+)'] = 'service_provider/edit_service_provider/$1/$2';
$route['service_providers/delete/(\d+)/(\d+)'] = 'service_provider/remove/$1/$2';

//bank routes
$route['bank/view/(\d+)'] = 'bank/view_bank/$1';
$route['bank/add/(\d+)'] = 'bank/add_bank/$1';
$route['bank/edit/(\d+)/(\d+)'] = 'bank/edit_bank/$1/$2';
$route['bank/delete/(\d+)'] = 'bank/remove/$1';
$route['bank/bank_to_transfer'] = 'bank/bank_to_transfer';
$route['bank/cash_transfer'] = 'bank/cash_transfer';

//expenses routes
$route['expense/view/(\d+)'] = 'expense/view_expence/$1';
$route['expense/add/(\d+)'] = 'expense/add_expense_bill/$1';
// $route['expense/add/(\d+)'] = 'expense/add_expense/$1';

//users routes
// $route['users'] = 'auth/index';
$route['users'] = 'auth/user_list';
$route['societies/society_users/(\d+)'] = 'auth/society_user_list/$1';
$route['users/sign_in'] = 'auth/login';
// $route['users/add'] = 'users/add_users';
$route['users/add'] = 'auth/create_user';
// $route['users/assign_society/(\d+)'] = 'users/assign_societies/$1';
$route['society_access/assign_society/(\d+)'] = 'users/assign_societies/$1';//changes for select proper sidebar 04-03-2022
// $route['users/edit/(\d+)/(\d+)'] = 'auth/edit_user/$1';//changes issue for society id get in segment 23-12-2021
$route['users/edit/(\d+)/(\d+)'] = 'auth/society_edit_user/$1/$2';
$route['society_users/edit/(\d+)/(\d+)'] = 'auth/society_member_user/$1/$2';
$route['society_access_user/society_access_user_add/(\d+)'] = 'auth/society_access_create_user/$1';
$route['society_access_user/society_access_user_edit/(\d+)/(\d+)'] = 'auth/society_access_user_edit/$1/$2';
$route['users/delete/(\d+)'] = 'users/remove/$1';

//expense category routes
$route['expense_categories'] = 'expenceCategories/view_expense_categories';
$route['expense_categories/add'] = 'expenceCategories/add_expense_categories';
$route['expense_categories/edit/(\d+)'] = 'expenceCategories/edit_expense_categories/$1';
$route['expense_categories/delete/(\d+)'] = 'expenceCategories/remove/$1';

// utility service provider routes
$route['utility_service_provider'] = 'utilityProvider/view_utility_provider';
$route['utility_service_provider/add'] = 'utilityProvider/add_utility_provider';
$route['utility_service_provider/edit/(\d+)'] = 'utilityProvider/edit_utility_provider/$1';
$route['utility_service_provider/details/(\d+)'] = 'utilityProvider/details_utility_provider/$1';
$route['utilityProvider/monthly_bill/(\d+)'] = 'utilityProvider/view_monthly_bills/$1';
$route['utilityProvider/reports/(\d+)'] = 'utilityProvider/view_reports/$1';

// utility plan routes
$route['utility_plan/plans/(\d+)'] = 'utility_plan/view_plans/$1';
$route['utility_plan/add/(\d+)'] = 'utility_plan/add_plans/$1';
$route['utility_plan/edit/(\d+)/(\d+)'] = 'utility_plan/edit_plan/$1/$2';

// utility billing head
$route['utility_billing_head/view/(\d+)/(\d+)'] = 'utility_billing_head/view_utility_billing_head/$1/$2';
$route['utility_billing_head/add/(\d+)/(\d+)'] = 'utility_billing_head/add_utility_billing_head//$1/$2';
$route['utility_billing_head/edit/(\d+)/(\d+)/(\d+)'] = 'utility_billing_head/edit_utility_billing_head/$1/$2/$3';

// utility provider member
$route['utility_provider_member/assign_plan/(\d+)'] = 'utility_provider_member/assign_plan/$1';
$route['utility_provider_member/add/(\d+)'] = 'utility_provider_member/add_member/$1';
$route['utility_provider_member/manage/(\d+)'] = 'utility_provider_member/manage_member/$1';
$route['utility_provider_member/view/(\d+)/(\d+)'] = 'utility_provider_member/view_single_member/$1/$2';

//roles routes
$route['roles'] = 'roles/view_roles';
$route['roles/add'] = 'auth/create_group';
$route['roles/edit/(\d+)'] = 'auth/edit_group/$1';
$route['roles/delete/(\d+)'] = 'roles/remove/$1';

//activity logs routes
$route['activity_logs'] = 'activityLogs/view_activity_logs';

//enrolment requests routes
$route['enrolment_requests'] = 'enrollmentRequests/view_enrolment_requests';
$route['enrolment_requests/details'] = 'enrollmentRequests/enrolment_details';
$route['api/enrollmentRequests/create'] = 'api/SocietyEnrollmentRequestsController/create';

//Services routes
$route['services-categories'] = 'Services/view_services';
$route['services-categories/add'] = 'Services/add_services_categories';
$route['services-categories/edit/(\d+)'] = 'Services/edit_services_categories/$1';
$route['services_categories/delete/(\d+)'] = 'Services/remove/$1';

//Tax routes
$route['view-tax'] = 'Tax/view_tax';
$route['tax/add'] = 'Tax/add_tax';
$route['services-categories/edit/(\d+)'] = 'Services/edit_services_categories/$1';
$route['services_categories/delete/(\d+)'] = 'Services/remove/$1';

//Reports
// $route['societies/reports/(\d+)'] = 'societies/view_reports/$1';
$route['societies_report/reports/(\d+)'] = 'societies/view_reports/$1';//changes 04-03-2022
$route['societies_report/bank_reconciliation/(\d+)'] = 'societies/bank_reconciliation/$1';
$route['societies_report/bank_report/(\d+)/(\d+)'] = 'societies/bank_report/$1/$2';
$route['societies_report/all_member_list/(\d+)'] = 'societies/all_member_ledger/$1';
$route['societies_report/member_ledger_report/(\d+)/(\d+)'] = 'societies/member_ledger_report/$1/$2';
$route['societies_report/expenses/(\d+)'] = 'societies/expenses/$1';
$route['societies_report/cash/(\d+)'] = 'societies/cash/$1';
$route['societies_report/outstanding_report/(\d+)'] = 'societies/outstanding_report/$1';
$route['societies_report/payment_report/(\d+)'] = 'societies/payment_report/$1';
$route['societies_report/member_balance_report/(\d+)'] = 'societies/member_balance_report/$1';
$route['societies_report/i_register/(\d+)'] = 'societies/i_register/$1';
$route['societies_report/j_register/(\d+)'] = 'societies/j_register/$1';
$route['societies_report/share_register/(\d+)'] = 'societies/share_register/$1';
$route['societies_report/investment_register/(\d+)'] = 'societies/investment_register/$1';
// $route['societies/transactions/(\d+)/(\d+)'] = 'societies/view_transactions/$1/$2';
$route['societies_bank/transactions/(\d+)/(\d+)'] = 'societies/view_transactions/$1/$2';
//society cash transaction
// $route['societies/cash_in_hand/(\d+)'] = 'societies/view_cash_in_hand/$1';
$route['societies_cash/cash_in_hand/(\d+)'] = 'societies/view_cash_in_hand/$1';

//society Payment transaction
// $route['societies/cash_in_hand/(\d+)'] = 'societies/view_cash_in_hand/$1';
$route['societies_payment/society_single_payment/(\d+)'] = 'societies/society_single_payment/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
