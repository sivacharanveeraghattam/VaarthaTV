<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('user_agent');
	}
	public function index()
	{
		if ($this->agent->is_browser())
{
        $agent = $this->agent->browser().' '.$this->agent->version();
}
elseif ($this->agent->is_robot())
{
        $agent = $this->agent->robot();
}
elseif ($this->agent->is_mobile())
{
        $agent = $this->agent->mobile();
}
else
{
        $agent = 'Unidentified User Agent';
}

echo $agent;
echo "<br>";
echo $this->agent->agent_string(); // Platform info (Windows, Linux, Mac, etc.)
        $this->load->view('userView/index');
        $this->load->view('userView/header');
        $this->load->view('userView/footer');
	}


	public function add()
	{
		$data = [];
		$data['name'] = 'testing';
		$data['designation'] = 'designation';
		$data['status'] = 'active';

		$result = $this->ExampleModel->insert($data);

		if ($result == TRUE) {
			echo 'Employee added succesfully';
		} else {
			echo 'Sorry, Employee is not added.';
		}
	}

	public function update()
	{
		$data = [];
		$data['name'] = 'testing 123';
		$data['designation'] = 'designation 123';
		$data['status'] = 'active';

		$employee_id = 6;
		$result = $this->ExampleModel->update($data, $employee_id);

		if ($result == TRUE) {
			echo 'Employee update succesfully';
		} else {
			echo 'Sorry, Employee is not update.';
		}
	}
}
