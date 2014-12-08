<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mailer extends CI_Controller {

	public function index()
	{
		$data['directory'] = $this->config->item('src_directory');
		$data['account'] = $this->config->item('account');
		$data['map'] = directory_map( $data['directory'] );
		
		if(isset($_POST['target']) && isset($_POST['html']) && isset($_POST['text'])){
			
			if($_POST['target'] == ""){
				$data['debug'] = '<p style="color:#AA0000;"><b>No email address!</b></p>';
			}else{
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.gmail.com',
					'smtp_port' => 465,
					'smtp_user' => $this->config->item('account'),
					'smtp_pass' => $this->config->item('password'),
					'mailtype'  => 'html', 
					'smtp_timeout' => 30
				);

				$html = read_file($data['directory']."\\".$data['map'][$_POST['html']]);
				$text = read_file($data['directory']."\\".$data['map'][$_POST['text']]);		
				
				$this->load->library('email',$config);

				$this->email->from($this->config->item('account'), 'Test Account');
				$this->email->to($_POST['target']); 

				$this->email->subject('Testing');
				$this->email->message($html);
				//$this->email->message($text);
				$this->email->set_alt_message($text);

				$this->email->send();

				$data['debug'] = $this->email->print_debugger();
			}
			
		}

		$this->load->view('index',$data);
	}
	
	public function view($index = null){
		if($index === null){
			echo "No page requested";
		}else{
			$data['map'] = directory_map( $this->config->item('src_directory') );
			echo read_file($this->config->item('src_directory')."/".$data['map'][$index]);
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */