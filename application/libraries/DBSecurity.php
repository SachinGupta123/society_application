<?php

class DBSecurity {

    private function array_to_string($fields) {
// 		Logger::write('Enter: DBSecurity/array_to_string/' . http_build_query($fields), 1);
        $str_array = "";
        for ($i = 0; $i < count($fields); $i++) {
            switch ($fields[$i]['DataType']) {
                case DataType::DateTime:
                    $str_array .= base64_encode(strtotime($fields[$i]['Value']));
                    break;
                default:
                    $str_array .= base64_encode($fields[$i]['Value']);
                    break;
            }
        }
// 		Logger::write('Exit: DBSecurity/array_to_string', 1);
        return $str_array;
    }

    public function update_row_crc_multi($table_name, $where_arr, $where_cond = "AND") {
//// 		Logger::write('Enter: DBSecurity/update_row_crc_multi/' . $table_name . '/array/' . $where_cond, 1);
//		$CI =& get_instance();
//		if($CI->config->item('enable_crc') == FALSE){
//// 			Logger::write('SUCCESS Exit: DBSecurity/update_row_crc_multi/' . $table_name . '/array/' . $where_cond, 1);
//			return;
//		}
//		
//		$tbl_cols_ar = $CI->config->item('db_tbls_cols');
//		$CI->db->select($tbl_cols_ar[$table_name]['pk']);
//		$query = $CI->db->get_where($table_name, $where_arr);
//		if ($query->num_rows() > 0) {
//			$res = $query->result_array();
//			for($i=0; $i<count($res); $i++){
//				$this->update_row_crc($table_name, $res[$i][$tbl_cols_ar[$table_name]['pk']]);
//			}
//		}
//// 		Logger::write('Exit: DBSecurity/update_row_crc_multi', 1);
    }

    public function update_row_crc($table_name, $row_id) {
// 		Logger::write('Enter: DBSecurity/update_row_crc/' . $table_name . '/' . $row_id, 1);
		$CI =& get_instance();
		if($CI->config->item('enable_crc') == FALSE){
// 			Logger::write('SUCCESS Exit: DBSecurity/update_row_crc', 1);
			return;
		}
		
		$tbl_cols_ar = $CI->config->item('db_tbls_cols');
		$tbl_cols = array_keys($tbl_cols_ar[$table_name]['other_fields']);
		$fields = implode(",", $tbl_cols);
		$fields = str_replace('from,', '`from`,', $fields);
		$CI->db->select($fields);
		$query = $CI->db->get_where($table_name, array($tbl_cols_ar[$table_name]['pk'] => $row_id));
		
		if ($query->num_rows() > 0) {
			$fields = array();
			$res = $query->result_array();
			for($i=0; $i<count($tbl_cols); $i++){
				array_push($fields, array('DataType' => $tbl_cols_ar[$table_name]['other_fields'][$tbl_cols[$i]], 'Value' => $res[0][$tbl_cols[$i]]));
			}
			$fields_str_enc = $this->calc_crc($fields, $CI->config->item('openssl_pub_key'));
			Logger::write('SUCCESS Exit: DBSecurity/update_row_crc', 1);
			return $CI->db->update($table_name, array('reserved' => $fields_str_enc), array($tbl_cols_ar[$table_name]['pk'] => $row_id));
		}
// 		Logger::write('ERROR Exit: DBSecurity/update_row_crc', 1);
		return false;
    }

    public function get_pub_key_from_cer() {
//// 		Logger::write('Enter: DBSecurity/get_pub_key_from_cer', 1);
//		$fp = fopen(site_url("cert/prcertpwd.pem"), "r");
//		if (!$fp) {
//			Logger::write('ERROR Exit: DBSecurity/get_pub_key_from_cer', 1);
//			return false;
//		}
//		$pub_key = fread($fp,8192);
//		fclose($fp);
//// 		Logger::write('SUCCESS Exit: DBSecurity/get_pub_key_from_cer', 1);
//		return $pub_key;
    }

