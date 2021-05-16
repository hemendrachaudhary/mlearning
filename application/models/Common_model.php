<?php defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' );
class Common_model extends CI_Model {
	function __construct() {
		parent::__construct ();
                $this->load->database();
	}
	public function insertAll($table, $data) {
		// $this->db->last_query();;
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();
			if ($insert_id > 0) {
				return $insert_id;
			} else {
				return false;
			}
	}
	public function getAllResult($table){
  $allData = $this->db->get($table)->result();
		return $allData;
	}
	
	public function getAllResultArray($table, $where) {
		$allData = $this->db->get_where($table, $where)->result();
                return $allData;    
	}
	
	public function  getRowResultArray($table, $where){
		$allData = $this->db->get_where($table, $where)->row();
		  
                return $allData;
                
	}
	
	public function getAllResultWhereOrderBy($table, $where, $colum) { 
	
		if(empty($where)){
			$allData = $this->db->order_by($colum, "desc")->get($table)->result();
			return $allData;
		}else{
			$allData = $this->db->order_by($colum, "desc")->get_where($table, $where)->result();
			return $allData;
		}
	}

	public function getAllResultTwoDate($table, $toDate, $fromDate, $colum)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where('sales_date <=', $fromDate);
		$this->db->where('sales_date >=', $toDate);
		$this->db->order_by($colum, "desc");

		 return $result = $this->db->get()->result();
		 //$this->db->last_query();
	}
	
	public function getAllResultTwoDateWithWhere($table, $toDate, $fromDate, $colum, $where)
	{
		$this->db->where('sales_date <=', $fromDate);
		$this->db->where('sales_date >=', $toDate);
		$this->db->order_by($colum, "desc");

		 return $result = $this->db->get_where($table, $where)->result();
		 //$this->db->last_query();
	}

	
	public function getAllResultWhereColumGroupBy($table, $where, $colum) {
		
		if(!empty($where)){
			$allData = $this->db->group_by($colum)->get_where($table, $where)->result();
			return $allData;
		}else{
			$allData = $this->db->group_by($colum)->get($table)->result();
			return $allData;
			
		}
	}
	
	public function getAllResultJoin($tableA, $tableAid, $tableB, $tableBid){
		$this->db->select('*');
		$this->db->from($tableA);
		$this->db->join($tableB, $tableAid = $tableBid);
		$allData = $this->db->get()->result();
		return $allData;
		
	}
        

	public function getAllResultRightJoin($tableA, $tableAid, $tableB, $tableBid){
		$this->db->select('*');
		$this->db->from($tableA);
		$this->db->join($tableB, $tableAid = $tableBid , 'outer');
		$allData = $this->db->get()->result();
		return $allData;
		
	}
	
	public function getAllResultJoinWithWhere($tableA, $tableAid, $tableB, $tableBid, $data){
		$this->db->select('*');
		$this->db->from($tableA);
		$this->db->join($tableB, $tableAid = $tableBid);
		$this->db->where($data);
		$allData = $this->db->get()->result();
		return $allData;
		
	}
	
	public function updateAllResultWhere($table, $where, $data) {
		$this->db->where($where)->update($table, $data);
		$afftectedRows = $this->db->affected_rows();
              
		return $afftectedRows;
	}
	
	public function getMaxNumber($table, $data){
		$allData = $this->db->select_max($data)->get($table)->row();
		return $allData;
		 
	}
	
	public function totalCount($table, $where){
		$allData = $this->db->where($where)->count_all_results($table);
		//$this->db->last_query();
		return $allData;  
	}
	
	public function totalSum($sum, $table, $where){
		
		$allData = $this->db->select_sum($sum)->get_where($table, $where)->row();
		return $allData;
	}

	public function deleteArray($table,$data){
		$allData = $this->db->where($data)->delete($table);
		return $allData;
		
	}
 
    public function getDataWhereIn($table,$data,$colum){
 	   $this->db->select('*');
	   $this->db->from($table);
 	   $this->db->where_in($colum,$data);
 	   $allData = $this->db->get()->result();
 	   return $allData;
	}

	public function getmax($table,$colum){
		$this->db->select_max($colum);
	    $this->db->from($table);
	    $query = $this->db->get();
	    return $query->row();
			
	}

	public function send_email($to,$sub,$msg)
	{
		// $config['protocol'] = 'smtp';
		// $config['smtp_host'] = 'ssl://smtp.gmail.com';
		// $config['smtp_port'] = '465';
		// $config['smtp_user'] = 'hemendra18help@gmail.com';
		// $config['smtp_pass'] = '';
		// $config['charset'] = 'utf-8';
		// $config['newline'] = "\r\n";
			
		// Loads the email library
		$this->load->library('email');
		// FCPATH refers to the CodeIgniter install directory
		// Specifying a file to be attached with the email
		//$file = FCPATH . 'license.txt';
		// Defines the email details
		$this->email->from('raksharajput650@gmail.com', 'Raksha');
		$this->email->to($to);
		//$this->email->cc('another@example.com');
		//$this->email->bcc('one-another@example.com');
		$this->email->subject($sub);
		$this->email->message($msg);
		//$this->email->attach($file);
		// The email->send() statement will return a true or false
		// If true, the email will be sent
		if ($this->email->send()) {
		  echo "All OK";
		} else { 
		  echo $this->email->print_debugger();
		}
  }

  } 

?>