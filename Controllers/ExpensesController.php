<?php namespace App\Controllers;

use App\Models\Expense;

class ExpensesController extends BaseController
{
    public function index()
    {
        $expensemodel = new Expense();
        $data['expenses'] = $expensemodel->findAll(); 
        return view('expense/index', $data); 
    }

    public function create()
    {
        return view('expense/create');
    }

    public function store()
    {
        $expenseModel = new Expense();

        $file = $this->request->getFile('photo');
        if ($file->isValid() && !$file->hasMoved())
        {
            $imageName = $file->getRandomName();
            $file->move('uploads/',$imageName);
        }
        $data = [
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'photo' => $imageName,
            'amount' => $this->request->getPost('amount'),
            'expense' => $this->request->getPost('expense'),
            'total_expense' => $this->request->getPost('total_expense'),
            'date' => $this->request->getPost('date'),
        ];
        $expenseModel->save($data);
        return redirect()->to(base_url('expense'))->with('status', 'Expense Details added successfully!...');

    }

    public function edit($id)
    {   
        $expensemodel = new Expense();
        $data['expenses'] = $expensemodel->find($id);
        return view('expense/edit', $data);
    }


    public function update($id)
{   
    $expenseModel = new Expense();

    // Find the expense item by ID
    $expenseItem = $expenseModel->find($id);

    // Get the uploaded file
    $file = $this->request->getFile('photo');

    // Check if a file is uploaded and valid
    if ($file && $file->isValid() && !$file->hasMoved()) {
        // Delete the old image file
        $oldImageName = $expenseItem['photo'];
        if (file_exists("uploads/" . $oldImageName)) {
            unlink("uploads/" . $oldImageName);
        }
        
        // Move the new file to the "uploads" directory
        $imageName = $file->getRandomName();
        $file->move('uploads/', $imageName);
    } else {
        // If no file is uploaded or the file is not valid, keep the existing photo
        $imageName = $expenseItem['photo'];
    }

    // Update the other fields in the database
    $data = [
        'name' => $this->request->getPost('name'),
        'phone' => $this->request->getPost('phone'),
        'photo' => $imageName,
        'amount' => $this->request->getPost('amount'),
        'expense' => $this->request->getPost('expense'),
        'total_expense' => $this->request->getPost('total_expense')
    ];

    // Update the record in the database
    $expenseModel->update($id, $data);

    return redirect()->to(base_url('expense'))->with('status', 'Expense Details Updated successfully!...');
}


    public function delete($id)
    {   
        $expensemodel = new Expense();
        $expensemodel->delete($id);
        return redirect()->to(base_url('expense'))->with('status', 'Expense Details Deleted successfully!...');
    }
}
?>