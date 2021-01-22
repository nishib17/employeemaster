<?php
class Employee_model extends CI_model
{
	
	public function getemployee()
	{
		$query = $this->db->select("*")->where('status!=',2)->order_by('emp_id','DESC')->get('employee');
		return $query->result();
	}
	public function insert_data()
	{
		// print_r($_POST);exit();
		$this->form_validation->set_rules('emp_name','Employee Name','required|alpha');
		// $this->form_validation->set_rules('email_address','Email Address','valid_email');
		if (isset($_POST['emp_id']) && $_POST['emp_id']!='') {
			$this->form_validation->set_rules('email_address', 'Email Address', 'required|trim|valid_email');
		}else{
			$this->form_validation->set_rules('email_address', 'Email Address', 'required|trim|valid_email|is_unique[employee.email_address]');
		}

		$this->form_validation->set_rules('phone_no','Phone No','required|numeric|exact_length[10]');
		$this->form_validation->set_rules('dob','DOB','required');
		$this->form_validation->set_rules('department','Department','required|alpha');
		if ($this->form_validation->run()) {
			$data = array(
				'emp_name' => $_POST['emp_name'],
				'address' => $_POST['address'],
				'email_address' => $_POST['email_address'],
				'phone_no' => $_POST['phone_no'],
				'dob' => date("Y-m-d",strtotime($_POST['dob'])) ,
				'department' => $_POST['department'] ,
				'emp_image' => (isset($_FILES['userfile']['name']) && $_FILES['userfile']['name'] !='') ? $_FILES['userfile']['name']: ($_POST['userfile_hidden']!=''? $_POST['userfile_hidden'] : ''),
				'status' => 1,
			);

			if ($_POST['emp_id']!='') {
				$this->db->where('emp_id',$_POST['emp_id']);
				$query_update = $this->db->update('employee',$data);
			}else{

				$query_add = $this->db->insert('employee',$data);
			}
			if ($query_add) {
				$this->session->set_flashdata('success','Employee details added.');
				redirect('employee');
			}
			if ($query_update) {
				$this->session->set_flashdata('success','Employee details Updated.');
				redirect('employee');
			}

			
		}else{
			$this->session->set_flashdata('error', 'Somthing went wrong. Try again with valid details !!');
			// $this->session->set_flashdata('error', validation_errors());
			// redirect('employee/add');
			
		}

	}
	public function getsingleemployee($emp_id)
	{
		$query = $this->db->select("*")->where('emp_id',$emp_id)->get('employee');
		return $query->row();
	}
}
?>