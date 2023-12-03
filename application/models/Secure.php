<?php
defined("BASEPATH") or exit("NO direct script access allow");


class Secure extends CI_Model
{



	public function __construct()
	{
		parent::__construct();
	}

	public function checkLogin()
	{
		if(!$this->session->userdata('user_id')){
			redirect('home/login');
		}
	}

	public function generateCaptcha()
	{

		$config = array(
            'img_path'      => 'uploads/captcha/',
            'img_url'       => base_url().'uploads/captcha/',
			'img_width' => 160,
			'img_height' => 35,
			'word_length'   => 6,
//			'font_size' => 50,
            'font_path'     => FCPATH.'uploads/captcha/fonts/verdana.ttf',
		);
	
        $captcha = create_captcha($config);
        
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        
        $captchaImg = $captcha['image'];
		return($captchaImg);

	}

	public function encrypt($data)
	{

		$key = "bjvd!@#$%^&*13248*/-/*vjvdf";
		$hmac_key = "kbdkh2365765243";


		$e = $this->encryption->initialize(
			array(
				'cipher' => 'blowfish',
				'mode' => 'cbc',
				'key' => $key,
				'hmac_digest' => 'sha256',
				'hmac_key' => $hmac_key
			)
		);

		$s = $this->encryption->encrypt($data);


		if ($s) {

			return $s;
		} else {

			return false;
		}
	}


	public function encryptWithKey($data, $key)
	{

		$this->encryption->initialize(
			array(
				'cipher' => 'aes-256',
				'mode' => 'ctr',
				'key' => $key
			)
		);

		$s = $this->encryption->encrypt($data);


		if ($s) {

			return $s;
		} else {

			return false;
		}
	}

	public function decrypt($data)
	{

		$key = "bjvd!@#$%^&*13248*/-/*vjvdf";
		$hmac_key = "kbdkh2365765243";

		$d = $this->encryption->initialize(
			array(
				'cipher' => 'blowfish',
				'mode' => 'cdc',
				'key' => $key,
				'hmac_digest' => 'sha256',
				'hmac_key' => $hmac_key
			)
		);
		$s = $this->encryption->decrypt($data);
		if ($s) {

			return $s;
		} else {

			return false;
		}
	}
}
