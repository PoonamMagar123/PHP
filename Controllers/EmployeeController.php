<?php namespace App\Controllers;

use App\Models\Employee;

class EmployeeController extends BaseController
{
    public function index()
    {
        $employeeModel = new Employee();
        $data['employees'] = $employeeModel->findAll(); 
        return view('employee/index', $data); 
    }

    public function create()
    {
        return view('employee/create');
    }

    public function store()
    {
        $employeeModel = new Employee();
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'designation' => $this->request->getPost('designation'),
        ];
        $employeeModel->save($data);
        return redirect()->to(base_url('employee'))->with('status', 'Employee added successfully!...');

    }

    public function edit($id)
    {   
        $employeeModel = new Employee();
        $data['employees'] = $employeeModel->find($id);
        return view('employee/edit', $data);
    }


    public function update($id)
    {   
        $employeeModel = new Employee();
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'designation' => $this->request->getPost('designation'),
        ];
        $employeeModel->update($id, $data);
        
        return redirect()->to(base_url('employee'))->with('status', 'Employee Updated successfully!...');
    }

    public function delete($id)
    {   
        $employeeModel = new Employee();
        $employeeModel->delete($id);
        return redirect()->to(base_url('employee'))->with('status', 'Employee Deleted successfully!...');
    }
}
?>