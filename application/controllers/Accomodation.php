<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accomodation extends CI_Controller
{
	public function insertAccomodation()
	{

		// echo '<pre>';
		// print_r($_FILES);
		// exit;

		$this->secure->checkLogin();
		$multiImg = [];
		$this->load->library('upload');

		if ($_FILES["files"]["name"] != '') {
			$output = '';
			$config2["upload_path"] = 'uploads/accomodation/';
			$config2["allowed_types"] = 'jpg|jpeg|png|mp4';

			$config["encrypt_name"] = TRUE;
			$this->upload->initialize($config2);
			$multiImg ="";
			for ($count = 0; $count < count($_FILES["files"]["name"]); $count++) {
				$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
				$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
				$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
				$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
				$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
				if ($this->upload->do_upload('file')) {
					$data = $this->upload->data();
					// $multiImg[] = 'uploads/accomodation/' . $data["file_name"];
					$multiImg .= 'uploads/accomodation/' . $data["file_name"].'||';
				}
			}
		}

		$video = "";

		if ($_FILES["video"]["name"] != '') {
			$output = '';
			$config2["upload_path"] = 'uploads/accomodation/';
			$config2["allowed_types"] = 'mp4';

			$config["encrypt_name"] = TRUE;
			$this->upload->initialize($config2);

			$_FILES["file"]["name"] = $_FILES["video"]["name"];
			$_FILES["file"]["type"] = $_FILES["video"]["type"];
			$_FILES["file"]["tmp_name"] = $_FILES["video"]["tmp_name"];
			$_FILES["file"]["error"] = $_FILES["video"]["error"];
			$_FILES["file"]["size"] = $_FILES["video"]["size"];

			if ($this->upload->do_upload('file')) {
				$data = $this->upload->data();
				$video = 'uploads/accomodation/' . $data["file_name"];
			}
		}

		$data = [
			"title" => $this->input->post('title'),
			"description" => $this->input->post('description'),
			"price" => $this->input->post('price'),
			"property_type" => $this->input->post('property_type'),
			"bedrooms" => $this->input->post('bedrooms'),
			"bathrooms" => $this->input->post('bathrooms'),
			"availability_for" => $this->input->post('availability_for'),
			"location" => $this->input->post('location'),
			"contact_number" => $this->input->post('contact_number'),
			// "images" => json_encode($multiImg),
			"images" => $multiImg,
			"video" => $video,
			"status" => "1",
			"created_date" => date("Y-m-d H:i:s")
		];

		$d = $this->db->insert("tbl_accomodations", $data);
		
		if ($d) {
			$this->session->set_flashdata('emsg','Created Successfully.');
			redirect('home/post_listing');
		} else {
			$this->session->set_flashdata('emsg','Error Occured.');
			redirect('home/post_listing');
		}
	}

	public function Save_request()
	{
		$this->secure->checkLogin();
		// print_r($_POST);
		$data = [
			"post_id" => $this->input->post('row_id'),
			"post_date" => $this->input->post('c_date'),
			"name" => $this->input->post('name'),
			"phone" => $this->input->post('phone'),
			"email" => $this->input->post('email'),
			"status" => "1",
			"created_date" => date("Y-m-d H:i:s")
		];

		$d = $this->db->insert("tbl_accomodation_request", $data);
		
		if ($d) {
			echo "success";
		} else {
			echo "error";
		}
		
	}
	
}