    public function get_priv_key_from_pem() {
//// 		Logger::write('Enter: DBSecurity/get_priv_key_from_pem', 1);
//		$fp = fopen(site_url("cert/ptprivkeypwd.pem"),"r");
//		if (!$fp) {
//			Logger::write('ERROR Exit: DBSecurity/get_priv_key_from_pem', 1);
//			return false;
//		}
//		$priv_key = fread($fp,8192);
//		fclose($fp);
//		// $passphrase is required if your key is encoded (suggested)
//		$res = openssl_get_privatekey($priv_key, ",{r4:F!vPZA'P2&");
//// 		Logger::write('SUCCESS Exit: DBSecurity/get_priv_key_from_pem', 1);
//		return $res;
    }

    public function calc_crc($fields, $pub_key) {
// 		Logger::write('Enter: DBSecurity/calc_crc/' . http_build_query($fields) . '/pub_key', 1);
		$val_to_encrypt = $this->array_to_string($fields);
		openssl_public_encrypt($val_to_encrypt, $encrypted, $pub_key);
// 		Logger::write('Exit: DBSecurity/calc_crc', 1);
		return base64_encode($encrypted);
    }

    public function verify_crc($fields, $crc, $priv_key) {
//// 		Logger::write('Enter: DBSecurity/verify_crc/' . http_build_query($fields) . '/' . $crc . '/priv_key', 1);
//		$val_to_encrypt = $this->array_to_string($fields);
//		openssl_private_decrypt(base64_decode($crc), $newsource, $priv_key);
//// 		Logger::write('Exit: DBSecurity/verify_crc', 1);
//		return $newsource == $val_to_encrypt;
    }

    public function check_db_crc() {
//// 		Logger::write('Enter: DBSecurity/check_db_crc', 1);
//		$ci = & get_instance();
//		//get tables structure
//		$tables_cols = $this->get_db_tbl_cols();
//		$total_rows_checked = 0;
//		$error_rows = 0;
//		$error_rows_str = "";
//		foreach ($tables_cols as $table => $tbl_cols) {
//			//select min id from table
//			$query_string = "SELECT min(" . $tbl_cols['pk'] . ") start_id FROM " . $table;
//			$query = $ci->db->query($query_string);
//			if ($query->num_rows() > 0) {
//				$result = $query->result_array();
//				
//				$start_id = $result[0]['start_id'];
//				if($start_id == "" || $start_id == null){
//					continue;
//				}
//				
//				//select total number of rows
//				$query_string = "SELECT count(*) rows_cnt FROM " . $table;
//				$query = $ci->db->query($query_string);
//				if ($query->num_rows() > 0) {
//					$result = $query->result_array();
//					$rows_cnt = $result[0]['rows_cnt'];
//						
//					//loop on the table rows
//					while ($start_id <= $rows_cnt){
//						$query_string = "SELECT * FROM " . $table . " WHERE " . $tbl_cols['pk'] . " >= " . $start_id . " ORDER BY " . $tbl_cols['pk'] . " ASC LIMIT 1000";
//						$query = $ci->db->query($query_string);
//						if ($query->num_rows() > 0) {
//							$result = $query->result_array();
//							for($i=0; $i<count($result); $i++){
//								$fields = array_keys($result[$i]);
//								$fields_vals = array();
//								$crc = "";
//								$row_pk = "";								
//								for($j=0; $j<count($fields); $j++){
//									if($fields[$j] != "reserved" && $fields[$j] != $tbl_cols['pk']){
//										array_push($fields_vals, array("DataType" => $tbl_cols['other_fields'][$fields[$j]], "Value" => $result[$i][$fields[$j]]));
//									}else if($fields[$j] == "reserved"){
//										$crc = $result[$i][$fields[$j]];
//									}else if($fields[$j] == $tbl_cols['pk']){
//										$row_pk = $result[$i][$fields[$j]];
//									}
//								}
//								$total_rows_checked++;
//								if(!$this->verify_crc($fields_vals, $crc, $ci->config->item('openssl_priv_key'))){
//									$error_rows++;
//									$error_rows_str .= "Table: " . $table . "              Row: " . $row_pk . "             CRC: " . $crc . "\n";
//								}
//							}
//						}
//						$start_id += 1000;
//					}
//				}
//			}
//		}
//		$msg = "Total rows checked: " . $total_rows_checked . "\nError rows: " . $error_rows . "\n" . $error_rows_str;
//		$headers = "MIME-Version: 1.0" . "\r\n";
//		$headers .= "Content-type:text/html; charset=utf-8" . "\r\n";
//		mail('oelsayed@Paynet.co', 'CRC Update',nl2br($msg),$headers);
//		file_put_contents("application/pt_logs/crc/crc_" . date("Ymd") . ".log", $msg);
//// 		Logger::write('Exit: DBSecurity/check_db_crc', 1);
    }

