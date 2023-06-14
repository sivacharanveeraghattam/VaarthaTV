<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Examplecontroller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Example_model
		$this->load->model('Example_model', 'ExampleModel');
	}
	public function index()
	{
		echo '<hr>I am from Examplecontroller<br>';

		$employees = $this->ExampleModel->getAllEmployees();
		$employees_array = $this->ExampleModel->getAllEmployeesArray();

		// print_r($employees);

		// foreach ($employees as $employee) {
		// 	echo '<hr>';
		// 	echo "<br>id: $employee->id";
		// 	echo "<br>id: $employee->name";
		// 	echo "<br>id: $employee->designation";
		// 	echo "<br>id: $employee->status";
		// 	echo "<br>id: $employee->created_at";
		// }

		$data = [];
		$data['employees'] = $employees; //object
		$data['employees_array'] = $employees_array; //array
		$this->load->view('show_data', $data);
		// $this->load->view('show_data', ['employees' => $employees]);
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
