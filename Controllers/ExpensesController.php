<?php namespace App\Controllers;

use App\Models\Expense;

use Mpdf\Mpdf;

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
        $expenseItem = $expenseModel->find($id);
        
        $oldImageName = $expenseItem['photo'];
        $file = $this->request->getFile('photo');

        // Check if a file is uploaded and valid
        if ($file->isValid() && !$file->hasMoved()) 
        {
            // Delete the old image file
            if (file_exists("uploads/" . $oldImageName)) {
                unlink("uploads/" . $oldImageName);
            }
            
            // Move the new file to the "uploads" directory
            $imageName = $file->getRandomName();
            $file->move('uploads/', $imageName);
        } 
        else 
        {
            // If no file is uploaded or the file is not valid, keep the existing photo
            $imageName = $oldImageName;
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

        $data = $expensemodel->find($id);
        $imagefile = $data['photo'];
        if(file_exists('uploads/'. $imagefile))
        {
            unlink('uploads/'. $imagefile);
        }
        $expensemodel->delete($id);
        return redirect()->to(base_url('expense'))->with('status', 'Expense Details Deleted successfully!...');
    }

    public function download($id)
    {
        $expensemodel = new Expense();

        // Fetch data for the selected expense (you might need to adjust this based on your model)
        $expense = $expensemodel->find($id);

        if ($expense) {
            // Generate PDF content (use the appropriate view for your data)
            $pdfContent = view('pdf_template', ['expenses' => [$expense]]);

            // Create a response object with the PDF content
            $response = service('response');
            $response->setHeader('Content-Type', 'application/pdf');
            $response->setHeader('Content-Disposition', 'attachment; filename=ExpenseData.pdf');
            $response->setBody($pdfContent);

            return $response;
        } else {
            // Handle the case where the expense is not found
            return redirect()->to(base_url('expense'))->with('error', 'Expense not found!');
        }
    }

}
?>