    //returns an array on the form array('table_name') => ('pk' => 'pk_field_name', 'other_fields' => array('field_name' => 'field_data_type'))
    function get_db_tbl_cols() {
//// 		Logger::write('Enter: DBSecurity/get_db_tbl_cols', 1);
//		$tables_cols = array();
//		$ci = & get_instance();
//		$query_string = "show tables";
//		$query = $ci->db->query($query_string);
//		if ($query->num_rows() > 0) {
//			$result = $query->result_array();
//                        $db_keys_ar = array_keys($result[0]);
//                        $db_key = $db_keys_ar[0];
//			for($i=0; $i<count($result); $i++){
//				$query_string = "SHOW KEYS FROM " . $result[$i][$db_key] . " WHERE Key_name = 'PRIMARY'";
//				$query = $ci->db->query($query_string);
//				$pk_col = "";
//				if ($query->num_rows() > 0) {
//					$result2 = $query->result_array();
//					$pk_col = $result2[0]['Column_name'];
//					$tables_cols[$result[$i][$db_key]]['pk'] = $pk_col;
//					$tables_cols[$result[$i][$db_key]]['other_fields'] = array();
//					
//					$query_string = "SHOW COLUMNS FROM " . $result[$i][$db_key];
//					$query = $ci->db->query($query_string);
//					if ($query->num_rows() > 0) {
//						$result2 = $query->result_array();
//						for($j = 0; $j < count($result2); $j++){
//							if($result2[$j]['Field'] != "reserved" && $result2[$j]['Field'] != $pk_col){
//								if(strpos($result2[$j]['Type'], 'timestamp') !== false || strpos($result2[$j]['Type'], 'datetime') !== false){
//	 								$tables_cols[$result[$i][$db_key]]['other_fields'][$result2[$j]['Field']] = DataType::DateTime;
//	 							}else if(strpos($result2[$j]['Type'], 'varchar') !== false
//			 							|| strpos($result2[$j]['Type'], 'text') !== false
//			 							|| strpos($result2[$j]['Type'], 'enum') !== false){
//	 								$tables_cols[$result[$i][$db_key]]['other_fields'][$result2[$j]['Field']] = DataType::String;
//	 							}else if(strpos($result2[$j]['Type'], 'int') !== false
//			 							|| strpos($result2[$j]['Type'], 'double') !== false
//			 							|| strpos($result2[$j]['Type'], 'float') !== false
//			 							|| strpos($result2[$j]['Type'], 'tinyint') !== false){
//	 								$tables_cols[$result[$i][$db_key]]['other_fields'][$result2[$j]['Field']] = DataType::Number;
// 								}
//							}
//						}
//					}
//				}
//			}
//// 			Logger::write('Exit: DBSecurity/check_db_crc', 1);
//			return $tables_cols;
//		}
    }

}

?>