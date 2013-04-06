<?php
class Upload extends CI_Controller {
	function index()
	{	
		// This code will do the upload
		$config['upload_path'] = './temp/';
		$config['allowed_types'] = '*';
		
		$this->load->library('upload', $config);
		
		if (!$this->upload->do_upload())
		{
			$data = array('error' => $this->upload->display_errors());
			
			print_r($data);
			
			// TODO: Load a view to handle errors
		}
		else
		{
			echo "about to get upload data";
			
			$data = $this->upload->data();
			
			$this->load->model('upload_model');
			
			echo "loaded upload model";
			
			//$file_identifier, $user, $name, $type, $bucket, $size, $url, $parent='
			
			// Calculate the file identifier
			$file_identifier = hash_file('sha256', './temp/' . $data['file_name']);
			$file_identifier .= hash_file('md5', './temp/' . $data['file_name']);
			
			echo "file identifiers made";
			
			$bucket = $this->upload_model->get_nearest_bucket();
			
			$this->upload_model->move_to_s3($data['file_name'], $bucket, $file_identifier);
			
			echo "move to s3";
			
			$this->upload_model->store_upload(
					$file_identifier,
					'anonymous',
					$data['file_name'],
					$data['file_ext'],
					'amznhack-ireland',
					$data['file_size']
			);
		}
	}
}