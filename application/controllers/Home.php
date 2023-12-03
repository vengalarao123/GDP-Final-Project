<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH.'libraries/sendgrid/sendgrid-php.php');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->secure->checkLogin();
		$query = $this->db->query("SELECT * FROM `tbl_accomodations` where status ='1'");
		$data['accomodations'] = $query->result_array();

		$query1 = $this->db->query("SELECT * FROM `tbl_ride` where status ='1'");
		$data['ride'] = $query1->result_array();

		$query2 = $this->db->query("SELECT * FROM `tbl_ride_book` where status ='1'");
		$data['ride_book'] = $query2->result_array();

		$this->load->view('index',$data);
	}


	public function login()
	{
		$this->load->view('login');
	}

	public function about_us()
	{
		$this->load->view('about');
	}

	public function accomodation()
	{
		$this->secure->checkLogin();
		$this->load->view('accomodation');
	}

	public function rides()
	{
		$this->secure->checkLogin();
		$this->load->view('post_book_rides');
	}

	public function insertRide()
	{
		$this->secure->checkLogin();
		// print_r($_POST);
		$data = array(
			'name' => $this->input->post('name'),
			'date' => $this->input->post('date'),
			'time' => $this->input->post('time'),
			'pickup' => $this->input->post('pickup'),
			'drop' => $this->input->post('drop'),
			'contact_number' => $this->input->post('number'),
			'status' => '1',
			'deleted' =>false,
			'created_date' => date('Y-m-d')

		);
		$q = $this->db->insert("tbl_ride", $data);
		if($q){
			echo "success";
		}else{
			echo "error";
		}
	}

	public function passenger_()
	{
		$this->secure->checkLogin();
		// print_r($_POST);
		$data = array(
			'name' => $this->input->post('name'),
			'date' => $this->input->post('date'),
			'time' => $this->input->post('time'),
			'pickup' => $this->input->post('pickup'),
			'drop' => $this->input->post('drop'),
			'contact_number' => $this->input->post('number'),
			'details' => $this->input->post('details'),
			'email' => $this->input->post('email'),
			'status' => '1',
			'deleted' =>false,
			'created_date' => date('Y-m-d')

		);
		$q = $this->db->insert("tbl_ride_book", $data);
		if($q){
			echo "success";
		}else{
			echo "error";
		}
	}
	
	public function availability()
	{
		$this->secure->checkLogin();
		$query = $this->db->query("SELECT * FROM `tbl_accomodations`");
		$data['list'] = $query->result_array();
		$this->load->view('availability', $data);
	}

	public function availability_requests()
	{
		$this->secure->checkLogin();
		$query = $this->db->query("
			SELECT tar.name,tar.phone,tar.email,tar.created_date as rdate,ta.title,ta.description,ta.price,ta.property_type,ta.location,ta.contact_number
			FROM tbl_accomodation_request as tar 
			INNER JOIN tbl_accomodations as ta ON ta.id = tar.post_id
			WHERE ta.status = 1 AND tar.status = 1 
		");
		$data['list'] = $query->result_array();
		$this->load->view('availability_requests', $data);

	}

	
	public function ViewListing()
	{
		$this->secure->checkLogin();
		$i = explode("||", $_GET['id']);
		if($i[1] == ""){
			$tbl = "tbl_accomodations";
		}else if($i[1] == "1"){
			$tbl = "tbl_ride";
		}
		else if($i[1] == "2"){
			$tbl = "tbl_ride_book";
		}

		$query = $this->db->query("SELECT * FROM ".$tbl." where id= ".$i[0]." AND status ='1'");
		$data['list'] = $query->result_array();
		$data['tbl'] = $i[1];
		$res = $this->load->view('ViewListing', $data);
	}

	public function post_listing()
	{
		$this->secure->checkLogin();
		$this->load->view('PostListing');
	}

	public function help()
	{
		$this->load->view('help');
	}

	public function transportation()
	{
		$this->secure->checkLogin();
		$this->load->view('rides');
	}
	public function rider()
	{
		$this->secure->checkLogin();
		$this->load->view('Rider');
	}
	public function passenger()
	{
		$this->secure->checkLogin();
		$this->load->view('passenger');
	}
	public function rules()
	{
		$this->load->view('rules');
	}
	public function mentor()
	{
		$this->load->view('mentor');
	}
	public function forgot()
	{
		$this->load->view('forgot');
	}

	public function signup()
	{
		$this->load->view('signup');
	}

	public function confirmOtp()
	{
		$email = $this->input->post("email");
		$otp = $this->input->post("otp");
		
		$mchk = $this->db->order_by("id","desc")->get_where("tbl_users",array("email"=>$email, "otp"=>$otp))->num_rows();
		
		if($mchk >= 1){
			echo json_encode(["status"=>200, "email"=>$email ,"message"=>"OTP Veried successfully."]);
			exit;	
		}else{
			echo json_encode(["status"=>400,"message"=>"Invalid Otp."]);
			exit;
		}
	}

	public function sendOtp()
	{

		$email = $this->input->post('email');
		$eChk = $this->db->get_where("tbl_users",["email"=>$email])->num_rows();
		if($eChk == 0){
			echo json_encode(["status"=>400, "message"=>"Please enter valid email id."]);
			exit;
		}

		$otp = random_string('numeric', 6);
		$this->db->where("email",$email)->update("tbl_users",["otp"=>$otp]);

		$ufrom = new SendGrid\Email("Expats Hub", FROM_EMAIL);
		$usubject = "Expats Hub: Email Verification";
		$uto = new SendGrid\Email("Expats Hub",$email);

		$ucontent = new SendGrid\Content("text/html","<div>OTP is: $otp</div>");
		$umail = new SendGrid\Mail($ufrom, $usubject, $uto, $ucontent);
		$usg = new \SendGrid(SENDGRID_KEY);
		$uresponse = $usg->client->mail()->send()->post($umail);

		echo json_encode(["status"=>200, "email"=>$email, "message"=>"Please enter otp shared to your email id."]);
		exit;
	}

	public function insertUser()
	{
		$first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$address = $this->input->post('address');
		$postal_code = $this->input->post('postal_code');
		$email = $this->input->post('email');
		$country_code = $this->input->post('country_code');
		$mobile_number = $this->input->post('mobile_number');
		$password = $this->input->post('password');
		$cpassword = $this->input->post('cpassword');
		$captcha = $this->input->post('captcha');

		if($password !== $cpassword){
			echo json_encode(["status"=>400, "message"=>"Password & Confirm Password Not Matched."]);
			exit;
		}

		$eChk = $this->db->get_where("tbl_users",["email"=>$email])->num_rows();
		if($eChk > 0){
			echo json_encode(["status"=>400, "message"=>"Email Already Registered With Us."]);
			exit;
		}

		$genCaptcha = $this->session->userdata('captchaCode');
	
		if($genCaptcha !== $captcha){	
			echo json_encode(["status"=>400, "message"=>"Captcha Code Is Wrong"]);
			exit;
		}

		$otp = random_string('numeric', 6);

		$data = [
			"first_name" => $first_name,
			"last_name" => $last_name,
			"address" => $address,
			"postal_code" => $postal_code,
			"country_code" => $country_code,
			"email" => $email,
			"mobile_number" => $mobile_number,
			"password" => $this->secure->encrypt($password),
			"otp" => $otp,
			"created_date" => date("Y-m-d H:i:s")
		];

		$d = $this->db->insert("tbl_users",$data);
		$lid = $this->db->insert_id();

		if($d){

			$ufrom = new SendGrid\Email("Expats Hub", FROM_EMAIL);
			$usubject = "Expats Hub: Email Verification";
			$uto = new SendGrid\Email("Expats Hub",$email);

			$ucontent = new SendGrid\Content("text/html","<div>OTP is: $otp</div>");
			$umail = new SendGrid\Mail($ufrom, $usubject, $uto, $ucontent);
			$usg = new \SendGrid(SENDGRID_KEY);
			$uresponse = $usg->client->mail()->send()->post($umail);
			// print_r($uresponse);

			echo json_encode(["status"=>200, "user_id"=> $lid, "message"=>"Please activate your account by verifying your email address with OTP."]);
			exit;
		}else{
			echo json_encode(["status"=>400, "message"=>"Error Occured."]);
			exit;
		}

	}

	public function do_login(){
	
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		
		$mchk = $this->db->get_where("tbl_users",array("email"=>$email,"status"=>"Active"))->num_rows();
		
		if($mchk == 1){
	
			$pchk = $this->db->get_where("tbl_users",array("email"=>$email,"status"=>"Active"))->row();
			$cpass = $this->secure->decrypt($pchk->password);
		
			if($cpass == $password){
				$this->session->set_userdata(["user_id"=>$pchk->id,"user_name"=>$pchk->first_name." ".$pchk->last_name]);
				echo json_encode(["status"=>200,"message"=>"Logged in successfully."]);
				exit;
			}else{
				echo json_encode(["status"=>400,"message"=>"Password is Wrong."]);
				exit;
			}
	
		}else{
			
			echo json_encode(["status"=>400,"message"=>"You are not registered with us. Please sign up with us."]);
			exit;
			
		}
		
	}

	public function updatePassword(){
	
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$cpassword = $this->input->post("cpassword");
		
		if($password !== $cpassword){
			echo json_encode(["status"=>400, "message"=>"Password & Confirm Password Not Matched."]);
			exit;
		}
	
		$pchk = $this->db->where("email",$email)->update("tbl_users",array("password" => $this->secure->encrypt($password)));
		
		if($pchk){
			echo json_encode(["status"=>200,"message"=>"Password Updated successfully."]);
			exit;
		}else{
			echo json_encode(["status"=>400,"message"=>"Error Occured."]);
			exit;
		}
	
	}

	public function verifyOtp(){
	
		$user_id = $this->input->post("id");
		$otp = $this->input->post("otp");
		
		$mchk = $this->db->order_by("id","desc")->get_where("tbl_users",array("id"=>$user_id, "otp"=>$otp))->num_rows();
		
		if($mchk >= 1){
	
			$pchk = $this->db->where("id",$user_id)->update("tbl_users",array("status"=>"Active"));
			
			if($pchk){
				echo json_encode(["status"=>200,"message"=>"OTP Veried successfully."]);
				exit;
			}else{
				echo json_encode(["status"=>400,"message"=>"Error Occured."]);
				exit;
			}
	
		}else{
			
			echo json_encode(["status"=>400,"message"=>"Invalid Otp."]);
			exit;
			
		}
		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("home/login");
	}
	
}
